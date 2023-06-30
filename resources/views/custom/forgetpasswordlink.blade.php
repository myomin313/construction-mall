@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Reset Password')
@section('extra_css')
@endsection
@section('content')

   <section class="inner-wrap blogs" style="min-height:400px"> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('admin.element.success-message')
            <div class="card" style="position:relative;top:70px">
                <h1 class="card-header" style="text-align: center">{{ __('Reset Password') }}</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('reset.password.post') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <input type="hidden" name="role" value="{{ $role }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-3" style="text-align:center">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}"  autofocus>

                                @if ($errors->has('email'))
                                    <span class="error" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3" style="text-align:center">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="error" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3" style="text-align:center">{{ __('Confirm Password') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation">
                                
                                 @if($errors->has('password_confirmation'))
                                    <span class="error" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4" style="text-align: center">
                                <button type="submit" class="btn btn-primary"
                                style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important;border-color:{{ $projectsetting->home_nav_first_background}}">
                                    {{ __('Update Password') }}
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
