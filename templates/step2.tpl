{include file='common/header.tpl'}

<div style='margin-top: 20px;' class='well'>
	To complete registration, please select a username and password. This username is used as nickname in our chat site <br/>
	Please note username choice is final and you will not be allowed to change username in the future. Please choose wisley.<br/>
	Username can only contain (a-z) letters (0-9) numbers (.) period and (_)underscore. 
</div>

{if (isset($error)) }
	<div class="alert alert-danger">{$error}</div>
{/if}

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

{include file='common/footer.tpl'}
