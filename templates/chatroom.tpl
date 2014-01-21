<!DOCTYPE html>
<html>
	<head>
		<title>SLbeat - The Sri Lankan community</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<!-- <script type='text/javascript' src='//code.jquery.com/jquery-1.10.2.min.js'></script> -->
		<link rel="stylesheet" type="text/css" href="/candy/res/default.css" />

        <script type="text/javascript" src="/candy/libs/libs.min.js"></script>
		<script type="text/javascript" src="/candy/src/candy.js"></script>
		<script type="text/javascript" src="/candy/src/core.js"></script>
		<script type="text/javascript" src="/candy/src/util.js"></script>
		<script type="text/javascript" src="/candy/src/view.js"></script>
		<script type="text/javascript" src="/candy/src/core/action.js"></script>
		<script type="text/javascript" src="/candy/src/core/chatRoom.js"></script>
		<script type="text/javascript" src="/candy/src/core/chatRoster.js"></script>
		<script type="text/javascript" src="/candy/src/core/chatUser.js"></script>
		<script type="text/javascript" src="/candy/src/core/event.js"></script>
		<script type="text/javascript" src="/candy/src/view/observer.js"></script>
		<script type="text/javascript" src="/candy/src/view/pane.js"></script>
		<script type="text/javascript" src="/candy/src/view/template.js"></script>
		<script type="text/javascript" src="/candy/src/view/translation.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				
				var whitelist = [];
				
				whitelist.push('{$smarty.const.OPENFIRE_ROOM}');
				
				{if $gender eq "female"}
					var blocked = true;
				{else}
					var blocked = false;
				{/if}
				
				Candy.Util.setCookie('candy-nostatusmessages', '1', 365);
				Candy.init('http-bind2/', {
					core: { debug: false, autojoin: ['{$smarty.const.OPENFIRE_ROOM}'] },
					view: { resources: '/candy/res/' }
				});
				
				$(Candy).on('candy:view.roster.after-update', function(evnt, args) {
					
					console.log('Roster update called ' + args.action);
					
					if (args.action != "join") return true;
					
					var nickname = args.user.getNick();
					
					var attr = {};
					attr.url = '/roster/' + nickname;
					attr.type = 'get';
					attr.dataType = 'json';
					attr.success = function (json) {
						if (json.fb == 1) {
							args.element.addClass("fbauth");
							args.element.find("ul").append('<li class="fbauth">(FB)</li>');
						} 
						
						if (json.gender == "male") {
							args.element.addClass("male");
						} else {
							args.element.addClass("female");
						}
						
						
					}
					
					$.ajax(attr);
					
				});
				
				$(Candy).on('candy:view.message.before-show', function (evnt, args) {
					
					if (blocked && whitelist.indexOf(args.roomJid) == -1) {
						console.log("PM blocked");
						args.message = null;
					}
					
				});
				
				$(Candy).on('candy:view.message.before-send', function (evnt, args) {
					if (blocked) {
						if (whitelist.indexOf(args.jid) == -1) {
							console.log("adding to whitelist");
							whitelist.push(args.jid);
						} else {
							console.log("Already in whitelist");
						}
					}
					return args;
				});
				
				$(Candy).on('candy:view.room.before-add', function (evnt, args) {
					if (whitelist.indexOf(args.jid) == -1 && blocked) {
						args.block = true;
						Candy.Core.Action.Jabber.Room.Message(args.jid, "This user have turned off private messaging", 'chat');
					}
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
