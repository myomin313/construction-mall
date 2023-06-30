@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
<div class="data-table-area  mg-t-10">
    @include('admin.element.success-message')
    <div class="container-fluid">
       @include('admin.element.breadcrumb')
        <div class="card">
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
                                    <form class="form-inline" action="{{ route('myanboxtube.index') }}" method="get">
                                          {{csrf_field()}}
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                          <label>Title</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Title">
                                       </div>
                                      <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                        <label>Status</label>
                                         <select class="form-control" name="is_active" data-control="status">
                                             <option value="" <?= ($is_active==2)?"selected":""?>>Status</option>
                                             <option value="0" <?= ($is_active==0)?"selected":""?>>Inactive</option>
                                             <option value="1" <?= ($is_active==1)?"selected":""?>>Active</option>
                                           </select>
                                      </div>
                                      <div class="col-md-2 col-sm-6 col-xs-12 pt-2em">
                                           <button type="submit" class="btn btn-success">Search</button>
                                            <a  class="btn btn-reset" href="{{ route('myanboxtube.index') }}">Reset</a>
                                      </div>
                                     
                                    </form>
                                    <!-- end -->
            </div>
        </div>
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Myanbox Tube List</h3>
                    </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a  type="button" href="{{ route('myanboxtube.create') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                     </div>
                  </div>
                </h4>
              </div>
<div class="card-body table-responsive">
    <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                               
                                     <div class="row" style="padding:10px">
                                    <div class="col-md-12">
                                       <a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a>  
                                    </div>
                                   </div>
                                    <!--end-->
                                    <table id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th data-field="state"><input type="checkbox" name="category_id" id="checkall"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="title" data-editable="true">Title</th>
                                                <th data-field="link" data-editable="true">Link</th>
                                                <th data-field="image" data-editable="true"> Image</th>
                                                <th data-field="created_at" data-editable="true">Created At</th>
                                                <th data-field="updated_at" data-editable="true">Updated At</th>
                                                <th data-field="active" data-editable="true">Status</th>
                                                <!--<th data-field="action">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($myanboxtubes as $myanboxtube)
                                            <tr>
                                                <td><input class="checkbox" name="myanboxtubeid" type="checkbox" data-id="{{ $myanboxtube->id }}" value="{{ $myanboxtube->id }}"/></td>
                                                <td>{{ ($myanboxtubes->currentPage()-1) * $myanboxtubes->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    @php
                                                        $id = $myanboxtube->id;
                                                        $id = \Crypt::encrypt($id);
                                                        $pageno = $myanboxtubes->currentPage();
                                                        $pageno =\Crypt::encrypt($pageno);
                                                    @endphp
                                                    <a href="{{url('myanboxtube/edit/'.$id.'/'.$pageno)}}">
                                                    <?= $myanboxtube->title ?></a></td>
                                                <td><?= $myanboxtube->link ?></td>
                                                <td>
                                                     @if($myanboxtube->image != null && $myanboxtube->image !='undefined')
                                                    <img src="{{ asset('storage/myanboxtube/'.$myanboxtube->image) }}" class="img img-thumbnail" style="width:100px;height:100px;">
                                                    @endif
                                                </td>
                                                <td><?= $myanboxtube->created_at ?></td>
                                                <td><?= $myanboxtube->updated_at ?></td>
                                                <!--<td>   
                                                  @if($myanboxtube->is_active == '1')
                                                  <span style="color:green">
                                                  <?php echo "active"; ?>
                                                  </span>
                                                  @else
                                                  <span style="color:red">
                                                  <?php echo "not active"; ?>
                                                  @endif
                                                   <select id="<?= $myanboxtube->id ?>" class="form-control status_change" name="is_active">
                                                      <option value="">change</option>
                                                      <option value="1">active</option>
                                                      <option value="0">not active</option>
                                                     </select>
                                                  </span>
                                                   </td>-->
                                                   <td>
                                      <select id="{{$myanboxtube->id}}" name="is_active" data-control="status" class="form-control status_change">
                                       <option value="1" <?= ($myanboxtube->is_active==1)?"selected":""?>>Active</option>
                                        <option value="0" <?= ($myanboxtube->is_active==0)?"selected":""?>>Inactive</option>
                                        </select>
                                             </td>
                                                                <!--<td>
                                                    <a href="{{url('myanboxtube/edit/'.$myanboxtube->id.'/'.$myanboxtubes->currentPage())}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                     <a class="btn btn-xs btn-danger" href="{{ route('myanboxtube.destroy',$myanboxtube->id) }}" 
                                                     onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                     
                                                       <a class="btn btn-xs btn-danger" href="{{ route('myanboxtube.destroy',$myanboxtube->id) }}" >Delete</a>
                                                </td>-->
                                            </tr>
                                            @php $count++; @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                     <div class="pull-right">
                                         {{ $myanboxtubes->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
         <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script  type="text/javascript">
            var page ='<?php echo $myanboxtubes->currentPage() ?>';
         /* $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ route('myanboxtube.create') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
            $('.fixed-table-toolbar').append('<div style="margin-top: 10px;margin-bottom: 10px;"><a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a></div>');
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
            //                 url: "{{ URL::route('myanboxtube.store-checkbox') }}",
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
                 
            var myanboxtubeids = [];
                  $("input:checkbox[name=myanboxtubeid]:checked").each(function(){
                      myanboxtubeids.push($(this).val());
                       });
                       if (myanboxtubeids.length == 0) {
                            alert("please checked at least one myanboxtube that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('myanboxtube.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : myanboxtubeids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 /* alert(data.success);
                                location.reload();*/
                                // var message = data.success;
                                var url = window.location.href;
                                window.location=url;
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        } 
                      }
               });
         });
         </script>
        <script type="text/javascript">
            $(document).ready(function(){
             
             /*   $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                        var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('myanboxtube.updatestatus') }}",
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
                            url: "{{ URL::route('myanboxtube.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 $("[data-control='status']").prop('disabled', true);
                                 
                                  window.location.reload();
                                //  var message = data.success;
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