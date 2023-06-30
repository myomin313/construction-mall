@extends('layouts.freelancer_panel')
@section('content')
         <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-20 company_profile">
                        <h2 class="center">Freelancer Information</h2>  
                    </div>-->
                        <div class="card">
                          <div class="card-header card-header-primary">
                            <h4 class="card-title ">
                              <div class="row">
                                 <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h4 style="color:#ffffff; ">Freelancer Information</h4>
                                </div>
                                   
                              </div>
                            </h4>
                          </div>
                         </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design center">
                                <li class="active"><a href="#profile">Edit Basic Information</a></li>
                                <!--<li><a href="#change_profile_image">Edit Profile</a></li> -->
                               <!-- <li><a href="#account">change account</a></li> -->
                                <li><a href="#skill">Edit Skills</a></li>
                                <li><a href="#education">Edit Educations</a></li>
                                <li><a href="#experience">Edit Experience</a></li>
                                <li><a href="#project_data">Edit Project</a></li>
                            </ul>

                             <div class="col-md-12 error">
                           </div>
                            <div id="myTabContent" class="tab-content custom-product-edit">

                                <!-- edit profile -->
                                <div class="product-tab-list tab-pane fade active in" id="profile">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="#" class="dropzone dropzone-custom needsclick add-professors"  id="basicForm">
                                                        {{csrf_field()}}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>Name</label><span class="text-error-danger"> * </span>
                                                                    <input name="name" id="name" type="text" class="form-control edit_name" value="{{ auth()->user()->name }}" placeholder="Name">
                                                                   <div id="freelancernameError" class="error"></div>
                                                                </div>

                                                                <div class="form-group">
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


                                                                 
                                                                <div class="form-group">
                                                                    <label>NRC</label>
                                                                    <input type="text" id="nrc" class="form-control" name="nrc" value="{{ $freelancer->nrc }}" placeholder="NRC">
                                                                </div>  
                                                                
                                                                 <div class="form-group">
                                                                    <label>Township</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_townshipid" id="township_id" name="township_id">
                                                                        <option value="">Township</option>
                                                                        <?php
                                                                        foreach($townships as $township){
                                                                           if($township->id == $freelancer->location_id)
                                                                            $selected ="selected";
                                                                           else
                                                                            $selected ="";
                                                                          ?>
                                                                          <option value={{ $township->id}}" <?=$selected?>>{{$township->name}}
                                                                          </option>
                                                                      <?php } ?>
                                                                    </select>
                                                                     <div id="township_idError" class="error"></div>
                                                                </div>
                                                           
                                                               <div class="form-group">
                                                                  <label>Total Experience</label>
                                                                    <input type="number" id="total_experiences" class="form-control" placeholder="Total Experiences" name="total_experiences" value="{{ $freelancer->total_experiences }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Current Works</label>
                                                                    <input type="text" class="form-control edit_current_work_status" placeholder="Current Works" id="current_work_status" name="current_work_status"  value="{{ $freelancer->current_work_status }}">
                                                                   <!--  <div id="current_work_statusError" class="error"></div> -->
                                                                </div>

                                                                 <div class="form-group">
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

                                                              
                                                                 <div class="form-group">
                                                                    <label>Facebook</label>
                                                                    <input type="text" class="form-control edit_facebook" id="facebook" name="facebook" placeholder="https://www.facebook.com/your_account_id" value="{{ $freelancer->facebook }}">
                                                                <div id="facebookError" class="error"></div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Twitter</label>
                                                                    <input type="text" class="form-control edit_twitter" id="twitter" name="twitter" placeholder="http://twitter.com/username" value="{{ $freelancer->twitter }}">
                                                               <div id="twitterError" class="error"></div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                               <div class="form-group">
                                                                 <label>Phone</label><span class="text-error-danger"> * </span>
                                                                    <input name="phone" id="phone" type="text" class="form-control edit_phone" value="{{ auth()->user()->phone }}" placeholder="Phone">
                                                                     <div id="phoneError" class="error"></div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Date Of Birth</label>
                                                                    <input class="form-control" type="text" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="{{ $freelancer->date_of_birth }}">
                                                                 </div>
                                                                 
                                                                  
                                                                                                                                
                                                                 <div class="form-group">
                                                                    <label>City</label>
                                                                    <select class="form-control" id="city_id" name="city_id">
                                                                        <?php
                                                                        foreach($cities as $city){
                                                                        if(!empty($freelancer_city->id))
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


                                                                
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                  <input type="text" class="form-control" id="freelancer_address" name="address" placeholder="address" value="{{ $freelancer->address }}">
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label>Currently Wroking Company Name</label>
                                                                    <input type="text" class="form-control" id="freelancer_company" name="freelancer_company" placeholder="company name" value="{{ $freelancer->freelancer_company }}">
                                                                </div>
                                                                  <div class="form-group">
                                                                    <label>Currently Wroking company From this website</label>
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
                                                               <div class="form-group">
                                                                <label>Website</label>
                                                                    <input type="text" class="form-control" id="website" name="website" placeholder="https://myanbox.com.mm" value="{{ $freelancer->website }}">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Google Plus</label>
                                                                    <input type="text" class="form-control edit_googleplus" id="googleplus" name="googleplus" placeholder="https://myaccount.google.com/profile?" value="{{ $freelancer->googleplus }}">
                                                                 <div id="googleplusError" class="error"></div>
                                                                </div>   
                                                                
                                                                <div class="form-group">
                                                                    <label>Linkedin</label>
                                                                    <input type="text" class="form-control edit_linkedin" id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/yourname" value="{{ $freelancer->linkedin }}">
                                                                 <div id="linkedinError" class="error"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                               
                                                           <div class="form-group">
                                <label for="description">About me</label>
                                 <textarea name="description" id="freelancer_description" class="summernote" >
                                            <?php echo $freelancer->description; ?>
                                    </textarea>
                                </div> 

                                                         <!-- <div class="form-group">
                                                                   <label for="vission">Vission</label>
                                                                   <div name="vission" id="vission" class="summernote">
                                                                      <?= $company->vission ?>
                                                                    </div>
                                                               </div> -->

                                                         <input type="hidden" name="information_type" value="basic">
                                                        <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <button id="btn_basicform" type="submit" class="btn btn-primary waves-effect waves-light" >Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="product-tab-list tab-pane fade pb-150" id="skill">
                                    <div class="row">                                       
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                           
            
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">    
                                                    
                                                        <form id="skillForm">
                                                            <div class="post-tittle">
                                                                <h4>Add New Skill</h4>
                                                            </div>
                                                            
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="information_type" value="skill">
                                                            
                                                            <!-- </div> -->
                                                            <div class="form-group">
                                                                    <label>Freelancer Skill</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_skill" id="skill_id" name="skill_id">
                                                                        <option value="">Freelancer Skill</option>
                                                                        @foreach($skill_for_freelancers as $skill)
                                                                        <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div id="skillError" class="error"></div>
                                                                </div>
                                                       <!--  </div> -->
                                                      
                                                            <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button id="btn_skillform" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                               </form>
                                                      </div>
                                                    </div>                                                    
                                                </div>
                                                
                                            </div>
                                              @foreach($freelancer_skills as $skill)
                                             <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12"> 
                                               
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="blog-interfreelancer">
          <div class="post-tittle">
              
            <h4>{{ $skill->skill_name }}</h4>
              </div>               
            </div>
         <!--  </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> -->
            <button type="button" skill_id="{{ $skill->id }}"  class="btn btn-success editSkillBtn">Update
            </button>
            <a type="button" class="btn btn-danger deleteBtn" href="{{  route('freelancer.skill.delete', ['id' =>  $skill->id  ]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            <!--  <a>edit</a>
             <a>delete</a> -->
           </div>          
     </div>
      @endforeach
                                        </div>
                                    </div>
                                <!--add new skill end  -->

                               <!-- add new project -->
                                <div class="product-tab-list tab-pane fade pb-150" id="project_data">
                                    <div class="row">                                       
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">                            
                                                        <form id="projectForm">
                                                            <div class="post-tittle">
                                                                <h4>Add New Project</h4>
                                                            </div>
                                                            
                                                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="information_type" value="project">
                                                            <div class="form-group"> 
                                                                 <label>Project Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_project_name_pro" placeholder="eg.Civil Engineer" value="" name="project_name">
                                                                <div id="edit_project_name_proError" class="error"></div>
                                                            </div> 

                                                            <div class="form-group"> 
                                                                 <label>Company Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_company_name_pro" placeholder="M suquare Co.,Ltd" name="company_name" value="">
                                                                <div id="edit_company_name_proError" class="error"></div>
                                                            </div>

                                                             <div class="form-group">
                                                                <label>Project Start Date</label><span class="text-error-danger">*</span>
                                                                <input type="text" id="project_start_date_edit" class="form-control edit_project_start_date_pro" name="project_start_date" placeholder="Start Date" value=""> 
                                                                 <div id="edit_project_start_date_proError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Project End Date</label><span class="text-error-danger"> * </span>
                                                        <input type="text" id="project_end_date_edit" class="form-control edit_project_end_date_pro" name="project_end_date" placeholder="End Date" value="">
                                                        <div id="edit_project_end_date_proError" class="error"></div>
                                                           </div>

                                                            <div class="form-group">
                                                                <label>Project Link</label>
                                                                <input type="text" class="form-control edit_link_project_modal" name="project_link" placeholder="http://www.facebook.com" value=""> 
                                                                <div id="linkError" class="error"></div>
                                                            </div>
                                                            <!-- </div> -->
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label>Description</label><span class="text-error-danger"> * </span>
                                                              <textarea class="edit_project_detail_pro" name="project_detail" id="project_detail">
                                                              </textarea> 
                                                              <div id="edit_project_detail_proError" class="error"></div>
                                                           </div>
                                                        </div>
                                                        <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button id="btn_projectform" type="submit" class="btn btn-primary waves-effect waves-light">Save
                                                    </button>
                                                        </div>
                                                    </div>
                                                </div>
                                               </form>
                                                           
                                                      </div>
                                                    </div>                                                    
                                                </div>
                                                
                                            </div>
                                              @foreach($freelancer_projects as $project)
                                             <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12"> 
                                               
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="blog-interfreelancer">
          <div class="post-tittle">
            <h4>{{ $project->project_name }}</h4>
            <div> <i class="fa fa-user" aria-hidden="true"></i><span>{{ $project->company_name  }}</span> </div>
            <div> <i class="fa fa-calendar" aria-hidden="true"></i> <span> {{ $project->project_start_date  }} - {{ $project->project_end_date  }}</span> </div>
               <p><a href="{{ $project->project_link  }}">{{ $project->project_link  }}</a></p>
               <p><?php  echo $project->project_detail;  ?></p>
              </div>               
            </div>
         <!--  </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> -->
            <button type="button" project_id="{{ $project->id }}"  class="btn btn-success editprojectBtn">Update</button>
            <a type="button" class="btn btn-danger deleteBtn" href="{{  route('freelancer.project.delete', ['id' =>  $project->id  ]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            <!--  <a>edit</a>
             <a>delete</a> -->
           </div>          
     </div>
      @endforeach
                                        </div>
                                    </div>
                                <!-- end freelancer project -->
                               <!-- add new educations start -->
                                <div class="product-tab-list tab-pane fade pb-150" id="education">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12"> 
                                                    
                                                  
                                                        <!-- <div class="devit-card-custom"> -->
                                                              <form id="educationForm">
                                                                  <div class="post-tittle">
                                                                <h4>Add New Education</h4>
                                                            </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{csrf_field()}}
                                                            <div class="form-group"> 
                                                                
                                                                 <label>Subject Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_subjectname" placeholder="Subject name(eg.Law)" value="" name="name">
                                                             <div id="nameError" class="error"></div>
                                                             </div>
                                                            <!-- </div> -->
                                                            <div class="form-group">
                                                                
                                                                 <label>University</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_university" name="university" placeholder="University(eg.Yangon University)" value="">
                                                                 <div id="universityError" class="error"></div>
                                                            </div>
                                                            
                                                         
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="text" id="fromdate_education" class="form-control edit_from_date" name="from_date" placeholder="eg.2012-02" value=""> 
                                                                 <div id="from_dateError" class="error"></div>
                                                            </div>
                                                              <input type="hidden" name="information_type" value="education">
                                                            <!-- </div> -->
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group"> 
                                                                 <label>Education Level</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_education_level" placeholder="eg.BA" name="education_level" value="">
                                                                 <div id="education_levelError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Country</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_country" name="country" placeholder="Country(eg.myanmar)" value="">
                                                                 <div id="countryError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="text" id="todate_education"   class="form-control edit_to_date" name="to_date" placeholder="eg.2012-02" value="">
                                                                   <div id="to_dateError" class="error"></div>
                                                           </div>
                                                        </div>
                                                         <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button id="btn_educationform" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                               </form>
                                                      </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                              @foreach($freelancer_educations as $education)
                                             <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12"> 
                                               
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="blog-interfreelancer">
          <div class="post-tittle">
            <h4>{{ $education->education_level }}{{ ( $education->name)  }}</h4>
            <div> <i class="fa fa-user" aria-hidden="true"></i><span>{{ $education->university  }}</span> </div>
             <div> <i class="fa fa-user" aria-hidden="true"></i><span>{{ $education->country  }}</span> 
             </div>
            <div> <i class="fa fa-calendar" aria-hidden="true"></i> <span> {{ $education->from_date  }} - {{ $education->to_date  }}</span> </div>
              </div>               
            </div>
         <!--  </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> -->
            <button type="button" education_id="{{ $education->id }}"  class="btn btn-success editeducationBtn">Update</button>
            <a type="button" class="btn btn-danger deleteeducationBtn" href="{{  route('freelancer.education.delete', ['id' =>  $education->id  ]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            <!--  <a>edit</a>
             <a>delete</a> -->
           </div>          
     </div>
      @endforeach

                                        </div>
                                    </div>
                               <!--  </div> -->
                                <!-- end add new education -->
                               <!-- add new experience start -->
                                <div class="product-tab-list tab-pane fade pb-150" id="experience">
                                    <div class="row">                                       
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">                           
                                                        <form id="experienceForm">
                                                            <div class="post-tittle">
                                                                <h4>Add New Experience</h4>
                                                            </div>
                                                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="information_type" value="experience">
                                                            <div class="form-group"> 
                                                                 <label>Position</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_position_exper"  placeholder="eg.Civil Engineer" value="" name="position">
                                                                <div id="positionforexperienceError" class="error"></div>
                                                             <!-- </div> -->
                                                            </div>
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="text" id="from_dateExperience" class="form-control edit_from_date_exper" name="from_date" placeholder="eg.2020-01" value=""> 
                                                                <div id="from_dateforexperienceError" class="error"></div>
                                                            </div>
                                                              <input type="hidden" name="information_type" value="experience">
                                                            <!-- </div> -->
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group"> 
                                                                 <label>Company</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_companyname_exper" placeholder="M suquare Co.,Ltd" name="company" value="">
                                                                <div id="companynameError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="text" id="to_dateExperience" class="form-control edit_to_date_exper" name="to_date" placeholder="eg.2020-01" value="">
                                                                   <div id="to_dateforexperienceError" class="error"></div>
                                                           </div>
                                                        </div>

                                                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                         <div class="form-group">
                                                                <label>Description</label>
                                                              <textarea name="description" id="experience_description">
                                                              </textarea> 
                                                           </div>

                                                            <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button id="btn_experienceform" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                               </form>
                                                      </div>
                                                    </div>                                                    
                                                </div>
                                                
                                            </div>
                                              @foreach($freelancer_experiences as $experience)
                                             <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12"> 
                                               
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="blog-interfreelancer">
          <div class="post-tittle">
            <h4>{{ $experience->position }}</h4>
            <div> <i class="fa fa-user" aria-hidden="true"></i><span>{{ $experience->company  }}</span> </div>
            <div> <i class="fa fa-calendar" aria-hidden="true"></i> <span> {{ $experience->from_date  }} - {{ $experience->to_date  }}</span> </div>
               <p><?php  echo $experience->description;  ?></p>
              </div>               
            </div>
         <!--  </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> -->
            <button type="button" id="{{ $experience->id }}"  class="btn btn-success editBtn">Update</button>
            <a type="button" class="btn btn-danger deleteBtn" href="{{  route('freelancer.experience.delete', ['id' =>  $experience->id  ]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            <!--  <a>edit</a>
             <a>delete</a> -->
           </div>          
     </div>
      @endforeach
                                        </div>
                                    </div>
                                <!--add new experience end  -->

                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start profile image pop up -->
        <!--image upload-modal start-->
      <!--      <div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog" id="uploadupdateModal">-->
      <!--              <div class="modal-dialog modal-lg" role="document">-->
      <!--                <div class="modal-content">-->
      <!--                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>-->
      <!--                  <h2 class="modal-title">Upload Profile Photo</h2>-->
      <!--                 <form id="profilephotoForm" enctype="multipart/form-data">-->
      <!--                   <div class="form-group">-->
      <!--                        <center>-->
      <!--                          <input type="file" id="image_file" name="profile_photo" accept="image/*">-->
      <!--                        </center>-->
      <!--                        <div id="profile_photo"></div>-->
      <!--                    </div> -->
      <!--               </form>-->
      <!--      <p>-->
      <!--        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload Image</button>-->
      <!--      </p>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->

       <!--education-modal start-->
            <div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog" id="educationupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Education</h2>
                     <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                                    
                                                        <form id="updateeducationForm">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{csrf_field()}}
                                                             <input type="hidden" name="information_type" value="education">
                                                            <input type="hidden" id="education_id" name="education_id" >
                                                            <div class="form-group"> 
                                                                
                                                                 <label>Subject Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_subjectname_modalEducation" placeholder="Subject name(eg.Law)" id="subject" value="" name="name">
                                                            <div id="nameEducationModalError" class="error"></div>
                                                             </div>
                                                            
                                                            <div class="form-group">
                                                                
                                                                 <label>University</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_university_modalEducation" name="university" placeholder="University(eg.Yangon University)" id="university" value="">
                                                            <div id="universityEducationModalError" class="error"></div>
                                                            </div>
                                                            
                                                         
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="month" class="form-control edit_from_date_modalEducation" name="from_date" id="education_from_date" placeholder="Eg.2020-01" value=""> 
                                                             <div id="from_dateEducationModalError" class="error"></div>
                                                            </div>
                                                      
                                                           </div>
                                                        <!-- </div> -->
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group"> 
                                                                 <label>Education Level</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_education_level_modalEducation" placeholder="Eg.BA" id="education_level" name="education_level" value="">
                                                                  <div id="education_levelEducationModalError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Country</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_country_modalEducation" name="country" placeholder="Country(eg.myanmar)" id="country" value="">
                                                                 <div id="countryEducationModalError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="month" class="form-control edit_to_date_modalEducation" name="to_date" id="education_to_date" placeholder="Eg.2020-01" value="">
                                                           <div id="to_dateEducationModalError" class="error"></div>
                                                           </div>
                                                             </div>
                                                              <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <button id="btn_updateeducationform" type="submit" class="btn btn-primary waves-effect waves-light" >Update</button>
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

