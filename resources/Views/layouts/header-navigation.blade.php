<nav class="navbar navbar-default">
  @if (Auth::check())
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-user">
          <li class="dropdown user-name"> 
            <a href="{{URL::route('user.timelinename', str_replace(' ','-',  strtolower($userName)))}}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              @if(!empty($loggedInProfileImage) &&  $loggedInProfileImage !="user_profile.jpg")
                <img src="{{ URL::to($profile_image.$loggedInProfileImage)}}" alt="user" width="40" height="40">
              @else
                <img src="{{URL::to('assets-01')}}/images/usr-profpic.png" alt="user" width="40" height="40">
              @endif
              <span>
                  {{Helper::getFistName($userName)}} <i class="fa fa-caret-down hide-mobile"></i>
                  <div class="show-mobile desktop-mobile-menu">
                      <div class="menu-dot2"></div>
                      <div class="menu-dot2"></div>
                      <div class="menu-dot2"></div>
                  </div>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="{{URL::route('user.timelinename', str_replace(' ','-',  strtolower($userName)))}}"><i class="fa fa-th-list"></i>Timeline</a></li>          
              <li><a href="{{URL::route('user.photostreamname',  str_replace(' ','-',  strtolower($userName)))}}"><i class="fa fa-picture-o"></i>Photostream</a></li>
              <li><a href="{{URL::route('user.galleryname',  str_replace(' ','-',  strtolower($userName)))}}"><i class="fa fa-file-image-o"></i>Galleries</a></li>
              <li><a href="{{URL::to('')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
              <li>&nbsp;</li> 
              <li><a href="{{URL::route('user.profile',  str_replace(' ','-',  strtolower($userName)))}}"><i class="fa fa-user"></i>Profile</a></li>
              <li><a href="{{URL::route('user.defaultprotfolio-home',  str_replace(' ','-',  strtolower($userName)))}}"><i class="fa fa-briefcase"></i>Portfolio</a></li>
              <li><a href="{{URL::route('gallery.manage')}}" class="megashot-full-page-popup"><i class="fa fa-refresh"></i>Organize</a></li>
              <li><a href="{{URL::route('user.favorite-videos', str_replace(" ","-",strtolower($userName)))}}"><i class="fa fa-file-video-o"></i>Videos</a></li>
              <li><a href="{{URL::to('critique')}}"><i class="fa fa-refresh"></i>Critique</a></li>
              
              <li>&nbsp;</li>
              <li><a href="{{URL::route('user.licenceNotificationList', str_replace(' ','-',  strtolower($userName)))}}" class="megashot-full-page-popup"><i class="fa fa-bell"></i>License Request<span class=" red-badge licence-badge hide"></span><span class="green-badge licence-badge hide"></span></a></li>          
              <li><a href="{{URL::route('collections.categories')}}" class="megashot-full-page-popup"><i class="fa fa-database" aria-hidden="true"></i>Collections</a></li> 
              <li><a href="{{URL::route('groups.mygroups')}}"> <i class="fa fa-users" aria-hidden="true"></i>Groups</a></li> 
              <li><a href="{{URL::to('/help')}}"><i class="fa-question fa" aria-hidden="true"></i>Help</a></li>
               <li>&nbsp;</li>
              <li><a href="{{URL::route('user.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" id='notify-keyword' href="javascript:void(0);">
              <i class="fa fa-bell" aria-hidden="true"></i>&nbsp;<small id="notiCounter"></small>
            </a>
            <ul class="dropdown-menu dropdown-noti" id="ex4">
              <strong>Notifications</strong>
               <div class="fa fa-volume-up notify-volume green"></div>
              
              
            </ul>
          </li>
          
          <li class="dropdown">
            <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" id='notify-friends' href="javascript:void(0);" >
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              <small id="requestCounter" ></small>
            </a>
            <ul class="search-results" style="display:none" role="menu" id="notify_section_friend" >
              <div id="request-list">
                  <div class="left100"  style="overflow:hidden;">
                      <ul id="ex41" style="overflow:hidden;" class="message-noti"> 
                        <strong>Friends Request</strong>
                        <div class="friends-request-icon"></div>
                        Loading
                      </ul>
                  </div>
              </div>
            </ul>
            </li>
          
          <li class="dropdown msg">
            <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" href="#" onclick="get_dropdown_message_list();">
              <i class="fa fa-comments" aria-hidden="true"></i><small id="new_msg_count"></small>
            </a>
            <ul class="dropdown-menu message-noti" id="msg_dropdown_list">
              
            </ul>
          </li>
        </ul>
      </div>
  @else
    <ul class="nav navbar-nav navbar-right landing-nav">
      <li><a href="{{URL::to('user/login')}}" class="megashot-full-page-popup close-side-menu">Login</a></li>
      <li><a href="{{URL::to('user/register')}}" class="megashot-full-page-popup close-side-menu">Sign Up</a></li>
    </ul>
  @endif
</nav>


