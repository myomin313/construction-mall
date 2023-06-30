@extends('layouts.homeapp')
@section('content')
  <link href="css/privacy_style.css" rel="stylesheet">
  <style type="text/css">
.mega-dropdown {
position: static !important;
}

.navbar-nav>li>.dropdown-menu ul li a{
  font-size: 14px;
}
</style>
<body>
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
   @include('element.header')
  <!--main-header end--> 
 <section class="term inner-heading" style="background-image: url('{{ asset('storage/setting/'.$termsofservice->header_image)}}'); background-repeat: no-repeat !important;background-size: auto !important;">
    <div class="container">
    <h1> <?php  echo $termsofservice->header; ?></h1>
    </div>
  </section>
  <section class="term inner-wrap"> 
    <!--container start-->
    <div class="container">
      <div class="row">
      <!--row start-->
      <ul class="blog-grid">
        <div class="col-md-offset-1 col-md-10 col-sm-offset-2 col-sm-8">
          <li>
             <div class="blog-inter">
               <div class="row">
                
                <div class="col-md-12 col-sm-12">
                 <?php  echo $termsofservice->termsOfService; ?>
                </div>
                <div class="col-md-12" style="text-align: center">
                 <a  href="{{ route('terms-of-service.edit')}}" class="btn btn-primary">EDIT</a>
                </div>
              
               </div>

             </div>
          </li>
        </div>
      </ul>
      </div>
    </div>
  </section>
@endsection