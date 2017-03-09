<section class="photoSec" id="photo-sec">
  <div class="overlay-four solidBg"></div>
  <div class="heading-sec animated fadeInDown">
    <h2 style="font-family:{{$titleFont}}" class="title-font-h2"> PHOTOS</h2>
  </div>
  <div class="photoBar">
    <div class="photoBarCover"> <span></span>
      <div class="border-cover"></div>
    </div>
    <div class="members-wrapper loved-h-inner mmostlove">
      <h2><span id="changeval"><i class="liked-title"></i>Recent Uploads</span><i class="fa fa-caret-down"></i></h2>
      <section id="options-sort" class="member-photos">
        <ul class="option-set">
          <li><a class="recent" href="javascript:void(0)" onclick="changeName('Recent Uploads', 'recent-title')">Recent Uploads</a></li>
          <li><a class="most-liked" href="{{URL::Route('photo.getmostliked',$user['id'])}}/today" onclick="changeName('Most Liked', 'liked-title')">Most Liked</a></li>
          <li><a class="oldest" href="{{URL::Route('photo.getmostloved',$user['id'])}}"  onclick="changeName('Most Loved', 'heart-title')">Most Loved</a></li>
          <li><a class="random" href="javascript:void(0)" onclick="changeName('Most Awarded', 'awarded-title')">Awarded Photos</a></li>
          <li><a class="best" href="{{URL::Route('photo.getmyloved',$user['id'])}}" onclick="changeName('My Favourites', 'fav-title')">My Favourites</a></li>
          <li><a class="photos" href="{{URL::Route('photo.getmostviewed',$user['id'])}}/today" onclick="changeName('Most Viewed', 'viewed-title')">Most Viewed</a></li>
          <li><a class="collection" href="javascript:void(0)" onclick="changeName('Collections', 'viewed-title')">Collections</a></li>
        </ul>
      </section>
    </div>
  </div>
  <div class="clear"></div>
  <div class="filter-out" id="photo-back" style="background:#{{$photo_back}}">
    <div class="tab-content">

      <div role="tabpanel" class="tab-pane fade in active" id="recent">
        <ul class="recent-pics">
          <h2> Recent Uploads by {{$user['display_name']}}</h2>
          <div id="recent-container"></div>
        </ul>
      </div>

      <div role="tabpanel" class="tab-pane fade" id="most-liked">
        <ul class="recent-pics">
          <h2> Most Liked </h2>

          <nav class="filterTabs"> 
            <a href="{{URL::Route('photo.getmostliked',$user['id'])}}/today" class="swep-ef1" data-container="liked-container">
              <div><span class="txt">Today</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::Route('photo.getmostliked',$user['id'])}}/yesterday" class="swep-ef1" data-container="liked-container">
              <div><span class="txt">Yesterday</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::Route('photo.getmostliked',$user['id'])}}/lastweek" class="swep-ef1" data-container="liked-container">
              <div><span class="txt">Last Week</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
              <a href="{{URL::Route('photo.getmostliked',$user['id'])}}/lastmonth" class="swep-ef1" data-container="liked-container">
              <div><span class="txt">Last Month</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::Route('photo.getmostliked',$user['id'])}}/lastyear" class="swep-ef1" data-container="liked-container">
              <div><span class="txt">Last Year</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
          </nav>
          <div id="liked-container"></div>
          
        </ul>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="oldest">
        <ul class="recent-pics">
          <h2> Most Loved </h2>
          <nav class="filterTabs"> 
            <a href="{{URL::Route('photo.getmostloved',$user['id'])}}/1" class="swep-ef1" data-container="loved-container">
              <div><span class="txt">Lighting</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::Route('photo.getmostloved',$user['id'])}}/2" class="swep-ef1" data-container="loved-container">
              <div><span class="txt">Composition</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a>
            <a href="{{URL::Route('photo.getmostloved',$user['id'])}}/3" class="swep-ef1" data-container="loved-container">
              <div><span class="txt">Technical Strength</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a>
            <a href="{{URL::Route('photo.getmostloved',$user['id'])}}/4" class="swep-ef1" data-container="loved-container">
              <div><span class="txt">Colors and Tones</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::Route('photo.getmostloved',$user['id'])}}/5" class="swep-ef1" data-container="loved-container">
              <div><span class="txt">Interestingness</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
          </nav>
          <div id="loved-container"></div> 
        </ul>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="random">
        <ul class="recent-pics">
          <h2> Awarded Photos</h2>
          <h3>Comming Soon</h3>
        </ul>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="collection">
        <ul class="recent-pics">
          <h2> Collection</h2>
          <h3>Comming Soon</h3>
           
        </ul>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="best">
        <ul class="recent-pics">
          <h2> My Favourites </h2>
          <nav class="filterTabs">
            <a href="{{URL::Route('photo.getmyloved',$user['id'])}}/1" class="swep-ef1" data-container="fav-container">
              <div><span class="txt">Lighting</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::Route('photo.getmyloved',$user['id'])}}/2" class="swep-ef1" data-container="fav-container">
              <div><span class="txt">Composition</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a>
            <a href="{{URL::Route('photo.getmyloved',$user['id'])}}/3" class="swep-ef1" data-container="fav-container">
              <div><span class="txt">Technical Strength</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a>
            <a href="{{URL::Route('photo.getmyloved',$user['id'])}}/4" class="swep-ef1" data-container="fav-container">
              <div><span class="txt">Colors and Tones</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::Route('photo.getmyloved',$user['id'])}}/5" class="swep-ef1" data-container="fav-container">
              <div><span class="txt">Interestingness</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a>
          </nav>
          <div id="fav-container"></div>
          
        </ul>
      </div>
     
      <div role="tabpanel" class="tab-pane fade" id="photos">
        <ul class="recent-pics">
          <h2> Most Viewed </h2>
          <nav class="filterTabs">
            <a href="{{URL::to('photos/getmostviewed/'.$user['id'].'/today')}}" class="swep-ef1" data-container="viewed-container">
              <div><span class="txt">Today</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::to('photos/getmostviewed/'.$user['id'].'/yesterday')}}" class="swep-ef1" data-container="viewed-container">
              <div><span class="txt">Yesterday</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::to('photos/getmostviewed/'.$user['id'].'/lastweek')}}" class="swep-ef1" data-container="viewed-container">
              <div><span class="txt">Last Week</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
              <a href="{{URL::to('photos/getmostviewed/'.$user['id'].'/lastmonth')}}" class="swep-ef1" data-container="viewed-container">
              <div><span class="txt">Last Month</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a> 
            <a href="{{URL::to('photos/getmostviewed/'.$user['id'].'/lastyear')}}" class="swep-ef1" data-container="viewed-container">
              <div><span class="txt">Last Year</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
            </a>
          </nav>
          <div id="viewed-container"></div>
        </ul>
      </div>
      
    </div>
  </div>
  <div class="megaArrow"><span class="bounce"></span></div>
