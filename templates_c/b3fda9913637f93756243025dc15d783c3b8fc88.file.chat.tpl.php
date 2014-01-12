<?php /* Smarty version Smarty-3.1.16, created on 2014-01-12 15:36:34
         compiled from "templates/chat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5217778652d2510190ec33-40731028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3fda9913637f93756243025dc15d783c3b8fc88' => 
    array (
      0 => 'templates/chat.tpl',
      1 => 1389515791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5217778652d2510190ec33-40731028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d2510191a805_86081479',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d2510191a805_86081479')) {function content_52d2510191a805_86081479($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id='chatroomdiv' style='margin-top: 20px; border: 1px solid black;'>
	<iframe src='/chatroom' style='border: 0 none;width: 903px; height: 623px;'></iframe>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
