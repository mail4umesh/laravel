

<div class="graph">
    <div>
      	<div id="particles-js">
        	<canvas class="particles-js-canvas-el"></canvas>
      	</div>
      	<div class="chrt_box"> 
			<div>
				<canvas id="line-canvas" width="1280" height="350"></canvas>
			</div>
		</div>
    </div>
</div>

<div class="visitDataSec">
    <div class="visitDataTabel animated fadeInUpMid">
		<div class="other-tab-content"  id="uniquevisitorList" style="display:none;">
		
			<table id="allvisitorlists" width="100%" border="0" cellspacing="0" cellpadding="0" >
				<thead>
				
				</thead>
				<tbody>
					@if(count($recentVisitor))
						@foreach($recentVisitor as $key=>$value) 
							<tr>
								<td>
									<a href="@if($value['id']!='' && $value['id']!=0) {{URL::to('user/timeline/'.$value['id'])}} @else javascript:void(0) @endif">
		                               @if($value['profile_image']!='')
		                               <img style='width:40px;height:40px;' src="{{URL::asset($profile_image.$value['profile_image'])}}"  />
		                               <script>
		                                   var avtar = "{{URL::asset($profile_image.'user_profile.jpg')}}";</script>                  
		                               @else
		                               <img style='width:40px;height:40px;' src="{{URL::asset($profile_image.'user_profile.jpg')}}" />
		                               @endif
		                           	</a>
								</td>
								<td>
									@if($value['name']!='')
		                           		{{$value['name']}}
		                           	@else 
		                           		Visitor 
		                           	@endif
								</td>
								<td>{{$value['region']}}</td>
		                       	<td>{{$value['city']}}</td>
		                       	<td>{{$value['country']}}</td>
		                       	<td>{{$value['device']}}</td>
		                       	<td>
		                       		<?php
		                       			$dtArr = explode(' ',  Helper::showTimeAgo($value['visit_date']));
										echo $dtArr[0].' '.$dtArr['1'].' ago';
		                       		?>
		                       	</td>
		                       	<td class="flag"><img alt="" src="{{URL::asset('/assets/images/country_flag')}}/{{str_replace(' ','-',$value['country'])}}.png"></td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="8">  No record found! </td>
						</tr>
					@endif
				</tbody>
			</table>
			
			<div class="morevisitors">
				<a class="right link"  onclick="moreVisitors()" id="morevist" href="javascript:void(0)">More Visitors</a>
			</div>
		</div>
		
		<div class="other-tab-content marginnone" id="allvisitorList" >
			<div class="unique-visitors">
				<table id="allvisitorlists" width="100%" border="0" cellspacing="0" cellpadding="0" >
					<thead>
						
					</thead>
					<tbody>
						@if(count($recentVisitor))
							@foreach($recentVisitor as $key=>$value) 
								<tr>
									<td>
										<a href="@if($value['id']!='' && $value['id']!=0) {{URL::to('user/timeline/'.$value['id'])}} @else javascript:void(0) @endif">
		                                @if($value['profile_image']!='')
		                                <img style='width:40px;height:40px;' src="{{URL::asset($profile_image.$value['profile_image'])}}"  />
		                                <script>
		                                    var avtar = "{{URL::asset($profile_image.'user_profile.jpg')}}";</script>                  
		                                @else
		                                <img style='width:40px;height:40px;' src="{{URL::asset($profile_image.'user_profile.jpg')}}" />
		                                @endif
		                            	</a>
									</td>
									<td>
										@if($value['name']!='')
		                            		{{$value['name']}}
		                            	@else 
		                            		Visitor 
		                            	@endif
									</td>
									<td>{{$value['region']}}</td>
		                        	<td>{{$value['city']}}</td>
		                        	<td>{{$value['country']}}</td>
		                        	<td>{{$value['device']}}</td>
		                        	<td>
		                        		<?php
		                        			$dtArr = explode(' ',  Helper::showTimeAgo($value['visit_date']));
											echo $dtArr[0].' '.$dtArr['1'].' ago';
		                        		?>
		                        	</td>
		                        	<td class="flag"><img alt="" src="{{URL::asset('/assets/images/country_flag')}}/{{str_replace(' ','-',$value['country'])}}.png"></td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="8">  No record found! </td>
							</tr>
						@endif
					</tbody>
				</table>
		  		<div class="morevisitors"> <a href="javascript:void(0)" id="morevist"  onclick="moreUniqueVisitors()">More Visitors</a> </div>      
		    </div>
		</div>
	</div>
</div>
		
<input type="hidden" id="offset" value="5"> 
		
<script type="text/javascript">
  
 @if(isset($tvisitors['dates']))
        var arr = {{json_encode($tvisitors['dates'])}}
    @else
        var arr = ""
    @endif
    var uvisitor = {{json_encode(array_map('intval', isset($uvisitors['visitors'])?$uvisitors['visitors']:array()))}}
    var tvisitor = {{json_encode(array_map('intval', isset($tvisitors['visitors'])?$tvisitors['visitors']:array()))}}
    console.log(tvisitor);
    console.log(uvisitor);
    console.log(arr);
function chartSamples(){
    if (document.getElementById('line-canvas')) { 
    	// var lebar = $('#line-canvas').parent('.chrt_box').width();
     // alert(lebar)
     //   $('#line-canvas').attr('width', lebar);
        var lineOptions = {
            	scaleShowGridLines : true,
                //String - Colour of the grid lines
                scaleGridLineColor : "rgba(255,255,255,.2)",
                //Number - Width of the grid lines
                scaleGridLineWidth : 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines: false,
                //Boolean - Whether the line is curved between points
                bezierCurve : true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension : 0.4,
                //Boolean - Whether to show a dot for each point
                pointDot : true,
                //Number - Radius of each point dot in pixels
                pointDotRadius : 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth : 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius : 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke : true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth : 2,
                //Boolean - Whether to fill the dataset with a colour
                datasetFill : true,
                // String - Scale label font declaration for the scale label
                scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                // Number - Scale label font size in pixels
                scaleFontSize: 12,
                // String - Scale label font weight style
                scaleFontStyle: "normal",
                // String - Scale label font colour
                scaleFontColor: "#fff",
                //String - A legend template
                legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>" 

            };
            var lineChartData = {
            		labels: arr,
                    datasets : [
                    {
                    	fillColor : "rgba(82,208,70,0.3)",
                        strokeColor : "rgba(82,208,70,1)",
                        pointColor : "rgba(82,208,70,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data : tvisitor,
                        scaleFontColor:"#fff" 
                    },
                    {
                     	fillColor : "rgba(241,196,15,0.6)",
                        strokeColor : "rgba(241,196,15,1)",
                        pointColor : "rgba(241,196,15,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data : uvisitor,
                        scaleFontColor:"#fff"
                    }
                    ]


            }

	    var myLine = new Chart(document.getElementById("line-canvas").getContext("2d")).Line(lineChartData, lineOptions);
	    $(window).resize(function() {
	    		$('#line-canvas').attr('width', $('#line-canvas').parent('.graph').width()).css('width', $('#line-canvas').parent('.graph').width() + 'px');
	            myLine = new Chart(document.getElementById("line-canvas").getContext("2d")).Line(lineChartData, lineOptions);
	    });
    }

    } 

	chartSamples();

</script>
<script src="{{ URL::asset('/assets-01/js/particles.js') }}"></script>
<script src="{{ URL::asset('/assets-01/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/js/Chart.js')}}"></script> 