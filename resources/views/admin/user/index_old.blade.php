@extends('layouts.user')
@section('content')
		 <div class="analytics-sparkle-area">
		 <div class="container-fluid">
		<form action="{{url('userlist')}}" method="POST">
        {{-- {{ csrf_field() }}
        {{ method_field('PATCH') }} --}}
  <!-- <h2>Register Form</h2> -->
  
   <div style="max-width:500px; margin:auto;margin-top: 50px;} " class="imgcontainer">
    <img src="{{ asset('admin/images/member/profile.png')}}" alt="Avatar" class="avatar">
  </div>
  
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="col-md-6 col-sm-6 col-xs-6">
  <div class="form-group input-container">
    <i class="fa fa-user iconuserupdate"></i>
    <input class="input-field" type="text" placeholder="Username" name="name" >
  </div>
  </div>
<div class="col-md-6 col-sm-6 col-xs-6">
  <div class="form-group input-container">
    <i class="fa fa-envelope iconuserupdate"></i>
    <input class="input-field" type="text" placeholder="Email" name="email">
  </div>
  </div>
  </div>
  
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="col-md-6 col-sm-6 col-xs-6">
  <div class="form-group input-container">
    <i class="fa fa-phone iconuserupdate"></i>
    <input class="input-field" type="phone" placeholder="Phone" name="phone">
  </div>
  </div>
   
 </div>
   <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="col-md-6 col-sm-6 col-xs-6">
  <button style="max-width:500px; margin:auto; " type="submit" class="btnusercancel">Cancel</button>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
  <button style="max-width:500px; margin:auto; " type="submit" class="btnuserupdate">Update</button>
  </div>
  </div>
</form>
		</div>
		</div>
@endsection
	