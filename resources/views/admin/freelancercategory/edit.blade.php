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
                        <h3 class="panel-title">Update Freelancer Category Information</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ url('freelancercategory/index?page='.Session::get('pageno')) }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             Freelancer Category List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
               
         <form  id="editServiceForm" action="{{ route('freelancercategory.update',$freelancercategory->id) }}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
              <div id="error">
              </div>

              <div class="form-group">
               <label for="name">Category Name:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('category_name') ? 'error-messageborder' : '' }}" placeholder="Category Name" name="category_name" value="{{ $freelancercategory->name }}">
                <!-- Error -->
                @if ($errors->has('category_name'))
                <div class="error">
                    {{ $errors->first('category_name') }}
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
