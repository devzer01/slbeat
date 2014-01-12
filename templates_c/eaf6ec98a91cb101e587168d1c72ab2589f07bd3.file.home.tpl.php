<?php /* Smarty version Smarty-3.1.16, created on 2014-01-12 16:25:10
         compiled from "templates/common/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27879462452d24f6988f4a0-25746768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaf6ec98a91cb101e587168d1c72ab2589f07bd3' => 
    array (
      0 => 'templates/common/home.tpl',
      1 => 1389517192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27879462452d24f6988f4a0-25746768',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d24f698920a2_16520218',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d24f698920a2_16520218')) {function content_52d24f698920a2_16520218($_smarty_tpl) {?><div class="main-box">
        <div class="row">
        	<div class="col-md-6">
                <div class="media"> <a class="pull-left" href="/chat"> <img class="media-object img-circle" src="img/box-1.png" alt="Join Chat Room"> </a>
                      <div class="media-body">
                    <h4 class="media-heading"><span class="icon"><img src="img/chat.png"></span>Chat Room</h4>
                    <p>Join the conversation with our fellow community members in the chat room</p>
                    <button id='read_chat' type="button" class="btn btn-primary blue">Read More</button>
                  </div>
                    </div>
              </div>
                  <div class="col-md-6">
                <div class="media"> <a class="pull-left" href="/social"> <img class="media-object img-circle" src="img/box-2.png" alt="Browse Social Directory"> </a>
                      <div class="media-body">
                    <h4 class="media-heading"><span class="icon"><img src="img/directory.png"></span>Social Directory</h4>
                    <p>Make friend with those who live in your neighbourhood</p>
                    <button type="button" class="btn btn-primary blue">Read More</button>
                  </div>
                    </div>
    	</div>
	</div>
</div>
          
<script type='text/javascript'>
    	$(function () {
    		$("#read_chat").click(function (e) {
    			e.preventDefault();
    			document.location.href = "/read/chat";
    		});
    	});
</script><?php }} ?>
