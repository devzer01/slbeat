<?php /* Smarty version Smarty-3.1-DEV, created on 2013-12-19 16:17:40
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47602442552b29d3ec4c5a7-09424427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1387444656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47602442552b29d3ec4c5a7-09424427',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52b29d3ec532e3_72701936',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b29d3ec532e3_72701936')) {function content_52b29d3ec532e3_72701936($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>SLbeat - The Sri Lankan community</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<!-- <script type='text/javascript' src='//code.jquery.com/jquery-1.10.2.min.js'></script> -->
		<link rel="stylesheet" type="text/css" href="candy/res/default.css" />

        <script type="text/javascript" src="candy/libs/libs.min.js"></script>
		<script type="text/javascript" src="candy/candy.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				Candy.init('http-bind/', {
					core: { debug: false, autojoin: ['lanka@conference.slbeat.com'] },
					view: { resources: 'candy/res/' }
				});
				
				Candy.Core.connect('slbeat.com');
			});
		</script>
		
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" />
        <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        
	</head>
	<body>
		
		<img src="image/slbeat.png" />
		
		<div id="candy"></div>
		
		<a id='loader' href='notregister?iframe=true' rel='prettyPhoto'>Load</a>
		
		
	<script>
		$(function () {
			$("#loader").prettyPhoto( { modal: true, social_tools: '' } );
			$('#loader').click();
		});
	</script>
	</body>
</html><?php }} ?>