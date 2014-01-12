<?php 
session_start();
require_once('config.php');
require_once 'vendor/autoload.php';
require_once('smarty3/Smarty.class.php');
require_once('db.php');

date_default_timezone_set('Asia/Bangkok');

$app = new \Slim\Slim();

$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
$smarty->setConfigDir('configs/');
$smarty->setCacheDir('cache/');

$app->notFound(function () use ($app, $smarty) {
	$app->redirect(".");
	return true;
});

$app->get('/fbauth', function () use ($app, $smarty) {
	$_SESSION['state'] = md5(uniqid(rand(), TRUE)); //generate a unique session id to be passed into facebook
	$app->redirect(FACEBOOK_LOGIN_URL.$_SESSION['state']);
	return true;
});

$app->get('/register', function () use ($smarty) {
	$smarty->display('register.tpl');
});

$app->get('/nosignup', function () use ($smarty, $app) {
	
	if (!isset($_SESSION['register_error'])) {
		$app->redirect("/");
	}
	
	$smarty->assign('error', $_SESSION['register_error']);
	unset($_SESSION['register_error']);
	
	if (isset($_SESSION['missing_params'])) {
		$smarty->assign('missing_params', $_SESSION['missing_params']);
		unset($_SESSION['missing_params']);
	}
	
	$smarty->display('nosignup.tpl');
});

$app->get("/home", function () use ($smarty, $app) {
	
	if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== 1) {
		$app->redirect("/register");
		return false;
	}
	
	$smarty->display('home.tpl');
});

$app->get('/fblogin', function () use ($app, $smarty) 
{
	
	if(isset($_SESSION['state']) && ($_SESSION['state'] !== $_REQUEST['state'])) {
		$_SESSION['register_error'] = "Possible CSRF";
		$app->redirect('/nosignup', 301);
		return false;
	}
	
	if(isset($_REQUEST['error'])) {
		$_SESSION['register_error'] = $_REQUEST['error'];
		$app->redirect("/nosignup", 301);
		return false;
	}
	
	if (!isset($_REQUEST['code'])) {
		$_SESSION['register_error'] = "Missing Required Param";
		$app->redirect('/nosignup', 301);
		return false;
	}
	
	$code = $_REQUEST["code"];
		
	$token_url = "https://graph.facebook.com/oauth/access_token?client_id=". APP_ID ."&redirect_uri=". urlencode(MY_URL) ."&client_secret=". APP_SECRET ."&code=". $code;
	
	$response = file_get_contents($token_url);
	$params = null;
	parse_str($response, $params);
	
	$graph_url = "https://graph.facebook.com/me?access_token=".$params['access_token'];
	
	$user = json_decode(file_get_contents($graph_url), true);
	
	if(($user['id'] == "") || ($user['email'] == "")) {
		$_SESSION['register_error'] = 'Your email address is not available in your public profile';
		$app->redirect("/nosignup", 301);
		return false;
	}
	
	$pdo = getDbHandler();
	$sql = "SELECT id, username, password, step2 FROM user WHERE fb_id = :fb_id LIMIT 1";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':fb_id' => $user['id']));
	
	if ($sth->rowCount() != 0) {
		
		$user_row = $sth->fetch(PDO::FETCH_ASSOC);
		
		$sql = "UPDATE user SET fb_token = :fb_token WHERE fb_id = :fb_id";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':fb_token' => $params['access_token'] , 'fb_id' => $user["id"]));
		
		
		$_SESSION['user_id'] = $user_row['id'];
		$_SESSION['fb_id'] = $user["id"];
		
		if ($user_row['step2'] == 0) {
			$app->redirect('/step2', 302);
			return true;			
		}
		
		$_SESSION['auth'] = 1;
		$_SESSION['username'] = $user_row['username'];
		$_SESSION['password'] = $user_row['password'];
		
		
		$app->redirect("/home", 302);
		
		return true;
	}
	
	$errors = validateFbUserParams($user);
	
	if (count($errors) > 0) {
		$_SESSION['register_error'] = 'Following items were not found on your facebook profile.';
		$_SESSION['missing_params'] = $errors;
		$app->redirect("/nosignup", 301);
		return false;
	}
	
	$image_url = "https://graph.facebook.com/".$user['id']."/picture?type=large&access_token=" . $params['access_token'];
	$fb_image = file_get_contents($image_url);
		
	$sql = "INSERT INTO user (username, password, email, dob, fb_id, fb_token, fb_image, fb_first_name, fb_last_name, fb_username, fb_gender, fb_bio, "
	     . "                    fb_hometown_id, fb_hometown_name, fb_location_id, fb_location_name, fb_religion, created) "
	     . " VALUES (:username, :password, :email, :dob, :fb_id, :fb_token, :fb_image, :fb_first_name, :fb_last_name, :fb_username, :fb_gender, :fb_bio, "
		 . "                    :fb_hometown_id, :fb_hometown_name, :fb_location_id, :fb_location_name, :fb_religion, NOW()) ";
	
	$sth = $pdo->prepare($sql);
	$sth->execute(array(
				':username' => 'A', ':password' => 'B', ':email' => $user['email'], 'dob' =>  date("Y-m-d", strtotime($user['birthday'])),':fb_id' => $user['id'], 
				':fb_token' => $params['access_token'],
				':fb_image' => $fb_image, ':fb_first_name' => $user['first_name'], ':fb_last_name' => $user['last_name'], ':fb_username' => $user['username'],
				':fb_gender' => $user['gender'], ':fb_bio' => $user['bio'], ':fb_hometown_id' => $user['hometown']['id'], ':fb_hometown_name' => $user['hometown']['name'],
				':fb_location_id' => $user['location']['id'], ':fb_location_name' => $user['location']['name'], ':fb_religion' => $user['religion']));
	
	$_SESSION['user_id'] = $pdo->lastInsertId();
	$_SESSION['fb_id'] = $user['id'];
	
	$app->redirect('/step2', 302);
	
	return true;
});

