@extends('layouts.admin_panel')
@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @include('admin.element.breadcrumb')
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h2 class="panel-title">{{ $company->user->name }}'s Projects  Detail</h2>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          @php
                                    $companyid = $company_project->company_id;
                                    $companyid = \Crypt::encrypt($companyid);
                                    
                                @endphp 
                            <div class="pull-right">
                             <a href="{{ url('/admin/company-project',['company_id'=>$companyid],'?page='.Session::get('pageno')) }}" class="btn btn-md btn-default"><i class="fa fa-list" aria-hidden="true"></i>
                            Project List
                          </a>
                           @php
                                    $id = $company_project->id;
                                    $id = \Crypt::encrypt($id);
                                    
                                @endphp
                      <a href="{{route('admin.project.edit',['id'=>$id])}}" class="btn btn-md btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit
                            </a>
                        </div>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
                  <div class="row">
                            <div class="col-md-4">
                                <span class="title">Business Type:</span><span><?= $company_project->business_type ?></span>
                            </div>
                            <div class="col-md-4">
                               <span class="title">Created By:</span><span><?= $created_user->name ?></span>
                            </div>
                            <div class="col-md-4">
                               <span class="title">Created Time:</span><span><?= $company_project->created_at ?></span>
                            </div>
                             
                        </div>
                         <div class="row">
                             @if(isset($company_project->range->minimum_price))
                            <div class="col-md-4">
                               <span class="title">Range:</span><span><?= $company_project->range->minimum_price ?> ~ <?= $company_project->range->maximum_price ?></span>
                            </div>
                            @endif
                            <div class="col-md-4">
                               <span class="title">Updated By:</span><span><?= $updated_user->name ?></span>
                            </div>
                            <div class="col-md-4">
                              <span class="title">Updated Time:</span></h3><span><?= $company_project->updated_at ?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-12">
                            <span class="title">Project Description:</span>
                            <p><?= $company_project->project_description; ?></p>
                          </div>
                        </div> 
                        <hr>
                        <div class="row">
                          <div class="col-md-12">
                            <span class="title">Project Photos:</span>
                          </div>
                           <?php foreach($company_project->projectphoto as $photo){
                                        ?>
                                            @if($photo->photo != null && $photo->photo !='undefined')
                                              <div class="col-xs-6 col-md-3 col-sm-4">
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