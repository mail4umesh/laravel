
  <div class="blankBar"></div>
  <div class="networkdetails">
    <div class="overlay-four solidBg"></div>
    <div class="container">


      <h2 class="animated fadeInRightMid">FRIENDS</h2>
      <div class="animated2 fadeInLeftMid">
      <div class="network-activity">
        <div class="row">
          <div class="col-md-6">
            <div class="member-propic">
              <span>
                @if($ouser['profile_image']!='')
                <a href="{{URL::route('user.timelinename', str_replace(' ','-',  strtolower($ouser['name'])))}}">
                    <img src="{{URL::asset($profile_image200.$ouser['profile_image'])}}"  />
                    <!--<img src="{{URL::asset($profile_image.'user_profile.jpg')}}"  />-->
                </a>
                @endif
              </span>
            </div>
            <div class="member-followSec">
              @if(count($friends) > 0)
              <h3>{{Helper::getFistName($ouser['name'])}}'s Friend </h3>
              <ul>
                @foreach($friends as $key=>$value)
                  <?php 
                    $showAddFriend =true;
                    if( $ouser['id'] == $value['self']['id'] || $ouser['id'] ==$userId || $userId == $value['self']['id'] )
                        $showAddFriend =false;
                  ?>
                  <li>
                    <a href="{{URL::route('user.timelinename', str_replace(' ','-',  strtolower($value['self']['name'])))}}">
                      @if($value['self']['profile_image']!='')
                        <img src="{{URL::asset($profile_image.$value['self']['profile_image'])}}"  />                                            
                      @else
                        <img src="{{URL::asset($profile_image.'user_profile.jpg')}}" />
                      @endif
                    </a>
                  </li>
                @endforeach
              </ul>
              <!--<div class="followBtn"> <a href="#"class="swep-ef1">
                <div><span class="txt">Follow</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
                </a> 
              </div>-->
              @endif
            </div>
          </div>
          <div class="col-md-6 text-right">
            <div class="latestPhotos">
              <h3>Friends Latest Photos </h3>
              <ul>
                <?php $counter=1;?>
                @foreach($friendsLatestArr as $key=>$img)
                <?php if($counter>5) break;?>        
                  <li><a href="{{URL::route('photo.view')}}/{{$img['id']}}" class="photos" data-rel="{{$img['id']}}-{{URL::to($image_path.'thumb/1920/'.$img['path'])}}"  id="photo_{{$img['id']}}"><img src="{{URL::to($image_server_78.$img['path'])}}" alt="User"  ></a></li>
                <?php $counter++;?> 
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      </div>



      <h2 class="animated fadeInRightMid">Follower</h2>
      <div class="animated2 fadeInLeftMid">
      <div class="network-activity">
        <div class="row">
          <div class="col-md-6">
            <div class="member-propic">
              <span>
                @if($ouser['profile_image']!='')
                <a href="{{URL::route('user.timelinename', str_replace(' ','-',  strtolower($ouser['name'])))}}">
                    <img src="{{URL::asset($profile_image200.$ouser['profile_image'])}}"  />
                    <!--<img src="{{URL::asset($profile_image.'user_profile.jpg')}}"  />-->
                </a>
                @endif
              </span>
            </div>
            <div class="member-followSec">
              @if(count($followers) > 0)
              <h3>{{Helper::getFistName($ouser['name'])}}'s Follower </h3>
              <ul>
                @foreach($followers as $key=>$value)
                  <?php 
                    $showAddFriend =true;
                    if( $ouser['id'] == $value['self']['id'] || $ouser['id'] ==$userId || $userId == $value['self']['id'] )
                        $showAddFriend =false;
                  ?>
                  <li>
                    <a href="{{URL::route('user.timelinename', str_replace(' ','-',  strtolower($value['self']['name'])))}}">
                      @if($value['self']['profile_image']!='')
                        <img src="{{URL::asset($profile_image.$value['self']['profile_image'])}}"  />                                            
                      @else
                        <img src="{{URL::asset($profile_image.'user_profile.jpg')}}" />
                      @endif
                    </a>
                  </li>
                @endforeach
              </ul>
              <!--<div class="followBtn"> <a href="#"class="swep-ef1">
                <div><span class="txt">Follow</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
                </a> 
              </div>-->
              @endif
            </div>
          </div>
          <div class="col-md-6 text-right">
            <div class="latestPhotos">
              <h3>Follower Latest Photos </h3>
              <ul>
                <?php $counter=1;?>
                @foreach($followerLatestArr  as $key=>$img)
                <?php if($counter>5) break;?>        
                  <li><a href="{{URL::route('photo.view')}}/{{$img['id']}}" class="photos" data-rel="{{$img['id']}}-{{URL::to($image_path.'thumb/1920/'.$img['path'])}}"  id="photo_{{$img['id']}}"><img src="{{URL::to($image_server_78.$img['path'])}}" alt="User"  ></a></li>
                <?php $counter++;?> 
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      </div>

      <h2 class="animated fadeInRightMid">Following</h2>
      <div class="animated2 fadeInLeftMid">
      <div class="network-activity">
        <div class="row">
          <div class="col-md-6">
            <div class="member-propic">
              <span>
                @if($ouser['profile_image']!='')
                <a href="{{URL::route('user.timelinename', str_replace(' ','-',  strtolower($ouser['name'])))}}">
                    <img src="{{URL::asset($profile_image200.$ouser['profile_image'])}}"  />
                    <!--<img src="{{URL::asset($profile_image.'user_profile.jpg')}}"  />-->
                </a>
                @endif
              </span>
            </div>
            <div class="member-followSec">
              @if(count($following) > 0)
              <h3>{{Helper::getFistName($ouser['name'])}}'s Friend </h3>
              <ul>
                @foreach($following as $key=>$value)
                  <?php 
                    $showAddFriend =true;
                    if( $ouser['id'] == $value['self']['id'] || $ouser['id'] ==$userId || $userId == $value['self']['id'] )
                        $showAddFriend =false;
                  ?>
                  <li>
                    <a href="{{URL::route('user.timelinename', str_replace(' ','-',  strtolower($value['self']['name'])))}}">
                      @if($value['self']['profile_image']!='')
                        <img src="{{URL::asset($profile_image.$value['self']['profile_image'])}}"  />                                            
                      @else
                        <img src="{{URL::asset($profile_image.'user_profile.jpg')}}" />
                      @endif
                    </a>
                  </li>
                @endforeach
              </ul>
              <!--<div class="followBtn"> <a href="#"class="swep-ef1">
                <div><span class="txt">Follow</span><span class="ef1-before"></span> <span class="ef1-after"></span></div>
                </a> 
              </div>-->
              @endif
            </div>
          </div>
          <div class="col-md-6 text-right">
            <div class="latestPhotos">
              <h3>Latest Photos from following </h3>
              <ul>
                <?php $counter=1;?>
                @foreach($followingLatestArr  as $key=>$img)
                <?php if($counter>5) break;?>        
                  <li><a href="{{URL::route('photo.view')}}/{{$img['id']}}" class="photos" data-rel="{{$img['id']}}-{{URL::to($image_path.'thumb/1920/'.$img['path'])}}"  id="photo_{{$img['id']}}"><img src="{{URL::to($image_server_78.$img['path'])}}" alt="User"  ></a></li>
                <?php $counter++;?> 
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      </div>






      <div id="contact-sec"></div>
      
    </div>
  </div>