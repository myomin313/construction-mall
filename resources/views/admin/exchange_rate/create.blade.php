@extends('layouts.admin_panel')
@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-t-30 mg-b-15">
  <div class="container-fluid">
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Add New Daily Product Price</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('dailyproductprice.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Daily Product Price List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
<div class="card-body">
   
         <form   enctype="multipart/form-data" action="{{ route('dailyproductprice.store') }}" method="POST">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
              <div id="error">
              </div>
              
              <div class="form-group">
               <label for="name">Product Name:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('product_name') ? 'error-messageborder' : '' }}" placeholder="Product Name" name="product_name" value="{{old('product_name') }}" >
                <!-- Error -->
                @if ($errors->has('product_name'))
                <div class="error">
                    {{ $errors->first('product_name') }}
                </div>
                @endif
            <!-- End Error -->
              </div>
              <div class="form-group">
               <label for="name">Price:</label><span class="text-error-danger"> * </span>
               <input type="number" class="form-control {{ $errors->has('price') ? 'error-messageborder' : '' }}" placeholder="Price" name="price" value="{{old('price') }}" >
               <!-- Error -->
                @if ($errors->has('price'))
                <div class="error">
                    {{ $errors->first('price') }}
                </div>
                @endif
            <!-- End Error -->
              </div>
               <div class="form-group">
               <label for="name">Currency:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('currency') ? 'error-messageborder' : '' }}" placeholder="Currency" name="currency" value="{{old('currency') }}">
               <!-- Error -->
                @if ($errors->has('currency'))
                <div class="error">
                    {{ $errors->first('currency') }}
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
