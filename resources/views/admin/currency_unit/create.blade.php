@extends('layouts.admin_panel')
@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-t-30 mg-b-15">
  <div class="container-fluid">
      @include('admin.element.breadcrumb')
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Add New Currency Unit</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('currency-unit.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Currency Unit List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
<div class="card-body">
   
         <form  action="{{ route('currency-unit.store') }}" method="POST">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
              <div id="error">
              </div>
              
              <div class="form-group">
               <label for="name">Currency Name:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('currency_name') ? 'error-messageborder' : '' }}" placeholder="Eg. Myanmar Kyat" name="currency_name" value="{{old('currency_name') }}" >
                <!-- Error -->
                @if ($errors->has('currency_name'))
                <div class="error">
                    {{ $errors->first('currency_name') }}
                </div>
                @endif
            <!-- End Error -->
              </div>
              <div class="form-group">
               <label for="name">Unit:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('unit') ? 'error-messageborder' : '' }}" placeholder="Eg. MMK" name="unit" value="{{old('unit') }}" >
               <!-- Error -->
                @if ($errors->has('unit'))
                <div class="error">
                    {{ $errors->first('unit') }}
                </div>
                @endif
            <!-- End Error -->
              </div>            

           </div> 

         </div>
         <div class="row">
           <div class="col-lg-12 col-md-12">
            <div class="payment-adress">
             <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Save</button>
           </div>
         </div>
       </div>
     </form>                   
</div>
</div>



@endsection
