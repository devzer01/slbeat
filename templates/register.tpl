{include file='common/header.tpl'}

<div class='well' style='margin-top: 20px;'>
<h2>Register</h2>

You have 2 options to register, you can either use your existing Facebook account or create an account with the community directly. 

</div>

<div>
<div class='well' style='width: 350px; float: left'>

<form id='register' method='post' action='/register' role='form'>
<div style='width: 300px;'>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" autocomplete="off" required />
    <p id='emailvalid' class="help-block"></p>
</div>

<div class="form-group">
    <input type="radio" class='gender' id="male" name="gender" value='male' data-label='Male' checked data-color='blue' />
    <input type="radio" class='gender' id="female" name="gender" value='female' data-label='Female' data-color='pink' />
    <p id='gendervalid' class="help-block"></p>
</div>

<button id='finish' type="submit" class="btn btn-primary btn-lg">Next</button>

</div>
</form>
</div>

<div style='width: 40px; float: left;'>&nbsp;</div>

<div class='well' style='width: 350px; float: left'>
	<a href='/fbauth'><img src="/image/fb_login.png" /></a>
</div>

</div>

<script type='text/javascript'>

	var formready = false;
	
	$(function (e) {
		$('#male').prettyCheckable();
		$('#female').prettyCheckable();
		$("#register").validate();
		$("#email").change(function (e) {
			var attr = {};
			attr.url = '/email/' + $(this).val();
			attr.type = 'get';
			attr.cache = false;
			attr.dataType = 'json';
			attr.success = function (json) {
				if (json.valid == 0) {
					formready = true;
					$("#emailvalid").html('<div class="alert alert-success">Email is valid</div>');
					return;	
				}
				
				if (json.valid == 1) {
					$("#emailvalid").html('<div class="alert alert-danger">Email is in use</div>');
					$("#email").focus();
					formready = false;
					return;
				}
				
			};
			
			$.ajax(attr);
		});
	});
</script>

{include file='common/footer.tpl'}
