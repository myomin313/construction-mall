@extends('layouts.admin_panel')
@section('content') 
 
@if ( Session::has('message') )  
     <script>
    var message= "{{ Session::get('message') }}";
    //alert(message);
   // var url = "window.location.href";
    callbackSuccess(message);
    </script>
    
@endif
@include('admin.element.success-message')
<div class="quotation-area">
            <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     @include('admin.element.breadcrumb')
                    <div class="card">
                        @if(session()->has('failures'))
   <table class="table table-danger">
       <tr style="color:red">
           <th>Row</th>
           <th>Attribute</th>
           <th>Errors</th>
           <th>Value</th>
       </tr>
       @foreach(session()->get('failures') as $validation)
       <tr style="color:red">
           <td>{{ $validation->row() }}</td>
           <td>{{ $validation->attribute() }}</td>
           <td>
               {{ $validation->values()[$validation->attribute()]}}
           </td>
           <td><ul>
               @foreach($validation->errors() as $e)
                <li>{{ $e }}</li>
                @endforeach
           </ul></td>
           
       </tr>
       @endforeach
       
       @if ( Session::has('import_error') )
         <div class="row">
              {{ Session::get('import_error') }} 
         </div>
       @endif
       
   </table>
@endif
                      <div class="card-body search_form">
                        <!--@if ($errors->any())-->
                        <!--@foreach ($errors->all() as $error)-->
                        <!--    <div class="error">{{$error}}</div>-->
                        <!--@endforeach-->
                        <!--@endif-->
                          @php 
                                     if(isset($name))
                                            $name = $name;
                                        else
                                            $name ="";
                                             if(isset($phone))
                                            $phone = $phone;
                                        else
                                            $phone ="";
                                              if(isset($is_active))
                                            $is_active =$is_active;
                                        else
                                            $is_active ="2";
                                       
                                  @endphp
                                 
                               <!--start-->
                                    <form class="form-inline" action="{{ route('admin.companies') }}" method="get">
                                          {{csrf_field()}}
                                       <div class="form-group col-md-4">
                                          <label>Company Name : </label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Eg.ABC Co.Ltd">
                                       </div>
                                       <div class="form-group col-md-3">
                                          <label>Phone Number : </label>
                                          <input value="{{$phone}}" type="text" class="form-control" name="phone" placeholder="Eg.0942002299">
                                       </div>
                                      <div class="form-group col-md-3">
                                        <label>Status : </label>
                                         <select class="form-control status" name="is_active">
                                             <option value=""<?= ($is_active==2)?"selected":""?>>Status</option>
                                             <option value="0"<?= ($is_active==0)?"selected":""?>>Inactive</option>
                                             <option value="1"<?= ($is_active==1)?"selected":""?>>Active</option>
                                           </select>
                                      </div>
                                      <div class="form-group pt-2em col-md-2">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <a  class="btn btn-reset" href="{{ route('admin.companies') }}">Reset</a>
                                      </div>
                                    </form>
                      </div>
                    </div>
                  </div>
              </div>
                <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                        
                          <div class="card-header card-header-primary">
                            <h4 class="card-title ">
                              <div class="row">
                                 <div class="col-sm-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h2 class="panel-title">  Company List</h2>
                                </div>
                                <div  class="col-md-offset-2 col-lg-offset-2 col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                  <form  action="{{ url('importExcel') }}" class="form-horizontal import_form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4 col-sm-8 col-xs-8">
                                        <input type="file" class="pull-right import" name="import_file"/>
                                      </div>
                                      <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 ">
                                        <button type="submit" class="btn btn-default">Import File</button>
                                      </div>
                                    </div>
                                  </form> 
                                </div>
                              </div>
                            </h4>
                          </div>
                          <div class="card-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"  data-cookie-id-table="saveId" data-show-export="false"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="logo" data-editable="true">Logo</th>
                                                <th data-field="company_name" data-editable="true">Company Name</th>
                                                <th data-field="phone" data-editable="true">Phone</th>
                                                <th style="width:20px;" data-field="category" data-editable="true">Category</th>
                                               <!--  <th data-field="used_coin" data-editable="true">detail</th> -->
                                                <th data-field="status" data-editable="true">Status</th>
                                                <th data-field="mail_verified" data-editable="true">Email Verified</th>
                                                <th data-field="plan">Plan</th>
                                                <th>Service</th>
                                                <th>Project</th>
                                                <th>Product</th>
                                                <th data-field="action" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @php $count=1; @endphp
                                          @foreach($search_result as $result)
                                           @php
                                    $id = $result->id;
                                    $id = \Crypt::encrypt($id);
                                    $pageno = $search_result->currentPage();

                                    $pageno =\Crypt::encrypt($pageno);
                                    
                                    
                                @endphp
                                            <tr>
                                            <!--<td>{{ $count }}</td>-->
                                             <td>{{ ($search_result->currentPage()-1) * $search_result->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                         <?php  $category="";
                                           if(!empty($result->parent_categories))
                                           {
                                             foreach($result->parent_categories as $parent_category){
                                                
                                         $category_id =$parent_category->id;
                                              
                                             }
                                          }
                                          else{
                                         $category_id =$parent_category->id;
                                          }
                                          ?>
                                                  @if($result->user->logo != null && $result->user->logo !='undefined')
                                                    <img src="{{ asset('storage/company_logo/'.$result->user->logo) }}" alt="" title="" style="width:50px;height:50px">
                                                  @else
                                                  @if($category_id == 1)
                                                  <img src="{{ asset('storage/company_logo/'.$projectsetting->service_default_logo) }}" alt="" title="" style="width:50px;height:50px">
                                                  @elseif($category_id == 2)
                                                  <img src="{{ asset('storage/company_logo/'.$projectsetting->supplier_default_logo) }}" alt="" title="" style="width:50px;height:50px">
                                                  @elseif($category_id == 3)
                                                  <img src="{{ asset('storage/company_logo/'.$projectsetting->reno_default_logo) }}" alt="" title="" style="width:50px;height:50px">
                                                  @endif
                                                  @endif
                                                </td>
                                                <td><a  href="
                                                {{ url('admin/company-profile/'.$id.'/'.$pageno) }}">{{ $result->user->name }}</a><br>
                                                <a href="{{ url('admin/company/dashboard/'.$id.'/'.$pageno) }}" style="color: blue">view dashboard</a><br>
                                      
                                          </td>
                                                <td>{{ $result->user->phone }},{{ $result->phone }}</td>
                                                <td>   <?php  $category="";
                                           if(!empty($result->parent_categories))
                                           {
                                             foreach($result->parent_categories as $parent_category){
                                                
                                                      $category =$parent_category->name;
                                              
                                             }

                                             echo $category;
                                          }
                                          else{
                                            echo "-";
                                          }
                                          ?></td>  
                                                  <!--<td>
                                                  @if($result->is_active == '1')
                                                  <span style="color:green">
                                                  <?php echo "active"; ?>
                                                  </span>
                                                  @else
                                                  <span style="color:red">
                                                  <?php echo "unactive"; ?>
                                                  </span>
                                                  @endif
                                                   <select id="<?= $result->id ?>" class="form-control status_change" name="is_active">
                                                      <option value="">change</option>
                                                      <option value="1">active</option>
                                                      <option value="0">unactive</option>
                                                    </select>
                                                     </td>-->
                                                     <td>
                                                      <select id="{{$result->id}}" data-control="status" name="is_active" class="form-control status_change">
                                                       <option value="1" <?= ($result->user->is_active==1)?"selected":""?>>Active</option>
                                                        <option value="0" <?= ($result->user->is_active==0)?"selected":""?>>Inactive</option>
                                                        </select>
                                                    </td>
                        <td><?= $result->user->email_verified_flag=='0'?'<i class="fa fa-window-close-o" style="color:red" ></i>
':'<i class="fa fa-check-square" style="color:green"></i>
' ?></td>
                                                 <td>
                                                 {{ $result->packageplan->name }}
                                                 </td>
                                                
                                                
                                                <!--<td>
                                                <a class="btn btn-info btn-sm"  href="
                                                {{ url('admin/company-profile/'.$result->id ) }}">View</a>
                                                </td>-->
                                               
                                                  <td>
                                                <?php  $category="";
                                         if(!empty($result->parent_categories))
                                           {
                                             foreach($result->parent_categories as $parent_category){
                                                
                                                      $category =$parent_category->id;
                                              
                                             }
                                             if($category == 1)
                                                 {
                                           
                                            
                                    echo "<a class=\"btn btn-info btn-sm\" href=\"/admin/company-service/$id\" >Services($result->servicecount)</a>";
                                             }
                                          }
                                          else{
                                            echo "-";
                                          }
                                          ?>
                                                </td>
                                                <td>
                                                  <?php  $category="";
                                           if(!empty($result->parent_categories))
                                           {
                                             foreach($result->parent_categories as $parent_category){
                                                
                                                      $category =$parent_category->id;
                                              
                                             }
                                             if($category == 1 ||$category == 2)
                                                 {
                                           
                                            
                                    echo "<a class=\"btn btn-info btn-sm\" href=\"/admin/company-project/$id\" >Projects($result->projectcount)</a>";
                                             }
                                          }
                                          else{
                                            echo "-";
                                          }
                                          ?>
                                                </td>
                                                <td> <?php  $category="";
                                           if(!empty($result->parent_categories))
                                           {
                                             foreach($result->parent_categories as $parent_category){
                                                
                                                      $category =$parent_category->id;
                                              
                                             }
                                             if($category == 2)
                                                 {
                                           
                                            
                                    echo "<a class=\"btn btn-info btn-sm\" href=\"/admin/company-product/$id\" >Products ($result->productcount)</a>";
                                             }
                                          }
                                          else{
                                            echo "-";
                                          }
                                          ?>
                                                </td>
                                                <td>
                                             <!--<a type="button" href="{{ url('admin/company-edit/'.$result->id ) }}"  class="btn btn-success editeducationBtn">edit</a>-->
                                                <a type="button" href="{{ url('admin/company-buy-coin/'.$result->user->id.'/company/'.$search_result->currentPage() ) }}"  class="btn btn-sm btn-primary">Buy Coin</a><br>
                                               
                                              <!--  <a type="button" class="btn btn-sm btn-danger deleteeducationBtn" href="" 
                                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>-->
                                                
                                                 <!--<a type="button" class="btn btn-sm btn-danger deleteeducationBtn" href=""  >Delete</a>-->
                                                </td>
                                               
                                             </tr>
                                               @php $count +=1 @endphp
                                           @endforeach 
                                             
                                        </tbody>
                                    </table>
                                      <div class="pull-right">
                                          {{ $search_result->appends($data)->links() }}
                                      </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
      
       <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Title</td>
                                    <td>
                                         <div id="title">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>
                                         <div >
                                            <img id="image" src=""/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Category Name</td>
                                    <td>
                                         <div id="category_name">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Created</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Detail</td>
                                    <td>
                                         <div id="blog-detail">
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>Used Coin</td>
                                    <td>
                                         <div id="used_coin">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requested User</td>
                                    <td>
                                         <div id="send_user_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Received Status</td>
                                    <td>
                                         <div id="received_status">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Request Status</td>
                                    <td>
                                         <div id="requested_status">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated User</td>
                                    <td>
                                         <div id="updated_by">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requested Date</td>
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
                                    <td>File</td>
                                    <td>
                                         <div id="file">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Summary</td>
                                    <td>
                                         <div id="summary">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Policy</td>
                                    <td>
                                         <div id="policy">
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end--> 


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        
           var page ='<?php echo $search_result->currentPage() ?>';
     $("#table").on('click','#active_quotation',function(){
           if(this.checked){
            var active_quotation=1;   
           }else{
            var active_quotation=0;   
           }
           var company_id = $(this).attr("company_id"); 
           $.ajax({
               type: "get",
               url: "{{ URL::route('company.active_quotation') }}",
              data: {'active_quotation':active_quotation,'company_id':company_id},
                success: function(data){ 
                     var message = data.success;
                    var url = window.location.href;
                        callbackURL(message,url);
                                 
                  /* alert(data.success);
                   location.reload();*/
               },error:function(e)
                {
                  console.log(e);
               }
           }); 
     }); 
     
       $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                            $.ajax({ 
                            url: "{{ URL::route('admin.company.updatestatus') }}",
                            type: 'GET',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                            $("[data-control='status']").prop('disabled', true);
                                window.location.reload();
                                
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                 });
                 
                 setTimeout(function() {
                    $('.table-danger').fadeOut('fast');
                 }, 20000);
     
</script>
@endsection