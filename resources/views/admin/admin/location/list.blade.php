@extends('layouts.admin_panel')
@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.element.breadcrumb')
            <div class="card">
                @include('admin.element.success-message')
              <div class="card-body search_form">
                 @php 
                                     if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                          
                            if(isset($is_active))
                          $is_active =$is_active;
                      else
                          $is_active ="2";
                     
                @endphp
                <!--start-->
                    <form class="form-inline" action="{{ route('admin.location.index') }}" method="get">
                          {{csrf_field()}}
                       <div class="form-group  col-md-6 col-sm-6 col-xs-12">
                          <label>City :</label>
                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Eg. Hlaing">
                       </div>
                      <div class="form-group col-md-4 col-sm-6 col-xs-12">
                        <label>Status :</label>
                         <select class="form-control" name="is_active">
                             <option value="" <?= ($is_active==2)?"selected":""?>>Status</option>
                             <option value="0" <?= ($is_active==0)?"selected":""?>>Inactive</option>
                             <option value="1" <?= ($is_active==1)?"selected":""?>>Active</option>
                           </select>
                      </div>
                      <div class="form-group col-md-2 col-sm-6 col-xs-12 pull-right pt-2em">
                        
                      </div>
                      <button type="submit" class="btn btn-success">Search</button>
                      <a  class="btn btn-reset" href="{{ route('admin.location.index') }}">Reset</a>
                    </form>
                    <!--end-->
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Location List</h3>
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
                                                          <select id="{{$location->id}}" data-control="status" name="is_active" class="form-control status_change">
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
                            <div class="pull-right">
                             {!! $locations->appends($data)->render() !!}
                            </div>
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
                                
                            //   Notiflix.Block.Standard('table', 'Please wait...');
                              // Notiflix.Block.Arrows('table');
                               $("[data-control='status']").prop('disabled', true);
                               window.location.reload();
                                //var message = data.success;
                               // var url = window.location.href;
                                // callbackURL(message,url);
                                 
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