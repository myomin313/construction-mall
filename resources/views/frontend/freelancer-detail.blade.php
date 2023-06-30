@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Freelancer Detail')
@section('content')

<div class="freelancers">
    @include('admin.element.success-message')
    @if(session()->has('message'))
    <script>
    var message= "{{ session()->get('message') }}";
    //var url = "{{ route('blogcategory.index') }}";
    callbackWarning(message);
    </script>
@endif
 @if(session()->has('messageComment'))
    <script>
    var message= "{{ session()->get('messageComment') }}";
 callbackSuccess(message);
    </script>
@endif
<style>
/*    .blog-inter ul li{*/
/*   list-style-type:square !important; */
/*}*/
/*.blog-inter ol li{*/
/*   list-style-type:roman !important;  */
/*}*/
</style>



   <section class="inner-heading"  style="background: url('{{ asset('storage/freelancer/'.$projectsetting->freelancer_detail_image)}}') 100%;">
    <div class="container">
    <h1>{{ $freelancer->name }}' Detail</h1>
      <ul class="xs-breadcumb">
        <li><a href="{{ url('/professionals')}}" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;">Professionals / </a><a href="{{ url('/professionals/'.$freelancer->category_url)}}" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;">{{ $freelancer->category_name}} / </a> {{ $freelancer->name }}</li>
      </ul>
    </div>
  </section>

