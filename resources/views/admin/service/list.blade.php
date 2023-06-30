@extends('layouts.company_new_panel')
@section('content')
<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
 <!--main-header start-->
 @include('element.header')
  <!--main-header end--> 
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
      <h1>Service List</h1>
    </div>
  </section>
  <div class="container-fluid" style="margin-top: -3em;z-index: 4;">
      <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
       <label class="pull-right edit_btn" for="cover_file">
    <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
    </div>
<!--inner content start-->
  
  <section class="inner-wrap service_detail"> 
    <!--container start-->
    <div class="container">
        
      <!--row start-->
      <ul class="blog-grid">
        
           @include('element.company_menu')
           </div>
      <div class="col-md-9 col-sm-12">
         <li>
            <div class="blog-inter">
             <div class="row">
              <div class="col-md-12">
                  @include('admin.element.success-message')
                 @include("admin.element.flash_message")  
                 @php 
                        if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                     
                @endphp
              <form class="form-inline" action="{{route('service.index')}}" method="post">
                     {{csrf_field()}}
                    <div class="form-group col-md-8 col-xs-12 padding5">
                      <label class="sr-only">Service Name</label>
                        <input value="{{$name}}" type="text" class="form-control w_100" name="name" placeholder="Enter Service Name">
                    </div>
                    
                    <div class="form-group col-md-2 col-xs-6 padding5">
                      <button type="submit" class="btn btn-standard w_100"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div> 
                    
                    <div class="form-group col-md-2 col-xs-6 padding5">
                       <a class="btn btn-standard w_100" href="{{route('service.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</a>
                    </div>   
              </form>
            </div>
            </div>
            </div>
          </li>
           <li>
            <div class="row our_service">
              <div class="col-md-8 col-sm-8 col-xs-4">
                 <div class="post-tittle">
                      <h4><a href="#">Our Services</a></h4>                     
                  </div>
              </div>
              <div class="col-md-4 col-sm-8 col-xs-8 ">
                  
                <!-- <a type="button" href="http://myanbox.findixmyanmar.com/service/create" class="btn pull-right btn-standard editeducationBtn "><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>-->
                <!--<a type="button" class="btn pull-right btn-standard deleteitemall mr-10"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> -->
                
                <!--start-->
                  <a type="button" href="{{route('service.create')}}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                <a type="button" class="pull-right  deleteitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a> 
                <!--end-->
               
              </div>
            </div>
          </li>
          <li>
             @if(count($company_services) > 0 ) 
            <div class="row our_services">
              @php $count=1; @endphp
               @foreach($company_services as $company_service)
              <div class="col-md-4 col-sm-6">
                <div class="service_list">
                  @php
                                                        $id = $company_service->id;
                                                        $id = \Crypt::encrypt($id);
                                                        $page = $company_services->currentPage();
                                                        $page =\Crypt::encrypt($page);
                                                     @endphp
                  @if($company_service->image_name != null && $company_service->image_name !='undefined')
                  <a class="show-modal" data-id="{{$company_service->id}}" data-name="{{$company_service->service_name}}" 
                                                data-description="{{$company_service->service_detail}}"
                                                data-image="{{ $company_service->image_name }}"
                                                data-created_at="{{$company_service->created_at}}" data-updated_at="{{$company_service->updated_at}}"
                                                data-url="{{ url('service/'.$id.'/'.$page.'/edit') }}">
                  <img src="{{asset('storage/service/'.$company_service->image_name)}}" alt="portfolio" class="img-responsive">
                </a>
                   @endif
                  <h5><input name="company_serviceid" type="checkbox" data-id="{{ $company_service->id }}" value="{{ $company_service->id }}"> <?= $company_service->service_name ?></h5>
                </div>
              </div>
               @php $count +=1 @endphp
               @endforeach
            </div>
             <div class="pagination-area">
              <ul class="pagination">
                 {{ $company_services->links() }}
              </ul>
            </div>
            @else
             <div class="blog-inter" style="min-height:350px">
                  there is no data
              </div>
            @endif
          </li>
          
      </div>
      </ul> 

      </div>    
    </div>      
    <!--container end--> 
  </section>
    <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <center id="photo">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="service_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                         <div id="service_description">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> 
                                    
                                      <a type="button" id="company_service-edit" href="" class="btn btn-standard editeducationBtn">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end--> 
<!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script  type="text/javascript">
           var page ='<?php echo $company_services->currentPage() ?>';
     </script>
        <script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Service Detail');
                    $('#service_name').html($(this).data('name'));
                      var APP_URL = '<?php echo url('/'); ?>';
                // $("#photo").attr('src', APP_URL+'storage/service/'+$(this).data('photo'));
                    if($(this).data('image') !== ''){
                      var img='<img src="'+APP_URL+'/storage/service/'+$(this).data('image')+'" style="width:50px;height:50px">';
                      $('#photo').html(img);
                    }else{
                      $('#photo').html('');
                    }
                    $('#service_description').html($(this).data('description'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $("#company_service-edit").attr('href',$(this).data('url') );
                    $('#showModal').modal('show');
                });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function () {
        $('#table #checkall').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $("#table .checkbox").prop('checked', true);  
         } else {  
            $("#table .checkbox").prop('checked',false);  
         }  
        });

         $('#table .checkbox').on('click',function(){
            if($('#table .checkbox:checked').length == $('.checkbox').length){
                $('#table #checkall').prop('checked',true);
                
            }else{
                $('#table #checkall').prop('checked',false);
            }
         });
           });
         </script>
         <script type="text/javascript">
         $(document).ready(function () {
             $('.deleteitemall').on('click',function(){
                 /*alert('hi');*/
            var company_serviceids = [];
                  $("input:checkbox[name=company_serviceid]:checked").each(function(){
                      company_serviceids.push($(this).val());
                       });
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('company.service.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_serviceids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 /*  alert(data.success);
                                location.reload();*/
                                 var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        }     
               });
         });
         </script>
 <!--inner content end--> 

<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end--> 
<!--footer-secn end--> 
<!--inner content end--> 
 @endsection


