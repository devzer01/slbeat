<?php /* Smarty version Smarty-3.1.16, created on 2014-01-12 19:36:36
         compiled from "templates/chatroom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86536506952d251a2a7a227-30429381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe2cecb7596f813e75152d98d6fb97541e69f179' => 
    array (
      0 => 'templates/chatroom.tpl',
      1 => 1389530072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86536506952d251a2a7a227-30429381',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d251a2a93a22_52950841',
  'variables' => 
  array (
    'username' => 0,
    'host' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d251a2a93a22_52950841')) {function content_52d251a2a93a22_52950841($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>SLbeat - The Sri Lankan community</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<!-- <script type='text/javascript' src='//code.jquery.com/jquery-1.10.2.min.js'></script> -->
		<link rel="stylesheet" type="text/css" href="/candy/res/default.css" />

        <script type="text/javascript" src="/candy/libs/libs.min.js"></script>
		<script type="text/javascript" src="/candy/candy.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				Candy.init('http-bind/', {
					core: { debug: true, autojoin: ['<?php echo @constant('OPENFIRE_ROOM');?>
'] },
					view: { resources: '/candy/res/' }
				});
				
				Candy.Core.connect('<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
@<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
');
			});
		</script>
		
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" />
        <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div id="candy"></div>
	</body>
</html><?php }} ?>
