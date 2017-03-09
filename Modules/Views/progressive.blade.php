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
                    if($(this).hasClass('show')) {
                        //alert("I am here");
                        $(".slider-arrow, .themeSetting").animate({
                            left: "+=320"
                        }, 700, function () {
                            // Animation complete.
                        });
                        $(this).removeClass('show');
                    } else {
                        $(".slider-arrow, .themeSetting").animate({
                            left: "-=320"
                        }, 700, function () {
                            // Animation complete.
                        });
                        $(this).addClass('show');
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


            $(document).ready( function(){
                jQuery('#profile-des').autogrow();
                $('#profile-des').keypress(40);
            });

        </script>
        <!-- This Section is for Full Page Pop up Script End -->

        <!-- This Section is for Full Page Pop up Modal Start 
        <div class="modal modal-fullscreen force-fullscreen" id="fullscreens_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;z-index:1100000 !important;">   
            <button type="button" class="modal-close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>    
        </div>      
         This Section is for Full Page Pop up Modal End -->


        @include("layout-01.group-popup");
        @include("layout-01.seachpopup");
        @include("User::profile-01.footer");