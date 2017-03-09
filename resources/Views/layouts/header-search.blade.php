<div class="header-mid">
    <div class="header-search"> <span class="search-logo"></span>
      <div class="search-box">
        <!-- <input type="text" id="header-search">
        <button type="submit" class="search-icon"><i class="fa fa-search"></i></button> -->
        <input id='search-keyword' type="text" />
          <button type="submit" class="search-icon"><i class="fa fa-search"></i></button>
          <div id="search-result" class="search-results" style="display:none">
              <div class="close-search-result"><i class="fa fa-times" aria-hidden="true"></i></div>
              <div id="search_result_inner"></div>
                  
          </div>
      </div>
    </div>
    <?php      
    if(strpos( Route::currentRouteName(),'contest') !==false || strpos( Route::currentRouteName(),'help') !==false || strpos( Route::currentRouteName(),'critique') !==false || strpos( Route::currentRouteName(),'home') !==false || strpos( Route::currentRouteName(),'photo.') !==false || strpos( Route::currentRouteName(),'searchbycolor') !==false || strpos(Route::currentRouteName(), 'mygroups') !== false || strpos(Route::currentRouteName(), 'recent') !== false || strpos(Route::currentRouteName(), 'popular') !== false){
      $clsH ='header-logo-hover';
    }else{
      $clsH ='' ;
    }?>
    
    <div class="header-logo {{$clsH}}"> 
      <a href="/">  

        @if(empty($clsH))             
          @if(strpos( Route::currentRouteName(),'group') !== false)                 
            <span  id="b1">{{$communityName}}</span>
          @else
            <span id="b1">{{$user['name']}}</span>
          @endif              
      @endif
  </a> 
    
  </div>
</div>
 