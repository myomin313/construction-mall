@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Reset Password')
@section('extra_css')
@section('content')

<body class="freelancers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
   @include('element.header')
  <!--main-header end-->
    <section class="inner-wrap blogs" style="min-height:370px"> 
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
               @include('admin.element.success-message')
            <div class="card" style="position:relative;top:50px">
                <div class="card-body" style="position:relative;">
                    
                    <!--@if (session('success'))-->
                    <!--    <div class="alert alert-success" role="alert">-->
                    <!--        {{ session('success') }}-->
                    <!--    </div>-->
                    <!--@endif-->
                    <form method="POST" action="{{ route('reset.password') }}" aria-label="{{ __('Reset Password') }}" >
                        @csrf                           
                        <div class="form-group row">
                            <h3 class="col-md-12"  style="text-align:center">Forgot Password?</h3>
                           <p class="col-md-12"  style="text-align:center">You can reset your password here.</p>
                            <div class="col-md-4" style="text-align: right">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            </div>
                            <div class="col-md-6">
                            <input type="hidden" name="role" value="{{ $role }}">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="error" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4" style="text-align: center">
                                <button type="submit" class="btn btn-primary"  style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important;border-color:{{ $projectsetting->home_nav_first_background}}">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
