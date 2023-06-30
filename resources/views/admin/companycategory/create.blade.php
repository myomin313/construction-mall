@extends('layouts.admin_panel')

@section('content')
 
<!-- Single pro tab review Start-->
  <div class="container-fluid">
    <div class="row"> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          @include('admin.element.breadcrumb')
        <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Add New Company Category</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('companycategory.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             Company Category List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
             <div class="card-body table-responsive">    
         <form   enctype="multipart/form-data" action="{{ route('companycategory.store') }}" method="POST">
          {{csrf_field()}}
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
              <label>Parent Category :</label>
              <select class="form-control" name="parent_id" style="margin:10px 0px !important">
                @foreach($company_catgories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

              </select>
              <div class="form-group">
               <label for="category_name">Category Name:</label><span class="text-error-danger"> * </span>
               <input type="text" class="form-control {{ $errors->has('category_name') ? 'error-messageborder' : '' }}" placeholder="Name" name="category_name" >
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
             <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Save</button>
           </div>
         </div>
       </div>
     </form>                   
      </div>
    </div>
  </div>
</div>
</div>




@endsection