<!--experience-modal start-->
            <div class="modal fade" tabindex="-1" role="dialog" id="experienceupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Experience</h2>
                     <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">                            
                                                        <form  id="updateexperienceForm">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            {{csrf_field()}}
                                                          <input type="hidden" name="information_type" value="experience">
                                                            <input type="hidden" id="experience_id" name="experience_id" >
                                                            <div class="form-group"> 
                                                                 <label>Position</label><span class="text-error-danger"> * </span>
                                                                <input type="text" id="position" class="form-control edit_position_modal" placeholder="eg.Civil Engineer"  name="position">
                                                                <div id="_positionforexperienceError" class="error"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>From</label><span class="text-error-danger"> * </span>
                                                                <input type="text" id="from_date" class="form-control edit_from_date_modal" name="from_date" placeholder="eg.2020-01" > 
                                                                <div id="_from_dateforexperienceError" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group"> 
                                                                 <label>Company</label><span class="text-error-danger"> * </span>
                                                                <input type="text"  class="form-control edit_company_modal" placeholder="M suquare Co.,Ltd" name="company" id="company">
                                                                <div id="_companynameError" class="error"></div>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                <label>To</label><span class="text-error-danger"> * </span>
                                                                  <input type="text" class="form-control edit_to_date_modal" name="to_date" placeholder="eg.2020-01"  id="to_date">
                                                                  <div id="_to_dateforexperienceError" class="error"></div>
                                                           </div>
                                                        </div>

                                                           <div class="form-group">
                                                             <label>Description</label>
                                                             <textarea name="description" id="update_experience_description">
                                                             </textarea>
                                                            </div> 

                                                              <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <button id="btn_updateexperienceform" type="submit" class="btn btn-primary waves-effect waves-light" >Update</button>
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

 <!--project-modal start-->
            <div class="modal fade" tabindex="-1" role="dialog" id="projectupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Project</h2>
                     <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">                           
                                                        <form  id="updateprojectForm">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                             {{csrf_field()}}
                                                            <input type="hidden" id="project_id" name="project_id" >

                                                            <div class="form-group"> 
                                                                 <label>Project Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_project_name_modal" placeholder="eg.Civil Engineer" value="" id="project_name" name="project_name">
                                                                <div id="edit_project_name_modalError" class="error"></div>
                                                            </div> 

                                                            <div class="form-group"> 
                                                                 <label>Company Name</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_company_name_modal" placeholder="M suquare Co.,Ltd" id="company_name" name="company_name" value="">
                                                                <div id="edit_company_name_modalError" class="error"></div>
                                                            </div>

                                                             <div class="form-group">
                                                                <label>Project Start Date</label><span class="text-error-danger"> * </span>
                                                                <input type="text" class="form-control edit_project_start_date_modal" name="project_start_date" id="project_start_date" placeholder="Start Date" value=""> 
                                                                <div id="edit_project_start_date_modalError" class="error"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Project End Date</label><span class="text-error-danger"> * </span>
                                                        <input type="text" class="form-control edit_project_end_date_modal" name="project_end_date" placeholder="End date" id="project_end_date" value="">
                                                        <div id="edit_project_end_date_modalError" class="error"></div>
                                                           </div>

                                                            <div class="form-group">
                                                                <label>Project Link</label>
                                                                <input type="text" class="form-control edit_projectlink_modal" name="project_link" id="project_link" placeholder="http://www.facebook.com" value=""> 
                                                                <div id="edit_projectlink_modalError" class="error"></div>
                                                            </div>

                                                              <input type="hidden"  name="information_type" value="project">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                                                    <button id="btn_updateprojectform" type="submit" class="btn btn-primary waves-effect waves-light" >Update</button>
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

 <!--skill-modal start-->
            <div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog" id="skillupdateModal">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title">Update Skill</h2>
                     <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">                           
                                                        <form  id="updateskillForm">
                                                              {{csrf_field()}}
                                                              <input type="hidden" name="information_type" value="skill">
                                                            <input type="hidden" name="freelancerskill_id" id="freelancerskill_id">
                                                            <!-- </div> -->
                                                            <div class="form-group">
                                                                    <label>Freelancer Skill</label><span class="text-error-danger"> * </span>
                                                                    <select class="form-control edit_modalskill" id="skill_id" name="skill_id">
                                                                        <option value="">Freelancer Status</option>
                                                                        @foreach($skill_for_freelancers as $skill)
                                                                        <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div id="skillmodalError" class="error"></div>
                                                                </div>
                                                           
                                                              <div class="row" style="padding:20px">
                                                            <div class="col-lg-12" >
                                                                <div class="payment-adress" >
                                                                    <button id="btn_updateskillform" type="submit" class="btn btn-primary waves-effect waves-light" >Update</button>
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

      

        <!-- end profile image pop up -->
        <script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> 
        <script type="text/javascript">
        
