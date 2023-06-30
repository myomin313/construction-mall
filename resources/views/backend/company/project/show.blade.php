@extends('backend.layouts.company_panel')
@section('title',$company_project->project_name.'Project Detail Information')
@section('extra_css')
    <style>
        .project-description ul li{
            list-style-type:square !important;
        }
        .project-description ol li{
            list-style-type:roman !important;
        }
    </style>
@endsection
@section('content')

      <div class="col-md-9 col-sm-12 project_detail">
        <li>

            <div class="blog-inter">
             <div class="row">
              <div class="col-md-5 col-sm-6">
                <span><i class="fa fa-home" aria-hidden="true"></i> Business Type: <?= $company_project->projectType->project_type_name ?></span><br>
              </div>
              
              <div class="col-md-5">
                   @if(isset($company_project->range->minimum_price))
                <span><i class="fa fa-money" aria-hidden="true"></i> Range: <?= $company_project->range->minimum_price ?> ~ <?= $company_project->range->maximum_price ?> Ks</span>
                 @endif
              </div>
             
              <div class="col-md-2 col-sm-6">
                   @php
                                    $id = $company_project->id;
                                    $id = \Crypt::encrypt($id);

                                @endphp
                <span class="pull-right"><a href="{{route('project.edit',$id)}}" ><i class="fa fa-pencil" aria-hidden="true" style="color:#fcb80b !important;"></i> Edit</a></span>
              </div>
              <div class="col-md-12 project-description" >
                <p><?= $company_project->project_description; ?></p>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="row gallery no-gutters">
                 <?php foreach($company_project->projectphoto as $photo){
                                        ?>
             @if($photo->photo != null && $photo->photo !='undefined')
            <div class="col-md-4 col-sm-6 thumb p5 ">
              <div class="blog-inter">
                <a class="box" href="#" data-image-id="{{$photo->id}}" data-toggle="modal" data-title="{{ $photo->image_title }}"
                 data-image="{{ asset('storage/project/'.$photo->photo) }}"
                 data-target="#image-gallery">
                  <figure class="style-greens-two green">
                    <img class="img-thumbnail w-100 rounded-0"
                         src="{{asset('storage/project/'.$photo->photo)}}"
                         alt="Project Name">
                    <div>
                        <span><?= $photo->image_title ?></span>
                    </div>
                  </figure>
                </a>
              </div>
            </div>
             @endif
              <?php
                  }
               ?>

          </div>
        </li>
      </div>
@include('element.project_gallery_modal')
@endsection
@section('script')
    @include('element.project_gallery_script')
@endsection    
