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

$app->get('/fblogin', function () use ($app, $smarty) {
	
	if(isset($_SESSION['state']) && ($_SESSION['state'] !== $_REQUEST['state'])) {
		//do something here
		
		return true;
	}
	
	if(isset($_REQUEST['error'])) {
		//do something here
		
		return true;
	}
	
	$code = $_REQUEST["code"];
		
	$token_url = "https://graph.facebook.com/oauth/access_token?client_id=". APP_ID ."&redirect_uri=". urlencode(MY_URL) ."&client_secret=". APP_SECRET ."&code=". $code;
	
	$response = file_get_contents($token_url);
	$params = null;
	parse_str($response, $params);
	
	$graph_url = "https://graph.facebook.com/me?access_token=".$params['access_token'];
	
	$user = json_decode(file_get_contents($graph_url));
	
	if(($user->id == "") || ($user->email == "")) {
		//some more errors here	
		
		return true;
	}
	
	$pdo = getDbHandler();
	$sql = "SELECT username, password FROM member WHERE fb_id = :fb_id LIMIT 1";
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':fb_id' => $user->id));
	
	if ($sth->rowCount() != 0) {
		$sql = "UPDATE user SET fb_token = :fb_token WHERE fb_id = :fb_id";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':fb_token' => $params['access_token'] , 'fb_id' => $user->id));
		
		//handle login and redirect
		
		return true;
	}
	
	$image_url = "https://graph.facebook.com/".$user->id."/picture?type=large&access_token=" . $params['access_token'];
	$fb_image = file_get_contents($image_url);
	
	
	$sql = "INSERT INTO user (username, password, email, dob, fb_id, fb_token, fb_image, fb_first_name, fb_last_name, fb_username, fb_gender, fb_bio, "
	     . "                    fb_hometown_id, fb_hometown_name, fb_location_id, fb_location_name, fb_religion, created) "
	     . " VALUES (:username, :password, :email, :dob, :fb_id, :fb_token, :fb_image, :fb_first_name, :fb_last_name, :fb_username, :fb_gender, :fb_bio, "
		 . "                    :fb_hometown_id, :fb_hometown_name, :fb_location_id, :fb_location_name, :fb_religion, NOW()) ";
	
	$sth = $pdo->prepare($sql);
	$sth->execute(array(
				':username' => 'A', ':password' => 'B', ':email' => $user->email, 'dob' =>  date("Y-m-d", strtotime($user->birthday)),':fb_id' => $user->id, ':fb_token' => $params['access_token'],
				':fb_image' => $fb_image, ':fb_first_name' => $user->first_name, ':fb_last_name' => $user->last_name, ':fb_username' => $user->username,
				':fb_gender' => $user->gender, ':fb_bio' => $user->bio, ':fb_hometown_id' => $user->hometown->id, ':fb_hometown_name' => $user->hometown->name,
				':fb_location_id' => $user->location->id, ':fb_location_name' => $user->location->name, ':fb_religion' => $user->religion));
	
	return true;
});

$app->get('/notregister', function () use ($app, $smarty) {
	$smarty->display('login_with_facebook.tpl');
});

$app->get('/', function () use ($app, $smarty) {
	$smarty->display('index.tpl');
});

$app->run();