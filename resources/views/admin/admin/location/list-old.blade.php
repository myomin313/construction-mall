@extends('layouts.admin_panel')
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
                        <h3 class="panel-title"> Location List</h3>
                    </div>
                    </div>
                    </div>
              <div class="card-body">


                  <div class="table-responsive">
                  <div id="error">
                  </div>
                  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                  data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                  data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="true"
                   data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                       <!--  <th data-field="state" data-checkbox="true"></th>-->
                                        <th data-field="no">No</th>
                                        <th data-field="township" data-editable="true">Township</th>
                                        <th data-field="city" data-editable="true">City</th>
                                        <th data-field="status" data-editable="true">Status</th>
                                       <!-- <th data-field="action" data-editable="true">Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                @php $count=1;@endphp
                                @foreach($locations as $location)
                                    <tr>
                                        
                                         <td>{{ ($locations->currentPage()-1) * $locations->perPage() + $loop->index + 1 }}</td>
                                        <td>
                                            @php
                                            $id = $location->id;
                                            $id = \Crypt::encrypt($id);
                                            $page = $locations->currentPage();
                                            $page =\Crypt::encrypt($page);
                                            @endphp
                                            <a href="{{url('admin/location/edit/'.$id.'/'.$page)}}" >
                                                    <?= $location->name ?></a></td>
                                        <td><?= $location->parent_name ?>
                                        </td>
                                        <!--<td>
                                         @if($location->is_active == '1')
                                          <span style="color:green">
                                           <?php echo "active"; ?>
                                          </span>
                                           @else
                                          <span style="color:red">
                                            <?php echo "unactive"; ?>
                                          </span>
                                          @endif

                                           <select id="<?= $location->id ?>" class="form-control status_change" name="is_active">
                                                      <option value="">change</option>
                                                      <option value="1">active</option>
                                                      <option value="0">unactive</option>
                                                     </select>
                                        </td>-->
                                        
                                        <td>
                                                          <select id="{{$location->id}}" name="is_active" class="form-control status_change">
                                                           <option value="1" <?= ($location->is_active==1)?"selected":""?>>Active</option>
                                                            <option value="0" <?= ($location->is_active==0)?"selected":""?>>Inactive</option>
                                                            </select>
                                        </td>
                                          <!--<td>
                                              
                                             <a href="{{url('admin/location/edit/'.$location->id.'/'.$locations->currentPage())}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                          </td>-->
                                    </tr>
                                    @php $count++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                             {{ $locations->links() }}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
      </div>
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
           <script type="text/javascript">
              var page ='<?php echo $locations->currentPage() ?>';
            $(document).ready(function(){
               
                $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                     /*    var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){ */
                            $.ajax({ 
                            url: "{{ URL::route('admin.location.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
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
                     /*   }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }*/
                 }); 
                 
               
             });
        </script>
       
@endsection