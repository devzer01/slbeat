<!DOCTYPE html>
<html>
	<head>
		<title>SLbeat - The Sri Lankan community</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<!-- <script type='text/javascript' src='//code.jquery.com/jquery-1.10.2.min.js'></script> -->
		<link rel="stylesheet" type="text/css" href="/candy/res/default.css" />

        <script type="text/javascript" src="/candy/libs/libs.min.js"></script>
		<script type="text/javascript" src="/candy/candy.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				Candy.init('http-bind/', {
					core: { debug: true, autojoin: ['{$smarty.const.OPENFIRE_ROOM}'] },
					view: { resources: '/candy/res/' }
				});
				
				Candy.Core.connect('{$username}@{$host}', '{$password}');
			});
		</script>
		
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" />
        <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div id="candy"></div>
	</body>
</html>