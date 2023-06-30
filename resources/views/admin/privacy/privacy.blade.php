@extends('layouts.homeapp')
@section('content')
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
  <!--preloader end--> 
   @include('element.header')
  <!--main-header end--> 
 <section class="term inner-heading" style="background-image: url('{{ asset('storage/setting/'.$privacy->header_image)}}');background-repeat: no-repeat;
  background-size: auto;">
    <div class="container">
    <h1><?php echo $privacy->privacy_header ?></h1>
    </div>
 </section>
  <section class="privacy inner-wrap"> 
    <!--container start-->
    <div class="container">
      <div class="row">
      <!--row start-->
      <ul class="blog-grid">
        <div class="col-md-offset-1 col-md-10 col-sm-offset-2 col-sm-8">
          <li>
             <div class="blog-inter">
               <div class="row">
                <div class="col-md-12">
                 <?php echo $privacy->privacy ?>
                </div>
                <div class="col-md-12" style="text-align: center">
                 <a  href="{{ route('privacy.edit')}}" class="btn btn-primary">EDIT</a>
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