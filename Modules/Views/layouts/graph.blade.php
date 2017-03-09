<section class="graphSec" id="graph-sec">
  <div class="graphHead">
    <h2>Unique Visits</h2>
    <h3>All Visits</h3>
  </div>
  <div id="visotor"></div>   
  <div class="clearfix"></div>
</section>

<input type="hidden" id="offset" value="8"> 
<script type="text/javascript">
  $(document).ready( function(){
    var url = "{{URL::to('profile/visits/')}}/{{$user['id']}}"
    $.get(url, function(data) {  
          
          $("#visotor").html(data);

    });
  });

  function moreUniqueVisitors(){
        var offset =    $('#offset').val();
        $.ajax({
        type: "GET",
                url: '{{URL::to("profile/more-recent-visitors/")}}/{{$user['id']}}/' +  offset + '/' + 8+'/2',
                cache: false,
                async: false,
                success: function(data)
                {
                if (data)
                {
                $('#allvisitorlists > tbody').append(data)
               
                $('#offset').val(eval(parseInt(offset)+8))
                }

                }
        });
    }
</script>