</section>



<script>
  function changeName(val, class1) {
      $('#changeval').html('<i class="'+class1+'"><\/i>'+val);  

  }

  function getImages(url, container){
    $.get(url, function(data) {  
          $("#"+container).html("Loading...");
          setGallery(data, container);

    });
  }


  function likeImage(imgId,liveVal){
      var returnData = {{$isLogin}};  

      if(returnData){
        if(liveVal ==1){
          var likeVal =0;
          var titleVal ="Like";
         
        }else{
          var likeVal =1;
          var titleVal ="Unlike";
         
        } 
         
      $.ajax({
            type: "GET",
            url: '{{ URL::to("photos/likeimage/")}}/'+imgId+'/'+likeVal+'/0',
            dataType:"json",           
            success : function(data){
               $('#likeCount'+imgId).text(data.likeCount);

               $('#likeCount'+imgId).closest('a').attr('onclick','likeImage('+imgId+','+likeVal+')');

                $('#likeCount'+imgId).attr('title', titleVal);
                
            }
      });
    }else{
       CheckLogin();
    }
  }


  function submitRating(imgId){
        var returnData = {{$isLogin}}; 
      if(returnData){
        if(jQuery('#ratingUl'+imgId+' li.active').size()<1){
            alert('Please select at least one rating');
        }else{
            ratings = {};
            jQuery('#ratingUl'+imgId+' li.active').each(function(index, el) {
                ratings['rating_'+jQuery(this).data('key')] = jQuery(this).data('slug');
            }); 
            ratings.image_id = imgId;            
            jQuery.ajax({ 
                type: "POST", 
                url : "{{ URL::to('photos/lovePostRating') }}", 
                data : ratings, 
                beforeSend:function(){
                    jQuery('#love-rating-button'+imgId).text('Saving...');
                },
                success : function(data){                   
                    jQuery('#love-rating-button'+imgId).text('Submit');
                    $('#loveCount'+imgId).text(data.loveCount);
                    if(data.error==0){
                        if(typeof  ratings['rating_1'] === 'undefined' && typeof ratings['rating_2'] === 'undefined' && typeof ratings['rating_3'] === 'undefined' && typeof ratings['rating_4'] === 'undefined' && typeof ratings['rating_5'] === 'undefined'){
                            $('#do-rating'+imgId).parent('span').removeClass('love-active');
                            }else{
                                 $('#do-rating'+imgId).parent('span').addClass('love-active');
                            }

                        $('#loveRatingSec'+imgId).stop().slideToggle( 700,"easeOutBounce");
                    }
                }
            },"json");

        }
      }else{
         CheckLogin();
      }

    }


  function setGallery(dataVal, container) {
    
    $('#'+container).html(dataVal); 
    if(dataVal.length){
      $("#"+container).justifiedGallery({
        rowHeight : 260, 
        fixedHeight: false,
        margins : 10,     
        thumbnailPath: function (currentPath, width, height) {
          if (Math.max(width, height) < 420) {
           // return currentPath.replace("-x450", '-x300');
          } else {  
            return currentPath.replace('-x300', "-x450");
          }
          if(width<306){
           return currentPath.replace('-x300', "-x450"); 
          }
        } 
      });  //end setup justified gallery
    } else  { // else if check length
      $("#"+container).html("No Images Found");
    }
  } //  end setGallery

