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

</style>
<footer>

    <div class="ft-logo"><a href="#">
            <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOgAAACiCAYAAABLaoFyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjU3RjQ2N0RGOEJCMjExRTY5RTY3Qzc3NjVEREUxQkY5IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjU3RjQ2N0UwOEJCMjExRTY5RTY3Qzc3NjVEREUxQkY5Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NTdGNDY3REQ4QkIyMTFFNjlFNjdDNzc2NURERTFCRjkiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NTdGNDY3REU4QkIyMTFFNjlFNjdDNzc2NURERTFCRjkiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5kNQkeAABH+UlEQVR42uxd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' />
        </a></div>
    <div class="footer_link">
        <ul>
            <li><a href="/home">Home</a></li><li><a href="/photos">Photos</a></li><li><a href="/groups">Groups</a></li>
        </ul>
    </div>
    <div class="footerSocail"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div> 
    <div class="copyright">
        <p>
            All photographs and work of arts that appear on pages of this site, are copyrights of respective their owners.</p>
        <p style="font-size:13px">@Megashots.net, Inc.<a href="#" class="f_a">Terms of Use</a>|<a href="#" class="f_a">Privacy Policy</a>|<a href="#" class="f_a"> Copyright Policy</a><a href="#">Contact us</a> <a href="#">Report Abuse</a></p>
    </div>
</footer>
<script type="text/javascript">
  var base_url = '{{URL::to("")}}';
</script>
 
 
{{ Minify::javascript(
  array(
    '/assets/js/jquery-ui.min.js',
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
<!-- This Section is for Full Page Pop up Script Start -->
<!--start header.blade.php-->
<script type="text/javascript" defer="defer">
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var pageTopUrl;
var navbarHeight = $('header.site-header').outerHeight();
$(window).scroll(function(event){
   
    didScroll = true;
});

var checkLastScroll = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
       $('header').removeClass("in");
   } else {
      $('header').addClass("in");
   }
   checkLastScroll = st;
   
});

$(window).scroll(function() {
    var scroll = $(this).scrollTop();
    $('#profile_banner').css('transform','translate3d(0px, -'+ (scroll * 0.2) +'px , 0px)');
});
    
$(function(){ // document ready
    
    var windowWidth = $(window).width();
    $(window).load(function(){
        if(windowWidth > 1280){
            checkWidthFun(windowWidth);
        }
        if(windowWidth < 769){
            $('div[data-disable="remove"]').removeClass('in');
        }else{
            $('div[data-disable="remove"]').addClass('in');
        }
        
    })
    
    $(window).resize(function(){
        var checkWidth = $(window).width();
        checkWidthFun(checkWidth);
    })
    
});

function checkWidthFun(wid){
    if(wid > 1280){
        if (!!$('.sticky').offset()) { // make sure ".sticky" element exists
            var stickyTop = $('.sticky').offset().top; // returns number 
            $(window).scroll(function(){ // scroll event
                var windowTop = $(window).scrollTop()+0; // returns number 
                if (windowTop > stickyTop){
                  $('.sticky').css({ position: 'fixed','z-index': 9999, top: 0, width:'288px' });
                }
                else {
                  $('.sticky').css({ position: 'static', width:'100%' });
                }
            });
        }
    }else{
        $('.sticky').css({ position: 'static', width:'100%' });
    }
    
    if(wid < 769){
        $('div[data-disable="remove"]').removeClass('in');
    }else{
        $('div[data-disable="remove"]').addClass('in');
    }
    
    $('div[data-disable="collapse"]').click(function(e){
        if ($(window).width() > 768) {  
          e.stopPropagation();
        }    
    });
}

$(document).ready(function(){
    
    $('.search-open-icon').on('click',function(){
        var body =  $('body');
        $('#search-keyword').val("");
        $('#search-result').hide();
        if(body.hasClass('open-search')){
            body.removeClass('open-search');
        }else{
            body.addClass('open-search');
        }
    });
    
    $('.close-search-result').on('click',function(){
        var search =  $('#search-result');
        if(search.hasClass('close-reslut-list')){
            search.removeClass('close-reslut-list');
        }else{
            search.addClass('close-reslut-list');
        }
    });
    
    $('#search-keyword').on('keyup',function(){
        var search =  $('#search-result');
        search.removeClass('close-reslut-list');
    })
    
    $('.open-floating-bar-left').on('click',function(){
        var body = $('body');
        if(body.hasClass('open-leftbar')){
            body.removeClass('open-leftbar');
        }else{
            body.addClass('open-leftbar');
        }
    });
    $('.open-floating-bar-right').on('click',function(){
        var body = $('body');
        if(body.hasClass('open-right')){
            body.removeClass('open-right');
        }else{
            body.addClass('open-right');
        }
    });
    
    $('div[data-disable="collapse"]').click(function(e){
        if ($(window).width() > 768) {  
          e.stopPropagation();
        }    
    });
    
    /* group page menu icon js */
    $('.show-mobile.mobile-btn').on('click',function(){
        $('.show-desktop.menu-second').slideToggle("slow");
    })
    
    $(window).on('resize',function(){
        if($(window).width > 768){
            $('.show-desktop.menu-second').show();
        }else{
            $('.show-desktop.menu-second').hide();
        }
    })
    
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop(); 
      
      $("#mainnav").removeClass("result_hover"); 
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
     
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('div.mainnav').removeClass('result_hover');
        $('div#pagenav').removeClass('result_hover');
        
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('div.timeline-new').removeClass('nav-up').addClass('nav-down');
            @if(strpos( $routeName,'timeline') !== false || strpos( $routeName,'photostream') !== false  || strpos( $routeName,'galleries') !== false)
            if(st>578){
               $('div#pagenav').addClass('result_hover').removeClass('hide');
            }else{
               $('div#pagenav').removeClass('result_hover').addClass('hide'); 
            }
            @else
            if(st>300){
               $('div#pagenav').addClass('result_hover').removeClass('hide');
            }else{
               $('div#pagenav').removeClass('result_hover').addClass('hide'); 
            }
            @endif         
        }
    }
    
    lastScrollTop = st; 
}


 // extension:
