<!DOCTYPE html>
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
            	{if (isset($smarty.session.auth) && $smarty.session.auth eq "1")}
            		<li><a href="/home">{$smarty.session.username}</a> </li>
            	{else}
            		<li><a href="/home">Login</a> </li>
            	{/if}
            <li><span> | </span> </li>
            	{if (isset($smarty.session.auth) && $smarty.session.auth eq "1")}
            		<li><a href="/logout">Logout</a> </li>
            	{else}
            		<li> <a href="/register">Register</a></li>
            	{/if}
            	
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
      <div class="container">