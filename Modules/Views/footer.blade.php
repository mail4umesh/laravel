<?php $routeName= Route::currentRouteName()?>
@if(Auth::check() && Route::currentRouteName()!="user.profile")
   @include('_layouts.chat_initiate')
@endif 
@if(Route::currentRouteName()!="landing.home") 
<style type="text/css">
#container_new {
    text-align: center;
    width: 100%;
    vertical-align: middle;
    height: 100%;
    display: table-cell;
}
footer{top:0px !important;}
</style>

<script type="text/javascript">
  var base_url = '{{URL::to("")}}';
</script>

 
{{
        Minify::javascript(array(
            
    '/assets/js/jquery.cropbox.js',
    '/assets/js/jquery.cropit.js',
    '/assets/lib/cropper/src/cropper.js',
    '/assets/js/jquery.cycle.all.js',
    '/assets/js/hammer-new.js',
    '/assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js',
    '/assets/js/common.js',
    '/assets-01/js/collection.js',
    '/assets/lib/autogrow/autogrow.min.js',
    '/assets/lib/bootbox/bootbox.min.js',
    '/assets/lib/noty/packaged/jquery.noty.packaged.min.js',
    '/assets/js/screenfull.js',
    '/assets/js/datetime/js/moment.js',
    '/assets/js/datetime/js/bootstrap-datetimepicker.min.js',
    '/assets/js/jquery.easing.1.3.js',
    '/assets/lib/uploadfile/jquery.form.js',
    '/assets/lib/uploadfile/jquery.uploadfile.js',
    '/assets/lib/jquery-ui-1.10.4/js/jquery-ui-1.10.4.custom.min.js',
    '/assets/lib/uploadfile/jquery.adaptive-modal.js',
    '/assets/js/event.js',
    '/assets/js/ap-image-zoom.js',
    '/assets-01/js/jquery.justifiedGallery.min.js',
  ), array('defer' => 'defer'))->withFullUrl()}}
  
{{ Minify::javascript('/assets/js/jquery.viewportchecker.js',array('defer'=>'defer'))->withFullUrl()}}
{{ Minify::javascript('/assets/lib/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js',array('defer'=>'defer'))->withFullUrl()}}     
 
<!-- Only File Uploading Related Work For Event -->
@else

<script type="text/javascript">

function downloadJSAtOnload2() { 
var element = document.createElement("script");
element.src = "/assets/js/common.js";
document.body.appendChild(element);  

var element1 = document.createElement("script");
element1.src = "/assets/lib/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js";
document.body.appendChild(element1);
}

if (window.addEventListener)
window.addEventListener("load", downloadJSAtOnload2, false);
else if (window.attachEvent)
window.attachEvent("onload", downloadJSAtOnload2);
else window.onload = downloadJSAtOnload2;
</script>
 <script defer="defer" src="/assets/js/jquery-ui.min.js"></script>
@endif

<section id="container_new"></section>
<!-- This Section is for Full Page Pop up Modal Start -->
<div style="display:none" class="modal fade modal-fullscreen force-fullscreen login-modal-container" style="background-color: #353535; 
background-image: url('data:image/png;base64,R0lGODlhEAALAPQAAP///wAAANra2tDQ0Orq6gYGBgAAAC4uLoKCgmBgYLq6uiIiIkpKSoqKimRkZL6+viYmJgQEBE5OTubm5tjY2PT09Dg4ONzc3PLy8ra2tqCgoMrKyu7u7gAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCwAAACwAAAAAEAALAAAFLSAgjmRpnqSgCuLKAq5AEIM4zDVw03ve27ifDgfkEYe04kDIDC5zrtYKRa2WQgAh+QQJCwAAACwAAAAAEAALAAAFJGBhGAVgnqhpHIeRvsDawqns0qeN5+y967tYLyicBYE7EYkYAgAh+QQJCwAAACwAAAAAEAALAAAFNiAgjothLOOIJAkiGgxjpGKiKMkbz7SN6zIawJcDwIK9W/HISxGBzdHTuBNOmcJVCyoUlk7CEAAh+QQJCwAAACwAAAAAEAALAAAFNSAgjqQIRRFUAo3jNGIkSdHqPI8Tz3V55zuaDacDyIQ+YrBH+hWPzJFzOQQaeavWi7oqnVIhACH5BAkLAAAALAAAAAAQAAsAAAUyICCOZGme1rJY5kRRk7hI0mJSVUXJtF3iOl7tltsBZsNfUegjAY3I5sgFY55KqdX1GgIAIfkECQsAAAAsAAAAABAACwAABTcgII5kaZ4kcV2EqLJipmnZhWGXaOOitm2aXQ4g7P2Ct2ER4AMul00kj5g0Al8tADY2y6C+4FIIACH5BAkLAAAALAAAAAAQAAsAAAUvICCOZGme5ERRk6iy7qpyHCVStA3gNa/7txxwlwv2isSacYUc+l4tADQGQ1mvpBAAIfkECQsAAAAsAAAAABAACwAABS8gII5kaZ7kRFGTqLLuqnIcJVK0DeA1r/u3HHCXC/aKxJpxhRz6Xi0ANAZDWa+kEAA7AAAAAAAAAAAA');
background-position: center 100px; background-repeat:no-repeat" id="fullscreens_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;z-index:1100000 !important;">   
   <button type="button" class="modal-close login-right-close fullscreen-close-button" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>    
</div>

<div style="display:none" class="modal fade modal-fullscreen force-fullscreen" id="fullscreens_pp_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">   
  <button type="button" class="modal-close fullscreen-close-button" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>    

  <object style="width: 100%;height:100%;"  data=""  id="fullscreens_pp_iframe" style="display:none"></object>


  <div class="photo-detail" id="pp_content">
    <div class="photo-detail-left" style="!important; background:#000; !important">
      <div class="photo-detail-img">
        <div id="slider1">
          <div class="m-img">
            <img id="pp-image-id" src="" style="display:none">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- This Section is for Full Page Pop up Modal End -->
@if(Route::currentRouteName()!="landing.home")
<!-- This Section is for Full Page Pop up Script End --> 
<div id="alert-message-modal" class="modal fade" role="dialog" style="display:none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="alert-message-header">Image Size Error</h4>
      </div>
      <div class="modal-body">
        <p id="alert-message-text"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok, I Got It!</button>
      </div>
    </div>

  </div>
</div>


<div id="alert-login-message-modal" class="modal fade" role="dialog" style="display:none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="modal-close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="alert-login-message-header">You are not logged in </h4>
      </div>
      <div class="modal-body">
        <p id="alert-login-message-text">Please login to continue</p>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#alert-login-message-modal').modal('hide');" data-dismiss="modal" href="{{URL::to('user/login')}}" class="btn btn-default megashot-full-page-popup" >Login</button>
        <button type="button" onclick="$('#alert-login-message-modal').modal('hide');" data-dismiss="modal" href="{{URL::to('user/register')}}" class="btn btn-default megashot-full-page-popup" >Register</button>
      </div>
    </div>

  </div>
</div>

<div id="report" class="modal fade" role="dialog" style="display:none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <center><h1>Comming Soon</h1></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>

  </div>
</div>

@endif


 