$.fn.scrollEnd = function(callback, timeout) {          
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};

// how to call it (with a 1000ms timeout):
$(window).scrollEnd(function(){
  var st = $(this).scrollTop(); 
               
          if(st>300){

               $('div#pagenav').addClass('result_hover').removeClass('hide');
            }else{
               $('div#pagenav').removeClass('result_hover').addClass('hide'); 
            }
    
            
}, 1000);


// Js for header search //
jQuery(document).ready(function($) {
 

  // Js for mobile menu //
$(".mobile-menu").click(function() { 
        $(".desktop-header").toggleClass("open");
    });
    $(".mobile-close").click(function() { 
        $(".desktop-header").toggleClass("open");
    });
});

$('.close-side-menu').on('click',function(){
    $(".desktop-header").removeClass("open");
});

$('body').on('click','.login-right-close',function(){
    $(".desktop-header").addClass("open");
})

////////////////////////////////////////////

$(document).ready(function (){
    
    $("#notify-friends").click(function(){
      //alert($('#notify_section_friend').css('display'))
     if($('#notify_section_friend').css('display')=="none")
        getFriendNotification();
     else
        closeFnotification();
    });

    $("#notify-keyword").click(function(){

      $('#notify_section_friend').slideUp(700, "easeOutBounce");
      getVisitorNotification();
     if($('#notify_section').css('display')=="none")
        getVisitorNotification();
     else
        closenotification();
    });

    $(".user-name").click(function(){
    	//alert("I am here ready to call load count notification");
    	loadLiceseNotification();
      $('#notify_section_friend').slideUp(700, "easeOutBounce");
    });


});

	function loadLiceseNotification(){

		    $.ajax({
        		type: 'GET',
        		url: '/user/license-notification-counter',
        		dataType: 'json',
        		success: function(data){
        			if(data.approved > 0){
        				$(".green-badge").removeClass("hide");
						$(".green-badge").html(data.approved);
        			}
        			if(data.disapproved > 0){
        				$(".red-badge").removeClass("hide");
						$(".red-badge").html(data.disapproved);
        			}
        			
        		},
        	});

		//$(".red-badge").removeClass("hide");
		//$(".red-badge").html("2");
		
	}


  function closeFnotification(){
     $("#notify_section_friend").slideUp('slow')
  }

  function getFriendNotification(){ 
    $('#notiCounter').text('');
      var userId = {{$userId}};
      $.ajax({
        type: 'GET',
        url: '/getfriendnotification/'+userId+'/'+pageno,
        cache: false, 
        success: function (data) {
           var objData = data.friendRequests;
            var request = ' <strong>Friends Request</strong><div class="friends-request-icon"></div>';
            for (var i in objData){
                var id = objData[i].id; 
                if(objData[i].name!=null){
                  if(objData[i].status=="waiting")
                    request += '<li id="friendRequests'+id+'" style="cursor:pointer" class="dropdown_msg "><div class="n-user-pic"><a href="' + objData[i].profile_url + '"><img alt="" src="'+objData[i].profile_image+'" class="n-user-pic"></a></div><div class="n-user-info"><div class="usernm"><a href="' + objData[i].profile_url  + '">' + objData[i].name +'</a></br><a class="btn-accept" onclick="confrimRequest('+objData[i].cid+','+objData[i].id+')" id="confrimRequest-'+objData[i].cid+'-'+objData[i].id+'" data-bb-handler="confirm">Accept</a>&nbsp;<a class="btn-accept" id="deleteRequest-'+objData[i].id+'" onclick="deleteRequest('+objData[i].id+')" data-bb-handler="cancel">Delete</a></div><div class="right-info"></div></li>'; 
                    
                  else    
                    request += '<li id="friendRequests'+id+'"><div class="n-user-pic"><a href="' + objData[i].profile_url + '"><img alt="" src="'+objData[i].profile_image+'"></a></div><div class="n-user-info"><div class="usernm"><a href="' + objData[i].profile_url  + '">' + objData[i].name + '</a> <small>accepted your friend request.</small><small class="n-time">'+objData[i].requestDate+'</small></div></li>'; 
              }
            }
            $('#requestCounter').text(data.requestCounter);
             $('#ex41').html(request);
           $("#notify_section_friend").show().mCustomScrollbar();     
        },         
      }); 
  }

  function getVisitorNotification(){ 
    $('#notiCounter').text('');
      var userId = {{$userId}};
      $.ajax({
        type: 'GET',
        url: '/getvisitornotification/'+userId+'/'+pageno,
        cache: false, 
        success: function (data) {

          if(parseInt(pageno)==0){    
                $('#ex4').html(data.htmls);
          }else{
                $('#ex4').append(data.htmls);
          }
          
           $("#notify_section").mCustomScrollbar();     
           
        },
         
      }); 
      //updateNotification();
  }

  function closenotification(){
     $("#notify_section").slideUp('slow')
  }

