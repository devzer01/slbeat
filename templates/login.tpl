{include file='common/header.tpl'}

<div class='well' style='margin-top: 20px;'>
<h2>Login</h2>

If you created an account using Facebook, you can use the Facebook login directly. <br/>
Alternativly everyone can use their username/password which they selected during registration. 
</div>

{if (isset($error)) }
	<div class="alert alert-danger">{$error}</div>
{/if}


<div>
<div class='well' style='width: 350px; float: left'>

<form id='form' method='post' action='/login' role='form'>
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

 <button id='login' type="submit" class="btn btn-primary btn-lg">Login</button>

</div>
</form>
</div>

<div style='width: 40px; float: left;'>&nbsp;</div>

<div class='well' style='width: 350px; float: left'>
	<a href='/fbauth'><img src="/image/fb_login.png" /></a>
</div>

</div>

<script type='text/javascript'>
	
	$(function (e) {
		
	});
</script>

{include file='common/footer.tpl'}
