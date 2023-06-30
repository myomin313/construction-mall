@extends('layouts.admin_panel')
@section('content')
<div class="content">
      <div class="container-fluid">
        @include('admin.element.breadcrumb')

       <h4><center>Seller Package List</center></h4><br>
        <div class="row">
           <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card">
               @include('admin.element.success-message')
              <div class="card-header card-header-primary">
                    
                @php
                  $plan2id = $package_plans[2]->id;
                  $plan2id = \Crypt::encrypt($plan2id);
                  $plan1id = $package_plans[1]->id;
                  $plan1id = \Crypt::encrypt($plan1id);
                  $plan0id = $package_plans[0]->id;
                  $plan0id = \Crypt::encrypt($plan0id);
                @endphp
                  
               
                <h4 class="card-title"> <h3 class="panel-title"> <a  href="{{route('packageplans.edit',$plan2id)}}"><u> {{$package_plans[2]->name}} Package</u></a> </h3></h4>
              </div>
              <div class="card-body">
                  <span><i class="fa fa-check text-success"></i><i><b> {{$package_plans[2]->periods}}</b></i> Days</span><br>
                  <span><i class="fa fa-check text-success"></i>{{number_format($package_plans[2]->price)}} {{$package_plans[2]->unit}}</span><br>
                  <span><i class="fa fa-check text-success"></i> Request Quote</span><br>
                  <span><i class="fa fa-check text-success"></i> Get <B><I>A Lot Of</I></B> Quote</span><br>
                  <span><i class="fa fa-check text-success"></i> Show In Home Page</span><br>
                  <span><i class="fa fa-check text-success"></i> Show Company's Profile</span><br>
                  <span><i class="fa fa-check text-success"></i> Show Company's Dashboard</span><br>
                   <span><i class="fa fa-check text-success"></i> Add And Change Company Profile Information By Website Admin</span><br>
                  <span><i class="fa fa-check text-success"></i> Add And Change Company's Product, Project, Service By Website Admin</span><br>
                  <span><i class="fa fa-check text-success"></i> Add Company's Product,Project,Service</span><br>
                  <span><i class="fa fa-check text-success"></i> Show Company's Product,Project,Service</span><br>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> <h3 class="panel-title"> <a  href="{{route('packageplans.edit',$plan1id)}}"><u> {{$package_plans[1]->name}} Package</u></a> </h3></h4>
              </div>
              <div class="card-body">
                  <span><i class="fa fa-check text-success"></i><i><b> {{$package_plans[1]->periods}}</b></i> Days</span><br>
                  <span><i class="fa fa-check text-success"></i>{{number_format($package_plans[1]->price)}} {{$package_plans[1]->unit}}</span><br>
                  <span><i class="fa fa-check text-success"></i> Request Quote</span><br>
                  <span><i class="fa fa-check text-success"></i> Get <B><I>More</I></B> Quote</span><br>
                  <span><i class="fa fa-check text-success"></i> Show In Home Page</span><br>
                  <span><i class="fa fa-check text-success"></i> Show Company's Profile</span><br>
                  <span><i class="fa fa-check text-success"></i> Show Company's Dashboard</span><br>
                   <span><i class="fa fa-times text-danger"></i> Add And Change Company Profile Information By Website Admin</span><br>
                  <span><i class="fa fa-times text-danger"></i> Add And Change Company's Product, Project, Service By Website Admin</span><br>
                  <span><i class="fa fa-check text-success"></i> Add Company's Product,Project,Service</span><br>
                  <span><i class="fa fa-check text-success"></i> Show Company's Product,Project,Service</span><br>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> <h3 class="panel-title"> <a  href="{{route('packageplans.edit',$plan0id)}}"><u> {{$package_plans[0]->name}} Package</u></a> </h3></h4>
              </div>
              <div class="card-body">
                     @if($package_plans[0]->periods == 0)
                         <?php  $periods='unlimited'; ?>
                          @else
                          <?php $periods=$package_plans[0]->periods; ?>
                          @endif
                  <span><i class="fa fa-check text-success"></i> <i><b>{{$periods}}</b></i> Days</span><br>
                  <span><i class="fa fa-check text-success"></i> {{number_format($package_plans[0]->price)}} {{$package_plans[0]->unit}}</span><br>
                  <span><i class="fa fa-check text-success"></i> Request Quote</span><br>
                  <span><i class="fa fa-check text-success"></i> Get A <B><I>Little</I></B> Quote</span><br>
                  <span><i class="fa fa-times text-danger"></i> Show In Home Page</span><br>
                  <span><i class="fa fa-check text-success"></i> Show Company's Profile</span><br>
                  <span><i class="fa fa-check text-success"></i> Show Company's Dashboard</span><br>
                   <span><i class="fa fa-times text-danger"></i> Add And Change Company Profile Information By Website Admin</span><br>
                  <span><i class="fa fa-times text-danger"></i> Add And Change Company's Product, Project, Service By Website Admin</span><br>
                  <span><i class="fa fa-times text-danger"></i> Add Company's Product,Project,Service</span><br>
                  <span><i class="fa fa-times text-danger"></i> Show Company's Product,Project,Service</span><br>
                 

              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
           var page ='<?php echo $package_plans->currentPage() ?>';
            $(document).on('click', '.btn_buy', function() {
              var ans =confirm('Are you sure to buy?')
              if(ans)
              {   
                   var id = $(this).data('id');
                   console.log(id);
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('package.store') }}",
                     data: {'id':id},
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){ 
                             var message = data.success;
                                var url = "{{ route('package.index') }}";
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