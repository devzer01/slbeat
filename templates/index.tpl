{include file='common/header.tpl'}
    <div class="big-bg">
          <div class="row">
        <div class="col-md-12">
              <div class="link-box">
            <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                <ul class="Social-media pull-right">
                      <li><a href="#"><img src="img/fb.png"></a></li>
                      <li><a href="#"><img src="img/twitter.png"></a></li>
                      <li><a href="#"><img src="img/u-tube.png"></a></li>
                      <li><a href="#"><img src="img/flicker.png"></a></li>
                    </ul>
              </div>
                  <div class="col-md-4">
                <div class="members pull-right">
                      <h5>Toatal Members</h5>
                      <span class="big-ball pull-right"> {$smarty.session.members} </span> </div>
              </div>
                </div>
          </div>
         	{include file='common/home.tpl'}
         </div>
      </div>
        </div>
{include file='common/footer.tpl'}