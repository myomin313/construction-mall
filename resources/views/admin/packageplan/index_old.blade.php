@extends('layouts.company_panel')
@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Buy Package Plan</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <a href="{{route('package.history')}}" class="btn btn-default pull-right">Package History</a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">

                  
                  <div class="table-responsive">
                  <div id="error">
                  </div>
                  <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" 
                  data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                  data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                   data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="name" data-editable="true">Name</th>
                                        <th data-field="price" data-editable="true">Price</th>
                                        <th data-field="approve" data-editable="true">Periods</th>
                                        <th data-field="action" data-editable="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php  var_dump("hii");exit(); ?>
                                @php $count=1;@endphp
                                @foreach($package_plans as $package_plan)
                                    <tr>
                                        <td>{{$count}}</td>
                                      
                                        <td><?= $package_plan->name ?></td>
                                        <td><?= $package_plan->price ?>
                                        </td>
                                        <td><?= $package_plan->periods ?>
                                        </td>
                                        <td> <center>
                                           <a class="btn_buy btn btn-success btn-sm" data-id="{{$package_plan->id}}" 
                                            >Request To Buy
                                          </a>
                                           </center></td>
                                    </tr>
                                    @php $count++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
         
            $(document).on('click', '.btn_buy', function() {
                  $(".btn_buy").attr('disabled','disabled');   
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);
                               
             /* var ans =confirm('Are you sure to buy?')
              if(ans) 
              {   */
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
                           /* message = '<span class="alert alert-danger">'+msg+'</span>';
                            $("#error").html(data.errors);*/
                             var message = "Something Wrong!";
                         callbackFailure(message) ;
                         } 
                      }
                     
                   }); 
             /* }*/
            });
          </script>
@endsection