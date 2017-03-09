<?php $routeName= Route::currentRouteName();
$videoPagesArr = array('user.profile-favorite-videos','user.favorite-videos','user.favorite-videos-list','user.videoview','user.favorite-videoview');
$cls ='in';
if(in_array($routeName,$videoPagesArr))
    $cls = 'out';
?> 
<header class="site-header fade <?php echo $cls;?>">
    <div class="header-top desktop-header">
        <div class="main-menu-header">
            <div class="row">
                <ul class="header-top-left">
                    <li><a href="{{URL::to('help')}}"><i class="fa-question fa"></i></a></li>
                    <li><a href="#"><i class="fa fa-share-square-o"></i></a><span class="photos-bottom-inner"> <a class="social"><i class="fa-facebook fa"></i></a> <a class="social"><i class="fa-twitter fa"></i></a> <a class="social"><i class="fa-google-plus fa"></i></a> </span></li>
                </ul>
                @include("layout-01.header-search") <!-- Search Navigation Work  -->
                <div class="header-right"> <!-- right Side Navigation includeing Messages, Friend requests, Visitor Notification and Navigation Droupdown  -->
                    @include("layout-01.header-navigation")
                </div>
                <a class="mobile-close"><i class="fa-close fa"></i></a>
                <ul class="social-header">
                    <li>
                        <a class="fa fa-facebook"></a>
                    </li>
                    <li>
                        <a class="fa fa-google-plus"></a>
                    </li>
                    <li>
                        <a class="fa fa-twitter"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-header clearfix">
        <div class="container">
            <ul class="header-top-left">
                <li><a href="{{URL::to('help')}}"><i class="fa-question fa"></i></a></li>
            </ul>
            <div class="header-mid col-md-6 col-sm-8 col-xs-8">
                <div class="search-open-icon">
                    <i class="fa fa-search"></i>
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
            <!-- <div class="header-logo"><a href="#"></a></div> -->
            <div class="mobile-menu">
                <div class="mobile-menu-dot" id="message-dot"></div>
                <div class="mobile-menu-dot"></div>
                <div class="mobile-menu-dot"></div>
            </div>
        </div>
    </div>
    <?php $routeName = Route::currentRouteName() ?>
    <div class="header-bottom" id="mainnav">
        <ul>
            <li><a href="{{URL::to('home')}}">Home</a></li>
            <li><a href="{{URL::to('photos')}}">Photos</a></li>
            <li><a href="{{URL::to('groups')}}" class="{{(strpos( $routeName,'group') !== false)?'active':''}}">Groups</a></li>
        </ul>
    </div>

    @if(strpos( $routeName,'group') !== false && strpos(Route::currentRouteName(), 'mygroups') === false && strpos(Route::currentRouteName(), 'recent') === false && strpos(Route::currentRouteName(), 'popular') === false)
    <div id="pagenav" class="header-bottom group-nav hide">
        <ul>
            <li><a {{ (Route::currentRouteName()== 'groups.view')?' class="active"':''}} href="{{ URL::route('groups.view', array( Str::slug($communityName,'-')))}}">Main</a></li>
            <li><a {{ (Route::currentRouteName()== 'groups.gallery' || Route::currentRouteName()== 'groups.featured-gallery' )?' class="active"':''}} href="{{ URL::route('groups.gallery',Str::slug($communityName,'-'))}}">Gallery</a></li>
            <li><a {{ (Route::currentRouteName()== 'groups.members')?' class="active"':''}} href="{{ URL::route('groups.members', array( Str::slug($communityName,'-')))}}">Members</a></li>
            <li><a href="{{ URL::Route('groups.playlists', array(Str::slug($communityName,'-')) ) }}">Videos</a></li>
            <li><a {{ (Route::currentRouteName()== 'groups.discussions')?' class="active"':''}} href="{{ URL::Route('groups.discussions', array(Str::slug($communityName,'-')) ) }}">Discussions</a></li> 
        </ul>
    </div>
    @elseif(strpos( $routeName,'timeline') !== false || strpos( $routeName,'photostream') !== false  || strpos( $routeName,'galleries') !== false)
    <div id="pagenav" class="header-bottom timeline-nav hide">
        <ul>
            <li><a <?php if (Route::currentRouteName() == "user.timelinename") echo ' class="active"'; ?> href="{{URL::route('user.timelinename',  str_replace(' ','-',  strtolower($user['name'])))}}">Timeline </a></li>
            <li><a <?php if (Route::currentRouteName() == "user.photostreamname") echo ' class="active"'; ?> href="{{URL::route('user.photostreamname',  str_replace(' ','-',  strtolower($user['name'])))}}">Photostream </a></li>
            <li><a <?php if (Route::currentRouteName() == "user.galleryname") echo ' class="active"'; ?> href="{{URL::route('user.galleryname',  str_replace(' ','-',  strtolower($user['name'])))}}">Galleries </a></li> 
        </ul>
    </div>
    @endif 

</header>



