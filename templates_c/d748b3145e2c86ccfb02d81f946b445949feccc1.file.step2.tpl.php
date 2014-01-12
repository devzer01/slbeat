<?php /* Smarty version Smarty-3.1.16, created on 2014-01-12 19:17:58
         compiled from "templates/step2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95618854352d24ab0999eb3-62476213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd748b3145e2c86ccfb02d81f946b445949feccc1' => 
    array (
      0 => 'templates/step2.tpl',
      1 => 1389529073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95618854352d24ab0999eb3-62476213',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d24ab0a14bc5_89159376',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d24ab0a14bc5_89159376')) {function content_52d24ab0a14bc5_89159376($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div style='margin-top: 20px;' class='well'>
	To complete registration, please select a username and password. <br/>
	Please note username choice is final and you will not be allowed to change username in the future. Please choose wisley. 
</div>

<?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
	<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>

<form id='form' method='post' action='/savestep2' role='form'>
<div style='width: 300px;'>

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" autocomplete="off" />
    <p id='uservalid' class="help-block"></p>
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
</div>

<div class="form-group">
    <label for="social">Include myself in Social Directory:</label>
    <input type="checkbox" class="form-control" id="social" value="1" checked />
    <p class="help-block"><a href='/read/social'>What is social directory??</a></p>
</div>

 <button id='finish' type="button" class="btn btn-primary btn-lg">Finish</button>

</div>
</form>

<script type='text/javascript'>

	var formready = false;
	$(function () {
		$("#finish").click(function (e) {
			
			e.preventDefault();
			
			if ($("#username").val().trim() == "" || $("#password").val().trim() == "" || !formready) {
				alert("Please fill the form or Use another username");
				return false;
			}
			
			$("#form").submit();
						
		});
	
		$("#username").change(function (e) {
			var attr = {};
			attr.url = '/verify/' + $(this).val();
			attr.type = 'get';
			attr.cache = false;
			attr.dataType = 'json';
			attr.success = function (json) {
				if (json.valid == 0) {
					formready = true;
					$("#uservalid").html('<div class="alert alert-success">Username is valid</div>');
					return;	
				}
				
				if (json.valid == 1) {
					$("#uservalid").html('<div class="alert alert-danger">Username is in use</div>');
					$("#username").focus();
					formready = false;
					return;
				}
				
				if (json.valid == 2) {
					$("#uservalid").html('<div class="alert alert-danger">Username can only contain alpha numerical letters and following symbols "._" </div>');
					$("#username").focus();
					formready = false;
					return;
				}
			};
			
			$.ajax(attr);
			
		});
	});
</script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
