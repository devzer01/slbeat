<?php /* Smarty version Smarty-3.1.16, created on 2014-01-12 15:16:42
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47602442552b29d3ec4c5a7-09424427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1389514383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47602442552b29d3ec4c5a7-09424427',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52b29d3ec532e3_72701936',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b29d3ec532e3_72701936')) {function content_52b29d3ec532e3_72701936($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="big-bg">
          <div class="row">
        <div class="col-md-12">
              <div class="link-box">
            <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                <ul class="Social-media pull-right">
                      <li><a href="#"><img src="img/fb.png"></a></li>
                      <li><a href="#"><img src="img/twitter.png"></a></li>
                      <li><a href="#"><img src="img/u-tube.png"></a></li>
                      <li><a href="#"><img src="img/flicker.png"></a></li>
                    </ul>
              </div>
                  <div class="col-md-4">
                <div class="members pull-right">
                      <h5>Toatal Members</h5>
                      <span class="big-ball pull-right"> <?php echo $_SESSION['members'];?>
 </span> </div>
              </div>
                </div>
          </div>
         	<?php echo $_smarty_tpl->getSubTemplate ('common/home.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

         </div>
      </div>
        </div>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
