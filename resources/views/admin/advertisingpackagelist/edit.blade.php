@extends('layouts.admin_panel')
@section('content')
<!-- Single pro tab review Start-->
  <div class="container-fluid">
    @include('admin.element.breadcrumb')
    <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Update Advertising Package Plan Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('advertisingpackagelist.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             Advertising Package Plan List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">

    
         <form  id="editServiceForm" action="{{ route('advertisingpackagelist.update',$package->id) }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
              <div id="error">
              </div>

              <div class="form-group">
               <label for="name">Price:</label><span class="text-error-danger"> * </span>
               <input type="number" class="form-control {{ $errors->has('price') ? 'error-messageborder' : '' }}" placeholder="Price" name="price" value="{{ $package->price }}">
                 <!-- Error -->
                @if ($errors->has('price'))
                <div class="error">
                    {{ $errors->first('price') }}
                </div>
                @endif
            <!-- End Error -->
             </div>
             <div class="form-group">
               <label for="name">Plan Name:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('plan_name') ? 'error-messageborder' : '' }}" placeholder="Plan Name" name="plan_name" value="{{ $package->plan_name }}">
                 <!-- Error -->
                @if ($errors->has('plan_name'))
                <div class="error">
                    {{ $errors->first('plan_name') }}
                </div>
                @endif
            <!-- End Error -->
             </div>
             <div class="form-group">
               <label for="name">Period:</label><span class="text-error-danger"> * </span>
               <input type="number" class="form-control {{ $errors->has('periods') ? 'error-messageborder' : '' }}" placeholder="Periods" name="periods" value="{{ $package->periods }}">
                 <!-- Error -->
                @if ($errors->has('periods'))
                <div class="error">
                    {{ $errors->first('periods') }}
                </div>
                @endif
            <!-- End Error -->
             </div>
              <div class="form-group">
               <label for="name">Currency:</label><span class="text-error-danger"> * </span><br>

               @foreach($currency_units as $currency_unit)
              <label style="padding-right: 30px;">
              <input type="radio" name="currency" value="{{$currency_unit->id}}" {{($currency_unit->id==$package->currency_unit_id)?'checked':''}}> <span>{{$currency_unit->unit}} ({{$currency_unit->currency_name}})</span>
              </label>
              @endforeach
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
             <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Update</button>
           </div>
         </div>
       </div>
     </form>                   
   </div>
 </div>
</div>
</div>


<!--image upload-modal start-->
<div class="modal fade bs-example-modal-md-1 " tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
      
      <p>
        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image" data-dismiss="modal" aria-label="Close">Upload</button>
      </p>
    </div>
  </div>
</div>


@endsection
