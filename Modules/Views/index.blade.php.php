<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>{{ $user['name']}} | Profile</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{URL::to('assets-01')}}/profile/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{URL::to('assets-01')}}/profile/css/font-awesome.min.css">
        <link href="{{URL::to('assets-01')}}/css/stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::to('assets-01')}}/profile/css/stylesheet.css" rel="stylesheet">
        

        {{ Minify::stylesheet(array(
                
                '/assets-01/profile/css/animate.css',
                '/assets-01/profile/css/bootstrap-slider.css', 
                '/assets-01/css/justifiedGallery.min.css',
            )) 
        }}


        <link rel="stylesheet" href="{{URL::to('assets-01')}}/profile/css/themes.css" rel="stylesheet">
        


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

        {{
        Minify::javascript(array(
            '/assets-01/profile/js/ie-emulation-modes-warning.js',
            '/assets-01/profile/js/jquery-1.11.1.min.js',
            '/assets-01/profile/js/bootstrap.min.js',
            '/assets-01/profile/js/mapjs.js',
            '/assets-01/profile/js/txtrotate.js',
            '/assets-01/profile/js/bootstrap-slider.js',
            '/assets/js/jqColorPicker.min.js',
            '/assets-01/js/jquery.justifiedGallery.min.js',
        ));
        }}
        <script src="{{URL::to('assets-01')}}/profile/js/graph/Chart.js"></script> 
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>


    <?php
    if (isset($customization) && count($customization) > 0) { //defaultTheme
        $profileTheme = $customization[0]['theme_name'];
        $overlayOpacity = round($customization[0]['overlay_opacity'], 2);
        $titleFont = $customization[0]['title_font'];
        $titleFontSize = $customization[0]['title_font_size'];
        $useTimeline = $customization[0]['use_timeline'];
        $bannerDisplayType = $customization[0]['banner_display_type'];
        $photo_back = $customization[0]['photo_back'];
    } else {
        $profileTheme = 'black-scheme';
        $overlayOpacity = 0.75;
        $titleFont = "";
        $titleFontSize = 72;
        $useTimeline = 1;
        $bannerDisplayType = "sepia";
        $photo_back = "";
    }

    if ($bannerDisplayType != "orignal") {
        $bannerDisplayTypeClass = $bannerDisplayType;
    } else {
        $bannerDisplayTypeClass = "";
    }
    ?>

    <input type="hidden" id="theme-name" value="{{$profileTheme}}">
    <input type="hidden" id="overlay-opacity" value="{{$overlayOpacity}}">
    <input type="hidden" id="title-font" value="{{$titleFont}}">
    <input type="hidden" id="title-font-size" value="{{$titleFontSize}}">
    <input type="hidden" id="use-timeline" value="{{$useTimeline}}">
    <input type="hidden" id="banner-display-type" value="{{$bannerDisplayType}}">


    <body class="template-two {{$profileTheme}} profile-user-login" data-template="{{$profileTheme}}">
        
        @if($useTimeline == 1)
        <section class="fixedBanner {{$bannerDisplayTypeClass}}" style='background-image:url({{$profile_banner_thumb.$user["user_timeline_banner"]}});'></section>
        
        @else
        <section class="fixedBanner"></section>
        @endif


        @if(Auth::check())

        <div class="color-overlay"></div>
        @include("layout-01.header")


        @else
        <div class="color-overlay"></div>
        <header class="with-out-login">
            <div class="main-menu-header not-login header-bg">
                <div class="pull-right login-hide-show">
                    <a href="#;" class="login-hide-btn">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </div>
                <ul class="userlink">
                    <li><a href="{{URL::to('user/login')}}" class="megashot-full-page-popup">Login</a></li>
                    <li><a href="{{URL::to('user/register')}}" class="megashot-full-page-popup">Sign Up</a></li>
                </ul>
            </div>
        </header>
        @endif

        <div class="menu-show-hide">
            <a href="#;" class="show-hide-button">
                <i class="fa fa-play"></i>
            </a>
        </div>
        <div id="navToggle"><button class="fa fa-bars"></button></div>
        <div id="opennav" class="sideNav">
            <ul>
                <ul>
                    <li> <a href="#more-about-sec" class="more-about-link"><i class="fa fa-user"></i><span>More About me</span></a> </li>
                    <li> <a href="#photo-sec"><i class="fa fa-picture-o"></i><span>Photos</span></a> </li>
                    <li> <a href="#stats-sec"><i class="fa fa-line-chart"></i><span>Stats</span></a> </li>
                    <li> <a href="#graph-sec"><i class="fa fa-info-circle"></i><span>Visits</span></a> </li>
                    <li> <a href="#network-sec"><i class="fa fa-envelope"></i><span>Network</span></a> </li>
                    @if(Auth::id() != $user['id'])
                        <li> <a href="#contact-sec"><i class="fa fa-user-plus"></i><span>Contact</span></a> </li>
                    @endif
                </ul>
            </ul>
        </div>

        <style type="text/css"></style>

        <section class="mainBanner">
            <div class="bottom-shadow"></div>
            <div class="overlay-two" style="opacity:{{$overlayOpacity}} "></div>
            <div class="container-set">
                <div class="profilePic  animated zoomIn"> 
                    <span></span> 
                    @if($user['profile_image']!='')
                    <img src="{{URL::asset($profile_image200.$user['profile_image'])}}"  /> 
                    <script>var avtar = "{{URL::asset($profile_image200.'user_profile.jpg')}}";</script>                  
                    @else
                    <img src="{{URL::asset($profile_image200.'user_profile.jpg')}}" />
                    @endif

                </div>
                <?php

                function split_on($string, $num) {
                    $length = strlen($string);
                    $output[0] = substr($string, 0, $num);
                    $output[1] = substr($string, $num, $length);
                    return $output;
                }

                $u_name = split_on($user['display_name'], 1);
                ?>
                <?php
                if (Auth::check() && Auth::id() == $user["id"]) {
                    $inlineClass = "inline-click";
                } else {
                    $inlineClass = "";
                }
                ?>
                <div class="onClickEdit">
                    <h1 class="{{$inlineClass}} animated2 slideInDown" style="font-size:{{$titleFontSize}}px; font-family:{{$titleFont}}" data-edit="display-name" data-val="{{$user['display_name']}}" ><span>{{$u_name[0]}}</span>{{$u_name[1]}}</h1>
                    <input type="text" name="display-name" id="display-name" class="inline-update" style="display:none;font-size:{{$titleFontSize}}px; font-family:{{$titleFont}}">
                </div>
                <script type="text/javascript">



                    $(document).on("click", ".inline-click", function () {
                        var input = $(this).attr("data-edit");
                        var val = $(this).attr("data-val");
                        //alert("input "+ input+ " val "+val);
                        $(this).hide();
                        $("#" + input).show();
                        $("#" + input).val(val);
                        if(input == "profile-des"){
                            //alert($(this).height());
                            //$('#profile-des').autogrow();
                            $('#profile-des').focus();
                            $('#profile-des').css("height",$(this).height()+10);
                        }
                    });

                    $(document).on("keyup", ".inline-update", function (event) {
                        if (event.keyCode == 13 && !event.shiftKey) {
                            var section = $(this).attr("id");
                            var val = $(this).val();
                            //alert("section : "+section+" val "+val);

                            $.ajax({
                                url: "{{URL::to('profile/update')}}",
                                data: {
                                    section: section,
                                    val: val,
                                },
                                type: 'post',
                                success: function (result) {
                                    $("[data-edit=" + section + "]").show();
                                    $("[data-edit=" + section + "]").html(result);
                                    $("[data-edit=" + section + "]").attr("data-val", val);

                                }

                            });

                            $(this).hide();


                        }
                    });

                    $(document).on("focusout",".inline-update",function(){
                        var section = $(this).attr("id");
                        var val = $(this).val();
                        //alert("section : "+section+" val "+val);
                        $.ajax({
                            url: "{{URL::to('profile/update')}}",
                            data: {
                                section: section,
                                val: val,
                            },
                            type: 'post',
                            success: function (result) {
                                $("[data-edit=" + section + "]").show();
                                $("[data-edit=" + section + "]").html(result);
                                $("[data-edit=" + section + "]").attr("data-val", val);
                            }
                        });
                        $(this).hide();
                    });

                    


                </script>



                <div class="idetails animated fadeIn">
                    <div class="onClickEdit">
                        <?php
                        if ($user['profile_des'] != '') {
                            if (strlen($user['profile_des']) <= 375) {
                                $profile_des = $user['profile_des'];
                            } else {
                                $profile_des = substr($user['profile_des'], 0, 375);
                            }
                        } else {
                            $profile_des = "Thank you for the visit, I will write more about myself soon.";
                        }
                        ?>
                        <p class="{{$inlineClass}}" data-edit="profile-des" data-val="{{$profile_des}}">
                            {{nl2br($profile_des)}}
                        </p>
                        <textarea name="profile-des" id="profile-des" class="inline-update" style="display:none"></textarea>
                    </div>
                </div>
                <div class="followSec typewriter animated fadeInUp"><h2 class="typewriter" id="typewriter" data-period="2000" data-rotate="[ &quot;FOLLOW ME ON&quot; ]"><div></div></h2>
                   <!--  <div class="socialIcons">
                        <ul>
                            <li class="active"> <a href="#"> <i class="fa fa-megashot"><img src="{{URL::to('assets-01/profile/images/megashot-ico.png')}}"  width="23" alt=""/></i></a>
                                <div class="tooltipCo">Megashots</div>
                            </li>
                            <li> <a href="#"> <i class="fa fa-facebook"></i></a>
                                <div class="tooltipCo">Facebook</div>
                            </li>
                            <li> <a href="#"> <i class="fa fa-twitter"></i></a>
                                <div class="tooltipCo">Twitter</div>
                            </li>
                            <li> <a href="#"><i class="fa fa-google-plus"></i></a>
                                <div class="tooltipCo">Twitter</div>
                            </li>
                            <li> <a href="#"><i class="fa fa-flickr"></i></a>
                                <div class="tooltipCo">Twitter</div>
                            </li>
                            <li> <a href="#"><i class="fa fa-500px"></i></a>
                                <div class="tooltipCo">500px</div>
                            </li>
                            <li> <a href="#"><button type="button" data-toggle="modal" data-target="#myModal" class="fa fa fa-plus"></a>
                                <div class="tooltipCo">Add</div>

                            </li>
                        </ul>
                    </div> -->
                    <div class="socialIcons">{{Helper::getSocailLink($user['id'],'',2)}}</div>
                </div>
                <div class="megaArrow"><span class="bounce"></span></div>
            </div>
        </section>

        <section class="moreabout" id="more-about-sec">
            <div class="overlay-three solidBg"></div>
            <div class="container-set">
                <div class="heading-sec  animated2 fadeInDown">
                    <h2 style="font-family:{{$titleFont}}" class="title-font-h2">MORE ABOUT ME</h2>
                </div>
                <ul class="aboutLinks">
                    <li class="animated2 fadeInLeft">
                        <h2>Portfolio</h2>
                        <div class="al-ico"><span class="ion ion-images"></span></div>
                        <div class="button-block"><a class="sweepTop" href="{{URL::to(str_replace(" ","-",strtolower($user['name'])).'/home')}}">Visit</a></div>
                    </li>
                    <li class="active animated fadeIn">
                        <h2>Shop</h2>
                        <div class="al-ico"><span class="ion ion-android-cart"></span></div>
                        <div class="button-block"><a class="sweepTop" href="{{Config::get('constant.ecom_url')}}shop/{{$user['id']}}">Visit</a></div>
                    </li>
                    <li class="animated2 fadeInRight">
                        <h2>Favorite Videos</h2>
                        <div class="al-ico"><span class="ion ion-ios-play"></span></div>
                        <div class="button-block"><a class="sweepTop" href="{{URL::route('user.profile-favorite-videos', str_replace(" ","-",strtolower($user['name'])))}}">Visit</a></div>
                    </li>
                </ul>
            </div>
        </section>

        @include("User::profile-01.layouts.photos")

        <section class="statCounter" id="stats-sec">
            <div class="overlay-four"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4 animated slideInLeft">
                        <div class="counterBlock">
                            <div class="sCou-ico"><i class="fa fa-photo"></i></div>
                            <h2>{{number_format($photos)}}</h2>
                            <span>Photos</span> </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="counterBlock">
                            <div class="sCou-ico"><i class="fa fa-eye"></i></div>
                            <h2>{{number_format($views)}}</h2>
                            <span>Views</span> </div>
                    </div>
                    <div class="col-sm-4 col-md-4 animated slideInRight">
                        <div class="counterBlock">
                            <div class="sCou-ico"><i class="fa fa-group"></i></div>
                            <h2>{{number_format($total_followers)}}</h2>
                            <span>Followers </span> </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="timelineTabs">
            <div class="overlay-three"></div> 
            <div class="timelineBox button-style">
                <div class="boxOne box-button" data-link="{{URL::route('user.timelinename',  str_replace(' ','-',  strtolower($user['name'])))}}"> <span class="txt">Timeline</span> <span class="part"></span> <span class="part2"></span> </div>
                <div class="boxTwo box-button" data-link="{{URL::route('user.photostreamname',  str_replace(' ','-',  strtolower($user['name'])))}}"> <span class="txt">Photostream</span> <span class="part"></span> <span class="part2"></span> </div>
                <div class="boxthree box-button" data-link="{{URL::route('user.galleryname',  str_replace(' ','-',  strtolower($user['name'])))}}"> <span class="txt">Galleries</span> <span class="part"></span> <span class="part2"></span> </div>
            </div>
            <script type="text/javascript">
                $(document).on("click", ".box-button, sweepTop", function () {
                    var url = $(this).attr("data-link");
                    window.location = url;
                })
            </script>
            <div class="heading-sec animated slideInUp">
                <h2 style="font-family:{{$titleFont}}" class="title-font-h2"> VISITS</h2>
            </div>
        </section>

        @include("User::profile-01.layouts.graph") 


        @include("User::profile-01.layouts.network")

        @if(Auth::id() != $user['id'])
            @include("User::profile-01.layouts.contact")
        @endif

        @include("User::profile-01.layouts.map")

 

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content socail-cover">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add your social media links for more connections</h4>
                    </div>
                    <div class="modal-body">
                        <ul>
                             <li>
                        <label>Your Facebook</label>
                        @if(isset($social[0]->fb) && $social[0]->fb != '')
                        <input type="text" name="fb" id="fb" value="{{$social[0]->fb}}"/>
                        <button type="submit" class="active savelinks">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" value="" name="fb" id="fb" />
                        <button type="submit" class="savelinks">Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif

                    </li>
                    <li>
                        <label>Your Twitter</label>
                        @if(isset($social[0]->twitterr) && $social[0]->twitterr != '')
                        <input type="text" name="twitter" id="twitter" value="{{$social[0]->twitterr}}" />
                        <button type="submit" class="active">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" value="" name="twitter" id="twitter" />
                        <button type="submit" class="savelinks" >Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif
                    </li>
                    <li>
                        <label>Your G+</label>
                        @if(isset($social[0]->go) && $social[0]->go != '')  
                        <input type="text" name="go" id="go" value="{{$social[0]->go}}" />
                        <button type="submit" class="active">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" name="go" id="go" value="" />
                        <button type="submit" class="savelinks">Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif

                    </li>
                    <li>
                        <label>Your Flickr</label>
                        @if(isset($social[0]->flicr) && $social[0]->flicr !='')
                        <input type="text" name="flickr" id="flickr" value="{{$social[0]->flicr}}" />
                        <button type="submit" class="active">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" value="" name="flickr" id="flickr" />
                        <button type="submit" class="savelinks">Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif
                    </li>

                    <li>
                        <label>Your 500 Px</label>
                        @if(isset($social[0]->px) && $social[0]->px !='')
                        <input type="text" name="px" id="px" value="{{$social[0]->px}}" />
                        <button type="submit" class="active">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" value="" name="px" id="px" />
                        <button type="submit" class="savelinks">Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif
                    </li>
                    <li>
                        <label>Pinterest</label>
                        @if(isset($social[0]->pinterest) && $social[0]->pinterest !='')
                        <input type="text" name="pinterest" id="pinterest" value="{{$social[0]->pinterest}}" />
                        <button type="submit" class="active">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" value="" name="pinterest" id="pinterest" />
                        <button type="submit" class="savelinks">Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif
                    </li>
                    <li>
                        <label>Tumbler</label>
                        @if(isset($social[0]->tumbler) && $social[0]->tumbler !='')
                        <input type="text" name="tumbler" id="tumbler" value="{{$social[0]->tumbler}}" />
                        <button type="submit" class="active">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" value="" name="tumbler" id="tumbler" />
                        <button type="submit" class="savelinks">Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif
                    </li>
                    {{"";$exist = 0}}
                    @if((isset($social[0]->custom1) && $social[0]->custom1 !='') || (isset($social[0]->custom2) && $social[0]->custom2 !=''))
                    {{"";$exist = 1}}
                    @endif
                    <li >
                        <label id="addmorelink" @if($exist==1) style="display:none;" @endif>Add More Link</label>
                        <label id="removemorelink" @if($exist==1) style="display:block;" @else  style="display:none;" @endif>Close More Link</label>
                    </li>
                    <li @if($exist==0) style="display:none;" @endif id="customli1" >
                         <label><input type="text" name="title1" id="title1" value="{{isset($social[0]->title1)?$social[0]->title1:""}}" placeholder="Link Title" style="width:100px;" /></label>
                        @if(isset($social[0]->custom1) && $social[0]->custom1 !='')
                        <input type="text" name="custom1" id="custom1" value="{{$social[0]->custom1}}" />
                        <button type="submit" class="active">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" value="" name="custom1" id="custom1" />
                        <button type="submit" class="savelinks">Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif
                    </li>
                    <li @if($exist==0) style="display:none;" @endif  id="customli2">
                         <label><input type="text" name="title2" id="title2" value="{{isset($social[0]->title2)?$social[0]->title2:""}}" placeholder="Link Title" style="width:100px;" /></label>
                        @if(isset($social[0]->custom2) && $social[0]->custom2 !='')
                        <input type="text" name="custom2" id="custom2" value="{{$social[0]->custom2}}" />
                        <button type="submit" class="active">Link Added</button>
                        <button type="submit" class="active delete-link">X</button>
                        @else
                        <input type="text" value="" name="custom2" id="custom2" />
                        <button type="submit" class="savelinks">Add Link</button>
                        <button type="submit" class="active delete-link" style="display:none;">X</button>
                        @endif
                    </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn swep-ef1" data-dismiss="modal" >
                            <div> <span class="txt">Done</span> <span class="ef1-before"></span> <span class="ef1-after"></span> </div>
                        </button>


                    </div>
                </div>
            </div>
        </div> 




        @include("User::profile-01.layouts.sidebar-left")

        <footer> <span class="copyright"><div data-edit="display-name">{{ $user['display_name' ]}} Photography</div> </span> </footer>
 


        <script>
              $(".members-wrapper h2").click(function () {
                  $(".member-photos").slideToggle("slow");
              });
        </script> 
        <script>
            $(".option-set li a").click(function () {
                $("#options-sort").hide("slow");
            });
        </script> 

        <script>
            $('.getinTouch .form-group').click(function () {
                $(".getinTouch .form-group label").removeClass("move");
                $(this).children('label').addClass('move');
            });
        </script>
        <script>
            $("#navToggle").click(function () {
                $("#opennav").slideToggle("slow", function () {
                    // Animation complete.
                });
            });
        </script>


        <script>
            $(document).ready(function () {
                var viewport = $(window);
                var setVisible = function (e) {
                    var viewportTop = viewport.scrollTop();
                    var viewportBottom = viewport.scrollTop() + viewport.height();
                    $('section').each(function () {
                        var self = $(this);
                        var top = self.offset().top;
                        var bottom = top + self.height();
                        if (self.hasClass('getinTouch'))
                        {
                            var ntop = top + self.height() / 4;
                            var ntop1 = top + self.height() + self.height();
                            if (viewportBottom >= ntop && viewportBottom <= ntop1) {
                                self.addClass('active');
                            } else {
                                self.removeClass('active');
                            }
                        } else
                        {
                            var topOnScreen = top >= viewportTop && top <= viewportBottom;
                            var bottomOnScreen = bottom >= viewportTop && bottom <= viewportBottom;
                            var elemVisible = topOnScreen || bottomOnScreen;
                            self.toggleClass('active', elemVisible);
                        }
                    });
                };
                viewport.scroll(setVisible);
                setVisible();
            });
        </script>
        <script>
            function myFunction() {
                document.getElementById("myTextarea");
            }
        </script>
        <script>
            $('.toggle').click(function (e) {
                e.preventDefault();

                var $this = $(this);

                if ($this.next().hasClass('show')) {
                    $this.next().removeClass('show');
                    $this.next().slideUp(350);
                } else {
                    $this.parent().parent().find('li .inner').removeClass('show');
                    $this.parent().parent().find('li .inner').slideUp(350);
                    $this.next().toggleClass('show');
                    $this.next().slideToggle(350);
                }
            });
        </script>

        <script>
            $(function () {
                $('.slider-arrow').click(function () {
                    if ($(this).hasClass('show')) {
                        $(".slider-arrow, .themeSetting").animate({
                            left: "+=320"
                        }, 700, function () {
                            // Animation complete.
                        });
                        $(this).removeClass('show').addClass('hide');
                    } else {
                        $(".slider-arrow, .themeSetting").animate({
                            left: "-=320"
                        }, 700, function () {
                            // Animation complete.
                        });
                        $(this).removeClass('hide').addClass('show');
                    }
                });

            });
        </script>

        <!-- This Section is for Full Page Pop up Script Start -->
        <script type="text/javascript">
            $(window).scroll(function() {
                if ($(this).scrollTop() > 660){  
                    $('.moreabout').addClass("co-active");
                  }
                  else{
                    $('.moreabout').removeClass("co-active");
                  }
                });
            $(document).ready(function () {
            });
            var base_url = '{{URL::to("")}}';


            $(function () {
                $('a[href*="#"]:not([href="#"])').click(function () {
                    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        if (target.length) {
                            $('html, body').animate({
                                scrollTop: target.offset().top
                            }, 1000);
                            return false;
                        }
                    }
                });
            });


            String.prototype.truncate =
                    function (n) {
                        return this.substr(0, n - 1) + (this.length > n ? '&hellip;' : '');
                    };


            
                jQuery('#profile-des').autogrow();
                $('#profile-des').keypress(40);
            

        </script>
        <!-- This Section is for Full Page Pop up Script End -->

        <!-- This Section is for Full Page Pop up Modal Start 
        <div class="modal modal-fullscreen force-fullscreen" id="fullscreens_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;z-index:1100000 !important;">   
            <button type="button" class="modal-close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>    
        </div>      
         This Section is for Full Page Pop up Modal End -->


        @include("layout-01.group-popup");
        @include("layout-01.seachpopup");
        @include("layout-01.footer");