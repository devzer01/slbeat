<?php /* Smarty version Smarty-3.1.16, created on 2014-01-12 16:36:04
         compiled from "templates/nosignup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193655330552d254e25d3bc8-31086722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc9e3d04056d8d0ac0e19201223bd681302237e0' => 
    array (
      0 => 'templates/nosignup.tpl',
      1 => 1389519356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193655330552d254e25d3bc8-31086722',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d254e25ef929_10320346',
  'variables' => 
  array (
    'error' => 0,
    'missing_params' => 0,
    'param' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d254e25ef929_10320346')) {function content_52d254e25ef929_10320346($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div style='margin-top: 20px;' class='well'>

	<h2>Error in registration</h2>

	Your registration request could not be completed. <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 
	
	<?php if ((isset($_smarty_tpl->tpl_vars['missing_params']->value))) {?>
		<br/><br/>If you wish to sign up again please ensure the fields listed below are marked public in your facebook profile.
		<br/>
		<ul>
		<?php  $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['missing_params']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['param']->key => $_smarty_tpl->tpl_vars['param']->value) {
$_smarty_tpl->tpl_vars['param']->_loop = true;
?>
			<li> <?php echo $_smarty_tpl->tpl_vars['param']->value;?>
 <br/>
		<?php } ?>
		</ul>
		<br/>
		 Please visit <a href='http://facebook.com'>Facebook</a> and mark the above fields as public before trying to signup again. 
	<?php }?> 
</div>

<?php if ((isset($_smarty_tpl->tpl_vars['missing_params']->value))) {?>
<div class="well well-sm">
	Your profile is missing required information to complete SLBeat registraton. Geo information such as location and hometown is essential for the social directory function. Thanks for your understanding.
</div>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
