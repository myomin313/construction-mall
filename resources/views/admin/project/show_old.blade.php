@extends('layouts.company_panel')
@section('content')
      <!-- Single pro tab review Start-->
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"><?= $company_project->project_name ?> Project Detail Information</h3>
                    </div>
                     <div class="col-sm-3 col-lg-3 col-md-3">
                         <a href="{{route('project.index')}}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Project List
                          </a>
                    </div>
                    <div class="col-sm-1 col-lg-1 col-md-1">
                         @php
                                    $id = $company_project->id;
                                    $id = \Crypt::encrypt($id);
                                    
                                @endphp
                       <a href="{{route('project.edit',$id)}}" class="btn btn-md btn-default pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                            Business Type:<span><?= $company_project->business_type ?></span>
                            </div>
                            <div class="col-md-4">
                                Range:<span><?= $company_project->range->minimum_price ?> ~ <?= $company_project->range->maximum_price ?></span>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-4">
                                Created By:<span><?= $created_user->name ?></span>
                            </div>
                            <div class="col-md-4">
                               Updated By:<span><?= $updated_user->name ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                               Created Time:<span><?= $company_project->created_at ?></span>
                            </div>
                            <div class="col-md-4">
                              Updated Time:<span><?= $company_project->updated_at ?></span>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <h5>Description</h5>
                            <p><?= $company_project->project_description; ?></p>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-md-12">
                            <h5>Photo</h5>
                          </div>
                           <?php foreach($company_project->projectphoto as $photo){
                                        ?>
                                            @if($photo->photo != null && $photo->photo !='undefined')
                                              <div class="col-xs-6 col-md-4">
                                                <a href="#" class="thumbnail">
                                                  <img src="{{asset('storage/project/'.$photo->photo)}}">
                                                   <div class="caption">
                                                        <h6><?= $photo->image_title ?></h6>
                                                    </div>
                                                </a>
                                              </div>
                                            @endif
                                        <?php
                                           }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection