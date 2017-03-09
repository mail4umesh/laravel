<section class="mapSec">
  <div class="map-wrpr">
   <div class="map-overlay overlay-three"></div> 
    <div class="name-avatar">
      <div class="name title-font-h2" style="font-family:{{$titleFont}}" >{{$user['display_name']}}</div>
    </div>
    <div class="panel panel-transparent panel-default">
      <div class="panel-body">
        <div id="page">
          <div class="location"></div>
          <script> 
		
		(function ( $ ) {
			$.fn.CustomMap = function( options ) {
				var settings = $.extend({
					home: { latitude: 53.339381, longitude: -6.260533 },
					text: '<div class="map-popup"><h1>Company Name</h1><br/><div class="logo"><img src="" /></div><div class="about">A web development blog for all your HTML5, WordPress and jQuery needs</div></div><div class="clear"></div>',
					icon_url: "{{URL::to('assets-01')}}/images/megashot.png",	
					zoom: 16
				}, options );
				
				var coords = new google.maps.LatLng(settings.home.latitude, settings.home.longitude);
					 
				
					 
				return this.each(function() {	
					var element = $(this);
					
					var options = {		
						zoom: settings.zoom,
						center: coords,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						mapTypeControl: true,
						scrollwheel: true,
						navigationControl: true,
						draggable: true,
						scaleControl: true,
						zoomControlOptions: {
							style: google.maps.ZoomControlStyle.DEFAULT
						},
						overviewMapControl: true,	
					};
					
					var map = new google.maps.Map(element[0], options);
					
					var icon = { 
						url: settings.icon_url, 
						origin: new google.maps.Point(0, 0)
					};

					var marker = new google.maps.Marker({
						position: coords,
						map: map,
						icon: icon,
						draggable: true
					});
					 var marker = new google.maps.Marker({
						position: map.getCenter(),
						map: map,
					  });
					var info = new google.maps.InfoWindow({
						content: settings.text
					});

					google.maps.event.addListener(marker, 'click', function() { 
						info.open(map, marker);
					});
			

					var styles = [
			  {
			    "featureType": "landscape.natural",
			    "elementType": "geometry.fill",
			    "stylers": [
			      { "color": "#292929" }
			    ]
			  },
			 
			  
			  {
				    "featureType": "landscape.man_made",
				    "stylers": [
				      { "color": "#333333" },
				     
				    ]
			  },
			  {
				    "featureType": "water",
				    "stylers": [
				       { "color": "#2d333c" },
				      
				    ]
			  },
			  {
				    "featureType": "road.arterial",
				    "elementType": "geometry",
				    "stylers": [
				      { "color": "#282828" }
				    ]
			  }
			 ,{
				    "elementType": "labels.text.stroke",
				    "stylers": [
				      { "visibility": "off" }
				    ]
			  }
				,{
				    "elementType": "labels.text",
				    "stylers": [
				      
					   { "color": "#bababa" }
				    ]
				  }
				
				,{
				    "featureType": "road.local",
				    "stylers": [
				      { "color": "#666666" }
				    ]
				  }
				,{
				    "featureType": "road.local",
				    "elementType": "labels.text",
				    "stylers": [
				      { "color": "#bababa" }
				    ]
				  }
				,{
				    "featureType": "transit.station.bus",
				    "stylers": [
				      { "saturation": 0 }
				    ]
				  }
				,{
				    "featureType": "road.highway",
				    "elementType": "labels.icon",
				    "stylers": [
				      { "visibility": "on" }
				    ]
				  },{
				    "featureType": "poi",
				    "stylers": [
				      { "visibility": "off" }
				    ]
				  }
			
			]
					map.setOptions({styles: styles});
				});
		 
			};
		}( jQuery ));

		jQuery(document).ready(function() {
			jQuery('div.location').CustomMap();
		});
		
	</script> 
        </div>
      </div>
    </div>
  </div>
</section>