<!--inner content start-->
    <section class="inner-wrap freelancer_detail">
            <!--container start-->
            <div class="container">
              <div class="row ">
              <!--row start-->
              <ul class="blog-grid">
                <!--col start-->
                <div class="col-md-9 col-sm-12">
                  <li>
                  <div class="blog-inter">
                    <div class="row freelancer_detail_info">
                      <div class="col-md-4 col-sm-4">
                        <figure  style="margin: 0 auto;text-align: center;" >
                         @if($freelancer->logo != null && $freelancer->logo != 'undefined')
                           <img src="{{ asset('storage/freelancer/'.$freelancer->logo) }}" class="img-circle"  alt="{{ $freelancer->name }}"  width="150"  height="150" >
                          @else
                          <img src="{{ asset('storage/freelancer/'.$projectsetting->freelancer_default_logo) }}" class="img-circle"  alt="{{ $freelancer->name }}"  width="150"  height="150" >
                          @endif
                        </figure>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="post-tittle">
                          <h4><a href="#">{{ $freelancer->name }}</a></h4>
                        </div>
                        <ul class="blogDate info">
                          <li><i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> <span>{{ $freelancer->category_name }}</span> </li>
				                      <li> <i class="fa fa-envelope" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> <span>
				                          @if(!empty($freelancer->current_work_status))
				                          {{ $freelancer->current_work_status }} - 
				                          @endif{{ $freelancer->freelancer_status_name }}</span> </li>
				                       <li>  
				                 @if( isset(Auth::user()->id) && (Auth::user()->id != $freelancer->user_id) && Auth::user()->role != 4 && Auth::user()->role != 5)
				                       @foreach ($freelancersrates as $freelancersrate)
                                <?php $stars =$freelancersrate->rate; $stars = round($stars,0)?>
                                  @if($freelancersrate->usercount != 0)

                                            @for($i= 1;$i<=$stars;$i++)
                                              @if($i>5)
                                                  @break(0);
                                              @endif
                                              <i class="fa fa-star rate" value="{{6-$i}}" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>
                                            @endfor
                                            @if(5-$stars > 0)
                                                @for($i=1;$i<=5-$stars;$i++)
                                                    <i class="fa fa-star rate"  value="{{$stars-$i}}" style="color: #acacac"></i>
                                                @endfor
                                          @endif


                                  @else($freelancersrate->usercount == 0)

                                          @if(5-$stars > 0)
                                                @for($i=1;$i<=5-$stars;$i++)
                                                    <i class="fa fa-star rate" style="color: #acacac" value="{{6-$i}}"></i>
                                                @endfor
                                          @endif

                                  @endif

                            @endforeach
                              @else
                                   @foreach ($freelancersrates as $freelancersrate)
                                <?php $stars =$freelancersrate->rate; $stars = round($stars,0)?>
                                  @if($freelancersrate->usercount != 0)

                                            @for($i= 1;$i<=$stars;$i++)
                                              @if($i>5)
                                                  @break(0);
                                              @endif
                                              <i class="fa fa-star" value="{{6-$i}}" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>
                                            @endfor
                                            @if(5-$stars > 0)
                                                @for($i=1;$i<=5-$stars;$i++)
                                                    <i class="fa fa-star"  value="{{$stars-$i}}" style="color: #acacac"></i>
                                                @endfor
                                          @endif


                                  @else($freelancersrate->usercount == 0)

                                          @if(5-$stars > 0)
                                                @for($i=1;$i<=5-$stars;$i++)
                                                    <i class="fa fa-star" style="color: #acacac" value="{{6-$i}}"></i>
                                                @endfor
                                          @endif

                                  @endif

                            @endforeach
                            @endif
				                           </li>
				                             <li><i class="fa fa-map-marker" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i><span> {{ $freelancer->address }} , {{ $freelancer->location_name }}   @if(!empty($freelancer_city->name)),
                                 <?=$freelancer_city->name ?>
                                @endif</span></li>
                                
                                @if(count($freelancerskills) > 0)
				                               <li><i class="fa fa-folder-open" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i><span> @foreach ($freelancerskills as $freelancerskill)
            {{ $freelancerskill->skill_name }},
            @endforeach</span>
				                      </li>
				                      @endif
                        </ul>
										      </div>
										      <div class="col-md-4 col-sm-4">
                  <span class="pull-right freelancer-social">
                     @if(!empty($freelancer->facebook ))
                     <a href="{{ $freelancer->facebook }}"><i class="fa fa-facebook-square" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i></a>
                     @endif
                      @if(!empty($freelancer->twitter))
                     <a href="{{ $freelancer->twitter }}"><i class="fa fa-twitter" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i></a>
                     @endif
                     @if(!empty($freelancer->googleplus))
                     <a href="{{ $freelancer->googleplus }}"><i class="fa fa-google-plus" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i></a>
                     @endif
                     @if(!empty($freelancer->linkedin))
                     <a href="{{ $freelancer->linkedin }}"><i class="fa fa-linkedin-square" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i></a>
                     @endif
                </span>
                <br>
                <div class="mt90">
                  <a id="myBtn" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#freelancer-get-contact" class="freelancer-contact pull-right" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">Get Contact</a>
                </div>
                </div>
            </div>
            <div class="row about_us">
              <div class="col-md-12 col-sm-12">
                  <div class="post-tittle">
                      <h5><a href="#">About Me</a></h5>
                  </div>
                  <div class="col-md-12 col-sm-12"><?php echo $freelancer->description ?></div>
                </div>
              </div>
               </div>
          </li>
          @if(count($freelancerexperiences) != 0)
           <li>
            <div class="row our_service">
              <div class="col-md-12 col-sm-12">
                 <div class="post-tittle">
                    <h4><a href="#">Working Experiences</a></h4>
                  </div>
              </div>
            </div>
          </li>
          <li>

              <!-- start experience -->
              <div class="row experience_list">
                <div class="col-md-12 col-sm-12">
                            <ul class="row blog-grid">
                               @foreach ($freelancerexperiences as $freelancerexperience)
                               <li class="col-md-12 col-sm-12 ">
                                 <div class="blog-inter">
                                  <div class="post-tittle">
                                   <h5>{{ $freelancerexperience->position }}</h5>
                                   <div><span> <i class="fa fa-building" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancerexperience->company }}</span> <span class="pull-right"><i class="fa fa-calendar" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancerexperience->from_date }} ~ {{ $freelancerexperience->to_date }}
                                   </span></div>
                                   <p>
                                      <?php echo $freelancerexperience->description ?>
                                   </p>
                                 </div>
                                </div>
                              </li>
                               @endforeach

                          </ul>
                        </div>
              </div>
             </li>
             @endif
              <!-- end experience -->
              @if(count($freelancereducations) != 0)
             <li>
		            <div class="row education">
		              <div class="col-md-12 col-sm-12">
		                 <div class="post-tittle">
		                    <h4><a href="#">Educations</a></h4>
		                  </div>
		              </div>
		            </div>
          	  </li>
          	  <li>
              <!-- start  education -->
              <div class="row education_list">
              <div class="col-md-12 col-sm-12">
                                <ul class="row blog-grid">
                                  @foreach ($freelancereducations as $freelancereducation)
                                 <li class="col-md-6 col-sm-12">
                                  <div class="blog-inter">
                                    <div class="post-tittle">
                                      <h5>{{ $freelancereducation->education_level }}</h5>
                                    </div>
                                    <ul class="blogDate info">
                                    	<li><i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i><span>{{ $freelancereducation->university }}</span> </li>
                                    	<li><i class="fa fa-calendar" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i> <span>{{ $freelancereducation->from_date }} ~ {{ $freelancereducation->to_date }}
                                   </span></li>
                                  </ul>
                                  </div>
                                </li>
                                @endforeach

                              </ul>
                            </div>
                          </div>
              <!-- end  education-->
             </li>
             @endif
              @if(count($freelancerprojects) != 0)
             <li>
            <div class="row project">
              <div class="col-md-12 col-sm-12">
                 <div class="post-tittle">
                    <h4><a href="#">Project Preference</a></h4>
                  </div>
              </div>
            </div>
          </li>
          <li>
              <!-- start project -->
              <div class="row experience_list">
                <div class="col-md-12 col-sm-12">
                            <ul class="row blog-grid">
                              @foreach ($freelancerprojects as $freelancerproject)
                               <li class="col-md-12 col-sm-12 ">
                                 <div class="blog-inter">
                                  <div class="post-tittle">
                                   <h5>{{ $freelancerproject->project_name }}</h5>
                                   <div><span> <i class="fa fa-building" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i>{{ $freelancerproject->company_name }}</span> <span class="pull-right"><i class="fa fa-calendar" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i>{{ $freelancerproject->project_start_date }} ~ {{ $freelancerproject->project_end_date }}
                                   </span></div>
                                   <p>
                                    <?php echo $freelancerproject->project_detail ?>
                                   </p>
                                 </div>
                                </div>
                              </li>
                              @endforeach
                          </ul>
                        </div>
              </div>
             </li>
             @endif
             <!-- end project -->
             <li>

                 @if(Illuminate\Support\Facades\Auth::check())
                 @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
                    @if(Auth::user()->id != $freelancer->user_id)
                          <div class="row about_us">
                        <div class="col-md-12 col-sm-12">
                            <form action="{{ url('freelancercomments_add/'.$freelancer->id) }}" method="POST" >
                            {{ csrf_field() }}
                            <div class="col-sm-12 form-group">
                            <label for="comments"> Leave comments:</label>
                            <textarea class="form-control" type="textarea" id="comments" placeholder="Please enter your message →"
                            name="comments" maxlength="6000" rows="7"></textarea>
                            </div>
                                  <div class="col-sm-12 form-group">
                                  <button  type="submit" class="btn btn-lg buttoncomment pull-right">Submit Comment</button>
                                  </div>
                            </form>
                        </div>
                      </div>
                         @endif
                         @endif
                         @endif
                       </li>
            @if(count($freelancercomments) != 0)
             <li>
             	<div class="row review_list">
              		<div class="col-md-12 col-sm-12">
                     <div class="blog-inter">
                                     <div class="row review">
                                      <!-- <div class="col-md-12 col-sm-12" style="position:relative;top:10px ">-->
                                        <ul class="blogDate info">

                                           @foreach ($freelancercomments as $freelancercomment)

                                        <li class="col-md-12 col-sm-12">
                                        			<div class="row margin_bordered">
                                        				 <div class="col-md-1 col-sm-12">
                                             <center>
                                             @php if($freelancercomment->role == 2){
                                            $logo ="storage/company_logo/";
                                            if($freelancercomment->logo != null && $freelancercomment->logo !='undefined')
                                              $image=$freelancercomment->logo;
                                              else
                                              if($freelancercomment->category_id == 1)
                                               $image=$projectsetting->service_default_logo;
                                              elseif($freelancercomment->category_id == 2)
                                                $image=$projectsetting->supplier_default_logo;
                                               elseif($freelancercomment->category_id == 3)
                                                $image=$projectsetting->reno_default_logo;
                                            }elseif($freelancercomment->role == 3){
                                            $logo = "storage/freelancer/";
                                              if($freelancercomment->logo != null && $freelancercomment->logo !='undefined')
                                                $image=$freelancercomment->logo;
                                                else
                                                $image=$projectsetting->freelancer_default_logo;
                                            }elseif($freelancercomment->role == 1){
                                            $logo = "storage/user/";
                                              if($freelancercomment->logo != null && $freelancercomment->logo !='undefined')
                                              $image=$freelancercomment->logo;
                                              else
                                              $image=$projectsetting->member_default_logo;
                                            }elseif($freelancercomment->role == 4 || $freelancercomment->role == 5){
                                            $logo = "storage/admin_logo/";
                                            if($freelancercomment->logo != null && $freelancercomment->logo !='undefined')
                                              $image=$freelancercomment->logo;
                                              else
                                              $image=$projectsetting->admin_default_logo;
                                              }
                                            @endphp


                                             <img src="{{ asset($logo.$image) }}"  class="img-circle"
                                                width="50" height="50" alt="{{ $freelancercomment->name }}">
                                               </center>
                                              </div>

                                            <div class="col-md-11 col-sm-12">
													                                  <div class="post-tittle">
													                                   <h5>{{ $freelancercomment->name }}</h5>
											 		                                   <div><span>  @if(!empty($userrating->rate))<i class="fa fa-star" aria-hidden="true"  style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i>
												 {{ $userrating->rate }}
												 @endif</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancer->location_name }}, {{ $freelancercomment->updated_at }}
													                                   </span></div>

                                            @if(Illuminate\Support\Facades\Auth::check() && (Auth::user()->id == $freelancercomment->user_id))
                                               <!--<div class="col-md-2 col-sm-12">-->
                                               <a class="show-modal"  data-comment_id="{{$freelancercomment->id}}"
                                               data-comments="{{ $freelancercomment->comment }}">
                                               <i class="fa fa-edit"  aria-hidden="true"></i>
                                               </a>
                                                  <a href="{{url('freelancercomments_delete/'.$freelancercomment->id) }}" ><i class="fa fa-trash"
                                                  aria-hidden="true" ></i>
                                                </a>
                                               <!--</div>-->
                                              @endif
                                                       <p><?php echo $freelancercomment->comment; ?></p>
													 </div>
                                        			</div>
                                        		</div>
                                         </li>
                                         @endforeach
                                        </ul>
                                  </div>
                                </div>

            															 </div>
            														</div>
            															</li>
  													@endif							 </div>
  			

        <li class="col-md-3 col-sm-12">
          <div class="side-bar" >
            <!--  <div class="side-barBox"> -->
              <div class="side-barBox" >
                 <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">Categories</h5>
                 <ul class="categories">
          @foreach ($categorylists as $category)
                <li class="{{ ($freelancer->category_url == $category->category_url ) ? 'active' : '' }}"><a href="{{ url('professionals/'.$category->category_url)}}">{{ $category->name }}</a></li>
          @endforeach
                            </ul>
                </div>
             <!-- </div> -->
          </div>
          <!-- end advertising -->
          	@foreach($advertisings as $advertising)
          <div class="side-bar">
              <div class="advertise">
                   <a href="{{ $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
              </div>
          </div>
           @endforeach
        </li>

        </ul>
      </li>
     </ul>
    </div>
   </ul>
   <div class="row related">
        <div class="col-md-12 col-sm-12">
           <h1 class="text-center">Similar Professionals</h1>
         </div>
				</div>
				<div class="row related_freelancer">
        <ul class="blog-grid">
           @foreach ($freelancersimilars as $freelancersimilar)
        	 <li class="col-md-3 col-sm-12">
              <div class="blog-inter">
                <figure style="margin: 0 auto;text-align: center">
                <!--<img src="{{ asset('storage/freelancer/'.$freelancersimilar->logo) }}" alt="{{ ucfirst($freelancersimilar->name) }}" class="img-responsive img-circle" style="width: 70%;">-->
                  @if($freelancersimilar->logo != null && $freelancersimilar->logo!='undefined')
                   <img src="{{ asset('storage/freelancer/'.$freelancersimilar->logo) }}" class="img-circle" alt="{{ ucfirst($freelancersimilar->name)}}" width="150 !important" height="150 !important" >
                  @else
                    <img src="{{ asset('storage/freelancer/'.$projectsetting->freelancer_default_logo ) }}" class="img-circle" alt="{{ ucfirst($freelancersimilar->name)}}" width="150 !important" height="150 !important" >
                   @endif
                 </figure>
                <div class="post-tittle">
                  <h4><a href="#">{{ ucfirst($freelancersimilar->name) }}</a></h4>
                </div>
                <ul class="blogDate">
                  <li><span>
                      <!--{{ $freelancersimilar->current_work_status }}-->
                      {{ $freelancersimilar->category_name }}
                  </span> </li>
                  <li><span>{{ $freelancersimilar->freelancer_status_name }}</span> </li>
                  <li> @foreach ($freelancersratesforsimillar as $list)
                                <?php $stars =$list->rate; $stars = round($stars,0)?>
                                  @if($list->usercount != 0)
                                      @if($freelancersimilar->id == $list->freelancer_id)
                                            @for($i= 1;$i<=$stars;$i++)
                                              @if($i>5)
                                                  @break(0);
                                              @endif
                                              <i class="fa fa-star" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>
                                              <!-- <i class="fa fa-star" style="color: @if($stars<3) green @else green @endif"></i> -->
                                            @endfor
                                            @if(5-$stars > 0)
                                                @for($i= 1;$i<=5-$stars;$i++)
                                                    <i class="fa fa-star" style="color: #acacac"></i>
                                                @endfor
                                          @endif
                                      @endif

                                  @else($list->usercount == 0)
                                      @if($freelancersimilar->id == $list->id)
                                          @if(5-$stars > 0)
                                                @for($i= 1;$i<=5-$stars;$i++)
                                                    <i class="fa fa-star" style="color: #acacac"></i>
                                                @endfor
                                          @endif
                                      @endif
                                  @endif
                            @endforeach
                      <span class="pull-right"> <i class="fa fa-map-marker" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i >{{ $freelancersimilar->locationName }}</span>
                  </li>
                  <li><i class=" fa fa-folder-open" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> <span> {{ $freelancersimilar->skill_name }}</span> </li>
                  <li class=" pull-right">
                        <a href="{{ url('professionals-detail/'.$freelancersimilar->freelancer_url)}}" class="btn btn-xs more_btn" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">More Info</a>
                  </li>
                  <div class="clearfix"></div>
                </ul>
              </div>
          </li>
          @endforeach
        </ul>
    </div>
  </div>
