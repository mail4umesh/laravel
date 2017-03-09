@if(count($recentVisitor)>0)
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
            <td colspan="7">  No record found! </td>
        </tr>
        @endif