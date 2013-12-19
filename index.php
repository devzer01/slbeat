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
	
	if($_SESSION['state'] && ($_SESSION['state'] !== $_REQUEST['state']))
	{
		//do something here
		
		return true;
	}
	
	if($_REQUEST['error'])
	{
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
	$sql = "SELECT username, password FROM member WHERE fb_id = :fb_id LIMIT 1"
	$sth = $pdo->prepare($sql);
	$sth->execute(array(':fb_id' => $user->id));
	
	if ($sth->rowCount() != 0) {
		$sql = "UPDATE user SET fb_token = :fb_token WHERE fb_id = :fb_id";
		$sth = $pdo->prepare($sql);
		$sth->execute(array(':fb_token' => $params['access_token'] , 'fb_id' => $user->id));
		
		//handle login and redirect
	}
	
				
		$save = array(
							"username" => $username,
							"password" => $password,
							"forname" => $user->first_name,
							"surname" => $user->last_name,
							"validation_code" => $validation_code,
							"birthday" => date("Y-m-d", strtotime($user->birthday)),
							"gender" => ($user->gender=="male")?1:2,
							"email" => $user->email,
							"facebook_id" => $user->id,
							"facebook_username" => $user->username,
							"facebook_token" => $params['access_token'],
							"username_confirmed" => 0,
							"isactive" => 0,
							"type" => 4,
							"signup_datetime" => funcs::getDateTime(),
							"lookmen" => ($user->gender=="male")?"0":"1",
							"lookwomen" => ($user->gender=="male")?"1":"0",
							"description" => ($user->bio)?addslashes($user->bio):""
		);
	
					if($user->location)
					{
						$countries = DBConnect::assoc_query_2D("SELECT id, name FROM xml_countries WHERE status=1");
						foreach($countries as $country)
						{
							if(strpos($user->location->name, $country['name'])!==false)
							{
								$save['country'] = $country['id'];
							}
						}
	
						if($save['country'])
						{
							$states = DBConnect::assoc_query_2D("SELECT id, name FROM xml_states WHERE status=1 and parent=".$save['country']);
							foreach($states as $state)
							{
								if(strpos($user->location->name, $state['name'])!==false)
								{
									$save['state'] = $state['id'];
								}
							}
	
							if($save['state'])
							{
								$cities = DBConnect::assoc_query_2D("SELECT id, name FROM xml_cities WHERE status=1 and parent=".$save['state']);
								foreach($cities as $city)
								{
									if(strpos($user->location->name, $city['name'])!==false)
									{
										$save['city'] = $city['id'];
									}
								}
							}
						}
					}
					elseif($user->hometown)
					{
						$countries = DBConnect::assoc_query_2D("SELECT id, name FROM xml_countries WHERE status=1");
						foreach($countries as $country)
						{
							if(strpos($user->hometown->name, $country['name'])!==false)
							{
								$save['country'] = $country['id'];
							}
						}
	
						if($save['country'])
						{
							$states = DBConnect::assoc_query_2D("SELECT id, name FROM xml_states WHERE status=1 and parent=".$save['country']);
							foreach($states as $state)
							{
								if(strpos($user->hometown->name, $state['name'])!==false)
								{
									$save['state'] = $state['id'];
								}
							}
	
							if($save['state'])
							{
								$cities = DBConnect::assoc_query_2D("SELECT id, name FROM xml_cities WHERE status=1 and parent=".$save['state']);
								foreach($cities as $city)
								{
									if(strpos($user->hometown->name, $city['name'])!==false)
									{
										$save['citiy'] = $city['id'];
									}
								}
							}
						}
					}
					$colnames = array_flip(DBconnect::get_col_names('member'));
					$member_post = array_intersect_key($save, $colnames);
	
					DBconnect::assoc_insert_1D($member_post, 'member');
					$userid = mysql_insert_id();
	
					$image_url = "http://graph.facebook.com/".$user->id."/picture?type=large";
					$headers = get_headers($image_url, 1);
					$content_length = $headers["Content-Length"];
					if($content_length>2048)
					{
						$uploaddir = UPLOAD_DIR.$userid.'/';
						if(!is_dir($uploaddir))	//check have my user id directory
							mkdir($uploaddir, 0777); //create my user id directory
	
						$filename = time().'.jpg';
						copy($image_url, $uploaddir.$filename);
						$picturepath = $userid."/".$filename;
	
						if(PHOTO_APPROVAL == 1){
							funcs::updatePhotoToTemp($userid, $picturepath);
						}
					}
	
					$subject = funcs::getText($_SESSION['lang'], '$email_testmember_subject');	//get subject message
					$message = funcs::getMessageEmail_Forgot($smarty,$username, $password, "facebook");	//get message
					funcs::sendMail($user->email, $subject, $message, MAIL_FROM);
	
					$args=array(
							'access_token' => $params['access_token'],
							"name"=>$username." start using ".ucfirst($domain),
							"picture"=>"http://www.".$domain."/sites/".$domain."/images/cm-theme/facebook-128.jpg",
					);
						
					facebookPostOnUserWall($args);
	
					header("location: ". MY_URL."?action=activate&username=".$username."&password=".$password."&code=".$validation_code);
				}
			}
			else
			{
				echo("Failed, facebook id and email are needed.");
			}
		}
	}
});

$app->get('/notregister', function () use ($app, $smarty) {
	$smarty->display('login_with_facebook.tpl');
});

$app->get('/', function () use ($app, $smarty) {
	$smarty->display('index.tpl');
});

$app->run();