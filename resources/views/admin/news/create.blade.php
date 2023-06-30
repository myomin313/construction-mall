@extends('layouts.admin_panel')

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mg-t-30 mg-b-15">
  <div class="container-fluid">
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('admin.element.breadcrumb')
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Add News</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('news.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             News List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
<div class="card-body">
  
         <form   enctype="multipart/form-data" action="{{ route('news.store') }}" method="POST">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
               <div class="form-group">
               <label for="name">Title:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('title') ? 'error-messageborder' : '' }}" placeholder="Title" name="title" value="{{old('title') }}" >
                <!-- Error -->
                @if ($errors->has('title'))
                <div class="error">
                    {{ $errors->first('title') }}
                </div>
                @endif
            <!-- End Error -->
             </div>
             
              <div class="form-group">
               <label for="name">Link:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('link') ? 'error-messageborder' : '' }}" placeholder="Eg.http://www.facebook.com" name="link" value="{{old('link') }}">
                <!-- Error -->
                @if ($errors->has('link'))
                <div class="error">
                    {{ $errors->first('link') }}
                </div>
                @endif
            <!-- End Error -->
             </div>

              <div class="form-group">
               <label for="name">Description:</label>
               <input type="text" class="form-control" placeholder="Description " name="description" >
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
</div>
</div>



@endsection
