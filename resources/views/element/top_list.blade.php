<fieldset class="scheduler-border">
            <legend class="scheduler-border"> <h3>Sponsored {{$type}}</h3></legend>
             <div class="row">
                 <div class="col-md-12 col-sm-12">
                    <div class="carousel carousel-showmanymoveone pl150 slide" id="carousel-tilenav" data-interval="2500">
                       <div class="carousel-inner">
                        @php $count =1; $active="active";
                       @endphp
                      @foreach($datas as $data)
                     
                        <?php  $url="";
                               $category_id="";
                               $category_url="";
                                           if(!empty($data->parent_categories))
                                           {
                                             foreach($data->parent_categories as $parent_category){
                                                
                                         $category_url =$parent_category->category_url;
                                       
                                         $category_id =$parent_category->id;
                                              
                                             }
                                          }
                                           
                                          ?>
                     
                          @php if($count%4 == 1 && $count==1)
                                $active = "active";
                               else
                                $active ="";

                                if($type =='Freelancer')
                                    $photo_path = 'freelancer';
                                else if($type == 'Companies')
                                    $photo_path ='company_logo';
                          @endphp
                          @if(!empty($data->user))
                          
                          <div class="item {{$active}}">
                             <div class="col-xs-6 col-sm-4 col-md-2">
                                <a href="{{ url('companydetail/'.$category_url.'/'.$data->company_url)}}"><img src="{{asset('storage/'.$photo_path.'/'.$data->user->logo)}}" class="img-responsive" style="width:100px;height:100px" alt="{{ $data->user->name }}"></a>
                             </div>
                          </div>
                          @endif
                           @php $count++; @endphp
                      @endforeach
                       </div>
                       <a class="left carousel-control" href="#carousel-tilenav" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                       <a class="right carousel-control" href="#carousel-tilenav" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                 </div>
              </div>
        </fieldset>