</section>
<!--inner content end-->

<!--brand-section start-->
@include('element.company_logo_slider')
<!--contact modal start-->
          <div id="freelancer-get-contact" class="modal fade bs-example-modal-md-3" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-md-2" role="document">
                <div class="modal-content">
                     <div class="modal-header">
                  <!--<div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a>-->
                  <!--<span data-dismiss="modal" aria-hidden="true"  class="close">×</span>-->
                  <h4 class="modal-title"  id="myModalLabel">To Contact</h4>
                  </div>
                   <div class="modal-body">
                       @if(!empty($freelancer->phone))
                  <p><i class="fa fa-phone fa-lg"></i> <a href="tel:{{ $freelancer->phone }}" class="text-orange">{{ $freelancer->phone }}</a></p>
                  @endif
                  @if(!empty($freelancer->email))
                  <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto: {{ $freelancer->email }}" class="text-orange">{{ $freelancer->email }}</a></p>
                  @endif
                  <p style="color:black !important"><i class="fa fa-address-book" aria-hidden="true"></i>{{ $freelancer->address }},{{ $freelancer->location_name }}</p>
                  </div>
                 <div class="modal-footer"> <span><a class="btn  pull-right" data-dismiss="modal" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">close</a></span> </div>
                  </div>
                </div>
          </div>
