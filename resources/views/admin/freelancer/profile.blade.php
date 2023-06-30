@extends('layouts.freelancer_panel')
@section('content') 


<body class="freelancers">
<!--    @if(session()->has('message'))-->
<!--<script>-->
<!--    var message= "{{ session()->get('message') }}";-->
<!--    callbackWarning(message);-->
<!--</script>-->
<!--@endif-->
@include('admin.element.success-message')
 @if(session()->has('messageComment'))
<script>
    var message= "{{ session()->get('messageComment') }}";
    callbackSuccess(message);
</script>
@endif
<style>
    .blog-inter ul{
         list-style-type:square !important; 
    }
     .card-avatar .btn{
        font-size:8px;
        padding:4px 6px 4px 6px !important;
        position:absolute;
        z-index:100;
        top:45% !important;
        margin-left: -32px;
    }
    .freelancer-profile-form {
    padding: 30px;
    overflow: hidden;
   }
   
   .note-editor.note-frame .note-editing-area .note-editable {
    padding: 20px !important;
}
</style>
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
   @include('element.header')
<!--main-header end--> 
  <!--main-header end--> 
   <section class="inner-heading"  style="background: url('{{ asset('storage/freelancer/'.$projectsetting->freelancer_detail_image)}}') 100%;">
    <div class="container">
    <h1>{{ $freelancer->user->name }}'s Profile</h1>
     
    </div>
  </section>
   
<!--inner content start-->
    <section class="inner-wrap freelancer_detail"> 
            <!--container start-->
            <div class="container">
              <div class="row">
              <!--row start-->
              <ul class="blog-grid">        
                <!--col start-->
               
                <!-- end change -->
                <div class="col-md-9 col-sm-12">
                  <li>
                  <div class="blog-inter">
                    <div class="row freelancer_detail_info">
                         <div class=" col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-6 col-xs-9">
                             
                              @if(empty($freelancer->freelancer_status_id))
                                <p class="text-center"><span  class="text-error-danger">*</span>  Please click  EDIT  to fill required information  in order to show public your profile. <span class="text-error-danger">*</span></p>
                        @endif
                         </div>
                         <div class="col-md-2 col-sm-2 col-xs-3">
                             <span class="pull-right freelancer-social">
                            <a class="profileupdate">
                            <i class="fa fa-pencil" aria-hidden="true"
                            style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>EDIT</a></span> 
                         </div>
                                                                 
                      <div class="col-md-12 col-sm-12">
                        <figure  style="margin: 0 auto;text-align: center;" >
                         <!--@if($freelancer->logo != null && $freelancer->logo != 'undefined')-->
                         <!--  <img src="{{ asset('storage/freelancer/'.$freelancer->logo) }}" class="img-circle"  alt="{{ $freelancer->name }}"  width="150"  height="150" >-->
                         <!-- @else-->
                         <!-- <img src="{{ asset('storage/freelancer/'.$projectsetting->freelancer_default_logo) }}" class="img-circle"  alt="{{ $freelancer->name }}"  width="150"  height="150" >-->
                         <!-- @endif-->
                          <!--start-->
                          <div class="card-avatar">
                           @if($freelancer->user->logo != null)
                          <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">          
                        <img src="{{ url('storage/freelancer/'.$freelancer->user->logo) }}" style="width:150px;height:150px" class="img-circle" alt="" style="width:150px;height: 150px">
                        @if(Auth::user()->role != 4 && Auth::user()->role != 5)
                        <label   class="btn btn-sm btn-info" for="image_file">
                             <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                            @endif
                        @else
                       
                        @if(Auth::user()->role != 4 && Auth::user()->role != 5)
                        <!--<a data-dismiss="modal" aria-label="Close"  data-toggle="modal" data-target="#uploadupdateModal">-->
                        <!-- <img src="{{ asset('storage/freelancer/freelancer_noimage.png') }}" id="current_profile_photo" class="img-circle" alt="" style="width:150px;height: 150px">-->
                        <!--  </a>-->
                          <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">
                           
                            <img src="{{ url('storage/freelancer/'.$projectsetting->freelancer_default_logo) }}" style="width:150px;height:150px" class="img-circle" id="current_profile_photo" alt="" style="width:150px;height: 150px">
                          <label   class="btn btn-sm btn-info" for="image_file">
                             <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                        <!--<a data-dismiss="modal" aria-label="Close" for="image_file" data-toggle="modal" >-->
                        
                        <!-- </a>-->
                          @else
                           <img src="{{ url('storage/freelancer/'.$projectsetting->freelancer_default_logo) }}" style="width:150px;height:150px" class="img-circle" id="current_profile_photo" alt="" style="width:150px;height: 150px">
                          <p></p>
                         @endif
                        @endif
                        </div>
                          <!--end-->
                          <!--<span class="pull-right freelancer-social">-->
                          <!--  <a class="profileupdate">-->
                          <!--  <i class="fa fa-pencil" aria-hidden="true"-->
                          <!--  style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>EDIT-->
                          <!--  </a></span>-->
                          <h4><a href="#">{{ $freelancer->user->name }}</a></h4>
                            <div>{{ $freelancer->current_work_status }}</div>
                            @if(!empty($freelancer->freelancerstatus->freelancer_status_name))
                           <div>{{ $freelancer->freelancerstatus->freelancer_status_name }}</div>
                           @endif
                          
                          <div>
                     @if(!empty($freelancer->facebook ))
                     <a href="{{ $freelancer->facebook }}"><i class="fa fa-facebook-square" aria-hidden="true" style="color:{{ $projectsetting->  freelancer_nav_first_background_and_icon }} !important;"></i></a>
                     @endif
                      @if(!empty($freelancer->twitter))
                     <a href="{{ $freelancer->twitter }}"><i class="fa fa-twitter" aria-hidden="true" style="color:{{ $projectsetting-> freelancer_nav_first_background_and_icon }} !important;"></i></a>
                     @endif
                     @if(!empty($freelancer->googleplus))
                     <a href="{{ $freelancer->googleplus }}"><i class="fa fa-google-plus" aria-hidden="true" style="color:{{ $projectsetting->  freelancer_nav_first_background_and_icon }} !important;"></i></a>
                     @endif
                     @if(!empty($freelancer->linkedin))
                     <a href="{{ $freelancer->linkedin }}"><i class="fa fa-linkedin-square" aria-hidden="true" style="color:{{ $projectsetting->  freelancer_nav_first_background_and_icon }} !important;"></i></a>
                     @endif
                </div>
                        </figure>
                        
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <!--<div class="row" style="padding:5px;border-bottom:1px solid #ACACAC">-->
                            <div class="row" style="padding:5px;">
                         <span class="col-md-4 col-sm-12">
                            <i class="fa fa-envelope-square" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancer->user->email }}
                            @if(!empty($freelancer->email))
                            , {{ $freelancer->email }}
                            @endif
                         </span>
                         @if(!empty($freelancer->nrc ))
                         <span class="col-md-4 col-sm-12">
                            <i class="fa fa-credit-card" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>
                            {{ $freelancer->nrc }}
                         </span>
                         @endif
                          @if(!empty($freelancer->address ))
                         <span class="col-md-4 col-sm-12">
                             <i class="fa fa-map-marker" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancer->address }}
                              @if(!empty($freelancer->location->name)),
                            <?= $freelancer->location->name ?>
                             @endif
                               @if(!empty($freelancer_city->name)),
                                 <?=$freelancer_city->name ?>
                                @endif
                         </span>
                         @endif
                         <span class="col-md-4 col-sm-12">
                             <i class="fa fa-phone" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancer->user->phone }}
                         </span>
                         @if(!empty($freelancer->date_of_birth ))
                         <span class="col-md-4 col-sm-12">
                             <i class="fa fa-birthday-cake" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancer->date_of_birth }}
                         </span> 
                         @endif
										      </div>
                         </div>
                          <div class="col-md-12 col-sm-12">
                             <!--<div class="row" style="padding:5px;border-bottom:1px solid #ACACAC">-->
                                 <div class="row" style="padding:5px;">
                             @if(!empty($freelancer->current_work_status ))
                              <div class="col-md-4 col-sm-12">
                                 <span><b>Current Working Status</b></span><br>
                                 <span>{{ $freelancer->current_work_status }} </span>
                              </div>
                              @endif
                              @if(!empty($freelancer->total_experiences ))
                              <div class="col-md-4 col-sm-12">
                                 <span><b>Experience Years</b></span><br>
                                 <span>{{ $freelancer->total_experiences }}</span>
                              </div>
                              @endif
                              @if(!empty($freelancer->category->name))
                              <div class="col-md-4 col-sm-12">
                                 <span><b>Job Category</b></span><br>
                                 <span>{{  $freelancer->category->name ?   $freelancer->category->name :'' }}</span>
                              </div>
                               @endif
                             </div>                            
                          </div>
										      
            </div>
            <div class="row about_us">
              <div class="col-md-12 col-sm-12">
                  <div class="post-title">
                      <h5><a href="#">About Me</a></h5>
                  </div>
                  <div class="col-md-12 col-sm-12"><?php echo $freelancer->description ?></div>
                </div>
              </div>
               </div>
          </li>
          <li>
               <div class="row our_service">
              <div class="col-md-12 col-sm-12">
                 <div class="post-title">
                    <h4><a href="#">Freelancer Skills</a>                      
                  <span class="pull-right freelancer-social">
                    <a class="addSkillBtn">
                   <i class="fa fa-plus" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>ADD
                 </a></span>
                    </h4>
                  </div>
              </div>
            </div>
          </li>
          <li>
            <div class="row experience_list">              
                 <div class="col-md-12 col-sm-12">
                  <ul class="row blog-grid"> 
                  @foreach($freelancer_skills as $skill)
                    <li class="col-md-12 col-sm-12 ">
                                 <div class="blog-inter">
                                  <div class="post-title">                 
                  <h5>{{ $skill->skill_name }}
                                    <span class="pull-right freelancer-social">

                                <a type="button"  href="{{  route('freelancer.skill.delete', ['id' =>  $skill->id  ]) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="fa fa-trash" aria-hidden="true"
                            style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>DELETE</a>

                            <a skill_id="{{ $skill->id }}" 
                            skill_name="{{ $skill->skill_name }}" class="editSkillBtn"><i class="fa fa-pencil" aria-hidden="true"
                            style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>EDIT</a></span>
                                   </h5>
                                   </div>
                                   </div>
                                   </li>                                 
                                   @endforeach
                                   </ul>
                   </div>             
            </div>
          </li>
           <li>
            <div class="row our_service">
              <div class="col-md-12 col-sm-12">
                 <div class="post-title">
                    <h4><a href="#">Working Experiences</a>                      
                  <span class="pull-right">
                   <a class="addExperienceBtn">                  
                    <i class="fa fa-plus" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>ADD
                   </a>
                 </span>
                    </h4>
                  </div>
              </div>
            </div>
          </li>
          <li>
               
              <!-- start experience -->
              <div class="row experience_list">
                <div class="col-md-12 col-sm-12">
                            <ul class="row blog-grid">
                               @foreach($freelancer_experiences as $freelancerexperience)
                               <li class="col-md-12 col-sm-12">
                                 <div class="blog-inter">
                                  <div class="post-title">
                                   <h5>{{ $freelancerexperience->position }}
                                    <span class="pull-right freelancer-social">
                                       <a type="button" href="{{  route('freelancer.experience.delete', ['id' =>  $freelancerexperience->id  ]) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"
                            style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>DELETE</a>

                            <a id="{{ $freelancerexperience->id }}" class="editBtn"><i class="fa fa-pencil" aria-hidden="true"
                            style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>EDIT</a></span>
                                   </h5>
                                      
                                   <div><span> <i class="fa fa-building" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancerexperience->company }}</span> <span class="pull-right freelancer-social"><i class="fa fa-calendar" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancerexperience->from_date }} ~ {{ $freelancerexperience->to_date }}
                                   </span></div>
                                   <div style="padding:10px">
                                      <?php echo $freelancerexperience->description ?>
                                   </div>
                                 </div>
                                </div>
                              </li> 
                               @endforeach 
                               
                          </ul>
                        </div>
              </div>
             </li>
              <!-- end experience -->
             <li>
		            <div class="row our_service">
		              <div class="col-md-12 col-sm-12">
		                 <div class="post-title">
		                    <h4><a href="#">Educations</a>                 
                      <span class="pull-right freelancer-social">
                        <a class="addEducationBtn">
                            <i class="fa fa-plus" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>ADD
                          </a></span>
                        </h4>
		                  </div>
		              </div>
		            </div>
          	  </li>
          	  <li>
              <!-- start  education -->
              <div class="row education_list">
              <div class="col-md-12 col-sm-12">
                                <ul class="row blog-grid">
                                  @foreach ($freelancer_educations as $freelancereducation)
                                 <li class="col-md-6 col-sm-12">
                                  <div class="blog-inter">
                                    <div class="post-title">
                                      <h5>{{ $freelancereducation->name }} ( {{ $freelancereducation->education_level }} )
                                        <span class="pull-right freelancer-social">
                              <a type="button" href="{{  route('freelancer.education.delete', ['id' =>  $freelancereducation->id  ]) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>DELETE</a>

                            <a education_id="{{ $freelancereducation->id }}"  class="editeducationBtn"><i class="fa fa-pencil" aria-hidden="true"
                            style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>EDIT</a></span>
                                      </h5>
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
             <li>
            <div class="row our_service">
              <div class="col-md-12 col-sm-12">
                 <div class="post-title">
                    <h4><a href="#">Project Preference</a>
                       <span class="pull-right freelancer-social">                     

                        <a class="addProjectBtn">
                   <i class="fa fa-plus" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>ADD
                 </a></span>
                    </h4>
                  </div>
              </div>
            </div>
          </li>
          <li>
              <!-- start project -->
              <div class="row experience_list">
                <div class="col-md-12 col-sm-12">
                            <ul class="row blog-grid">
                              @foreach ($freelancer_projects as $freelancerproject)
                               <li class="col-md-12 col-sm-12">
                                 <div class="blog-inter">
                                  <div class="post-title">
                                   <h5>{{ $freelancerproject->project_name }}
                                     <span class="pull-right freelancer-social">
                                      <!-- start -->
                                       <a type="button" href="{{  route('freelancer.project.delete', ['id' =>  $freelancerproject->id  ]) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"
                            style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>DELETE</a>
                                      <!-- end -->
                                      <a project_id="{{ $freelancerproject->id }}"  class="editprojectBtn">
                            <i class="fa fa-pencil" aria-hidden="true"
                            style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>EDIT</a></span>
                                   </h5>
                                   <div><span> <i class="fa fa-building" aria-hidden="true" style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"></i>{{ $freelancerproject->company_name }}</span> <span class="pull-right"><i class="fa fa-calendar" aria-hidden="true" style="color:{{ $projectsetting->	freelancer_nav_first_background_and_icon }} !important;"></i> {{ $freelancerproject->project_start_date }} ~ {{ $freelancerproject->project_end_date }}
                                   </span></div>
                                   <div style="padding:10px">
                                    <?php echo $freelancerproject->project_detail ?>
                                   </div>
                                 </div>
                                </div>
                              </li> 
                              @endforeach
                          </ul>
                        </div>
              </div>
             </li>
           </div>
             <!-- end project -->
              <!-- start change -->
                <li class="col-md-3 col-sm-12"> 
               @include('admin.freelancer.freelancer_menu')
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
      <!-- </li>
     </ul> -->
   <!--  </div>
   </ul> -->
 </div>
