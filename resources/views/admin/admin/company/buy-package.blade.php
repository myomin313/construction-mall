@extends('layouts.admin_panel')
@section('content')
  
      <div class="container-fluid">
        @include('admin.element.breadcrumb')
       <h4><center>Seller Package List</center></h4><br>
        <div class="row">

            @include('admin.element.success-message')
            @foreach($package_plans as $package_plan)
                <div class="col-md-4 col-sm-6">
                    <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> <h3 class="panel-title">{{ $package_plan->name}} Package</h3></h4>
                </div>
              
                    <!--end-->
                    <div class="card-body">
                        <!--<div class="panel">-->
                            <div class="panel-body left_menu">
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{($package_plan->id ==1)?"Unlimited" : $package_plan->periods}}</b> Days</p>
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{round($package_plan->price)}}</b>Kyats</p>
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> Received <b>
                                        {{($package_plan->id == 1)?'a little':(($package_plan->id == 2)?'more':'a lot of')}}</b> quotation request</p>
                                <p><i class="fa fa-{{($package_plan->id == 1)? 'times text-danger':'check text-success'}}" aria-hidden="true"></i> Display company in <b>home</b> page</p>
                                <p><i class="fa fa-{{($package_plan->id == 1)? 'times text-danger':'check text-success'}}" aria-hidden="true"></i> Display company's product, project, service information.</p>
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company in <b>
                                        {{($package_plan->id == 1)?'lower position':(($package_plan->id == 2)?'Upper position of free package':'top position')}}</b></p>
                                <p><i class="fa fa-{{($package_plan->id == 1 || $package_plan->id == 2)? 'times text-danger':'check text-success'}}" aria-hidden="true"></i> Can request for changing company's all informations.</p>
                            </div>
                            <!--standard-->
                            @if($package_plan->id != 1)
                            <div class="row">
                                <div class="col-lg-12">
                                    <center>
                                        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn_buy" data-dismiss="modal" aria-label="Close" data-id="{{ $package_plan->id}}" data-company_id="{{ $id }}">Request To Buy</button>
                                    </center>
                                </div>
                            </div>
                            @endif
                            <!--end-->
                        <!--</div>-->
                    </div>
                    <!--start-->
                    </div>
                </div>
                @endforeach
          </div>
        </div>
      </div>
  @php
     $id =  \Crypt::encrypt($id);
 @endphp

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
            $(document).on('click', '.btn_buy', function() {
              var ans =confirm('Are you sure to buy?')
              if(ans)
              {   
                   var id = $(this).data('id');
                   var company_id = $(this).data('company_id');
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('admin.company.package.store') }}",
                     data: {'id':id,'company_id':company_id},
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){ 
                             var message = data.success;
                            var url = "{{ url('admin/company/package/'.$id) }}";
                                 callbackURL(message,url);
                           
                         }
                         else{
                              var message = "Something Wrong!";
                         callbackFailure(message) ;
                         
                          /*  message = '<span class="alert alert-danger">'+msg+'</span>';
                            $("#error").html(data.errors);*/
                         } 
                      }
                     
                   }); 
              }
            });
    </script>
@endsection