<!--brand-section end-->

  <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                       <form action="{{ route('freelancercomments_edit') }}" method="POST" >
                            {{ csrf_field() }}
                       <div class="col-sm-12 form-group">
                            <label for="comments"> Comments:</label>
                            <input type="hidden"  id="comment_id" name="comment_id"></input>
                            <textarea class="form-control"  type="textarea" val="" id="freelancercomments"  placeholder="Your Comments →" name="comment" maxlength="6000" rows="7"></textarea>
                            </div>
                                  <div class="col-sm-12 form-group">
                                  <button   type="submit"  class="btn btn-lg buttoncomment pull-right">Update Comment</button>
                                      <!-- <input  type="submit"   value="Submit Comment →"  class="btn btn-lg btn-warning pull-right"> </input>  -->
                                  </div>
                        </form>
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end-->
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>

  /* Show Event  */
  $(document).on('click', '.show-modal', function() {
                    $('.modal-title').text('You can update comments!');
                    $('textarea#freelancercomments').text($(this).data('comments'));
                    $('#comment_id').val($(this).data('comment_id'));
                    $('#showModal').modal('show');
                });
                
                $(document).ready(function(){ 
       $("i.rate").click(function(){
            var radioValue = $(this).attr('value');
            if(radioValue){
                // alert("Your are a - " + radioValue);
                $.ajax({ 
                            url: "{{ url('freelancerrating/'.$freelancer->id)}}",
                            type: 'POST',
                            data: {'radioValue' : radioValue},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                var message = data.success;
                               window.location= window.location.href;
                            },
                            error:function(e)
                            {
                               // var message = "Something Wrong!";
                                //callbackFailure(message);
                                console.log(e);  
                            }
                            });
            }
           
        });

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
         
                                callbackSuccess(msg);
     // alert(msg);
    }  
    });

</script>


