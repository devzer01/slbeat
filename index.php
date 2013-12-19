<?php 
session_start();
require_once('config.php');
require_once 'vendor/autoload.php';
require_once('smarty3/Smarty.class.php');
//require_once('db.php');

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
	
	
});

$app->get('/notregister', function () use ($app, $smarty) {
	$smarty->display('login_with_facebook.tpl');
});

$app->get('/', function () use ($app, $smarty) {
	$smarty->display('index.tpl');
});

$app->run();