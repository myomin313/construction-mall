@extends('layouts.admin_panel')
@section('content')
  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">  {{$user}} List</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    </div>   
                  </div>
                </h4>
              </div>
               @if(Session::has('success')) 
                                        <script type = "text/javascript">  
                             var message = "{{Session::get('success')}}"; 
                                 callbackSuccess(message);
</script>
                                    @endif
                                    
              <div class="card-body table-responsive">
                    @php 
                                     if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                          
                            if(isset($phone))
                          $phone =$phone;
                      else
                          $phone ="";
                          
                             if(isset($email))
                          $email = $email;
                      else
                          $email ="";
                          if(isset($is_active))
                          $is_active =$is_active;
                      else
                          $is_active ="2";
                           
                @endphp
                      <form class="form-inline" action="{{ route($path_name,1) }}" method="post">
                                          {{csrf_field()}}
                                       <div class="form-group">
                                          <label class="sr-only">Name</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Name">
                                       </div>
                                       <div class="form-group">
                                          <label class="sr-only">Phone</label>
                                          <input value="{{$phone}}" type="text" class="form-control" name="phone" placeholder="Phone">
                                       </div>
                                      <div class="form-group">
                                         <label class="sr-only">email</label>
                                          <input value="{{$email}}" type="text" class="form-control" name="email" placeholder="Email">
                                      </div>
                                      <div class="form-group">
                                        <label class="sr-only">Status</label>
                                         <select class="form-control" name="is_active">
                                             <option value=""<?= ($is_active==2)?"selected":""?>>Status</option>
                                             <option value="0"<?= ($is_active==0)?"selected":""?>>Inactive</option>
                                             <option value="1"<?= ($is_active==1)?"selected":""?>>Active</option>
                                           </select>
                                      </div>
                                      <button type="submit" class="btn btn-success">Search</button>
                                      <a  class="btn btn-reset" href="{{ route($path_name,1) }}">Reset</a>
                                    </form>
                                     @if(strcmp($user,"Admin") == 0)
                                    
                                            
                                    <div class="row" style="padding:10px">
                                    <div class="col-md-12">
                                        
                                       <a  type="button" href="{{route('users.createadmin')}}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                                    </div>
                                   </div>
                                   @endif
                    <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" 
                    data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                    data-resizable="true" data-cookie="true"  data-cookie-id-table="saveId" data-show-export="false"
                     data-click-to-select="true" data-toolbar="#toolbar">
                                  <thead>
                                      <tr>
                                          <th data-field="no">No</th>
                                           <th data-field="name" data-editable="true">Name</th>
                                          <th data-fiels="image">Image</th>
                                         
                                          <th data-field="email" data-editable="true">Email</th>
                                          <th data-field="phone" data-editable="true">Phone</th>
                                          <th data-field="status" data-editable="true">Status</th>
                                          <th data-field="created_at" data-editable="true">Account Created Date</th>
                                          <th data-field="updated_at" data-editable="true">Last Modified Date</th>
                                          <!--@if(strcmp($user,"Admin") == 0)
                                          <th data-field="action" data-editable="true">Action</th>
                                          @endif-->
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($lists as $list)
                                      <tr>
                                          <td>{{ ($lists->currentPage()-1) * $lists->perPage() + $loop->index + 1 }}</td>
                                           <td>
                                            @php if(strcmp($user,'Admin') == 0){
                                            $logo ="storage/admin_logo/";
                                             if($list->logo != null && $list->logo !='undefined')
                                              $image=$list->logo;
                                              else
                                               $image=$projectsetting->admin_default_logo;
                                            }elseif(strcmp($user,'Freelancer') == 0){
                                            $logo = "storage/freelancer/";
                                            if($list->logo != null && $list->logo !='undefined')
                                              $image=$list->logo;
                                              else
                                               $image=$projectsetting->freelancer_default_logo;
                                            }elseif(strcmp($user,'Member') == 0){
                                            $logo = "storage/user/";
                                            if($list->logo != null && $list->logo !='undefined')
                                              $image=$list->logo;
                                              else
                                              $image=$projectsetting->member_default_logo;
                                              }
                                            @endphp
                                            @if(strcmp($user,'Freelancer') == 0)
                                            <a href="{{ route('admin.freelancer.detail',$list->id) }}"><?= $list->name ?></a> 
                                            @else
                                             @php
                                                        $id = $list->id;
                                                        $id = \Crypt::encrypt($id);
                                                        
                                                     @endphp
                                            <a class="show-modal" data-id="{{$list->id}}" data-name="{{$list->name}}" data-email="{{$list->email}}"
                                              data-logo="{{ asset($logo.$image) }}"
                                              data-img="{{ $image }}"
                                              data-phone="{{ $list->phone }}"
                                              data-created_at="{{$list->created_at}}" data-updated_at="{{$list->updated_at}}"
                                              data-id="{{ $list->id }}"
                                              data-url="{{ url('admin/functions/edit/'.$id.'/'.$lists->currentPage()) }}"><?= $list->name ?></a>
                                            @endif</td>
                                            
                                          <td>
                                              
                                            
                                              <img src="{{ asset($logo.$image) }}" style="width:50px;height:50px">
                                            
                                          </td>
                                          <td><?= $list->email ?></td>
                                          <td><?= $list->phone ?></td>
                                          <td>
                                            <select id="{{$list->id}}" name="is_active" class="form-control status_change">
                                            <option value="1" <?= ($list->is_active==1)?"selected":""?>>Active</option>
                                            <option value="0" <?= ($list->is_active==0)?"selected":""?>>Inactive</option>
                                        </select>
                                          </td>
                                          <td><?= $list->created_at ?></td>
                                          <td><?= $list->updated_at ?></td>
                                      </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                               <div class="pull-right">
                                       {{ $lists->links() }} 
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
                         <table class="table table-hover no-border" >
                            <tbody>
                                <tr class="img-boder">
                                    <td colspan="2">
                                        <center id="logo">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                         <div id="email">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>
                                         <div id="phone">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Account Created Date</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Account Modified Date</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                @if(strcmp($user,"Admin") == 0)
                                <tr>
                                    <td></td>
                                    <td>
                                        <a type="button" id="list-edit" href="" class="btn btn-success editeducationBtn">Edit</a>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end-->  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!-- @if(strcmp($user,"Admin") == 0)
      <script  type="text/javascript">
          $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{route('users.createadmin')}}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
          });
     </script>
 @endif-->
        <script type="text/javascript">
            /* Show Event  */
             var page ='<?php echo $lists->currentPage() ?>';
            $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Detail Information');
                    if($(this).data('img') !== ''){
                     var img='<img src="'+$(this).data('logo')+'" style="width:50px;height:50px">';
                      $('#logo').html(img);
                    }else{
                         $('#logo').html('');
                     $('.img-border').css("border-top","none");
                    }
                    $('#name').html($(this).data('name'));
                    $('#email').html($(this).data('email'));
                    $('#phone').html($(this).data('phone'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $("#list-edit").attr('href',$(this).data('url') );
                    /*$("#list-edit").attr('href', '{{ url('/admin/functions/edit/') }}'+'/'+$(this).data('id')+'/'+page);*/
                    $('#showModal').modal('show');
                });
                
         /* $(document).ready(function(){  
                   $('#table').on('change','.status_change',function(){  
                        var getval = $(this).val();
                        console.log(getval);
                        var id = $(this).attr('id');
                        console.log(id);
                        var conf = confirm('Are you sure want to change Status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('users.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                alert(data.success);
                                location.reload();
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }
                });
               
                    
        }); */
        
         $(document).ready(function(){  
                   $('#table').on('change','.status_change',function(){  
                        var getval = $(this).val();
                        console.log(getval);
                        var id = $(this).attr('id');
                        console.log(id);
                            $.ajax({ 
                            url: "{{ URL::route('users.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                //var message = data.success;
                               // var url = window.location();
                                var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                                 
                                /*alert(data.success);
                                location.reload();*/
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                });
               
                    
        });
        </script>
@endsection