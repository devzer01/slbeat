<?php /* Smarty version Smarty-3.1.16, created on 2014-01-13 01:40:11
         compiled from "templates/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155378902452cfcd6c9200b9-14314856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a679c2441bc57cd8a39726a7e94991c3039e7906' => 
    array (
      0 => 'templates/common/header.tpl',
      1 => 1389535179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155378902452cfcd6c9200b9-14314856',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52cfcd6c945797_77328104',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cfcd6c945797_77328104')) {function content_52cfcd6c945797_77328104($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
	<title>SL Beat - Sri Lankan Community</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/css/main.css" rel="stylesheet" media="screen">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/jquery-1.10.2.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script type='text/javascript' src="http://imsky.github.io/holder/holder.js"></script>
	<script type="text/javascript" >
            $(document).ready(function() {        
        		$('.carousel').carousel()
            });
	</script>
	</head>
	<body>
<div class="log-header">
      <div class="container">
    <div class="row">
          <div class="col-md-5">
        <div class="blue-bar-left"> </div>
      </div>
          <div class="col-md-7">
        <div class="top-log-menu pull-right">
              <ul class="menu-one">
            	<?php if ((isset($_SESSION['auth'])&&$_SESSION['auth']=="1")) {?>
            		<li><a href="/home"><?php echo $_SESSION['username'];?>
</a> </li>
            	<?php } else { ?>
            		<li><a href="/home">Login</a> </li>
            	<?php }?>
            <li><span> | </span> </li>
            	<?php if ((isset($_SESSION['auth'])&&$_SESSION['auth']=="1")) {?>
            		<li><a href="/logout">Logout</a> </li>
            	<?php } else { ?>
            		<li> <a href="/register">Register</a></li>
            	<?php }?>
            	
          </ul>
            </div>
      </div>
        </div>
  </div>
    </div>
<div class="middle-menu">
      <div class="container">
    <div class="header">
          <div class="row">
        <div class="col-md-5">
              <div class="logo"> <img src="/img/logo.jpg" > </div>
            </div>
        <div class="col-md-7">
              <div class="menu">
            <nav class="navbar navbar-default" role="navigation">
                  <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
                  <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav pull-right">
                      <li class="active"><a href="/">Home</a></li>
                      <li><a href="/chat">Chat</a></li>
                      <li><a href="/social">Social</a></li>
                    </ul>
              </div>
                </nav>
          </div>
              <div class="count-menu">
            	<!-- <div class="row">
                  <div class="col-md-3"> <a href="#"> Toatal Groups <span class="ball">10</span> </a> </div>
                  <div class="col-md-3"> <a href="#"> Toatal Photos <span class="ball">15</span> </a> </div>
                  <div class="col-md-3"> <a href="#"> Toatal Vedios <span class="ball">25</span> </a> </div>
                  <div class="col-md-3"> <a href="#"> Toatal Events <span class="ball">45</span> </a> </div>
                </div> -->
          </div>
            </div>
      </div>
        </div>
  </div>
    </div>
<div class="content">
      <div class="container"><?php }} ?>
