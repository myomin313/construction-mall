@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
        <div class="data-table-area  mg-t-10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card-header-primary">
                            <h4 class="card-title ">
                              <div class="row">
                                 <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h3 class="panel-title">{{ $company->user->name }}'s Services</h3>
                                </div>
                                 <!--<div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <a href="{{ url('admin/project/create/'.$id)}}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
                                        Add New
                                    </a>
                                </div>   -->
                              </div>
                            </h4>
                          </div>
                    <!--<div class="row">
                    <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-offset-2 col-sm-4 col-xs-12 company_profile">
                        <h2 class="center">Company Service List</h2>  
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <ol class="breadcrumb pull-left">
                          <!--<li><a href="#">Dashboard</a></li>
                          <li class="#"><a href="{{route('service.index')}}"> Service List</a></li>-->
                        </ol>
                    </div>
                     <!--<div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <ol class="breadcrumb pull-right">
                           <a href="{{url('admin/service/create/'.$id)}}" class="btn btn-md btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add New
                            </a>
                        </ol>
                    </div>-->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                 @include("admin.element.flash_message")   
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                      @if(Session::has('success')) 
                                        <script type = "text/javascript">  
                             var message = "{{Session::get('success')}}"; 
                                 callbackSuccess(message);
</script>
                                    @endif
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                     
                                    @php
                                            $service_id =  \Crypt::encrypt($id); 
                                             if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                                            @endphp
                                          
                                      <!--start-->
                                      
                                    <form class="form-inline" action="{{ url('admin/company-service/'.$id) }}" method="post">
                                          {{csrf_field()}}
                                       <div class="form-group">
                                          <label class="sr-only">Service Name</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Service name">
                                       </div>
                                      <button type="submit" class="btn btn-success">Search</button>
                                      <a  class="btn btn-reset" href="{{ url('admin/company-service/'.$id) }}">Reset</a>
                                    </form>
                                    <!--end-->
                                    
                                    <div class="row" style="padding:10px">
                                    <div class="col-md-12">
                                       <a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a>  
                                       <a  type="button" href="{{url('admin/service/create/'.$service_id)}}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                                    </div>
                                   </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                               <th data-field="state"><input type="checkbox" name="category_id" id="checkall"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="name" data-editable="true"> Service Name</th>
                                                <th data-field="description" data-editable="true">Description</th>
                                                <th data-field="image" data-editable="true">Image</th>

                                                <!--<th data-field="action">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @php
                                            $id =  \Crypt::encrypt($id);
                                            @endphp
                                            @php $count=1; @endphp
                                            @foreach($company_services as $company_service):
                                            <tr>
                                                <td><input class="checkbox" name="serviceid" type="checkbox" data-id="{{ $company_service->id }}" value="{{ $company_service->id }}"/></td>
                                               
                                              <!--  <td><?= $count; ?></td>-->
                                              <td>{{ ($company_services->currentPage()-1) * $company_services->perPage() + $loop->index + 1 }}</td>
                                               
                                               
                                                <td>
                                                    @php
                                                    $service_id= \Crypt::encrypt($company_service->id);
                                                    $page = $company_services->currentPage();
                                                    $page =\Crypt::encrypt($page);
                                                @endphp
                                                    <a class="show-modal" data-id="{{$company_service->id}}" data-name="{{$company_service->service_name}}" 
                                                data-description="{{$company_service->service_detail}}"
                                                data-image="{{ $company_service->image_name }}"
                                                data-created_at="{{$company_service->created_at}}" data-updated_at="{{$company_service->updated_at}}" data-url="{{ url('admin/service/edit/'.$service_id.'/'.$page) }}"><?= $company_service->service_name ?></a></td>
                                                <td>
                                                 <?= $company_service->service_detail  ?>  
                                                </td>
                                                <td>
                                                     @if($company_service->image_name != null && $company_service->image_name !='undefined')
                                                    <img src="{{asset('storage/service/'.$company_service->image_name)}}" class="img img-thumbnail" style="width:100px;height:100px;">
                                                    @endif
                                                </td>
                                                
                                                <!--<td>
                                                    
                                                    <a href="{{route('admin.service.destroy',['id'=>$company_service->id,'company_id'=>$company_service->company_id])}}" class="btn btn-sm btn-danger" 
                                                    >Delete
                                                    </a>
                                                </td>-->
                                            </tr>
                                            
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                       {{ $company_services->links() }} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>    
                </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Static Table End -->
           <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <center id="photo">
                                            <!--<img id="photo" class="img-thumbnail">-->
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="service_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                         <div id="service_description">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                         <a type="button" id="company_service-edit" href="" class="btn btn-success editeducationBtn">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end--> 
 <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script  type="text/javascript">
         
          var page ='<?php echo $company_services->currentPage() ?>';
          
          /*$(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
            $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{url('admin/service/create/'.$id)}}"   class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
            $('.fixed-table-toolbar').append('<div style="float:left;width:50%;height:100%;"><a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a></div>');
         
          });*/
     </script>
     
       <script type="text/javascript">
           $(document).ready(function () {
        $('#table #checkall').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $("#table .checkbox").prop('checked', true);  
         } else {  
            $("#table .checkbox").prop('checked',false);  
         }  
        });

         $('#table .checkbox').on('click',function(){
            if($('#table .checkbox:checked').length == $('.checkbox').length){
                $('#table #checkall').prop('checked',true);
                
            }else{
                $('#table #checkall').prop('checked',false);
            }
            //  if($(this).prop("checked") == true){
                 
            //       var ids = $("input:checkbox:checked").map(function(){
            //                     return $(this).data('id');
            //                      }).get();
            //                      alert(ids);
            //                 $.ajax({ 
            //                 url: "{{ URL::route('service.store-checkbox') }}",
            //                 type: 'POST',
            //                 data: {'ids' : ids},
            //                 dataType: 'json',
            //                 headers: {
            //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                 },
            //                 success: function(data){ 
            //                 },
            //                 error:function(e)
            //                 {
            //                     console.log(e);
            //                 }
            //                 });
               
            // }
            // else if($(this).prop("checked") == false){
            //     alert('false');
            // }
         });
           });
         </script>
         <script type="text/javascript">
         $(document).ready(function () {
             $('.deleteitemall').on('click',function(){
                 /*alert('hi');*/
            var serviceids = [];
                  $("input:checkbox[name=serviceid]:checked").each(function(){
                      serviceids.push($(this).val());
                       });
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('service.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : serviceids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                               /* alert(data.success);
                                location.reload();*/
                                 var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        }     
               });
         });
         </script>
        <script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.show-modal', function() { 
                var  page="<?php echo $company_services->currentPage(); ?>";
                   var APP_URL = '<?php echo url('/'); ?>';
                // $("#photo").attr('src', APP_URL+'storage/service/'+$(this).data('photo'));
                    if($(this).data('image') !== ''){
                      var img='<img src="'+APP_URL+'/storage/service/'+$(this).data('image')+'" style="width:50px;height:50px">';
                      $('#photo').html(img);
                    }else{
                      $('#photo').html('');
                    }
                    $('.modal-title').text('Service Detail');
                    $('#service_name').html($(this).data('name'));
                    // var image= $(this).data('image');
                    // $('#photo').attr('src',image);
                    // $('#photo').attr('width','100px');
                    $('#service_description').html($(this).data('description'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $("#company_service-edit").attr('href',$(this).data('url') );
                    /*$("#company_service-edit").attr('href', '{{ url('admin/service/edit/') }}'+'/'+$(this).data('id')+'/'+page);*/
                    $('#showModal').modal('show');
                });
        </script>
       
@endsection