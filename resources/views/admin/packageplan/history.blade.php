@extends('layouts.company_new_panel')
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
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 2)
   @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->supplier_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 3)
   @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->reno_default_background_image) }}');">
  @endif
  @endif
    <div class="container">
      <h1>Ordered Package History</h1>
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
        
        <!--col start-->
        @include('element.company_menu')
         
        </div>
      <div class="col-md-9 col-sm-12">
         
          
          <li>
              @if(count($company_package_plans) > 0 ) 
            <div class="blog-inter">
               <table class="table table-stripe">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="20%">Package Plan</th>
                      <th width="15%">Status</th>
                      <th width="20%">Approve Status</th>
                      <th width="20%">Start Date</th>
                      <th width="20%">End Date</th>
                    </tr>
                  </thead>
                  <tbody>
                       @php $count=1;@endphp
                     @foreach($company_package_plans as $company_package)
                    <tr> 
                      <td>{{ $count }} </td> 
                      <td><?= $company_package->packageplan_name ?></td> 
                      <td><?= ($company_package->is_active =='1')?'<span class="badge" style="background:green">Active</span>':'<span class="badge" style="background:red">Unactive</span>' ?></td> 
                      <td><?= $company_package->approve ?></td> 
                      <td><?= $company_package->start_date ?></td>
                      <td><?= $company_package->end_date ?></td>
                     </tr>
                     @php $count++; @endphp
                     @endforeach
                    <!--<tr> -->
                    <!--  <td>2</td> -->
                    <!--  <td>10000</td> -->
                    <!--  <td>200000</td> -->
                    <!--  <td>approved</td> -->
                    <!--  <td>2020-10-20 18:40:49</td> -->
                    <!--</tr>-->
                  </tbody>
                </table>
            </div>
            <div class="pagination-area">
              <ul class="pagination">
                   {{ $company_package_plans->links() }}
              </ul>
            </div>
            @else
            <div class="blog-inter" style="min-height:350px">
                  @include('element.404')
              </div>
            @endif
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
<!--footer-secn end-->
 @endsection
 
 

