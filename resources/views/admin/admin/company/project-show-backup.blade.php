@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
        <div class="data-table-area  mg-t-10">
            <div class="container-fluid">
                 <div class="row">
                    <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-offset-2 col-sm-4 col-xs-12 company_profile">
                        <h2 class="center">Project Detail</h2>  
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <ol class="breadcrumb pull-left">
                          <!--<li><a href="#">Dashboard</a></li>-->
                       <!--   <li class="{{ url('/admin/company-project/'.$company_project->company_id) }}">Project List</li>-->
                          <!--<li><a href="#">Project Detail</a></li>-->
                         
                          
                        </ol>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <ol class="breadcrumb pull-right">
                             @php
                                    $companyid = $company_project->company_id;
                                    $companyid = \Crypt::encrypt($companyid);
                                    
                                @endphp
                               <!--  <a href="{{ url('/admin/company-project/'.$company_project->company_id.'?page='.Session::get('pageno')) }}" class="btn btn-md btn-warning"><i class="fa fa-list" aria-hidden="true"></i>
                            Project List
                          </a>-->
                          
                             <a href="{{ url('/admin/company-project',['company_id'=>$companyid],'?page='.Session::get('pageno')) }}" class="btn btn-md btn-warning"><i class="fa fa-list" aria-hidden="true"></i>
                            Project List
                          </a>
                           @php
                                    $id = $company_project->id;
                                    $id = \Crypt::encrypt($id);
                                    
                                @endphp
                      <a href="{{route('admin.project.edit',['id'=>$id])}}" class="btn btn-md btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit
                            </a>
                          </a>
                        </ol>
                    </div>
                </div> 
                <div class="row project_detail">
                    <div class="panel panel-default table-responsive col-lg-offset-1 col-md-offset-1 col-md-10 col-lg-10">
                      <!-- Default panel contents -->
                     <div class="panel-heading"><h5><?= $company_project->project_name ?></h5></div>
                     <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                Business Type: <span><?= $company_project->projectType->project_type_name ?></span>
                            </div>
                            <div class="col-md-4">
                                Range: <span><?= $company_project->range->minimum_price ?> ~ <?= $company_project->range->maximum_price ?></span>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-4">
                                Created By: <span><?= $created_user->name ?></span>
                            </div>
                            <div class="col-md-4">
                               Updated By: <span><?= $updated_user->name ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                               Created Time: <span><?= $company_project->created_at ?></span>
                            </div>
                            <div class="col-md-4">
                              Updated Time: <span><?= $company_project->updated_at ?></span>
                            </div>
                        </div>
                           
                        </div>
                    </div>
                </div>
                <div class="row project_detail">
                    <div class="panel panel-default table-responsive col-lg-offset-1 col-md-offset-1 col-md-10 col-lg-10">
                      <!-- Default panel contents -->
                        <div class="panel-heading"><h5>Description</h5>
                            <div class="panel-body">
                             <?= $company_project->project_description; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row project_detail">
                    <div class="panel panel-default table-responsive col-lg-offset-1 col-md-offset-1 col-md-10 col-lg-10">
                      <!-- Default panel contents -->
                        <div class="panel-heading"><h5>Photo</h5>
                            <div class="panel-body">
                                <div class="row">
                                     <?php foreach($company_project->projectphoto as $photo){
                                        ?>    @if($photo->photo != null && $photo->photo !='undefined')
                                              <div class="col-xs-6 col-md-4">
                                                <a  class="thumbnail">
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