$app->get('/step2', function () use ($smarty) {
	
	if (isset($_SESSION['error'])) {
		$smarty->assign('error', $_SESSION['error']);
		unset($_SESSION['error']);
	}
	
	$smarty->display('step2.tpl');
});

$app->get('/logout', function () use ($app) {
	session_destroy();
	session_regenerate_id(true);
	$app->redirect("/");
});

$app->post('/savestep2', function () use ($app) {
	
	$id = $_SESSION['user_id'];

	$social = 1;
	if (!isset($_POST['social'])) $social = 0;
	
	$pdo = getDbHandler();
	
	$sql = "SELECT COUNT(*) cnt FROM user WHERE username = :username ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array('username' => $_POST['username']));
	
	$row = $sth->fetch(PDO::FETCH_ASSOC);
	
	if ($row['cnt'] == 1) {
		$_SESSION['error'] = "Username is in use, please use another";
		$app->redirect("/step2", 301);
		return;
	}
	
	if (preg_match("/[^A-Za-z0-9\._]/", $_POST['username'])) {
		$_SESSION['error'] = "Username is invalid, use only alpha numerical letters, period or underscore";
		$app->redirect("/step2", 301);
		return;
	}
	
	if (preg_match("/'/", $_POST['password'])) {
		$_SESSION['error'] = "Password can not contain single quotes";
		$app->redirect("/step2", 301);
		return;
	}
	
	$sql = "SELECT fb_first_name, email FROM user WHERE id = :id ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':id' => $id));
	
	$of_user = $sth->fetch(PDO::FETCH_ASSOC);
	
	$user_add_url = OPENFIRE_USERSERVICE_URL . '?type=add&secret=' . OPENFIRE_USERSERVICE_KEY . '&username=' . $_POST['username'] . '&password=' . $_POST['password'] . '&name=' . $of_user['fb_first_name'] . '&email=' . $of_user['email'];
	
	$output = file_get_contents($user_add_url);
	
	$sql = "UPDATE user SET username = :username, password = :password, social = :social, step2 = 1 WHERE id = :id";
	$sth = $pdo->prepare($sql);
	
	$sth->execute(array(':username' => $_POST['username'], ':password' => $_POST['password'], ':social' => $social, ':id' => $id));
	
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['auth'] = 1;
	
	$app->redirect('/home', 302);
	
	return true;
});

