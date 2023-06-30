<!--brand-section start-->
<div class="brand-section"> 
  <!--container start-->
  <div class="container">
     <div class="row">
         <div class="col-md-12 col-sm-12">
                    <div class="carousel carousel-showmanymoveone pl150 slide" id="carousel1" data-interval="2500">
                       <div class="carousel-inner">
                         @php $count =1; $active="active";@endphp
                          @foreach($logo_slider_companies->companies as $company)
                          <?php  $url="";
                               $category_id="";
                               $category_url="";
                                           if(!empty($company->parent_categories))
                                           {
                                             foreach($company->parent_categories as $parent_category){
                                         $category_url =$parent_category->category_url;
                                       
                                         $category_id =$parent_category->id;
                                              
                                             }
                                          }
                                           
                                          ?>
                              @php if($count%4 == 1 && $count==1)
                                    $active = "active";
                                   else
                                    $active ="";
                              @endphp  
                              @if(!empty($company->user))
                                    <div class="item {{$active}}">
                                        <div class="col-xs-6 col-sm-4 col-md-2">
                                        <a href="{{ url($company->company_url)}}"><img src="{{asset('storage/company_logo/'.$company->user->logo)}}" class="img-responsive" style="padding:20px;"></a>
                                         </div>
                                      </div>
                              @endif      
                           @php $count++; @endphp
                        @endforeach
                       </div>
                       <a class="left carousel-control" href="#carousel1" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                       <a class="right carousel-control" href="#carousel1" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                    </div>
                 </div>        
  

      </div>
  </div>
  <!--container end--> 
</div>
<!--brand-section end-->