$(document).ready(function(){
  $("#search-keyword").on('focus', function(){
    $('#notify_section_friend').slideUp(700, "easeOutBounce");
    $(".search-logo").css('opacity','1')
      $(".header-search").addClass('is-focused');
  });
  $("#search-keyword").on('blur', function(){
      if($(this).val()==""){
        $(".search-logo").css('opacity','.7');
        $(".header-search").removeClass('is-focused');
      }
       
  });
$("#search-keyword").on('focusout', function(){
   $(function() {
      $("body").click(function(e) {
          if ((e.target.id == "search-result" || $(e.target).parents("#search-result").size()) || (e.target.id == "search-keyword" || $(e.target).parents("#search-keyword").size())) { 
              //alert("Inside div");
          } else { 
            //    console.log('hehehehe');
                $(".search-logo").css('opacity','.7');
                $(".header-search").removeClass('is-focused');
                $("#search-keyword").val("");
                $('#search-result').hide();
          }
      });
  })
}); 

  $(".header-logo").hover(function () {
      $(".header-bottom").addClass("result_hover");
  });

  $(document).on('mouseleave',".site-header", function(){
    //alert("Hello");
      $(".header-bottom").removeClass("result_hover");
  });
 

$("#search-keyword").autocomplete({         
    source: function (request, response) {           
    loadsearch(request, response);
      
    },         
});

$("#search-keyword").keyup(function(){  
  if($(this).val()=="")
    $('#search-result').hide();
    $('#search_result_inner').html('');
  pageno = 1;
  
});
function loadsearch(request, response){
  $.ajax({
        type: 'GET',
        url: '{{URL::to("search-keyword")}}/'+request.term+'/'+'user/'+pageno,
        dataType: "json",
        cache: false,
        data: { term: request.term },
        success: function (data) {                        
          if (data.success) {       
          //$('#search_result_inner').html(data);
            if($('#search_result_inner').html()==""){
              $('#search_result_inner').html(data.result).show();
            }else{
              $('#search_result_inner ul').append(data.result).show();
            }
            $('#search-result').show();
            $('.dropdown').removeClass('open');
      
          }else{                   
            $('#search_result_inner').append('No result found!').show();
            $('#search-result').show(); 
            $('.dropdown').removeClass('open');
          }     
          $("#search-result").mCustomScrollbar({
                mouseWheelPixels: 50,
                scrollInertia: 0,
                scrollButtons:{
                enable:true
              },
              callbacks:{
                onTotalScroll:function(){
                  pageno = parseInt(pageno)+1;
                  loadsearch(request, response)
                }
              }
          });
        },
      });              
}


$(document).on('click','.fullscreen-close-button', function(){
    window.history.pushState(null, null, pageTopUrl);

    if (screenfull.enabled) {
      screenfull.exit(); 
    }


  });

});
 
  $(document).ready(function(){  

    // PP page work Start in implementation 

      $(document).on('click', '.megashot-full-page-popup', function(event){
        event.preventDefault(); //STOP default action   

        var url = $(this).attr('href'); 
        var rel = $(this).attr('data-rel');
        //alert(rel);
        if(rel==undefined){
          $('#fullscreens_iframe').remove();
          $('#fullscreens_modal').append('<object style="width: 100%;height:100%;"  data=""  id="fullscreens_iframe"></object>');
          $('#fullscreens_iframe').attr('data',url);
          pageTopUrl  = window.location.href;
          setTimeout( function() { 
            window.history.pushState(null, null, url); 
          }, 3000);
          $('#fullscreens_modal').modal('show') ;

        } else {
          rel = rel.split("-");
          var src = rel[1].split("/");
          var imageName = src[src.length -1];
          var path = "{{ URL::to($image_path) }}/thumb/1920/"+imageName;
          /*var path = rel[1].replace("posts", "1920");
          path = rel[1].replace("500", "1920");*/
          //alert("Hello I am here"+rel[1]+"    path  :  "+path);
          $('.m-img').css({'height': $(window).innerHeight() + 18 + 'px'});
          $("#pp-image-id").apImageZoom('destroy');
          $('#fullscreens_pp_modal').modal('show');
          $("#pp_content").show();
          
          //alert("I am here");
          

          // Next Pre new Work Start
          console.log("image-id"+ rel[0]);
          
          var pp_url = "";
          if(rel.length>2){
            

            var for_new = rel[2];
            var for_id  = rel[3];
            switch(for_new){
              case "popular":
              pp_url = "{{URL::to("")}}/popular/photos/"+rel[0]+"/"+for_id;
              console.log("{{URL::to("")}}/popular/photos/"+rel[0]+"/"+for_id);
              break;

              case "gallery":
              console.log(rel);
              pp_url = "{{URL::to("")}}/gallery/photos/"+rel[0]+"/"+for_id;
              console.log("for_new"+for_id)
              console.log("new URL"+"{{URL::to("")}}/gallery/photos/"+rel[0]+"/"+for_id);
              break;

              default:
              pp_url = "{{URL::to("")}}/photos/"+rel[0];
            }


            
          }


          $("#pp-image-id").attr('src',path);
          
          console.log();
          
          // Next Pre new Work End

          if(pp_url == "") {
            $('#fullscreens_pp_iframe').attr('data',url);
          } else {
            $('#fullscreens_pp_iframe').attr('data',pp_url);
          }
          pageTopUrl  = window.location.href;

          setTimeout( function() { 
            $("#pp-image-id").apImageZoom({
            cssWrapperClass: 'custom-wrapper-class'
                    , autoCenter: true
                    , loadingAnimation: 'throbber'
                    , minZoom: 'contain'
                    , maxZoom: false
                    , maxZoom: 1.0
                    , doubleClick: 'zoomToggle'
          });
            
          }, 200);


          setTimeout( function() { 
            window.history.pushState(null, null, url);
            $("#pp_content").hide();
            $("#fullscreens_pp_iframe").show(); 
          }, 3000);

          
        }
        event.preventDefault(); //STOP default action   
        return false;
    });

    // PP page work end in implementation 


    $(document).on('click', '.am-remote-popup-upload', function(event){
       
      event.preventDefault(); //STOP default action
      var returnData = {{$isLogin}};
      
      if (returnData){
         
        $('#fullscreens_iframe').remove();
        $('#fullscreens_modal').append('<object style="width: 100%;height:100%;"  data=""  id="fullscreens_iframe"></object>');
         
        var url = $(this).attr('href');   
        $('#fullscreens_iframe').attr('data',url);   
        $('#fullscreens_modal').modal('show') ;
 

         
        return false;
      } else {
        //alert("I am here" + returnData);
        event.preventDefault(); //STOP default action  
        CheckLogin();
      }
      event.preventDefault(); //STOP default action  
      return false;
    });

  });
  

  function hideFullscreenCloseButton(){
    $(".fullscreen-close-button").hide();
  }
  function showFullscreenCloseButton(){
    $(".fullscreen-close-button").show();
  }
  function closepop(data){
      //$("#photoupload").hide();
      //$("#statusdiv").show();
      $('#post-list').prepend(data.html);
      //console.log(data.html);
      //$('.force-fullscreen .close').click();
    }
  
</script>
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

<?php if(Route::currentRouteName()=="user.profile" ||   Route::currentRouteName() =="landing.home"){ ?>
<?php } else {?>
</main>
<?php } ?>
 
</body>
</html>