//          $('#btn_basicform').on('click',function(){
// 	var $this=$(this);
//   $this
//          .attr('disabled','disabled');
//           setTimeout(function() {
//             $this.removeAttr('disabled');
//         }, 3000);
// });
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
                              var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
                                 
                           /* alert(data.success);
                            location.reload(); */
                          }
                          else{
                              console.log(data.errors)
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
                             var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
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
                             // console.log("hi");
                                var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                          }
                          else{     
                              console.log(data.errors);  
                              
                              //printErrorMsg(data.errors);
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
                           var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
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
                      {      console.log(data);
                   
                          if($.isEmptyObject(data.errors)){ 
                               var message = data.success; 
                              var url = window.location.href;
                                  callbackURL(message,url);
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
                           var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
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
                              var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
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
                             var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
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
                           console.log(data);
                          if($.isEmptyObject(data.errors)){
                               $('#skillError').html("");
                                    $(".edit_skill").removeClass('error-messageborder');
                             var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
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
                            var message = data.success;
                               var url = window.location.href;
                                 callbackURL(message,url);
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

            $(document).ready(function(){
              /* Township data bind */
               var city_id = $('#city').val();
               if(city_id >=0){
                getTownshipByCity(city_id);
               }
          }); 
            
    </script>
    
    
    <script type="text/javascript">
         /*function for get township id according to city */
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
    </script>


    <!--image experience-update-modal end-->
    <script src="{{ asset('admin/js/datepicker/datepicker.js')}}"></script>
<script type="text/javascript">

function dateRangePickerforEducation() {
    
        var $startDate = $("#fromdate_education");
        var $endDate = $("#todate_education");
        
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
    
    function dateRangePickerforEducationModal() {
    
        var $startDate = $("#education_from_date");
        var $endDate = $("#education_to_date");
        
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
    
     function dateRangePickerforExperience() {
    
        var $startDate = $("#from_dateExperience");
        var $endDate = $("#to_dateExperience");
        
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
    
      function dateRangePickerforExperienceModal() {
    
        var $startDate = $("#from_date");
        var $endDate = $("#to_date");
        
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
    
    function formatDate(date) {
    var year = date.getFullYear().toString();
    var month = (date.getMonth() + 101).toString().substring(1);
    var day = (date.getDate() + 100).toString().substring(1);
    return year + "-" + month + "-" + day;
}


    $(document).ready(function(){
     //  alert(formatDate(new Date()));
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
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#todate_education").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
       // minViewMode: "months"
        }); 
        
         /* Education Datepicker End*/
        
         /* Education Modal Datepicker Start*/
        $("#education_from_date").datepicker({
            format: "yyyy-mm",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#education_to_date").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Education Modal Datepicker End*/
         
         
          /* Experience Datepicker Start*/
        $("#from_dateExperience").datepicker({
            format: "yyyy-mm",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#to_dateExperience").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Experience  Datepicker End*/
         
           /* Experience Modal Datepicker Start*/
        $("#from_date").datepicker({
            format: "yyyy-mm",
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#to_date").datepicker({
            format: "yyyy-mm",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Experience Modal Datepicker End*/
         
          /* Project  Datepicker Start*/
        $("#project_start_date_edit").datepicker({
            format: "yyyy-mm-dd",
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
              //startView: 2, 
           // minViewMode: "months"
        });

        $("#project_end_date").datepicker({
            format: "yyyy-mm-dd",
           //  startView: 2, 
       // minViewMode: "months"
        });
         /* Project modal Datepicker End*/
         
        dateRangePickerforEducation();
        dateRangePickerforEducationModal();
        dateRangePickerforExperience();
        dateRangePickerforExperienceModal();
        dateRangePickerforProject();
        dateRangePickerforProjectModal();
        
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
                      alert("hi");
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

 $('.editSkillBtn').on('click',function(){
     
       var skill_id=$(this).attr('skill_id');
          $.ajax({
                   type : 'get',
                   url : "{{ URL :: route('freelancer.getskill')}}",
                   data : {'skill_id':skill_id},
                   success : function(data){
                       console.log(data.skill.id);
                    $("#freelancerskill_id").val(data.skill.id);
                     $('#skillupdateModal').modal({show:true});
                   },
                   error:function(e)
                   {
                       console.log(e)
                   }
               });
});


});
</script>

       @endsection