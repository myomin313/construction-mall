@extends('layouts.admin_panel')
@section('content')
 
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-t-30 mg-b-15">
  <div class="container-fluid">
    @include('admin.element.breadcrumb')
    <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Update Range Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ url('range/index?page='.Session::get('pageno')) }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             Range List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
             

    <div class="card-body">
         <form  id="editServiceForm" action="{{ route('range.update',$range->id) }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
              <div id="error">
              </div>

              <div class="form-group">
               <label for="name">Minimun Price:</label><span class="text-error-danger"> * </span>
               <input type="number" class="form-control {{ $errors->has('minimum_price') ? 'error-messageborder' : '' }}" placeholder="Minimun Price" name="minimum_price" value="{{ $range->minimum_price }}">
            <!-- Error -->
                @if ($errors->has('minimum_price'))
                <div class="error">
                    {{ $errors->first('minimum_price') }}
                </div>
                @endif
            <!-- End Error -->
             </div>
             
             <div class="form-group">
               <label for="name">Maximum Price:</label><span class="text-error-danger"> * </span>
               <input type="number" class="form-control {{ $errors->has('maximum_price') ? 'error-messageborder' : '' }}" placeholder="Maximum Price" name="maximum_price" value="{{ $range->maximum_price }}">
              <!-- Error -->
                @if ($errors->has('maximum_price'))
                <div class="error">
                    {{ $errors->first('maximum_price') }}
                </div>
                @endif
            <!-- End Error -->
             </div>
              <div class="form-group">
               <label for="name">Currency:</label><span class="text-error-danger"> * </span><br>

               @foreach($currency_units as $currency_unit)
              <label style="padding-right: 30px;">
              <input type="radio" name="currency" value="{{$currency_unit->id}}" {{($currency_unit->id==$range->currency_unit_id)?'checked':''}}> <span>{{$currency_unit->unit}} ({{$currency_unit->currency_name}})</span>
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
