@extends('layouts.company_new_panel')
@section('title','Myanbox | Package')
@section('content')
<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
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
      <h1>Company Package</h1>
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
        @include('element.company_menu')
         
         
        </div>
      <div class="col-md-9 col-sm-12">
          <li>
            <div class="row our_services">
                
                 @php
                  $plan2id = $package_plans[2]->id;
                  $plan2id = \Crypt::encrypt($plan2id);
                  $plan1id = $package_plans[1]->id;
                  $plan1id = \Crypt::encrypt($plan1id);
                  $plan0id = $package_plans[0]->id;
                  $plan0id = \Crypt::encrypt($plan0id);
                  @endphp
                  
              <div class="col-md-4 col-sm-6">
                <div class="side-bar package">
                  <div class="panel">
                    <div class="panel-heading"> 
                       <h2 class="panel-title text-center">{{$package_plans[2]->name}} Package</h2>
                    </div>
                     <div class="panel-body left_menu">
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{$package_plans[2]->periods}} </b> Days</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{round($package_plans[2]->price)}} </b>Kyats</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Received <b>alot</b> of quotation request</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company in <b>home</b> page</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company's product, project, service information.</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company in <b>upper position</b> of company list</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Company can request to site owner for adding and updating company's all information.</p>
                    </div>
                       <!--standard-->
                <div class="row">
                   <div class="col-lg-12">
                      <center>
                       <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard btn_buy" data-dismiss="modal" aria-label="Close" data-id="{{ $package_plans[2]->id }}">Request To Update</button>
                      </center>
                    </div>
                </div>
      <!--end-->
                  </div>
                </div>
                         <!--start-->
                         
                         <!--end -->
              </div>
               <div class="col-md-4 col-sm-6">
                <div class="side-bar package">
                  <div class="panel">
                    <div class="panel-heading"> 
                       <h2 class="panel-title text-center">{{$package_plans[1]->name}} Package</h2>
                    </div>
                    <div class="panel-body left_menu">
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{$package_plans[1]->periods}}</b> Days</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{round($package_plans[1]->price)}} </b>Kyats</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Received <b>more</b> quotation request</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company in <b>home</b> page</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company's product, project, service information.</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company in <b>upper position of free package</b></p>
                      <p><i class="fa fa-times text-danger" aria-hidden="true"></i> Company can request to site owner for adding and updating company's all information.</p>
                    </div>
                    
                    <!--standard-->
                <div class="row">
                   <div class="col-lg-12">
                      <center>
                       <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard btn_buy" data-dismiss="modal" aria-label="Close" data-id="{{ $package_plans[1]->id }}">Request To Update</button>
                      </center>
                    </div>
                </div>
               <!--end-->
      
                  </div>
                </div>
              </div>
               <div class="col-md-4 col-sm-6">
                <div class="side-bar package">
                  <div class="panel" style="padding-bottom:10px">
                    <div class="panel-heading"> 
                       <h2 class="panel-title text-center">{{$package_plans[0]->name}} Package</h2>
                    </div>
                      <div class="panel-body left_menu">
                          @if($package_plans[0]->periods == 0)
                         <?php  $periods='unlimited'; ?>
                          @else
                          <?php $periods=$package_plans[0]->periods; ?>
                          @endif
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{$periods}}</b> Days</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b> {{round($package_plans[0]->price)}} </b>Kyats</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Received <b>a little</b> quotation request</p>
                      <p><i class="fa fa-times text-danger" aria-hidden="true"></i> Display company in <b>home</b> page</p>
                      <p><i class="fa fa-times text-danger" aria-hidden="true"></i> Display company's product, project, service information.</p>
                      <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company in <b>lower position </b> of company</p>
                      <p><i class="fa fa-times text-danger" aria-hidden="true"></i> Company can request to site owner for adding and updating company's all information</p>
                    </div>
                    
                     <!--standard-->
                <!--<div class="row">-->
                <!--   <div class="col-lg-12">-->
                <!--      <center>-->
                <!--       <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard btn_buy" data-dismiss="modal" data-id="{{ $package_plans[0]->id }}" aria-label="Close">Request To Buy</button>-->
                <!--      </center>-->
                <!--    </div>-->
                <!--</div>-->
      <!--end-->
      
                  </div>
                </div>
               
              </div>
            </div>
          </li>
          
      </div>
      </ul> 

      </div>    
    </div>      
    <!--container end--> 
  </section>
 <!--inner content end--> 
<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
         
            $(document).on('click', '.btn_buy', function() {
                  $(".btn_buy").attr('disabled','disabled');   
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);
                               
             /* var ans =confirm('Are you sure to buy?')
              if(ans) 
              {   */
                   var id = $(this).data('id');
                   console.log(id);
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('package.store') }}",
                     data: {'id':id},
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){ 
                             var message = data.success;
                                var url = "{{ route('package.index') }}";
                                 callbackURL(message,url);
                             
                         }
                         else{
                           /* message = '<span class="alert alert-danger">'+msg+'</span>';
                            $("#error").html(data.errors);*/
                             var message = "Something Wrong!";
                         callbackFailure(message) ;
                         } 
                      }
                     
                   }); 
             /* }*/
            });
          </script>
@endsection 

 
