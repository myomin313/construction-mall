@extends('layouts.user')
@section('content')
<div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="row"> 
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Coin History Lists</h3>
                          </div>
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="true" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="true"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <!-- <th data-field="user_id" data-editable="true">User Name</th> -->
                                                <th data-field="range_id" data-editable="true">Range</th>
                                                <th data-field="category_id" data-editable="true">Category</th>
                                                <th data-field="file" data-editable="true">File</th>
                                                <th data-field="used_coin" data-editable="true">Used Coin</th> 
                                                <th data-field="received_user_id" data-editable="true">Receiver</th>
                                                <th data-field="received_status" data-editable="true">Received Status</th>
                                                <th data-field="requested_status" data-editable="true">Request Status</th>
                                                <th data-field="created_at" data-editable="true">Created Time</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($requestquote_lists as $requestquote_lists):
                                            <tr>
                                                <td><?= $count; ?></td>
                                                <td><?= $requestquote_lists->range_id ?></td> 
                                                <td>
                                                 <?= $requestquote_lists->name  ?>  
                                                </td>
                                                <td><?= $requestquote_lists->file  ?></td>
                                               
                                                <td><?= $requestquote_lists->used_coin ?></td>
                                                
                                                <td>
                                                 <?= $requestquote_lists->receivername  ?>  
                                                </td>
                                                <td >
                                                <select id="<?= $requestquote_lists->id  ?>"  class="selectchange form-control dt-tb" >
                                                @if ($requestquote_lists->received_status === "pending"){
                                                    <option  value="pending" selected>Pending</option>
                                                    <option  value="success">Success</option>
                                                }
                                                @else{
                                                    <option  value="pending">Pending</option>
                                                    <option  value="success" selected>Success</option>
                                                }
                                                @endif 
                                                </select>
                                                </td>
                                                <td >
                                                <select id="<?= $requestquote_lists->id  ?>"  class="selectchangerequest form-control dt-tb" >
                                                @if ($requestquote_lists->requested_status === "pending"){
                                                    <option value="pending" selected>Pending</option>
                                                    <option value="success">Success</option>
                                                }
                                                @else{
                                                    <option  value="pending">Pending</option>
                                                    <option  value="success" selected>Success</option>
                                                }
                                                @endif 
                                                </select>
                                                </td>
                                                <td> <?= $requestquote_lists->created_at  ?>  </td>
                                                <td><a href="detail" class="btn btn-xs btn-info detail"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a></td>
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
       
       $(document).ready(function(){  
        
             /*      $('#table').on('change','.selectchange',function(){
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                        var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                alert(data.success);
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

 $('#table').on('change','.selectchange',function(){
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                var message = data.success;
                                callbackSuccess(message);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                });


             /*   $('.selectchangerequest').change(function(){ 
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                        var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatusrequest') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                alert(data.success);
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

$('.selectchangerequest').change(function(){ 
                        var getval = $(this).val();
                        var id = $(this).attr('id');
                            $.ajax({ 
                            url: "{{ URL::route('quotation.updatestatusrequest') }}",
                            type: 'POST',
                            data: {'id' : id,"selectedvalue":getval},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 var message = data.success;
                                callbackSuccess(message);
                            },
                            error:function(e)
                            {
                                console.log(e);

                            }
                            });
                });

                $('.detail').click(function(event){
                    $.ajax({
								type: "post",
								url: "{{ URL::route('quotation.detail') }}",																	
								data:{"image": response},
								headers: {'X-CSRF-TOKEN': '<?php echo csrf_token() ?>' },
								success:function(data)
									{
										 image_url = '<?php echo asset('images/upload')?>'+"/"+data
										 data = "<img   src='"+image_url+"' class='img-thumbnail'>";
										 $('#uploadCoverPhotoModal').modal('hide');
										 $('#uploaded_cover').html(data);
									},
								error:function(e)
									{
									    var message = e;
                         callbackWarning(message) ;
									/*	alert(e);*/
									}
							}); 
				});


        });
        </script>

@endsection