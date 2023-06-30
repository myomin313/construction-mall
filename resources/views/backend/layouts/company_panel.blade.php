<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>Myanbox | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--myomin added start-->
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/myanbox_fav.png')}}">
    <!-- Style CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style_slider.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/errorvalidation.css') }}">
    <link href="{{asset('admin/js/notiflix/notiflix-2.6.0.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">
    <!-- summernote CSS ============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/cropper/croppie.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Notifix JS myomin added
        ============================================ -->
    <script src="{{ asset('admin/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
    <script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
    <script src="{{ asset('admin/js/notiflix/commonnoti.js')}}"></script>

    <style>
        /*    .center .btn{*/
        /*        font-size:8px;*/
        /*        padding:4px 6px 4px 6px !important;*/
        /*        position:absolute;*/
        /*        z-index:100;*/
        /*        bottom:26% !important;*/
        /*        margin-left: 52px;*/
        /*    }*/
        .hide {
            display: none;
        }

        /*.btn-reset {*/
        /*   background-color: #286090 !important;*/
        /*   color:white;*/
        /*}*/
        /*.btn-reset:hover {*/
        /*   background-color: #286090 !important;*/
        /*   color:white;*/
        /*}*/

        /*.btn-large {*/
        /*  padding: 11px 19px;*/
        /*  font-size: 17.5px;*/
        /*  -webkit-border-radius: 4px;*/
        /*  -moz-border-radius: 4px;*/
        /*  border-radius: 4px;*/
        /*}*/

        /*#imagePreview {*/
        /*  margin: 15px 0 0 0;*/
        /*  border: 2px solid #ddd;*/
        /*}*/
        .no-border>tbody>tr>td, .no-border>tbody>tr>th, .no-border>tfoot>tr>td, .no-border>tfoot>tr>th, .no-border>thead>tr>td, .no-border>thead>tr>th {
            border-top: 0px !important;
        }

        .note-editable ul li{
            list-style-type:square !important;
        }
        .what_we_do ul li{
            list-style-type:square !important;
        }
        .note-editable ol li{
            list-style-type:roman !important;
        }
        .file_input_wrap .btn-standard{
            color: white !important;
        }
    </style>
    @yield('extra_css')
</head>
<body class="suppliers">
<div class="page-wrapper">
    <!--preloader start-->
    <div class="preloader"></div>
    <!--preloader end-->
    <!--main-header start-->
        @include('element.header')
    <!--main-header end-->
    <!--<section class="inner-heading">-->
    @if(Session::get('parent_category_id') == 1)
        <?php $main_category='Service Company'; ?>
        @if(!empty($company->cover_photo))
        <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
        @else
        <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
        $projectsetting->service_default_background_image) }}');">
        @endif
    @elseif(Session::get('parent_category_id') == 2)
        <?php $main_category='Supplier Company'; ?>
        @if(!empty($company->cover_photo))
        <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
        @else
        <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
        $projectsetting->supplier_default_background_image) }}');">
        @endif
    @elseif(Session::get('parent_category_id') == 3)
        <?php $main_category='Reno Business Company'; ?>
        @if(!empty($company->cover_photo))
        <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
        @else
        <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
        $projectsetting->reno_default_background_image) }}');">
        @endif
    @endif
    <div class="container">
        <h1>@yield('title')</h1>
    </div>
</section>
<!--inner content start-->
<div class="container-fluid" style="margin-top: -3em;z-index: 4;">
    <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
    <label class="pull-right edit_btn" for="cover_file">
        <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
</div>
<section class="inner-wrap service_detail">
    <!--container start-->
    <div class="container">
        <!--row start-->
        <ul class="blog-grid">
            <!--col start-->
            @include('backend.element.company_menu')
    </div>
               @include('admin.element.success-message')
            @yield('content')
        </ul>
</section>
<!--cover photo upload-modal start-->
<div class="modal bs-example-modal-md-1 company-cover-profile" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
            <h2 class="modal-title">Upload Cover Photo</h2>
            <form id="coverphotoForm"  enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div id="cover_photo"></div>
                </div>
                <div class="row" style="padding:20px">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard upload-cover" data-dismiss="modal" aria-label="Close">Upload Image</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--cover photo upload-modal start-->
<!--end cover upload-->
@include('element.footer')


@include('element.get_quote_modalbox')
@include('backend.element.helper_script')

<!--scroll-to-top start-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>
<!--jquery start-->
<script src="{{ asset('js/jquery-2.1.4.min.js')  }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.meanmenu.js')}}"></script>
<!-- summernote JS Text editor
    ============================================ -->
<script src="{{ asset('admin/js/summernote/summernote.min.js')}}"></script>
<script src="{{ asset('admin/js/summernote/summernote-active.js')}}"></script>
<script src="{{ asset('admin/js/cropper/croppie.js')}}"></script>

<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox8cbb.js?v=2.1.5') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>

<script src="{{ asset('js/counter.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<!-- Notifix JS
       ============================================ -->
<script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
<script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
<script src="{{ asset('admin/js/notiflix/commonnoti.js')}}"></script>

@include('element.get_quote_script')
@include('element.get_township_by_city_ajax_function')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('script')
<script type="text/javascript">
   $('#service,#vission,#detail').on('summernote.paste', function(e, ne) {
         var bufferText = ((ne.originalEvent || ne).clipboardData || window.clipboardData).getData('Text');
         ne.preventDefault();
         document.execCommand('insertText', false, bufferText)
    });
             
 
   
    /* ......................................................Slider Script Start .............................*/
    (function(){
        $('.carousel-showmanymoveone .item').each(function(){
            var itemToClone = $(this);

            for (var i=1;i<6;i++) {
                itemToClone = itemToClone.next();

                // wrap around if at end of item collection
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }

                // grab item, clone, add marker class, add to collection
                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-"+(i))
                    .appendTo($(this));
            }
        });
    }());

    (function(){
        $('.carousel1 .item').each(function(){
            var itemToClone = $(this);

            for (var i=1;i<4;i++) {
                itemToClone = itemToClone.next();

                // wrap around if at end of item collection
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }

                // grab item, clone, add marker class, add to collection
                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-"+(i))
                    .appendTo($(this));
            }
        });
    }());
    /*............................................. Slider Script End..................................  */
    $(document).ready(function() {
        $('#carousel-tilenav').carousel();
        $('#carousel1').carousel();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            
 
    
        });
       


        /*.............................. Image Crop Script Start ...........................*/
        var img = '<?php echo url('storage/company_coverphoto/' . $company->cover_photo) ?>';
        var image_name = '<?php echo $company->cover_photo ?>';
        var id = '<?php echo $company->id ?>';
        html = '<img alt="' + image_name + '" src="' + img + '" />';
        $("#current_cover_photo").html(html);
        /* image crop */
        var resize = $('#cover_photo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' }
                width: 1600,
                height: 230,
                type: 'square' //circle
            },
            boundary: {
                width: 800,
                height: 240
            }
        });
        $('#cover_file').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('.company-cover-profile').modal('show');
        });

        $('.upload-cover').on('click', function (ev) {

            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                html = '<img src="' + img + '" />';
                $("#cover_photo").html(html);
                $.ajax({
                    url: "{{route('user.croppie.upload-profile')}}",
                    type: "POST",
                    data: {"image": img, "path": "company_coverphoto", "id": id},
                    success: function (data) {
                        window.location.href = window.location.href;
                    }
                });
            });
        });
    });
    /* ............................Image Crop Script End............................*/
</script>

</html>
