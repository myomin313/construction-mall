@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
            <div class="container-fluid">

                        @include('admin.element.breadcrumb')
                <div class="card">
                    
                    @include('admin.element.success-message')
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                      
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Range List</h3>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                       <a  type="button" href="{{ route('range.create') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a> 
                    </div>
                    
                  </div>
                </h4>
                
              </div>
              <div class="card-body table-responsive">

            

                                    
                                    <table id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                               <!-- <th data-field="state" data-checkbox="true"></th>-->
                                                <th>No</th>
                                                <th>Price Range</th>
                                                <th>Unit</th>
                                                <th>Creator</th>
                                                <th>Updator</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($ranges as $range)
                                            <tr>
                                               <!-- <td></td>-->
                                                <td>{{ ($ranges->currentPage()-1) * $ranges->perPage() + $loop->index + 1 }}</td>
                                                <td><?= number_format($range->minimum_price) ?> ~ <?= number_format($range->maximum_price) ?></td>
                                                <td><?= $range->unit ?></td>
                                                <td><?= $range->creator ?></td>
                                                <td><?= $range->updator ?></td>
                                                <td><?= $range->created_at ?></td>
                                                <td><?= $range->updated_at ?></td>
                                                 
                                                   
                                                   <td>
                                                      <select id="{{$range->id}}" data-control="status" name="is_active" class="form-control status_change">
                                                       <option value="1" <?= ($range->is_active==1)?"selected":""?>>Active</option>
                                                        <option value="0" <?= ($range->is_active==0)?"selected":""?>>Inactive</option>
                                                        </select>
                                                         </td>
                                                    <td>
                                                        @php
                                                        $id = $range->id;
                                                        $id = \Crypt::encrypt($id);
                                                        $page = $ranges->currentPage();
                                                        $page =\Crypt::encrypt($page);
                                                        @endphp
                                                    <a href="{{url('range/edit/'.$id.'/'.$page)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     
                                                </td>
                                                
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                    {{ $ranges->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script  type="text/javascript">
           var page ='<?php echo $ranges->currentPage() ?>';
          $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ route('range.create') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
          });
     </script>
        <script type="text/javascript">
            $(document).ready(function(){
             
             /*  $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                        var conf = confirm('Are you sure want to change Status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('admin.range.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
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
                 }); */
                 
                 $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                            $.ajax({ 
                            url: "{{ URL::route('admin.range.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                $("[data-control='status']").prop('disabled', true);
                                window.location.reload();
                                // var message = data.success;
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                                 
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