<div class="main-box">
        <div class="row">
        	<div class="col-md-6">
                <div class="media"> <a class="pull-left" href="/chat"> <img class="media-object img-circle" src="img/box-1.png" alt="Join Chat Room"> </a>
                      <div class="media-body">
                    <h4 class="media-heading"><span class="icon"><img src="img/chat.png"></span><a href="/chat">Chat Room</a></h4>
                    <p>Join the conversation with our fellow community members in the chat room</p>
                    <button id='read_chat' type="button" class="btn btn-primary blue">Chat Now</button>
                  </div>
                    </div>
              </div>
                  <div class="col-md-6">
                <div class="media"> <a class="pull-left" href="/social"> <img class="media-object img-circle" src="img/box-2.png" alt="Browse Social Directory"> </a>
                      <div class="media-body">
                    <h4 class="media-heading"><span class="icon"><img src="img/directory.png"></span><a href="/social">Social Directory</a></h4>
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
    			document.location.href = "/chat";
    		});
    	});
</script>