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
                        <h3 class="panel-title">Add New Company Advertising</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('companyadvertisinglist.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                             Company Advertising List
                          </a>
                    </div>   
                  </div>
                </h4>
              </div>
             <div class="card-body table-responsive">
    <div class="row">
     <div class="panel">
       <div class="panel-body">
    
         <form   enctype="multipart/form-data" action="{{ route('companyadvertisinglist.store') }}" method="POST">
          {{csrf_field()}}
           <div id="error">
              </div>
              
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
               <label for="start_date">Company Name:</label><span class="text-error-danger"> * </span>
              <select class="form-control" name="company_id" >
                @foreach($companies as $company)
                @if(!empty($company->user))
                <option value="{{ $company->id }}">{{ $company->user->name }}</option>
                @endif
                @endforeach
              </select>
              </div>
              </div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                  <label for="start_date">Plan Name:</label><span class="text-error-danger"> * </span>
              <select class="form-control" name="plan_id">
                @foreach($advertising_plans as $advertising_plan)
                <option value="{{ $advertising_plan->id }}">{{ $advertising_plan->plan_name }} - {{ $advertising_plan->periods }} Days - {{ $advertising_plan->price }} Ks</option>
                @endforeach
              </select>
              </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                  <div class="form-group">
                                                        <label for="start_date">Start Date:</label><span class="text-error-danger"> * </span>
                                                        <input type="text" class="project_type form-control" id="start_date" autocomplete="off" name="start_date" placeholder="Start Date" />
                                                         @if ($errors->has('start_date'))
                                                        <div class="error">
                                                        {{ $errors->first('start_date') }}
                                                        </div>
                                                        @endif
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
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#start_date").datepicker({
            format: "yyyy-mm-dd",
        });

        $("#end_date").datepicker({
            format: "yyyy-mm-dd",
        });
        dateRangePicker();

  function dateRangePicker() {
        var $startDate = $("#start_date");
        var $endDate = $("#end_date");

        $startDate
            .datepicker({
                autoHide: true,
            })
            .on("changeDate", function (ev) {
                $startDate.datepicker("hide");
            });

        $endDate
            .datepicker({
                autoHide: true,
                startDate: $startDate.datepicker("getDate"),
            })
            .on("changeDate", function (ev) {
                $endDate.datepicker("hide");
            });

        $startDate.on("change", function () {
            $endDate.datepicker("setStartDate", $startDate.datepicker("getDate"));
        });
    }
  });
</script>
@endsection
