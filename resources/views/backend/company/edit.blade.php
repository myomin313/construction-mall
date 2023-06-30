@extends('backend.layouts.company_panel')
@section('title','Change Company Information')
@section('extra_css')
<style>
        .what_we_do ul li{
            list-style-type:square !important;
        }
        .what_we_do ol li{
            list-style-type:roman !important;
        }
    </style>
@endsection
@section('content')
     <section class="inner-wrap supplier_detail">
         <!--container start-->
         <div class="container">
             <div class="row">
                 <!--row start-->
                 <ul class="blog-grid">
                     <li>
                         <div class="blog-inter" style="padding:30px">
                             <h2 class="text-capitalize text-center" style="font-size:20px;color: #000000">Welcome {{Auth::user()->name}} !!!.Please Fill
                                 Detail Information About Your Company.</h2>
                             @include('backend.element.company_basic_profile_form')
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </section>
@endsection
@section('script')
@include('backend.element.company_basic_profile_script')

   
@endsection
