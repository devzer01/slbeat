<?php /* Smarty version Smarty-3.1.16, created on 2014-01-12 12:44:10
         compiled from "templates/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206634348752d229cf7f0a65-74075112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96364cdd37ce55759f6c95bec6d884ed43585f1d' => 
    array (
      0 => 'templates/register.tpl',
      1 => 1389505447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206634348752d229cf7f0a65-74075112',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d229cf7fad76_93486360',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d229cf7fad76_93486360')) {function content_52d229cf7fad76_93486360($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class='well' style='margin-top: 20px;'>
SL Beat registration is exclusive to facebook members at this time. We have taken such meassure to reduce the amount of spam signups in the site. Please note that in certain situations the quality of your facebook account may prevent you from registering with the site. 
This qualative meassure is conducted using a properetory algorith and details are not made public at this time. If your do not posses an active facebook account we applogize for the inconvinece this may create you. Stay tuned we may offer alternative signup options in the future. 
</div>

<div style='text-align: center;'>

<a href='/fbauth'><img src="/images/fblogin.png" /></a>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