<!-- </ul>
</div> -->
<!-- </div> -->

  <!-- </div>
</section> -->
<!--inner content end--> 

<!--brand-section start-->
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
      <p><i class="fa fa-phone fa-lg"></i> <a href="tel:{{ $freelancer->phone }}" class="text-orange">{{ $freelancer->phone }}</a></p>
      <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto: {{ $freelancer->email }}" class="text-orange">{{ $freelancer->email }}</a></p>
      <p style="color:black !important"><i class="fa fa-address-book" aria-hidden="true"></i>{{ $freelancer->address }},{{ $freelancer->location_name }}</p>
      </div>
     <div class="modal-footer"> <span><a class="btn btn-orange pull-right" data-dismiss="modal">close</a></span> </div>
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
                            <input type="hidden"  id="comment_id" name="comment_id">
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
      <!-- start  profile update -->
      <!--experience-modal start-->
            <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="profileupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update </h2>
                     <!--<div class="row">-->
                     <!--             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                                                       <form action="#" class="freelancer-profile-form"  id="basicForm"  enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                            <div class="row">
                                                                
                                                               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Name</label><span class="text-error-danger"> * </span>
                                                                    <input name="name" id="name" type="text" class="form-control edit_name" value="{{ auth()->user()->name }}" placeholder="Name">
                                                                   <div id="freelancernameError" class="error"></div>
                                                                </div>
                                                              </div>
                                                               <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 <label>Phone</label><span class="text-error-danger"> * </span>
                                                                    <input name="phone" id="phone" type="text" class="form-control edit_phone" value="{{ auth()->user()->phone }}" placeholder="Phone">
                                                                     <div id="phoneError" class="error"></div>
                                                                </div>
                                                            </div>
                                                                <div class="row"> 
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Date Of Birth</label>
                                                                    <input class="form-control" type="text" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="{{ $freelancer->date_of_birth }}">
                                                                    <div class="error"></div>
                                                                 </div>
                                                                
                                                                
                                                                      
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>NRC</label>
                                                                    <input type="text" id="nrc" class="form-control" name="nrc" value="{{ $freelancer->nrc }}" placeholder="NRC">
                                                                    <div class="error"></div>
                                                                </div>
                                                                </div>
                                                                 <div class="row">
                                                                 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>City</label>
                                                                    <select class="form-control" id="city_id" name="city_id">
                                                                        <?php
                                                                        foreach($cities as $city){
                                                                        if(!empty($freelancer_city))
                                                                        if($freelancer_city->id == $city->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                        else
                                                                          $selected ="";
                                                                          ?>
                                                                       <option value={{$city->id}} <?=$selected?>>{{$city->name}}</option>
                                                                      <?php } ?>
                                                                    </select>
                                                                </div>
                                                       
                                                                 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Township</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_townshipid" id="township_id" name="township_id">
                                                                        <option value="">Township</option>
                                                                        
                                                                        
                                                                      
                                                                      
                                                                      <?php
                                    foreach($townships as $township){
                                        
                                if(($freelancer_city)){
                                    $freelancer_city_id = $freelancer_city->id;
                                    }else{
                                          $freelancer_city_id = 1; 
                                        }
                                          
                                        if($township->parent_id == $freelancer_city_id){                                                                           if($township->id == $freelancer->location_id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                          ?>
                                                                          <option value={{$township->id}}" <?=$selected?>>{{$township->name}}
                                                                          </option>
                                                                      <?php }} ?>
                                                                       
                                                                    </select>
                                                                     <div id="township_idError" class="error"></div>
                                                                </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Address</label>
                                                                  <input type="text" class="form-control" id="freelancer_address" name="address" placeholder="address" value="{{ $freelancer->address }}">
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Category</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_freelancer_category_id" id="freelancer_category_id" name="freelancer_category_id">
                                                                    <option value="">Category</option>
                                                                        <?php
                                                                        foreach($freelancercategories as $category){
                                                                        if(!empty($freelancer->category_id))
                                                                        if($freelancer->category_id == $category->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                        else
                                                                          $selected ="";
                                                                          ?>
                                                                       <option value={{$category->id}} <?=$selected?>>{{$category->name }}</option>
                                                                      <?php } ?>
                                                                    </select>
                                                                     <div id="freelancer_category_idError" class="error"></div>
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Freelancer Status</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_freelancer_status_id" id="freelancer_status_id" name="freelancer_status_id">
                                                                        <option value="">Freelancer Status</option>
                                                                       

                                                                        <?php
                                                                        foreach($freelancer_statuses as $freelancer_status){
                                                                        if(!empty($freelancer->freelancer_status_id))
                                                                        if($freelancer->freelancer_status_id == $freelancer_status->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                        else
                                                                          $selected ="";
                                                                          ?>
                                                                       <option value={{$freelancer_status->id}} <?=$selected?>>{{$freelancer_status->freelancer_status_name}}</option>
                                                                      <?php } ?>

                                                                    </select>
                                                                     <div id="freelancer_status_idError" class="error"></div>
                                                                </div>
                                                                
                                                                
                                                                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                  <label>Total Experience</label>
                                                                    <input type="number" id="total_experiences" class="form-control" placeholder="Total Experiences" name="total_experiences" value="{{ $freelancer->total_experiences }}">
                                                                    <div  class="error"></div>
                                                                   </div>
                                                                  </div>
                                                                   <div class="row">
                                                                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Current Works</label>
                                                                    <input type="text" class="form-control edit_current_work_status" placeholder="Current Works" id="current_work_status" name="current_work_status"  value="{{ $freelancer->current_work_status }}">
                                                                   <!--  <div id="current_work_statusError" class="error"></div> -->
                                                                  </div>
                                                                 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Currently Working Company Name</label>
                                                                    <input type="text" class="form-control" id="freelancer_company" name="freelancer_company" placeholder="company name" value="{{ $freelancer->freelancer_company }}">
                                                                </div>
                                                                </div>
                                                                   <div class="row">
                                                                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Currently Woring company From this website</label>
                                                                    
                                                                    <select class="form-control" id="company_id" name="company_id">
                                                                        <option value="">Company Name</option>
                                                                        <?php
                                                                        
                                    
                                                                       
                                                                        foreach($companies as $company){
                                                                           
                                                                        if(!empty($freelancer->company_id))
                                                                        if($freelancer->company_id == $company->id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                        else
                                                                          $selected ="";
                                                                          ?>
                                                                       <option value={{$company->id}} <?=$selected?>>{{$company->name}}</option>
                                                                      <?php } ?>
                                                                  
                                                                   
                                                                    </select>
                                                                    
                                                                    
                                                                </div>
                                                               
                                                                
                                                                 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Facebook</label>
                                                                    <input type="text" class="form-control edit_facebook" id="facebook" name="facebook" placeholder="Eg.https://www.facebook.com/your_account_id" value="{{ $freelancer->facebook }}">
                                                                <div id="facebookError" class="error"></div>
                                                                </div>
                                                                </div>
                                                                <div class="row"> 
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Twitter</label>
                                                                    <input type="text" class="form-control edit_twitter" id="twitter" name="twitter" placeholder="Eg.http://twitter.com/username" value="{{ $freelancer->twitter }}">
                                                               <div id="twitterError" class="error"></div> 
                                                                </div>
                                                            
                                                              
                                                               <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label>Website</label>
                                                                    <input type="text" class="form-control edit_website" id="website" name="website" placeholder="Eg.https://myanbox.com" value="{{ $freelancer->website }}"> 
                                                                     <div id="websiteError" class="error"></div>
                                                                </div>
                                                                </div>
                                                                 <div class="row">
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Google Plus</label>
                                                                    <input type="text" class="form-control edit_googleplus" id="googleplus" name="googleplus" placeholder="Eg.http://www.google.com" value="{{ $freelancer->googleplus }}">
                                                                 <div id="googleplusError" class="error"></div>
                                                                </div>
                                                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label>Linkedin</label>
                                                                    <input type="text" class="form-control edit_linkedin" id="linkedin" name="linkedin" placeholder="Eg.https://www.linkedin.com/in/yourname" value="{{ $freelancer->linkedin }}">
                                                                 <div id="linkedinError" class="error"></div>
                                                                </div>
                                                               </div>
                                                               <div class="row">
                                                                <div class="form-group  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label for="description">About me</label> 
                                                               <textarea name="description" id="freelancer_description" style="background-color: #F5F5F5 !important"><?= $freelancer->description; ?></textarea>
                                                                </div> 
                                                                </div>

                                                       

                                                         <input type="hidden" name="information_type" value="basic">
                                                        <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <center>
                                                                    <button id="btn_basicform" type="submit" class="btn btn-standard" >Update</button>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                           <!--</div>-->
                  <!--</div>-->
          </div>
        </div>
      </div>
      <!-- end profile update -->

      <!--experience-modal start-->
            <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="experienceupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Experience</h2>
                     <div class="row">
                                  <div class="col-lg-12 col-md-12">
                                                        <form  id="updateexperienceForm" class="freelancer-profile-form">
                                                            <div class="col-lg-6 col-md-6">
                                                            {{csrf_field()}}
                                                          <input type="hidden" name="information_type" value="experience">
                                                            <input type="hidden" id="experience_id" name="experience_id" >
                                                            <div class="form-group"> 
                                                                 <label>Position</label><span class="text-error-danger"> * </span>
                                                                <input type="text" id="position" class="form-control edit_position_modal" placeholder="eg.Civil Engineer"  name="position">
                                                                <div id="_positionforexperienceError" class="error"></div>
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                            <div class="form-group"> 
                                                                 <label>Company</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_company_modal" placeholder="M square Co.,Ltd" name="company" id="company">
                                                                <div id="_companynameError" class="error"></div>
                                                                
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="text" id="from_date" class="form-control edit_from_date_modal" name="from_date" placeholder="eg.2020-01" > 
                                                                <div id="_from_dateforexperienceError" class="error"></div>
                                                            </div>
                                                        </div>
                                                        
                                                            <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="text" class="form-control edit_to_date_modal" name="to_date" placeholder="eg.2020-01"  id="to_date">
                                                                  <div id="_to_dateforexperienceError" class="error"></div>
                                                           </div>
                                                        </div>
                                                         <div class="col-lg-12 col-md-12">
                                                           <label>Description</label>
                                                           <div class="form-group">
                                                             <textarea name="experience_description" id="update_experience_description" class="summernote" style="background-color: #F5F5F5 !important">
                                                             </textarea>
                                                            </div> 
                                                          </div>
                                                            <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                     <center>
                                                                    <button id="btn_updateexperienceform" type="submit" class="btn btn-standard" >Update</button>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         </form>
                           </div>
                  </div>
          </div>
        </div>
      </div>
<!--experience-modal end-->
<!-- project-modal  -->
<!--project-modal start-->
            <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="projectupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Project</h2>
                     <div class="row">
                                                    <div class="col-lg-12 col-md-12">                           
                                            <form  id="updateprojectForm" class="freelancer-profile-form">
                                            <div class="col-lg-6 col-md-6">
                                                             {{csrf_field()}}
                                                            <input type="hidden" id="project_id" name="project_id" >

                                                    <div class="form-group"> 
                                                                 <label>Project Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_project_name_modal" placeholder="eg.Civil Engineer" value="" id="project_name" name="project_name">
                                                                <div id="edit_project_name_modalError" class="error"></div>
                                                            </div> 

                                                            <div class="form-group"> 
                                                                 <label>Company Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_company_name_modal" placeholder="eg.M suquare Co.,Ltd" id="company_name" name="company_name" value="">
                                                                <div id="edit_company_name_modalError" class="error"></div>
                                                            </div>

                                                             <div class="form-group">
                                                                <label>Project Start Date</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_project_start_date_modal" name="project_start_date" id="project_start_date" placeholder="eg.2021-07-08" value="" autocomplete="off"> 
                                                                <div id="edit_project_start_date_modalError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Project End Date</label><span class="text-error-danger"> * </span>
                                                        <input type="text" class="form-control edit_project_end_date_modal" name="project_end_date" placeholder="eg.2021-07-08" id="project_end_date" value="" autocomplete="off">
                                                        <div id="edit_project_end_date_modalError" class="error"></div>
                                                           </div>

                                                            <div class="form-group">
                                                                <label>Project Link</label>
                                                                <input type="text" class="form-control edit_projectlink_modal" name="project_link" id="project_link" placeholder="eg.http://www.facebook.com" value=""> 
                                                                <div id="edit_projectlink_modalError" class="error"></div>
                                                            </div>

                                                              <input type="hidden"  name="information_type" value="project">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>Description</label><span class="text-error-danger"> * </span>
                                                              <textarea name="project_detail" class="edit_project_detail_modal" id="edit_project_detail">
                                                                   
                                                              </textarea> 
                                                               <div id="edit_project_detail_modalError" class="error"></div>
                                                           </div>
                                                            
                                                        </div>
                                                              <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <center>
                                                                    <button id="btn_updateprojectform" type="submit" class="btn btn-standard">Update</button>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         </form>
                                                      </div>
                                                    </div>
         
             
           
          </div>
        </div>
      </div>
<!--project-modal end-->
<!-- project modal -->
<!-- education start -->
 <!--education-modal start-->
            <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="educationupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Education</h2>
                     <div class="row">
                           
                                                    
                                                        <form id="updateeducationForm" class="freelancer-profile-form">
                                                            <div class="col-lg-6 col-md-6">
                                                            {{csrf_field()}}
                                                             <input type="hidden" name="information_type" value="education">
                                                            <input type="hidden" id="education_id" name="education_id" >
                                                <div class="form-group"> 
                                                                
                                                                 <label>Subject Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_subjectname_modalEducation" placeholder="Subject name(eg.Law)" id="subject" value="" name="name">
                                                            <div id="nameEducationModalError" class="error"></div>
                                                             </div>
                                                            </div>
                                                             <div class="col-lg-6 col-md-6">
                                                            <div class="form-group"> 
                                                                 <label>Education Level</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_education_level_modalEducation" placeholder="Eg.BA" id="education_level" name="education_level" value="">
                                                                  <div id="education_levelEducationModalError" class="error"></div>
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                
                                                                 <label>University</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_university_modalEducation" name="university" placeholder="University(eg.Yangon University)" id="university" value="">
                                                            <div id="universityEducationModalError" class="error"></div>
                                                            </div>
                                                            </div>
                                                            
                                                          
                                                         <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                                                         <!--  </div>-->
                                                        <!-- </div> -->
                                                       
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>Country</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_country_modalEducation" name="country" placeholder="Country(eg.myanmar)" id="country" value="">
                                                                 <div id="countryEducationModalError" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="month" class="form-control edit_from_date_modalEducation" name="from_date" id="education_from_date" placeholder="Eg.2020-01" value="" style="border-radius:0px" autocomplete="off"> 
                                                             <div id="from_dateEducationModalError" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="month" class="form-control edit_to_date_modalEducation" name="to_date" id="education_to_date" placeholder="Eg.2020-01" value="" style="border-radius:0px" autocomplete="off">
                                                           <div id="to_dateEducationModalError" class="error"></div>
                                                           </div>
                                                             </div>
                                                             
                                                              <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <center>
                                                                    <button id="btn_updateeducationform" type="submit" class="btn btn-standard">Update</button>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                          </form>   
                                                    </div>
          </div>
        </div>
      </div>
  </div>
<!--education-modal end-->
<!--skill-modal start-->
            <div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog" id="skillupdateModal">
                    <div class="modal-dialog modal-md" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Skill</h2>
                     <div class="row">
                                                    <div class="col-lg-12 col-md-12">                           
                                                        <form  id="updateskillForm" class="freelancer-profile-form">
                                                              {{csrf_field()}}
                                                              <input type="hidden" name="information_type" value="skill">
                                                            <input type="hidden" name="freelancerskill_id" id="freelancerskill_id">
                                                            
                                                            
                                                              <div class="form-group">
                                                                    <label>Freelancer Skill</label><span class="text-error-danger"> * </span>
                                        
                                        <input list="update_skill" class="update_skill form-control" id="update_skill_id" autocomplete="off" name="skill_name" placeholder="Please Enter skill">
                            <datalist id="update_skill">
                             
                            </datalist>              
                              <div id="skillmodalError" class="error"></div>
                                                                    <!--end-->
                                                                    
                                                                    
                                                                   
                                                                </div>
                                                            <!-- </div> -->
                                                            <!--<div class="form-group">-->
                                                            <!--        <label>Freelancer Skill</label><span class="text-error-danger"> * </span>-->
                                                            <!--        <select class="form-control edit_modalskill" id="skill_id" name="skill_id">-->
                                                            <!--            <option value="">Freelancer Status</option>-->
                                                            <!--            @foreach($skill_for_freelancers as $skill)-->
                                                            <!--            <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>-->
                                                            <!--            @endforeach-->
                                                            <!--        </select>-->
                                                            <!--        <div id="skillmodalError" class="error"></div>-->
                                                            <!--    </div>-->
                                                                
                                                                
                                                           
                                                              <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                     <center>
                                                                    <button id="btn_updateskillform" type="submit" class="btn btn-standard">Update</button>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         </form>
                                                      </div>
                                                    </div>
         
             
           
          </div>
        </div>
      </div>
<!--skill-modal end-->
<!--education-modal start-->
            <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="educationaddModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Add New Education</h2>
                     <div class="row">
                                                  
                                                    
                                                        <!-- <div class="devit-card-custom"> -->
                                                              <form id="educationForm" class="freelancer-profile-form">                 
                                                                <div class="col-lg-6 col-md-6">
                                                            {{csrf_field()}}
                                                            <div class="form-group"> 
                                                                
                                                                 <label>Subject Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_subjectname" placeholder="Subject name(eg.Law)" value="" name="name">
                                                             <div id="nameError" class="error"></div>
                                                             </div>
                                                             </div>
                                                             <div class="col-lg-6 col-md-6">
                                                            <div class="form-group"> 
                                                                 <label>Education Level</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_education_level" placeholder="eg.BA" name="education_level" value="">
                                                                 <div id="education_levelError" class="error"></div>
                                                            </div>
                                                            </div>
                                                               <div class="col-lg-6 col-md-6">
                                                            <!-- </div> -->
                                                            <div class="form-group">
                                                                
                                                                 <label>University</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_university" name="university" placeholder="University(eg.Yangon University)" value="">
                                                                 <div id="universityError" class="error"></div>
                                                            </div>
                                                           </div>
                                                        
                                                             <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>Country</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_country" name="country" placeholder="Country(eg.myanmar)" value="">
                                                                 <div id="countryError" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="text" id="fromdate_education" class="form-control edit_from_date" name="from_date" placeholder="eg.2012-02" value="" autocomplete="off"> 
                                                                 <div id="from_dateError" class="error"></div>
                                                            </div>
                                                            </div>
                                                            
                                                          <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="text" id="todate_education"   class="form-control edit_to_date" name="to_date" placeholder="eg.2012-02" value="" autocomplete="off">
                                                                   <div id="to_dateError" class="error"></div>
                                                           </div>
                                                        </div>
                                                        
                                                         <div class="col-lg-12 col-md-12">
                                                              <input type="hidden" name="information_type" value="education">
                                                            <!-- </div> -->
                                                        </div>
                                                         <div class="row" style="padding:20px">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                             <center>
                                                            <button id="btn_educationform" type="submit" class="btn btn-standard">Save</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                               </form>

                                                    </div>
          </div>
        </div>
      </div>
  </div>
<!--education-modal end-->

<!-- add skill modal -->
<!--skill-modal start-->
            <div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog" id="skilladdModal">
                    <div class="modal-dialog modal-md" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Add New Skill</h2>
                     <div class="row">
                                                    <div class="col-lg-12 col-md-12">                           
                                                        <form id="skillForm" class="freelancer-profile-form">                                                            
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="information_type" value="skill">
                                                            
                                                            <!-- </div> -->
                                                            <div class="form-group">
                                                                    <label>Freelancer Skill</label><span class="text-error-danger"> * </span>
                                        <!--                            <select class="form-control edit_skill" id="skill_id" name="skill_id">-->
                                        <!--                                <option value="">Freelancer Skill</option>-->
                                        <!--                                @foreach($skill_for_freelancers as $skill)-->
                                        <!--                                <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>-->
                                        <!--                                @endforeach-->
                                        <!--<div id="skillError" class="error"></div>-->
                                        <!--                            </select>-->
                                                                    <!--start-->
                                        <input list="skill" class="add_skill form-control" id="skill_id" autocomplete="off" name="skill_name" placeholder="Please Enter skill">
                            <datalist id="skill">
                             
                            </datalist>              
                              <div id="skillError" class="error"></div>
                                                                    <!--end-->
                                                                    
                                                                    
                                                                   
                                                                </div>
                                                       <!--  </div> -->
                                                      
                                                            <div class="row" style="padding:20px">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                             <center>
                                                            <button id="btn_skillform" type="submit" class="btn btn-standard">Save</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                               </form>

                                          </div>
                                      </div>
         
             
           
          </div>
        </div>
      </div>
<!--skill-modal end-->
<!-- end skill modal -->
<!--project-modal start-->
            <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="projectaddModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Add New Project</h2>
                     <div class="row">
                                                    <div class="col-lg-12 col-md-12">                           
                                                         <form id="projectForm" class="freelancer-profile-form">
                                                            <div class="col-lg-6 col-md-6">              
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="information_type" value="project">
                                                            <div class="form-group"> 
                                                                 <label>Project Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_project_name_pro" placeholder="eg.Construction Project" value="" name="project_name">
                                                                <div id="edit_project_name_proError" class="error"></div>
                                                            </div> 

                                                            <div class="form-group"> 
                                                                 <label>Company Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_company_name_pro" placeholder="eg.M suquare Co.,Ltd" name="company_name" value="">
                                                                <div id="edit_company_name_proError" class="error"></div>
                                                            </div>

                                                             <div class="form-group">
                                                                <label>Project Start Date</label><span class="text-error-danger">*</span>
                                                                <input type="text" id="project_start_date_edit" class="form-control edit_project_start_date_pro" name="project_start_date" placeholder="eg.2021-07-08" value="" autocomplete="off"> 
                                                                 <div id="edit_project_start_date_proError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Project End Date</label><span class="text-error-danger"> * </span>
                                                        <input type="text" id="project_end_date_edit" class="form-control edit_project_end_date_pro" name="project_end_date" placeholder="eg.2021-07-08" value="" autocomplete="off">
                                                        <div id="edit_project_end_date_proError" class="error"></div>
                                                           </div>

                                                            <div class="form-group">
                                                                <label>Project Link</label>
                                                                <input type="text" class="form-control edit_link_project_modal" name="project_link" placeholder="eg.http://www.facebook.com" value=""> 
                                                                <div id="linkError" class="error"></div>
                                                            </div>
                                                            <!-- </div> -->
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label>Description</label><span class="text-error-danger"> * </span>
                                                              <textarea
                                                              class="edit_project_detail_pro" name="project_detail" id="project_detail">
                                                              </textarea> 
                                                              <div id="edit_project_detail_proError" class="error"></div>
                                                           </div>
                                                        </div>
                                                        <div class="row" style="padding:20px">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                             <center>
                                                            <button id="btn_projectform" type="submit" class="btn btn-standard">Save
                                                    </button>
                                                    </center>
                                                        </div>
                                                    </div>
                                                </div>
                                               </form>
                                                      </div>
                                                    </div>
         
             
           
          </div>
        </div>
      </div>
<!--project-modal end-->
<!-- experience start -->
 <!--experience-modal start-->
            <div class="modal fade bs-example-modal-md-3" tabindex="-1" role="dialog" id="experienceaddModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Add New Experience</h2>
                     <div class="row">
                                 
                                                        <form id="experienceForm" class="freelancer-profile-form">
                                                             <div class="col-lg-6 col-md-6">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="information_type" value="experience">
                                                            <div class="form-group"> 
                                                                 <label>Position</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_position_exper"  placeholder="eg.Civil Engineer" value="" name="position">
                                                                <div id="positionforexperienceError" class="error"></div>
                                                             <!-- </div> -->
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                            <div class="form-group"> 
                                                                 <label>Company</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_companyname_exper" placeholder="M suquare Co.,Ltd" name="company" value="">
                                                                <div id="companynameError" class="error"></div>
                                                            </div>
                                                            </div>
                                                           
                                                             <div class="col-lg-12 col-md-12">
                                                             <input type="hidden" name="information_type" value="experience">
                                                             
                                                            <!-- </div> -->
                                                        </div>
                                                        
                                                         <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="text" id="from_dateExperience" class="form-control edit_from_date_exper" name="from_date" placeholder="eg.2020-01" value="" autocomplete="off"> 
                                                                <div id="from_dateforexperienceError" class="error"></div>
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="text" id="to_dateExperience" class="form-control edit_to_date_exper" name="to_date" placeholder="eg.2020-01" value="" autocomplete="off">
                                                                   <div id="to_dateforexperienceError" class="error"></div>
                                                           </div>
                                                        </div>

                                                         <div class="col-lg-12 col-md-12">
                                                             <label>Description</label>
                                                         <div class="form-group">
                                                                
                                                              <textarea name="experience_edit_description" id="experience_description"
                                                              class="summernote form-control">
                                                              </textarea> 
                                                           </div>
                                                         </div>

                                                            <div class="row" style="padding:20px">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <center>
                                                            <button id="btn_experienceform" type="submit" class="btn btn-standard">Save</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                               </form>
                           </div>
                  </div>
          </div>
        </div>
      </div>
    </div>
      </section>
<!--experience-modal end-->

<!-- education modal end -->
<!-- update experience end -->
<!-- education end -->
<!--image upload-modal end--> 
 <!-- image upload start-->
    <div class="modal bs-example-modal-md-1 " tabindex="-1" role="dialog" id="uploadupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Upload Profile Photo</h2>
                       <form id="profilephotoForm" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                         <div class="form-group">
                              <!--<center>-->
                              <!--  <input type="file" id="image_file" name="profile_photo" accept="image/*">-->
                              <!--</center>-->
                              <div id="profile_photo"></div>
                          </div>
                            <!--<p>-->
                            <!--     <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button> -->
               
                            <!--</p>-->
                              <div class="row" style="padding:20px">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <!--<button id="btn_experienceform" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>-->
                                                            <center>
                                                            <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                   </form>
            <p>
            </p>
          </div>
        </div>
      </div>
    <!-- image upload end  -->

 <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
 <script type="text/javascript">
         $(document).ready(function(){
        var img = '<?php echo asset('storage/freelancer/'.Auth::user()->logo) ?>';
        var image_name = '<?php echo Auth::user()->logo; ?>';
               html = '<img alt="'+image_name+'" src="' + img + '" />';
                $("#current_profile_photo").html(html);
               //Image Cropping
               /* image crop */
               var resize22= $('#profile_photo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 300,
                    height: 300,
                    type: 'circle' //circle
                },
                boundary: {
                    width: 400,
                    height: 400
                }
            });
             
            $('#image_file').on('change', function () { 
              var reader22 = new FileReader();
                reader22.onload = function (e) {
                  resize22.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
                }
                reader22.readAsDataURL(this.files[0]);
                $('#uploadupdateModal').modal('show');
            });

            $('.upload-image').on('click', function (ev) {
              resize22.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                html = '<img src="' + img + '" />';
                $("#profile_photo").html(html);
                 $.ajax({
                   url: "{{ route('user.croppie.upload-profile') }}",
                   type: "POST",
                   data: {"image":img,'path':'freelancer'},
                   dataType: 'json',
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   success: function (data) {
                          window.location.href=window.location.href;
                    // html = '<img alt="'+data.image_name+'" src="' + img + '" />';
                    // $("#current_profile_photo").html(html);   
                        },
                   error:function(e){
                    console.log(e)
                   }
                 });
              });
            });
             
          }); 
            
    </script>
    
  <script type="text/javascript">
        
//          $('#btn_basicform').on('click',function(){
//  var $this=$(this);
//   $this
//          .attr('disabled','disabled');
//           setTimeout(function() {
//             $this.removeAttr('disabled');
//         }, 3000);
// });
$(document).ready(function(){
        $('form#basicForm').on('submit',function(e){
                var name    =$('#name').val();
                var phone   = $('#phone').val();
                var nrc     = $('#nrc').val();
                var location_id = $('#date_of_birth').val();
                var total_experiences = $('#total_experiences').val();
                var address = $('#freelancer_address').val();
                var current_work_status = $('#current_work_status').val();
                var freelancer_status_id=$('#freelancer_status_id').children("option:selected").val();
                var facebook = $('#facebook').val();
                var googleplus = $('#googleplus').val();
                var website = $('#website').val();
                var linkedin = $('#linkedin').val();
                var description = $('#freelancer_description').summernote('code');
                description = description.replaceAll("&amp;", "and_char");
                e.preventDefault();
               $.ajax({
                      type: "post",
                       url: "{{ URL::route('freelancer.update') }}",
                      data: $('#basicForm').serialize()+"&description="+description,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                              //var message = data.success;
                               var url = window.location.href;
                               window.location=url;
                                 //callbackURL(message,url);
                          }else{
                              if($.isEmptyObject(data.errors.name)){ 
                                  $('#freelancernameError').html("");
                                   $(".edit_name").removeClass('error-messageborder');
                              }else{
                                   $('#freelancernameError').html(data.errors.name);
                                   $(".edit_name").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.freelancer_category_id)){ 
                                  $('#freelancer_category_idError').html("");
                                   $(".edit_freelancer_category_id").removeClass('error-messageborder');
                              }else{
                                   $('#freelancer_category_idError').html(data.errors.freelancer_category_id);
                                   $(".edit_freelancer_category_id").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.township_id)){ 
                                  $('#township_idError').html("");
                                   $(".edit_townshipid").removeClass('error-messageborder');
                              }else{
                                   $('#township_idError').html(data.errors.township_id);
                                   $(".edit_townshipid").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.facebook)){ 
                                  $('#facebookError').html("");
                                   $(".edit_facebook").removeClass('error-messageborder');
                              }else{
                                   $('#facebookError').html(data.errors.facebook);
                                   $(".edit_facebook").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.twitter)){ 
                                  $('#twitterError').html("");
                                   $(".edit_twitter").removeClass('error-messageborder');
                              }else{
                                   $('#twitterError').html(data.errors.twitter);
                                   $(".edit_twitter").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.website)){ 
                                  $('#websiteError').html("");
                                   $(".edit_website").removeClass('error-messageborder');
                              }else{
                                   $('#websiteError').html(data.errors.website);
                                   $(".edit_website").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.googleplus)){ 
                                  $('#googleplusError').html("");
                                   $(".edit_googleplus").removeClass('error-messageborder');
                              }else{
                                   $('#googleplusError').html(data.errors.googleplus);
                                   $(".edit_googleplus").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.linkedin)){ 
                                  $('#linkedinError').html("");
                                   $(".edit_linkedin").removeClass('error-messageborder');
                              }else{
                                   $('#linkedinError').html(data.errors.linkedin);
                                   $(".edit_linkedin").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.freelancer_status_id)){ 
                                  $('#freelancer_status_idError').html("");
                                   $(".edit_freelancer_status_id").removeClass('error-messageborder');
                              }else{
                                   $('#freelancer_status_idError').html(data.errors.freelancer_status_id);
                                   $(".edit_freelancer_status_id").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.phone)){ 
                                  $('#phoneError').html("");
                                   $(".edit_phone").removeClass('error-messageborder');
                              }else{
                                   $('#phoneError').html(data.errors.phone);
                                   $(".edit_phone").addClass('error-messageborder');
                              }
                             // printErrorMsg(data.errors);
                             
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                              callbackFailure(message);
                      }
                    });
               });


            $('form#changeprofilephotoForm').on('submit',function(e){
                var image     = $('#current_profile_photo img').attr('alt');
                var old_image="<?php echo $freelancer->user->logo ?>";

                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#changeprofilephotoForm').serialize()+"&profile_photo="+image+"&old_profile_photo"+old_image,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                          //   var message = data.success;
                               var url = window.location.href;
                               window.location=url;
                               //  callbackURL(message,url);
                          }
                          else{
                              printErrorMsg(data.errors);
                          }
                       },
                      error:function(e)
                      {
                           var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });

            // $('form#accountForm').on('submit',function(e){
            //     e.preventDefault();
            //    $.ajax({
            //           type: "post",
            //           url: "{{ URL::route('freelancer.update') }}",
            //           data: $('#accountForm').serialize(),
            //           dataType: 'json',
            //           headers: {
            //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //           },
            //           success:function(data)
            //           {
                        
            //               if($.isEmptyObject(data.errors)){
            //                 alert(data.success);
            //               }
            //               else{
            //                   printErrorMsg(data.errors);
            //               } 
            //            },
            //           error:function(e)
            //           {
            //              alert('Something Wrong');
            //           }
            //         });
            //   });
            
               $('form#educationForm').on('submit',function(e){
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#educationForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {   
                          if($.isEmptyObject(data.errors)){
                             //   var message = data.success;
                               // var url = window.location.href;
                                window.location=window.location.href;
                                // callbackURL(message,url);
                          }else{
                              if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameError').html("");
                                   $(".edit_subjectname").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.errors.name);
                                   $(".edit_subjectname").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.education_level)){ 
                                  $('#education_levelError').html("");
                                   $(".edit_education_level").removeClass('error-messageborder');
                              }else{
                                   $('#education_levelError').html(data.errors.education_level);
                                   $(".edit_education_level").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.university)){ 
                                  $('#universityError').html("");
                                    $(".edit_university").removeClass('error-messageborder');
                              }else{
                                   $('#universityError').html(data.errors.university);
                                   $(".edit_university").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.country)){ 
                                  $('#countryError').html("");
                                    $(".edit_country").removeClass('error-messageborder');
                              }else{
                                   $('#countryError').html(data.errors.country);
                                   $(".edit_country").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.from_date)){ 
                                  $('#from_dateError').html("");
                                    $(".edit_from_date").removeClass('error-messageborder');
                              }else{
                                   $('#from_dateError').html(data.errors.from_date);
                                   $(".edit_from_date").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.to_date)){ 
                                  $('#to_dateError').html("");
                                    $(".edit_to_date").removeClass('error-messageborder');
                              }else{
                                   $('#to_dateError').html(data.errors.to_date);
                                   $(".edit_to_date").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      { 
                                var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });

               $('form#projectForm').on('submit',function(e){
                 var project_detail = $('#project_detail').summernote('code');
                 project_detail = project_detail.replaceAll("&amp;", "and_char");
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#projectForm').serialize()+"&project_detail="+project_detail,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                           //var message = data.success;
                               var url = window.location.href;
                               window.location=url;
                                // callbackURL(message,url);
                          }
                          else{
                              console.log(data.errors);
                              //printErrorMsg(data.errors);
                               if($.isEmptyObject(data.errors.company_name)){ 
                                  $('#edit_company_name_proError').html("");
                                   $(".edit_company_name_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_company_name_proError').html(data.errors.company_name);
                                   $(".edit_company_name_pro").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.project_detail)){ 
                                  $('#edit_project_detail_proError').html("");
                                    $(".edit_project_detail_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_detail_proError').html(data.errors.project_detail);
                                   $(".edit_project_detail_pro").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.project_end_date)){ 
                                  $('#edit_project_end_date_proError').html("");
                                    $(".edit_project_end_date_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_end_date_proError').html(data.errors.project_end_date);
                                   $(".edit_project_end_date_pro").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.project_name)){ 
                                  $('#edit_project_name_proError').html("");
                                    $(".edit_project_name_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_name_proError').html(data.errors.project_name);
                                   $(".edit_project_name_pro").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.project_start_date)){ 
                                  $('#edit_project_start_date_proError').html("");
                                    $(".edit_project_start_date_pro").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_start_date_proError').html(data.errors.project_start_date);
                                   $(".edit_project_start_date_pro").addClass('error-messageborder');
                              }

                              if($.isEmptyObject(data.errors.project_link)){ 
                                  $('#linkError').html("");
                                  $(".edit_link_project").removeClass('error-messageborder');
                              }else{
                                   $('#linkError').html(data.errors.project_link);
                                   $(".edit_link_project").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });

               // start 
                 $('form#updateexperienceForm').on('submit',function(e){
                 var description = $('#update_experience_description').summernote('code');
                 description = description.replaceAll("&amp;", "and_char");
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update_experience') }}",
                      data: $('#updateexperienceForm').serialize()+"&description="+description,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {     
                   
                          if($.isEmptyObject(data.errors)){ 
                              // var message = data.success; 
                              var url = window.location.href;
                              window.location=url;
                                 // callbackURL(message,url);
                          }
                          else{
                              //printErrorMsg(data.errors);
                               if($.isEmptyObject(data.errors.company)){ 
                                  $('#_companynameError').html("");
                                       $(".edit_company_modal").removeClass('error-messageborder');
                              }else{
                                   $('#_companynameError').html(data.errors.company);
                                   $(".edit_company_modal").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.from_date)){ 
                                  $('#_from_dateforexperienceError').html("");
                                   $(".edit_from_date_modal").removeClass('error-messageborder');
                              }else{
                                   $('#_from_dateforexperienceError').html(data.errors.from_date);
                                   $(".edit_from_date_modal").addClass('error-messageborder');
                              }
                              
                               if($.isEmptyObject(data.errors.to_date)){ 
                                  $('#_to_dateforexperienceError').html("");
                                   $(".edit_to_date_modal").removeClass('error-messageborder');
                              }else{
                                   $('#_to_dateforexperienceError').html(data.errors.to_date);
                                   $(".edit_to_date_modal").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.position)){ 
                                  $('#_positionforexperienceError').html("");
                                    $(".edit_position_modal").removeClass('error-messageborder');
                              }else{
                                   $('#_positionforexperienceError').html(data.errors.position);
                                   $(".edit_position_modal").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                          var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });
              
               $('form#updateeducationForm').on('submit',function(e){
                // var description = $('#desc').summernote('code');
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update_education') }}",
                      data: $('#updateeducationForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {                        
                          if($.isEmptyObject(data.errors)){
                          // var message = data.success;
                               var url = window.location.href;
                               window.location=url;
                               //  callbackURL(message,url);
                          }
                          else{
                              console.log(data.errors);
                             // printErrorMsg(data.errors);
                              if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameEducationModalError').html("");
                                   $(".edit_subjectname_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#nameEducationModalError').html(data.errors.name);
                                   $(".edit_subjectname_modalEducation").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.education_level)){ 
                                  $('#education_levelEducationModalError').html("");
                                   $(".edit_education_level_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#education_levelEducationModalError').html(data.errors.education_level);
                                   $(".edit_education_level_modalEducation").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.university)){ 
                                  $('#universityEducationModalError').html("");
                                    $(".edit_university_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#universityEducationModalError').html(data.errors.university);
                                   $(".edit_university_modalEducation").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.country)){ 
                                  $('#countryEducationModalError').html("");
                                    $(".edit_country_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#countryEducationModalError').html(data.errors.country);
                                   $(".edit_country_modalEducation").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.from_date)){ 
                                  $('#from_dateEducationModalError').html("");
                                    $(".edit_from_date_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#from_dateEducationModalError').html(data.errors.from_date);
                                   $(".edit_from_date_modalEducation").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.to_date)){ 
                                  $('#to_dateEducationModalError').html("");
                                    $(".edit_to_date_modalEducation").removeClass('error-messageborder');
                              }else{
                                   $('#to_dateEducationModalError').html(data.errors.to_date);
                                   $(".edit_to_date_modalEducation").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });
              
               $('form#updateprojectForm').on('submit',function(e){
                 var project_detail = $('#edit_project_detail').summernote('code');
                 project_detail = project_detail.replaceAll("&amp;", "and_char");
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update_project') }}",
                      data: $('#updateprojectForm').serialize()+"&project_detail="+project_detail,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {                        
                          if($.isEmptyObject(data.errors)){
                              //var message = data.success;
                               var url = window.location.href;
                               window.location=url;
                                // callbackURL(message,url);
                          }
                          else{
                            
                             if($.isEmptyObject(data.errors.company_name)){ 
                                  $('#edit_company_name_modalError').html("");
                                   $(".edit_company_name_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_company_name_modalError').html(data.errors.company_name);
                                   $(".edit_company_name_modal").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.project_detail)){ 
                                  $('#edit_project_detail_modalError').html("");
                                    $(".edit_project_detail_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_detail_modalError').html(data.errors.project_detail);
                                   $(".edit_project_detail_modal").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.project_end_date)){ 
                                  $('#edit_project_end_date_modalError').html("");
                                    $(".edit_project_end_date_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_end_date_modalError').html(data.errors.project_end_date);
                                   $(".edit_project_end_date_modal").addClass('error-messageborder');
                              }
                              if($.isEmptyObject(data.errors.project_name)){ 
                                  $('#edit_project_name_modalError').html("");
                                    $(".edit_project_name_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_name_modalError').html(data.errors.project_name);
                                   $(".edit_project_name_modal").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.project_start_date)){ 
                                  $('#edit_project_start_date_modalError').html("");
                                    $(".edit_project_start_date_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_project_start_date_modalError').html(data.errors.project_start_date);
                                   $(".edit_project_start_date_modal").addClass('error-messageborder');
                              }
                              
                              if($.isEmptyObject(data.errors.project_link)){ 
                                  $('#edit_projectlink_modalError').html("");
                                    $(".edit_link_project_modal").removeClass('error-messageborder');
                              }else{
                                   $('#edit_projectlink_modalError').html(data.errors.project_link);
                                   $(".edit_link_project_modal").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });
               $('form#experienceForm').on('submit',function(e){
                 var description = $('#experience_description').summernote('code');
                 description = description.replaceAll("&amp;", "and_char");
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#experienceForm').serialize()+"&description="+description,
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                        
                          if($.isEmptyObject(data.errors)){
                            // var message = data.success;
                               var url = window.location.href;
                               window.location = url;
                                // callbackURL(message,url);
                          }
                          else{
                              //printErrorMsg(data.errors);
                              console.log(data.errors);
                              if($.isEmptyObject(data.errors.company)){ 
                                  $('#companynameError').html("");
                                       $(".edit_position_exper").removeClass('error-messageborder');
                              }else{
                                   $('#companynameError').html(data.errors.company);
                                   $(".edit_position_exper").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.from_date)){ 
                                  $('#from_dateforexperienceError').html("");
                                   $(".edit_from_date_exper").removeClass('error-messageborder');
                              }else{
                                   $('#from_dateforexperienceError').html(data.errors.from_date);
                                   $(".edit_from_date_exper").addClass('error-messageborder');
                              }
                              
                               if($.isEmptyObject(data.errors.to_date)){ 
                                  $('#to_dateforexperienceError').html("");
                                   $(".edit_to_date_exper").removeClass('error-messageborder');
                              }else{
                                   $('#to_dateforexperienceError').html(data.errors.to_date);
                                   $(".edit_to_date_exper").addClass('error-messageborder');
                              }
                               
                              if($.isEmptyObject(data.errors.position)){ 
                                  $('#positionforexperienceError').html("");
                                    $(".edit_position_exper").removeClass('error-messageborder');
                              }else{
                                   $('#positionforexperienceError').html(data.errors.position);
                                   $(".edit_position_exper").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                         var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });
             $('form#skillForm').on('submit',function(e){
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update') }}",
                      data: $('#skillForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                           
                          if($.isEmptyObject(data.errors)){
                               $('#skillError').html("");
                                    $(".edit_skill").removeClass('error-messageborder');
                           //  var message = data.success;
                               var url = window.location.href;
                               window.location=url;
                                // callbackURL(message,url);
                          }
                          else{
                             // printErrorMsg(data.errors);
                             console.log(data.errors);
                             if($.isEmptyObject(data.errors.skill_id)){ 
                                  $('#skillError').html("");
                                    $(".edit_skill").removeClass('error-messageborder');
                              }else{
                                   $('#skillError').html(data.errors.skill_id);
                                   $(".edit_skill").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                          var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });   
              
              
               $('form#updateskillForm').on('submit',function(e){
                e.preventDefault();
               $.ajax({
                      type: "post",
                      url: "{{ URL::route('freelancer.update_skill') }}",
                      data: $('#updateskillForm').serialize(),
                      dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success:function(data)
                      {
                          if($.isEmptyObject(data.errors)){
                               $('#skillmodalError').html("");
                               $(".edit_modalskill").removeClass('error-messageborder'); 
                           // var message = data.success;
                               var url = window.location.href;
                               window.location=url;
                                 //callbackURL(message,url);
                          }
                          else{
                             // printErrorMsg(data.errors);
                             console.log(data.errors);
                              if($.isEmptyObject(data.errors.skill_id)){ 
                                  $('#skillmodalError').html("");
                                    $(".edit_modalskill").removeClass('error-messageborder');
                              }else{
                                   $('#skillmodalError').html(data.errors.skill_id);
                                   $(".edit_modalskill").addClass('error-messageborder');
                              }
                          } 
                       },
                      error:function(e)
                      {
                          var message = data.errors;
                                 callbackFailure(message);
                      }
                    });
              });

            function printErrorMsg (msg) {
                   var message="";
                   if($(msg).length >1){
                     message +='<ul class="alert alert-danger">';
                     $.each(msg, function( key, value ) {
                      message += '<li>'+value+'</li>';
                   }); 
                    message +='</ul>';
                  $(".error").html(message);
                }
                else{
                   message = '<span class="alert alert-danger">'+msg+'</span>';
                   $(".error").html(message);

                 setTimeout(function() {
                      $('.alert').fadeOut('fast');
                     }, 5000);              
                  } 
            } 
          }); 

            $(document).ready(function(){
              /* Township data bind */
               var city_id = $('#city').val();
               if(city_id >=0){
                getTownshipByCity(city_id);
               }
          }); 
            
    </script>
    
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
    <script type="text/javascript">
         /*function for get township id according to city */
         $(document).ready(function(){
           function getTownshipByCity(city){
            var option = "";
               $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('location.getTownship')}}",
                   data : {'city_id':city},
                   success : function(data){
                       for(var i=0; i<data.length;i++){
                           option += '<option value="'+ data[i].id+'">'+ data[i].name+'</option>';
                       }
                       document.getElementById("township_id").innerHTML = option

                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
           }
         /* City onchange event */
           $('#city_id').change(function(){
              getTownshipByCity($(this).val());
           });
           $('#freelancer_status_id').change(function(){
              var id=($(this).val());
           });
         });
    </script>
      <script src="{{ asset('admin/js/datepicker/datepicker.js')}}"></script>
<script  type="text/javascript">

  function dateRangePickerforEducation() {
    
        var $startDate = $("#fromdate_education");
        var $endDate = $("#todate_education");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
               // $startDate.datepicker("hide");
                 if( $(this).val() >= $("#todate_education").val() ){
                    $("#todate_education").val(""); 
                 }
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                if( $(this).val() <= $("#fromdate_education").val() ){
                    $("#fromdate_education").val(""); 
                 }
                $endDate.datepicker("hide");
                
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
     
    }
    
    function dateRangePickerforEducationModal() {
    
        var $startDate = $("#education_from_date");
        var $endDate = $("#education_to_date");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                 if( $(this).val() >= $("#education_to_date").val() ){
                    $("#education_to_date").val(""); 
                 }
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                 if( $(this).val() <= $("#education_from_date").val() ){
                    $("#education_from_date").val(""); 
                 }
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
    
     function dateRangePickerforExperience() {
    
        var $startDate = $("#from_dateExperience");
        var $endDate = $("#to_dateExperience");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                // $startDate.datepicker("hide");
                if( $(this).val() >= $("#to_dateExperience").val() ){
                    $("#to_dateExperience").val(""); 
                 }
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                //$endDate.datepicker("hide");
                 if( $(this).val() <= $("#from_dateExperience").val() ){
                    $("#from_dateExperience").val(""); 
                 }
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
            
        });
    }
    
   
    
    function dateRangePickerforProject() {
    
        var $startDate = $("#project_start_date_edit");
        var $endDate = $("#project_end_date_edit");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                $endDate.datepicker("hide");
            });
      
       
        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
    
      function dateRangePickerforProjectModal() {
    
         var $startDate = $("#project_start_date");
         var $endDate = $("#project_end_date");
        
         $startDate
             .datepicker({
                 autoHide: true,
             })
             .on("changeDate", function (ev) {
                 if($(this).val() >= $("#project_end_date").val()){
                    $("#project_end_date").val(""); 
                 }
               $startDate.datepicker("hide");
             });

         $endDate
             .datepicker({
                 autoHide: true,
                 startDate: $startDate.datepicker("getDate"),
             })
             .on("changeDate", function (ev) {
                 if($(this).val() <= $("#project_start_date").val()){
                    $("#project_start_date").val(""); 
                 }
                 $endDate.datepicker("hide");
             });
             
         $startDate.on("change", function () {
              $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
         });
     }
    
       function dateRangePickerforExperienceModal() {
    
        var $startDate = $("#from_date");
        var $endDate = $("#to_date");
        
        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                if( $(this).val() >= $("#to_date").val() ){
                    $("#to_date").val(""); 
                 }
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                if( $(this).val() <= $("#from_date").val() ){
                    $("#from_date").val(""); 
                 }
                $endDate.datepicker("hide");
            });
            
            
        $startDate.on("change", function () {
          $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
        
    }
    
    function formatDate(date) {
    var year = date.getFullYear().toString();
    var month = (date.getMonth() + 101).toString().substring(1);
    var day = (date.getDate() + 100).toString().substring(1);
    return year + "-" + month + "-" + day;
}
// start
  $(document).ready(function(){
       var cDate =  formatDate(new Date());
       
        var sDate = new Date('1700-01-01'),
        eDate = formatDate(new Date());
        
        $( "#date_of_birth" ).datepicker({
       format: "yyyy-mm-dd",
       // maxDate: '-1d'
         weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        keyboardNavigation: 1,
        minView: 2,
        forceParse: 0,
        startDate: sDate,
        endDate: eDate,
        setDate: sDate
    });
    
       /* Education Datepicker Start*/
          $("#fromdate_education").datepicker({
            format: "yyyy-mm",
             weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        keyboardNavigation: 1,
        minView: 2,
        forceParse: 0,
        startDate: sDate,
        endDate: eDate,
        setDate: sDate,
              //startView: 2, 
           minViewMode: "months"
        });

        $("#todate_education").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
            minViewMode: "months"
        }); 
        
         /* Education Datepicker End*/
        
         /* Education Modal Datepicker Start*/
        $("#education_from_date").datepicker({
            format: "yyyy-mm",
             weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        keyboardNavigation: 1,
        minView: 2,
        forceParse: 0,
        startDate: sDate,
        endDate: eDate,
              //startView: 2, 
           minViewMode: "months"
        });

        $("#education_to_date").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
          minViewMode: "months"
        });
         /* Education Modal Datepicker End*/
         
         
          /* Experience Datepicker Start*/
        $("#from_dateExperience").datepicker({
            format: "yyyy-mm",
             weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        keyboardNavigation: 1,
        minView: 2,
        forceParse: 0,
        startDate: sDate,
        endDate: eDate,
              //startView: 2, 
            minViewMode: "months"
        });

        $("#to_dateExperience").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
        minViewMode: "months"
        });
         /* Experience  Datepicker End*/
         
           /* Experience Modal Datepicker Start*/
        $("#from_date").datepicker({
            format: "yyyy-mm",
             weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        keyboardNavigation: 1,
        minView: 2,
        forceParse: 0,
        startDate: sDate,
        endDate: eDate,
              //startView: 2, 
        minViewMode: "months"
        });

        $("#to_date").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
        minViewMode: "months"
        });
         /* Experience Modal Datepicker End*/
         
          /* Project  Datepicker Start*/
        $("#project_start_date_edit").datepicker({
            format: "yyyy-mm-dd",
             weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        keyboardNavigation: 1,
        minView: 2,
        forceParse: 0,
        startDate: sDate,
        endDate: eDate
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#project_end_date_edit").datepicker({
            format: "yyyy-mm-dd",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Project Datepicker End*/
         
          /* Project modal  Datepicker Start*/
         $("#project_start_date").datepicker({
             format: "yyyy-mm-dd",
              weekStart: 1,
         todayBtn: 1,
         autoclose: 1,
         todayHighlight: 1,
         startView: 4,
         keyboardNavigation: 1,
         minView: 2,
         forceParse: 0,
         startDate: sDate,
         endDate: eDate
              //startView: 2, 
           // minViewMode: "months"
         });

         $("#project_end_date").datepicker({
             format: "yyyy-mm-dd",
           //  startView: 2, 
          // minViewMode: "months"
         });
         /* Project modal Datepicker End*/
         
        //  start myo min
        
        // var todaydt = new Date();
        //  $("#project_start_date").datepicker({
        //         autoclose: true,
        //         format: "yyyy-mm-dd",
        //         endDate: eDate,
        //         onSelect: function (date) {
        //           //Get selected date 
        //         var date2 = $('#project_start_date').datepicker('getDate');
        //             //sets minDate to txt_date_to
        //         $('#project_end_date').datepicker('option', 'minDate', date2);
        //         }
        //     });
        //     $('#project_end_date').datepicker({
        //         format: "yyyy-mm-dd",
                
        //     });
       //} );
        
        //end myo min
         
        dateRangePickerforEducation();
        dateRangePickerforEducationModal();
        dateRangePickerforExperience();
        dateRangePickerforExperienceModal();
        dateRangePickerforProject();
        dateRangePickerforProjectModal();
  });
//end

  
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
                               // callbackSuccess(message);
                               /* alert(data.success); */
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

    //start
     $('.editBtn').on('click',function(){
          var id=$(this).attr('id');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.getexperience')}}",
                   data : {'id':id},
                   success : function(data){
                      console.log(data.experience.description);
                    $("#experience_id").val(data.experience.id);
                    $("#position").val(data.experience.position);
                    $("#company").val(data.experience.company);
                    $("#from_date").val(data.experience.from_date);
                    $("#to_date").val(data.experience.to_date);
                    $('#experienceupdateModal .note-editable').html(data.experience.description);
                     $('#experienceupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
  });

      $('.editprojectBtn').on('click',function(){
       var project_id=$(this).attr('project_id');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.getproject')}}",
                   data : {'project_id':project_id},
                   success : function(data){
                    $("#project_id").val(data.project.id);
                    $("#project_name").val(data.project.project_name);
                    $("#company_name").val(data.project.company_name);
                    $("#updateprojectForm .note-editable").html(data.project.project_detail);
                    $("#project_start_date").val(data.project.project_start_date);
                    $("#project_end_date").val(data.project.project_end_date);
                    $("#project_link").val(data.project.project_link);
                    $('#projectupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
});
    
     $('.editeducationBtn').on('click',function(){
       var education_id=$(this).attr('education_id');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.geteducation')}}",
                   data : {'education_id':education_id},
                   success : function(data){
                    $("#education_id").val(data.education.id);
                    $("#subject").val(data.education.name);
                    $("#education_level").val(data.education.education_level);
                    $("#country").val(data.education.country);
                    $("#education_from_date").val(data.education.from_date);
                    $("#education_to_date").val(data.education.to_date);
                    $('#university').val(data.education.university);
                    $('#educationupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
            });
          $('.editSkillBtn').on('click',function(){     
         var skill_id=$(this).attr('skill_id');
         var skill_name=$(this).attr('skill_name');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.getskill')}}",
                   data : {'skill_id':skill_id},
                   success : function(data){
                       console.log(data.skill.id);
                    $("#freelancerskill_id").val(data.skill.id);
                    $("#update_skill_id").val(skill_name);
                     $('#skillupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
        });
          $('.addSkillBtn').on('click',function(){
              $('#skilladdModal').modal({show:true}); 
          });
          $('.addExperienceBtn').on('click',function(){
              $('#experienceaddModal').modal({show:true});
          });
          $('.addEducationBtn').on('click',function(){
             $('#educationaddModal').modal({show:true});
          });
          $(".addProjectBtn").on('click',function(){
             $('#projectaddModal').modal({show:true});            
          });
          $(".profileupdate").on('click',function(){
             $('#profileupdateModal').modal({show:true})
          });

    // end
    });
     $('.add_skill').on('input',function(e){
                    var skill  = $(this).val();
                    var skillList = $("#skill");
                    var op ="";
                    e.preventDefault();
                    $.ajax({
                           type: "post",
                           url: "{{ URL::route('getskill') }}",
                           data:{'skill':skill},
                           dataType: 'json',
                           headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           },
                           success:function(data)
                           {

                              op +="<option value='0' >Choose Skill </option>";
                             for(var i=0;i<data.length;i++)
                             {
                               op +='<option value="'+data[i].skill_name+'">'+data[i].skill_name+'</option>';
                             }
                             $("#skill").html(op); 
                             
                            },
                           error:function(e)
                           {
                              console.log(e);
                           }
                         });
               });
               $('.update_skill').on('input',function(e){
                    var skill  = $(this).val();
                    var skillList = $("#update_skill");
                    var op ="";
                    e.preventDefault();
                    $.ajax({
                           type: "post",
                           url: "{{ URL::route('getskill') }}",
                           data:{'skill':skill},
                           dataType: 'json',
                           headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           },
                           success:function(data)
                           {

                              op +="<option value='0' >Choose Skill </option>";
                             for(var i=0;i<data.length;i++)
                             {
                               op +='<option value="'+data[i].skill_name+'">'+data[i].skill_name+'</option>';
                             }
                             $("#update_skill").html(op); 
                             
                            },
                           error:function(e)
                           {
                              console.log(e);
                           }
                         });
               });
</script>
@endsection


 