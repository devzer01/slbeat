<?php /* Smarty version Smarty-3.1.16, created on 2014-01-12 18:37:15
         compiled from "templates/read_social.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91095874352d27b9ec0ea83-66250409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfd4acead0b5c851f78cff5c512a3fe810ed906b' => 
    array (
      0 => 'templates/read_social.tpl',
      1 => 1389526233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91095874352d27b9ec0ea83-66250409',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d27b9ec2d433_95116038',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d27b9ec2d433_95116038')) {function content_52d27b9ec2d433_95116038($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class='well' style='margin-top: 20px;'>
Social Directory is similar to friend finder service, We are still designing this feature. You will receive when this feature is available to use.   
</div>

<button id='back' type="button" class="btn btn-primary btn-lg">Back</button>

<script type='text/javascript'>
	$(function () {
		$("#back").click(function (e) {
			e.preventDefault();
			window.history.back(); 
		});
	});
</script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
