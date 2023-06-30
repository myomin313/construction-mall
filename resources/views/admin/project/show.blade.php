@extends('layouts.company_new_panel')
@section('content')
<style>
    .project-description ul li{
   list-style-type:square !important; 
}
.project-description ol li{
   list-style-type:roman !important;  
}
</style>
<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
   <!--main-header start-->
@include('element.header')
  <!--main-header end-->
   @if(Session::get('parent_category_id') == 1)
       @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 2)
   @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->supplier_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 3)
   @if(!empty($company->cover_photo))
  <section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading service_detail" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->reno_default_background_image) }}');">
  @endif
  @endif
    <div class="container">
      <h1><?= $company_project->project_name ?>'s Project Detail Information</h1>
    </div>    
  </section>
<!--inner content start-->
  <!--<div class="container-fluid" style="margin-top: -3em;z-index: 4;">-->
  <!--     <label class="pull-right" for="image_file">-->
  <!--  <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>-->
  <!--  </div>-->
    
    <div class="container-fluid" style="margin-top: -3em;z-index: 4;">
      <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
       <label class="pull-right edit_btn" for="cover_file">
    <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
    </div>
    
  <section class="inner-wrap supplier_detail"> 
    <!--container start-->
    <div class="container">
      <div class="row">
      <!--row start-->
      <ul class="blog-grid">
       @include('element.company_menu')
       </div>
        <!--col start-->
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
            
            
            <!--<div class="col-md-4 col-sm-6 thumb p5">-->
            <!--  <div class="blog-inter">-->
            <!--     <a class="box" href="#" data-image-id="" data-toggle="modal" data-title="Project Photo 2"-->
            <!--       data-image="images/project/project2.jpg"-->
            <!--       data-target="#image-gallery">-->
            <!--        <figure class="style-greens-two green">-->
            <!--          <img class="img-thumbnail w-100 rounded-0"-->
            <!--               src="images/project/project2.jpg"-->
            <!--               alt="Project Name">-->
            <!--          <div>-->
            <!--              <span>Project Photo 2</span>-->
            <!--          </div>-->
            <!--        </figure>-->
            <!--    </a>-->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="col-md-4 col-sm-6 thumb p5">-->
            <!--  <div class="blog-inter">-->
            <!--     <a class="box" href="#" data-image-id="" data-toggle="modal" data-title="Project Photo 3"-->
            <!--       data-image="images/project/project3.jpg"-->
            <!--       data-target="#image-gallery">-->
            <!--        <figure class="style-greens-two green">-->
            <!--          <img class="img-thumbnail w-100 rounded-0"-->
            <!--               src="images/project/project3.jpg"-->
            <!--               alt="Project Name">-->
            <!--          <div>-->
            <!--              <span>Project Photo 3</span>-->
            <!--          </div>-->
            <!--        </figure>-->
            <!--    </a>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- <div class="col-md-4 col-sm-6 thumb p5">-->
            <!--  <div class="blog-inter">-->
            <!--   <a class="box" href="#" data-image-id="" data-toggle="modal" data-title="Project Photo 4"-->
            <!--     data-image="images/project/project4.jpg"-->
            <!--     data-target="#image-gallery">-->
            <!--      <figure class="style-greens-two green">-->
            <!--        <img class="img-thumbnail w-100 rounded-0"-->
            <!--             src="images/project/project4.jpg"-->
            <!--             alt="Project Name">-->
            <!--        <div>-->
            <!--            <span>Project Photo 4</span>-->
            <!--        </div>-->
            <!--      </figure>-->
            <!--    </a>-->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="col-md-4 col-sm-6 thumb p5">-->
            <!--  <div class="blog-inter">-->
            <!--   <a class="box" href="#" data-image-id="" data-toggle="modal" data-title="Project Photo 5"-->
            <!--     data-image="images/project/project5.jpg"-->
            <!--     data-target="#image-gallery">-->
            <!--      <figure class="style-greens-two green">-->
            <!--        <img class="img-thumbnail w-100 rounded-0"-->
            <!--             src="images/project/project5.jpg"-->
            <!--             alt="Project Name">-->
            <!--        <div>-->
            <!--            <span>Project Photo 5</span>-->
            <!--        </div>-->
            <!--      </figure>-->
            <!--    </a>-->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="col-md-4 col-sm-6 thumb p5">-->
            <!--  <div class="blog-inter">-->
            <!--   <a class="box" href="#" data-image-id="" data-toggle="modal" data-title="Project Photo 6"-->
            <!--     data-image="images/project/project6.jpg"-->
            <!--     data-target="#image-gallery">-->
            <!--      <figure class="style-greens-two green">-->
            <!--        <img class="img-thumbnail w-100 rounded-0"-->
            <!--             src="images/project/project6.jpg"-->
            <!--             alt="Project Name">-->
            <!--        <div>-->
            <!--            <span>Project Photo 6</span>-->
            <!--        </div>-->
            <!--      </figure>-->
            <!--   </a>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>
        </li>
      </div>
      </ul>  
      </div>    
    </div>      
    <!--container end--> 
  </section>
  <div class="modal fade bs-example-modal-md-5" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title text-center" id="image-gallery-title"></h2>
                    </div>
                    <div class="modal-body text-center">
                        <img id="image-gallery-image" class="img-fluid" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-standard float-left" id="show-previous-image"><img src="{{ URL::asset('/images/icon/left.png') }}" class="img-fluid">
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-standard float-right"><img src="{{ URL::asset('/images/icon/right.png') }}" class="img-fluid">
                        </button>
                    </div>
                </div>
            </div>
    </div>
            <script>
             //image gallery
    
let modalId = $('#image-gallery');
$(document)
  .ready(function () {
    loadGallery(true, 'a.box');
    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }
    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });
            </script>
 <!--inner content end--> 

<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end--> 
<!--inner content end--> 

 @endsection