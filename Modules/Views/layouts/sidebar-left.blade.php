<?php if(Auth::check() && Auth::id() == $user["id"]) { ?> 
 <style type="text/css">
  .blur {
     filter: blur(10px); 
  }
  .blackWhite {
    filter: grayscale(1);
  }
  .sepia {
    filter: sepia(1);
  }
  .colorpic-container{
    border:#fff 1px solid; padding:3px; float:right;
  }
  .colorpic{
    background:#fff; width:30px; height:30px;  
  }
  .cp-color-picker{
    z-index: 10;
  }
  .algn-right{
    margin-top: 10px;
  }
</style>
<div class="themeSetting">
  <div class="cusHeading"><i class="fa fa-cog"></i>Customize</div>
  <div class="tsWrap">
    <div class="tsContent">
      <div class="tsMenu">
            <a href="#" class="button-light tsMenubutton">Colors</a>
            <a href="#" class="button-dark tsMenubutton">Grays</a>
            <a href="#" class="button-vintage tsMenubutton">Vintage</a>
        </div>
        <div class="light-box tabBox grayscale color">
          <div class="tsThumb color01">
            <a href="#" class="selectThis" change-template="mint-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color02">
            <a href="#" class="selectThis" change-template="blue-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color03">
            <a href="#" class="selectThis" change-template="brown-scheme" >Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color04">
            <a href="#" class="selectThis" change-template="chartreuse-scheme-two">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color05">
            <a href="#" class="selectThis" change-template="chartreuse-scheme csv1">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color06">
            <a href="#" class="selectThis" change-template="rich-blue-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color07">
            <a href="#" class="selectThis" change-template="green-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color08">
            <a href="#" class="selectThis" change-template="lemon-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color09">
            <a href="#" class="selectThis" change-template="pink-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color10">
            <a href="#" class="selectThis" change-template="sky-red-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color11">
            <a href="#" class="selectThis" change-template="sky-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color12">
            <a href="#" class="selectThis" change-template="yellow-scheme" >Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color13">
            <a href="#" class="selectThis" change-template="yellow-v-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
        </div>
        <div class="dark-box tabBox grays">
          <div class="tsThumb color01">
            <a href="#" class="selectThis" change-template="black-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
          <div class="tsThumb color02">
            <a href="#" class="selectThis" change-template="grays-scheme">Select</a>
            <div class="overlay-theme"></div>
          </div>
        </div>
        <div class="vintage-box tabBox vontage">
          <div class="tsThumb color01">
              <a href="#" class="selectThis" change-template="retro-scheme">Select</a>
              <div class="overlay-theme"></div>
            </div>
            <div class="tsThumb color02">
              <a href="#" class="selectThis" change-template="gold-scheme">Select</a>
              <div class="overlay-theme"></div>
            </div>
            <div class="tsThumb color03">
              <a href="#" class="selectThis" change-template="gold-v-scheme">Select</a>
              <div class="overlay-theme"></div>
            </div>
        </div>
        <div class="customControls">
          <form class="form">
              <div class="checkbox">
                <label>
                  <?php 
                    if($useTimeline == "1"){
                      $checked = 'checked="checked"';
                    } else{
                      $checked = "";
                    }
                  ?>
                  <input id="use-banner" type="checkbox" {{$checked}}> Use this Timeline Banner as Background
                </label>
              </div>
              
                <div class="form-group btnRow">
                    <a href="javascript:void(0)" class="btn effect-button btn-selected" data-effect="orignal" >Original</a>
                    <a href="javascript:void(0)" class="btn effect-button btn-link" data-effect="blackWhite">B+W</a>
                    <a href="javascript:void(0)" class="btn effect-button btn-link" data-effect="sepia">Sepia</a>
                    <a href="javascript:void(0)" class="btn effect-button btn-link" data-effect="blur">Blurred</a>
                </div>
                <div class="form-group">Overlay Transparency
                  <input id="transparency" data-slider-id='transparencySlider' type="text" data-slider-min="0.1" data-slider-max="1.0" data-slider-step="0.05" data-slider-value="{{$overlayOpacity}}"/>
                  <input type="hidden" id="transparencyTxt" value="0.75">
                </div>
                <div class="form-group">
                  <label for="selectID">Title Font </label>
                    <select id="font-name" style="font-family:{{$titleFont}};">
                        <option value="masqueregular" style="font-family:masqueregular;" >Masque regular</option>
                        <option value="sf_americana_dreamsregular" style="font-family:sf_americana_dreamsregular;">Dreams Regular</option>
                        <option value="hominisnormal" style="font-family:hominisnormal;">Hominis normal</option>
                        <option value="stint_ultra_expandedregular" style="font-family:stint_ultra_expandedregular;">Stint Ultra Expanded</option>
                        <option value="marketing_script_inlineRg" style="font-family:marketing_script_inlineRg;" >Marketing Script InlineRg</option>
                        <option value="summit_bolddisplay" style="font-family:summit_bolddisplay;" >Summit Bolddisplay</option>
                        <option value="PeakeBold" style="font-family:PeakeBold;" >Peake Bold</option>
                        <option value="kilogramregular" style="font-family:kilogramregular;" >Kilogram regular</option>
                        <option value="goudy_trajan_regularregular" style="font-family:goudy_trajan_regularregular;" >Goudy trajan Regular</option>
                        <option value="ackbarregular" style="font-family:ackbarregular;" >Ackbar Regular</option>
                        <option value="faktosregular" style="font-family:faktosregular;" >Faktos Regular</option>
                        <option value="pulp_fiction_m54regular" style="font-family:pulp_fiction_m54regular;" >Pulp Fiction M54</option>
                        <option value="salarymanregular" style="font-family:salarymanregular;" >Salaryman Regular</option>
                        <option value="GaboDrive" style="font-family:GaboDrive;" >Gabo Drive</option>
                        <option value="danbold" style="font-family:danbold;" >Dan Bold</option>
                        <option value="cinzelregular" style="font-family:cinzelregular;" >Cinzel Regular</option>
                        <option value="cinzelbold" style="font-family:cinzelbold;" >Cinzel Bold</option>
                        <option value="arb-218_big_blunt_mar-50Rg" style="font-family:arb-218_big_blunt_mar-50Rg;" >Arb 218 Big Blunt Mar-50Rg</option>
                        <option value="borisblackbloxxregular" style="font-family:borisblackbloxxregular;" >Boris Black Bloxx Regular</option>
                        <option value="norwesterregular" style="font-family:norwesterregular;" >Norwester regular</option>
                        <option value="'Oranienbaum', serif" style="font-family:'Oranienbaum', serif;" >'Oranienbaum'</option>  
                        <option value="'Lobster Two', cursive" style="font-family:'Lobster Two', cursive;" >'Lobster Two', cursive</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Font Size</label>
                  <input id="fontSize" data-slider-id='fontSizeSlider' type="text" data-slider-min="30" data-slider-max="150" data-slider-step="1" data-slider-value="{{$titleFontSize}}"/>
                  <input type="hidden" id="fontSizeTxt" value="18">
                </div>
                <div class="form-group"><label>Choose Photos Background</label> 
                  <div class="colorpic-container">
                    <div class="colorpic" style=""></div>
                  </div>
                  <input type="hidden" id="color-val">
                </div>
               <div class="form-group pull-right algn-right"><button type="button" class="btn btn-default btn-green btn-right" onclick="saveCustomize()">Save</button></div>
            </form>
        </div>
    </div>
  </div>
  <a href="javascript:void(0);" class="slider-arrow themesetting show"><i class="fa fa-cog fa-spin"></i><i class="fa fa-arrow-left" aria-hidden="true" style="display:none"></i> </a> </div>
<script type="text/javascript">
  $(".button-light").click(function () {
    $('.selected').removeClass('selected');
    $(this).addClass("selected");
    $(".dark-box.tabBox").hide("slow");
    $(".vintage-box.tabBox").hide("slow");
    $(".light-box.tabBox").show("slow");
    $(".customControls").hide("slow");
    $(".tsThumb").show("slow");
    $(".activeState").removeClass( "activeState" );
  });

  $(".button-dark").click(function () {
    $('.selected').removeClass('selected');
    $(this).addClass("selected");
    $(".vintage-box.tabBox").hide("slow");
    $(".light-box.tabBox").hide("slow");
    $(".dark-box.tabBox").show("slow");
    $(".customControls").hide("slow");
    $(".tsThumb").show("slow");
    $(".activeState").removeClass( "activeState" );
  });

  $(".button-vintage").click(function () {
    $('.selected').removeClass('selected');
    $(this).addClass("selected");
    $(".light-box.tabBox").hide("slow");
    $(".dark-box.tabBox").hide("slow");
    $(".vintage-box.tabBox").show("slow");
    $(".customControls").hide("slow");
    $(".tsThumb").show("slow");
    $(".activeState").removeClass( "activeState" );
  });
        
  $(".selectThis").click(function () {
    $(this).parent().siblings().hide("fast");
    $(this).addClass( "activeState" );
    $(this).parent().show("fast");
    $('.customControls').show("slow");




    $(".mainBanner h1").css({'font-family':""})
    $("#title-font").val("");
    $(".title-font-h2").css({'font-family':""})








  });


</script>

<script type="text/javascript">
  $(document).on("click",".selectThis", function(){
    var old_theme = $("body").attr("data-template");
    var new_theme = $(this).attr("change-template");
    //alert("OLD theme : "+old_theme);
    //alert("new theme : "+new_theme);
    $("body").removeClass(old_theme);
    $("body").addClass(new_theme);

    $("body").attr("data-template",new_theme);

    $("#theme-name").val(new_theme);
  });

  $('#transparency').slider({
    formatter: function(value) {
      $("#transparencyTxt").val(value);
      $('.overlay-two').css({'opacity':value})
      $("#overlay-opacity").val(value);
      return '' + value;
    }
  });
  
  $('#fontSize').slider({
    formatter: function(value) {
      $("#fontSizeTxt").val(value);
      $(".mainBanner h1").css({'font-size':value})
      $("#title-font-size").val(value);
      return ' ' + value;
    }
  });
  
  $(document).on('change','#font-name', function() {
    //alert( this.value ); // or $(this).val()
    $(".mainBanner h1").css({'font-family':this.value})
    $(this).css({'font-family':this.value})
    $("#title-font").val(this.value);
    $(".title-font-h2").css({'font-family':this.value})
  });


  $(document).on("click", ".effect-button", function(){
    $(this).siblings().removeClass("btn-selected");
    $(this).addClass("btn-selected");


    effect = $(this).attr("data-effect");
    //alert(effect);
    $(".fixedBanner").removeClass('sepia');
    $(".fixedBanner").removeClass('blur');
    $(".fixedBanner").removeClass('blackWhite');
    if(effect!="original"){
      $(".fixedBanner").addClass(effect);
    }
    $("#banner-display-type").val(effect);
  });


  $('#use-banner').on("click", function() {    
    if($(this).is(':checked')){
      //alert("checked");
      $(".fixedBanner").css({'background-image':'url({{$profile_banner_thumb.$user["user_timeline_banner"]}})'})
      $("#use-timeline").val("1")
    } else {
      //alert("not checked");
      $(".fixedBanner").css({'background-image':''})
      $("#use-timeline").val("0")

    }
  });
  
  function saveCustomize(){
    str = "";
    str+= " \n theme-name : " + $("#theme-name").val();
    str+= " \n overlay-opacity : " + $("#overlay-opacity").val();
    str+= " \n title-font-size : " + $("#title-font-size").val();
    str+= " \n title-font : " + $("#title-font").val();
    str+= " \n banner-display-type : " + $("#banner-display-type").val();
    str+= " \n use-timeline : " + $("#use-timeline").val();
    str+= " \n color-val : " + $("#color-val").val();
    
    //alert(str);

    $.ajax({
      url: "{{URL::to('profile/save-customize')}}", 
      type: "post",
      data: {
        theme_name:           $("#theme-name").val(),
        overlay_opacity:      $("#overlay-opacity").val(),
        title_font_size:      $("#title-font-size").val(),
        title_font:           $("#title-font").val(),
        banner_display_type:  $("#banner-display-type").val(),
        use_timeline:         $("#use-timeline").val(),
        photo_back:          $("#color-val").val(),
      },
      beforeSend: function( xhr ) {

      },
      success: function(result){
        $('.slider-arrow').click();
      }
    });


  }


  


  $('.colorpic').colorPicker({
    /*buildCallback: function($elm) {
        this.$colorPatch = $elm.prepend('<div class="cp-disp">').find('.cp-disp');
    },
   
*/
    renderCallback: function($elm, toggled) {
        var colors = this.color.colors;
        $("#color-val").val(colors.HEX);
        console.log(colors.HEX);
        $(this).css({'background':colors.HEX});

        $("#photo-back").css({'background':"#"+colors.HEX});

        /*this.$colorPatch.css({
            backgroundColor: '#' + colors.HEX,
            color: colors.RGBLuminance > 0.22 ? '#222' : '#ddd'
        }).text(this.color.toString($elm._colorMode)); // $elm.val();*/
    }
});

$(document).ready( function(){
  $('#font-name').val("{{$titleFont}}");
})

</script>

<?php } ?>