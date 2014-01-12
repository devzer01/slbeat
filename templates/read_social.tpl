{include file='common/header.tpl'}

<div class='well' style='margin-top: 20px;'>
Social Directory is similar to friend finder service, We are still designing this feature. You will receive an email when this feature is available to use.   
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

{include file='common/footer.tpl'}