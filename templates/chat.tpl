{include file='common/header.tpl'}

<div id='chatroomdiv' style='margin-top: 20px; border: 1px solid black; width: 100%;'>
	<iframe src='/chatroom' style='border: 0 none;width: 100%; height: 423px;'></iframe>
</div>

<div style='float: left; width: 100%; margin-top: 10px;'>
    	<audio id='audio' controls>
        	<source id='stream' src="http://76.164.217.100:7036/;stream.mp3" type="audio/mpeg"></source>
            Your browser does not support the audio element.
        </audio>
        <select name='channel' id='channel'>
        	<option value='0'>Y.FM</option>
        	<option value='1'>Yes.FM</option>
        	<option value='2'>Sun.FM</option>
        </select>
        <button id='play'>Play</button>
</div>

<script type='text/javascript'>
	var channel_list = ["http://76.164.217.100:7036/;stream.mp3", "http://76.164.217.100:7030/;stream.mp3", "http://69.64.57.21:8090/;stream.mp3"];
	
	function updateSource(index)
    { 
        var stream = $('#stream')[0];
        var audio = $('#audio')[0];
        stream.src= channel_list[index];
        audio.load();
    }
	
	$(function () {
		$("#channel").change(function (e) {
			e.preventDefault();
			updateSource($(this).val());
		});
		
		$("#play").click(function (e) {
			e.preventDefault();
			$("#audio")[0].load();
		});
	});
	
</script>

<div class='well' style='margin-top: 10px; clear: both;'>
	ඔබ මෙම කතා කුඩුව තුල අශිලාචාර අයුරින් කටයුතු කළහොත් ඔබගේ සේවාව අපි විසින් අත් හිටවනු ලැබේ.<br/>
	පොදු කතා කොටසේ ලිංගික සම්බන්දතා සදහා යෝජනා ගෙනඑම අශිලාචාර කටයුත්තකි.
</div>

{include file='common/footer.tpl'}