</script> 

<script>

  $(document).on("click", ".swep-ef1", function(event){
    event.preventDefault(); //STOP default action 
    
    var url = $(this).attr('href');
    var container = $(this).attr('data-container');
    //alert(url);
    //alert(container);

    getImages(url,container);
    event.preventDefault(); //STOP default action 
  });

  $(".recent").click(function (event) {
    event.preventDefault(); //STOP default action 
    $("#recent").show("slow");
    $("#most-liked").hide("slow");
    $("#oldest").hide("slow");
    $("#random").hide("slow");
    $("#friends").hide("slow");
    $("#best").hide("slow");
    $("#photos").hide("slow");
    $("#collection").hide("slow");

    event.preventDefault(); //STOP default action 
    var url = $(this).attr('href');
    //alert(url);

    getImages(url,"recent-container");
    
  });

  $(".most-liked").click(function (event) {
    event.preventDefault(); //STOP default action 
    $("#recent").hide("slow");
    $("#most-liked").show("slow");
    $("#oldest").hide("slow");
    $("#random").hide("slow");
    $("#friends").hide("slow");
    $("#best").hide("slow");
    $("#photos").hide("slow");
    $("#collection").hide("slow");

    event.preventDefault(); //STOP default action 
    var url = $(this).attr('href');
    //alert(url);

    getImages(url,"liked-container");
    
  });

  

  $(".oldest").click(function (event) {
    event.preventDefault(); //STOP default action 
    $("#recent").hide("slow");
    $("#most-liked").hide("slow");
    $("#oldest").show("slow");
    $("#random").hide("slow");
    $("#friends").hide("slow");
    $("#best").hide("slow");
    $("#photos").hide("slow");
    $("#collection").hide("slow");

    
    event.preventDefault(); //STOP default action 
    var url = $(this).attr('href');
    //alert(url);

    getImages(url, "loved-container");

  });

  $(".random").click(function (event) {
    event.preventDefault(); //STOP default action 
    $("#recent").hide("slow");
    $("#most-liked").hide("slow");
    $("#oldest").hide("slow");
    $("#random").show("slow");
    $("#friends").hide("slow");
    $("#best").hide("slow");
    $("#photos").hide("slow");
    $("#collection").hide("slow");

    event.preventDefault(); //STOP default action 
    var url = $(this).attr('href');
    //alert(url);

    getImages(url);
  });

  $(".friends").click(function (event) {
    event.preventDefault(); //STOP default action 
    $("#recent").hide("slow");
    $("#most-liked").hide("slow");
    $("#oldest").hide("slow");
    $("#random").hide("slow");
    $("#friends").show("slow");
    $("#best").hide("slow");
    $("#photos").hide("slow");
    $("#collection").hide("slow");

    event.preventDefault(); //STOP default action 
    var url = $(this).attr('href');
    //alert(url);
    getImages(url);
  });
        
  $(".best").click(function (event) {
    event.preventDefault(); //STOP default action 
    $("#recent").hide("slow");
    $("#most-liked").hide("slow");
    $("#oldest").hide("slow");
    $("#random").hide("slow");
    $("#friends").hide("slow");
    $("#best").show("slow");
    $("#photos").hide("slow");
    $("#collection").hide("slow");

    event.preventDefault(); //STOP default action 
    var url = $(this).attr('href');
    //alert(url);
    getImages(url,"fav-container");

  });

  $(".photos").click(function (event) {
    event.preventDefault(); //STOP default action 
    $("#recent").hide("slow");
    $("#most-liked").hide("slow");
    $("#oldest").hide("slow");
    $("#random").hide("slow");
    $("#friends").hide("slow");
    $("#best").hide("slow");
    $("#photos").show("slow");
    $("#collection").hide("slow");

    event.preventDefault(); //STOP default action 
    var url = $(this).attr('href');
    //alert(url);
    getImages(url,"viewed-container");


  });


  $(".collection").click(function (event) {
    event.preventDefault(); //STOP default action 
    $("#recent").hide("slow");
    $("#most-liked").hide("slow");
    $("#oldest").hide("slow");
    $("#random").hide("slow");
    $("#friends").hide("slow");
    $("#best").hide("slow");
    $("#photos").hide("slow");
    $("#collection").show("slow");


    event.preventDefault(); //STOP default action 
    var url = $(this).attr('href');
    //alert(url);

    getImages(url,"liked-container");
    
  });


  $(document).ready(function(){
    //alert("document is ready now");
    getImages("{{URL::Route('photo.getrecent',$user['id'])}}", "recent-container")


    $( document ).on( 'click',".love-rating-list > li",function() {
      $(this).toggleClass("active");
    });


  });

</script>