$app->get('/notregister', function () use ($app, $smarty) {
	$smarty->display('login_with_facebook.tpl');
});

$app->get('/verify/:username', function ($username) {
	$pdo = getDbHandler();
	
	$sql = "SELECT COUNT(*) cnt FROM user WHERE username = :username ";
	$sth = $pdo->prepare($sql);
	$sth->execute(array('username' => $username));
	
	$row = $sth->fetch(PDO::FETCH_ASSOC);
	
	if ($row['cnt'] == 1) {
		$return = array('valid' => 1);
		header("Content-Type: application/json");
		echo json_encode($return);
		return;
	}
	
	if (preg_match("/[^A-Za-z0-9\._]/", $username)) {
		$return = array('valid' => 2);
		header("Content-Type: application/json");
		echo json_encode($return);
		return;
	}
	
	$return = array('valid' => 0);
	header("Content-Type: application/json");
	echo json_encode($return);
	return;
	
});

$app->get('/read/:type', function ($type) use ($smarty) 
{
	$template = 'read_default.tpl';	
	switch ($type) {
		case 'chat':
			$template = 'read_chat.tpl';
			break;
		case 'social':
			$template = 'read_social.tpl';	
			break;
		default:
			break;		
	}
	
	$smarty->display($template);
});

$app->get('/test', function () {
	phpinfo();
});

$app->get("/social", function () use ($smarty) {
	$smarty->display('social.tpl');		
});

$app->get("/chat", function () use ($smarty) {
	$smarty->display('chat.tpl');
});

$app->get("/chatroom", function () use ($smarty) {
	
	if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
		$app->redirect("/register");
		return false;
	}
	
	$pdo = getDbHandler();
	
	$id = $_SESSION['user_id'];
	$sql = "SELECT username, password FROM user WHERE id = :id";
	$sth = $pdo->prepare($sql);
	
	$sth->execute(array(':id' => $id));
	
	$user = $sth->fetch(PDO::FETCH_ASSOC);
	
	$smarty->assign('username', $user['username']);
	$smarty->assign('password', $user['password']);
	$smarty->assign('host', OPENFIRE_HOST);
	
	$smarty->display('chatroom.tpl');
});

$app->get('/', function () use ($app, $smarty) {
	
	$pdo = getDbHandler();
	
	$sql = "SELECT COUNT(*) AS cnt FROM user";
	$sth = $pdo->prepare($sql);
	
	$sth->execute();
	
	$member = $sth->fetch(PDO::FETCH_ASSOC);
	
	$_SESSION['members'] = 1431 + $member['cnt'];
	
	$smarty->display('index.tpl');
});

$app->run();

function validateFbUserParams(&$user) {
	$default_user = array('birthday' => null, 'first_name' => null, 'last_name' => null, 'username' => null, 
			'gender' => null, 'bio' => null, 'hometown' => null, 'location' => null, 'religion' => null);
	
	$errors = array('birthday' => "Date of birth", 'first_name' => "First Name", 'last_name' => "Last Name", 'username' => null,
			'gender' => "Gender", 'bio' => null, 'hometown' => "Hometown", 'location' => "Location", 'religion' => null);
	
	$user = array_merge($default_user, $user);
	
	$error = array();
	
	foreach (array_keys($default_user) as $key) {
		if ($user[$key] === null && $errors[$key] !== null) {
			$error[] = $errors[$key];
		}
	}
	
	return $error;
}