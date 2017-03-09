<div class="themeSetting">
<div class="cusHeading"><i class="fa fa-cog"></i>Customize</div>
<ul class="accordiontab">
  <li>
    <a class="toggle" href="javascript:void(0);"><span class="selected-style add_top_nav"></span> Choose a Template Style <i class="fa fa-caret-down pull-right"></i></a>
    <ul class="inner">
      <li>
     <div class="row_box">
     <div class="col_box add_sidenav"></div>
      <div class="col_box add_top_nav"></div>
       <div class="col_box"></div>
     </div> 
      </li>
    </ul>
  </li>
  
  <li>
    <a class="toggle" href="javascript:void(0);">Dark <i class="fa fa-caret-down pull-right"></i></a>
    <ul class="inner">
      <li>  
      <div class="row_box coDark">
       <div class="col_box midnightGold-theme" change-template="gold-scheme"></div>
       <div class="col_box midnightBlue-theme" change-template="mint-scheme"></div>
       <div class="col_box midnightBrown-theme" change-template="brown-scheme"></div>
       <div class="col_box midnightGold2-theme" change-template="gold-v-scheme"></div>
       <div class="col_box midnightBronz-theme" change-template="midnightBronz-scheme"></div>
     </div>
     
      </li>
 
    </ul>
  </li>
  <li>
    <a class="toggle" href="javascript:void(0);"> Dark / Light <i class="fa fa-caret-down pull-right"></i></a>
    <ul class="inner">
      <li>
       <div class="row_box coLight">
       <div class="col_box ash-theme" change-template="grays-scheme"></div>
       <div class="col_box darkBlue-theme" change-template="rich-blue-scheme"></div>
       <div class="col_box dark-theme" change-template="black-scheme"></div>
       <div class="col_box red2-theme" change-template="red-scheme"></div>
       <div class="col_box deepgreen-theme" change-template="green-scheme "></div>
        <div class="col_box teal-theme" change-template="retro-scheme"></div>
     </div>
      </li>
    
    </ul>
  </li>
   <li>
    <a class="toggle" href="javascript:void(0);"> Colors <i class="fa fa-caret-down pull-right"></i></a>
    <ul class="inner">
           <li>
       <div class="row_box coLight">
       
       <div class="col_box green-theme" change-template="green-scheme"></div>
      <div class="col_box gold-theme" change-template="gold-scheme"></div>
       <div class="col_box orange-theme" change-template="orange-scheme"></div>
       <div class="col_box purple-theme" change-template="purple-scheme"></div>
       <div class="col_box purple2-theme" change-template="purple2-scheme"></div>
        <div class="col_box sky-theme" change-template="sky-scheme"></div>
        <div class="col_box blue-theme" change-template="blue-scheme"></div>
        <div class="col_box yellow-theme" change-template="yellow-scheme"></div>
     </div>
      </li>
    </ul>
  </li>
 
 
</ul>

<a href="javascript:void(0);" class="slider-arrow themesetting show"><i class="fa fa-cog fa-spin"></i><i class="fa fa-arrow-left" aria-hidden="true" style="display:none"></i> </a>
<script type="text/javascript">
  $(document).on("click",".col_box", function(){
    var old_theme = $("body").attr("data-template");
    var new_theme = $(this).attr("change-template");
    alert("OLD theme : "+old_theme);
    alert("new theme : "+new_theme);
    $("body").removeClass(old_theme);
    $("body").addClass(new_theme);

    $("body").attr("data-template",new_theme);
  });
</script>



</div>
