@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Reset Password')
@section('extra_css')
@endsection
@section('content')
  <!--main-header end-->
    <section class="inner-wrap blogs" style="min-height:380px"> 
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"  style="position:relative;top:60px">
                <h1 class="card-header" style="text-align: center">{{ __('Reset Password') }}</h1>
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" >
                        @csrf
                           
                        <div class="form-group row">
                            <!--<h3 class="col-md-12"  style="text-align:center">Forgot Password?</h3>-->
                           <p class="col-md-12"  style="text-align:center">You can reset your password here.</p>
                            <div class="col-md-4" style="text-align: right">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            </div>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4" style="text-align: center">
                                <button type="submit" class="btn btn-primary">
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
