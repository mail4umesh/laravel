<section class="networkSec" id="network-sec">
  <div id="network-data">
  	
  	
  	<div class="networkwall">
	  <div class="overlay-three"></div>
	  <div class="heading-sec animated slideInUp">
	      <h2 style="font-family:{{$titleFont}}" class="title-font-h2"> Network</h2>
	  </div>
	</div>


  </div>
</section>
<script type="text/javascript">
  $(document).ready( function(){
    var url = "{{URL::to('/profile/network/')}}/{{$user['id']}}/0";
    $.get(url, function(data) {  
          $("#network-data").append(data);
    });
  });
</script>
