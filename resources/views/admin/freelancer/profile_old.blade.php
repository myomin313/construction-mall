@extends((Auth::user()->role == 4 || Auth::user()->role == 5) ? 'layouts.admin_panel' : 'layouts.freelancer_panel')
@section('content')
 <!-- Single pro tab review Start-->
 <style>
    .card-avatar .btn{
        font-size:8px;
        padding:4px 6px 4px 6px !important;
        position:absolute;
        z-index:100;
        top:15% !important;
        margin-left: -32px;
    }
    </style>

        <div class="content">
            <div class="container-fluid company_profile">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="card card-profile">
                                <div class="card-avatar">
                                  <!--<a href="#">-->
                                    <!--<img  class="img" src="{{ asset('storage/freelancer/'.$freelancer->user->logo)}}" alt="" />-->
                                    <!--<a   class="btn btn-sm btn-info" data-dismiss="modal" aria-label="Close"  data-toggle="modal" data-target="#uploadupdateModal">-->
                                    <!-- <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></a>-->
                                  <!--</a>-->
                                     @if($freelancer->user->logo != null)
                          <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">              
                        <img src="{{ url('storage/freelancer/'.$freelancer->user->logo) }}" style="width:150px;height:150px" class="img-circle" alt="" style="width:150px;height: 150px">
                        @if(Auth::user()->role != 4 && Auth::user()->role != 5)
                        <label   class="btn btn-sm btn-info" for="image_file">
                             <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                            @endif
                        @else
                        <img src="{{ url('storage/freelancer/'.$projectsetting->freelancer_default_logo) }}" style="width:150px;height:150px" class="img-circle" alt="" style="width:150px;height: 150px">
                        @if(Auth::user()->role != 4 && Auth::user()->role != 5)
                        <!--<a data-dismiss="modal" aria-label="Close"  data-toggle="modal" data-target="#uploadupdateModal">-->
                        <!-- <img src="{{ asset('storage/freelancer/freelancer_noimage.png') }}" id="current_profile_photo" class="img-circle" alt="" style="width:150px;height: 150px">-->
                        <!--  </a>-->
                          <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">
                           <img src="{{ asset('storage/freelancer/freelancer_noimage.png') }}" id="current_profile_photo" class="img-circle" alt="" style="width:150px;height: 150px">
                          <label   class="btn btn-sm btn-info" for="image_file">
                             <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>
                        <!--<a data-dismiss="modal" aria-label="Close" for="image_file" data-toggle="modal" >-->
                        
                        <!-- </a>-->
                          @else
                          <p></p>
                         @endif
                        @endif
                        <!--start-->
                        <!--@if(auth()->user()->logo != null)-->
                        <!--   <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">-->
                        <!--<img src="{{ url('storage/freelancer/'.Auth::user()->logo) }}" style="width:150px;height:150px" class="img-circle" alt="" style="width:150px;height: 150px">-->
                        <!--<label   class="btn btn-sm btn-info" for="image_file">-->
                        <!--     <i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></label>-->
                        <!--@else-->
                        <!--  <input type="file" id="image_file" name="profile_photo" accept="image/*" class="hide">-->
                        <!--<a data-dismiss="modal" aria-label="Close" for="image_file" data-toggle="modal" >-->
                        <!-- <img src="{{ asset('storage/freelancer/freelancer_noimage.png') }}" id="current_profile_photo" class="img-circle" alt="" style="width:150px;height: 150px">-->
                        <!-- </a>-->
                        <!--@endif-->
                        <!--end-->
                                </div>
                                 
                                <div class="card-body">
                                   <div class="row">
                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                       <h4 class="card-title">{{ $freelancer->user->name }}</h4>
                                     </div> 
                                   </div> 
                                   
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Current Work Status</b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span>{{ $freelancer->current_work_status }}</span>
                                        </div>
                                    </div>
                                  
                                  <div class="card-description height">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Phone </b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span>{{ $freelancer->user->phone }}</span>
                                        </div>
                                    </div>
                                 
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Email </b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span>{{ $freelancer->email }}</span>
                                        </div>
                                    </div>
                                      
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>NRC </b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span> {{ $freelancer->nrc }}</span>
                                        </div>
                                    </div>  
                                    
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Address </b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span> {{ $freelancer->address }},{{ $freelancer->location_name }}</span>
                                        </div>
                                    </div>  
                                     
                                     <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Website </b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span>{{ $freelancer->website }}</span>
                                        </div>
                                    </div>
                                     
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Date Of Birth</b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span> {{ $freelancer->date_of_birth }}</span>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Total Experience</b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span> {{ $freelancer->total_experiences }}</span>
                                        </div>
                                    </div>
                                    
                                     <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Freelancer Status</b></span>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                          
                                             <span> 
                                       @if(!empty($freelancer->freelancerstatus->freelancer_status_name))
                                       {{  $freelancer->freelancerstatus->freelancer_status_name }}
                                        
                                         @endif    
                                             - {{  $freelancer->freelancer_company ?  $freelancer->freelancer_company :'' }} </span>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <span><b>Category</b></span>
                                        </div>
                                         @if(!empty($freelancer->category->name))
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                             <span>
                                              {{  $freelancer->category->name ?   $freelancer->category->name :'' }}</span>
                                        </div>
                                        @endif
                                    </div> 
                                    <div class="row">
                                      @if(!empty($freelancer->facebook))
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="{{ $freelancer->facebook }}"><i class="fa fa-facebook" style="font-size: 20px;"></i></a>
                                        </div>
                                        @endif
                                        @if(!empty($freelancer->twitter))
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="{{ $freelancer->twitter }}"><i class="fa fa-twitter" style="font-size: 20px;"></i></a>
                                        </div>
                                        @endif
                                        @if(!empty($freelancer->linkedin))
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="{{ $freelancer->linkedin }}"><i class="fa fa-linkedin" style="font-size: 20px;"></i></a>
                                        </div>
                                        @endif
                                        @if(!empty($freelancer->googleplus))
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="{{ $freelancer->googleplus }}"><i class="fa fa-google-plus" style="font-size: 20px;"></i></a>
                                        </div>
                                        @endif
                                    </div>                                   
                                  </div>
                                </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                  <h4 class="card-title ">Freelancer Profile</h4>
                                  <p class="card-category"> Biography </p>
                                    @if(Auth::user()->role == 3)
                                    <a href="{{ route('freelancer.edit')}}" class="btn btn-primary btn-round">Edit</a>
                                    @endif
                                </div>
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                           <h4>Description</h4>
                                           <p><?php  echo $freelancer->description; ?></p>
                                       </div>
                                   </div>
                                    <div class="row">
                                       <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                           <h4>Skills</h4>
                                           <p>  @foreach($freelancer_skills as $skill)
                                            {{ $skill->skill_name }},
                                           @endforeach</p>
                                       </div>
                                   </div>

                                    <div class="row">
                                       <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                           <h4>Educations</h4>
                                           @foreach($freelancer_educations as $education)
                                           <h6>{{ $education->education_level }}{{ ( $education->name)  }}</h6>
            <div> <i class="fa fa-user" aria-hidden="true"></i><span>{{ $education->university  }}</span> </div>
             <div> <i class="fa fa-user" aria-hidden="true"></i><span>{{ $education->country  }}</span> 
             </div>
            <div> <i class="fa fa-calendar" aria-hidden="true"></i> <span> {{ $education->from_date  }} - {{ $education->to_date  }}</span> </div>
            @endforeach
              </div>
                                           
                                       </div>


                                       <div class="row">
                                       <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                           <h4>Experiences</h4>
                                          @foreach($freelancer_experiences as $experience)
                                           <h6>{{ $experience->position }}</h6>
            <div> <i class="fa fa-user" aria-hidden="true"></i><span>{{ $experience->company  }}</span> </div>
            <div> <i class="fa fa-calendar" aria-hidden="true"></i> <span> {{ $experience->from_date  }} - {{ $experience->to_date  }}</span> </div>
               <p><?php  echo $experience->description;  ?></p>
                @endforeach
              </div>
                                          
                                       </div>

                                       <div class="row">
                                       <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                           <h4>Project</h4>
                                          @foreach($freelancer_projects as $project)
                                           <h4>{{ $project->project_name }}</h4>
            <div> <i class="fa fa-user" aria-hidden="true"></i><span>{{ $project->company_name  }}</span> </div>
            <div> <i class="fa fa-calendar" aria-hidden="true"></i> <span> {{ $project->project_start_date  }} - {{ $project->project_end_date  }}</span> </div>
               <p><a href="{{ $project->project_link  }}">{{ $project->project_link  }}</a></p>
               <p><?php  echo $project->project_detail;  ?></p>
                                           @endforeach
                                       </div>
                                   </div>
                                   <!-- <div class="row">
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                           <h4>Cover Photo</h4>
                                           <img src="images/coverphoto/heading-bg.jpg">
                                       </div>
                                   </div> -->
                               <!--  </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          @endsection
    