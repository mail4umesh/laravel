@if(count($recentVisitor)>0)
            @foreach($recentVisitor as $key=>$value)  
            <tr>
                <td><img src="{{URL::asset('/assets/images/country_flag')}}/{{str_replace(' ','-',$value['country'])}}.png"> {{$value['country']}} </td>
                <td>{{$value['region']}}</td>
                <td>{{$value['city']}}</td>
                <td>{{$value['keywords']}} </td>
                <td>{{$value['source_site']}} </td>
                <td>{{$value['device']}}</td>
                <td><?php 
                $dtArr = explode(' ',  Helper::showTimeAgo($value['visit_date']));
                echo $dtArr[0].' '.$dtArr['1'].' ago';
                ?>

                      </td>
            </tr>
         @endforeach
        @else
        <tr>
            <td colspan="7">  No record found! </td>
        </tr>
        @endif