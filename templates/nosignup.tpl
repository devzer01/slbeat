{include file='common/header.tpl'}

<div style='margin-top: 20px;' class='well'>

	<h2>Error in registration</h2>

	Your registration request could not be completed. {$error} 
	
	{if (isset($missing_params)) }
		<br/><br/>If you wish to sign up again please ensure the fields listed below are marked public in your facebook profile.
		<br/>
		<ul>
		{foreach from=$missing_params item=param}
			<li> {$param} <br/>
		{/foreach}
		</ul>
		<br/>
		 Please visit <a href='http://facebook.com'>Facebook</a> and mark the above fields as public before trying to signup again. 
	{/if} 
</div>

{if (isset($missing_params)) }
<div class="well well-sm">
	Your profile is missing required information to complete SLBeat registraton. Geo information such as location and hometown is essential for the social directory function. Thanks for your understanding.
</div>
{/if}

{include file='common/footer.tpl'}