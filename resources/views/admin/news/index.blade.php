@extends('layouts.admin_panel')
@section('content')
<!-- Static Table Start -->
<div class="data-table-area  mg-t-10">
    <div class="container-fluid">
        @include('admin.element.breadcrumb')

           <div class="card">
            <div class="card-body search_form">
                <!--start-->
                                               @php 
                                     if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                           
                     
                @endphp
                     <!--<div class="col-md-6 col-sm-6 col-xs-6">-->
                         <!--<div class="pull-right">-->
                              <form class="form-inline" action="{{ route('news.index') }}" method="post">
                                          {{csrf_field()}}
                                       <div class="form-group col-md-10 col-sm-6 col-xs-12">
                                          <label>Title</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Title">
                                       </div>
                                      <div class="col-md-2 col-sm-6 col-xs-12 pt-2em">
                                      <button type="submit" class="btn btn-success">Search</button>
                                      <a  class="btn btn-reset" href="{{ route('news.index') }}">Reset</a>
                                      </div>
                                    </form>
                         <!--</div>-->
                    <!--</div>-->
            </div>
        </div>      
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> News List</h3>
                    </div>
                    <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
                        <a  type="button" href="{{ route('news.create') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>

                    </div>
                  </div>
                </h4>
              </div>
<div class="card-body table-responsive">

                
                    @include('admin.element.success-message')
                                    
                 
                                   
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
                                                <th data-field="title" data-editable="true"> Title</th>
                                                <th data-field="link" data-editable="true"> Link</th>
                                                <th data-field="description" data-editable="true"> Description</th>
                                                <th data-field="creator" data-editable="true">Creator</th>
                                                <th data-field="updator" data-editable="true">Updator</th>
                                                <th data-field="updated_at" data-editable="true">Created At</th>
                                                <th data-field="created_at" data-editable="true">Updated At</th>
                                                
                                                <!--<th data-field="action">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($news as $new)
                                            <tr>
                                               <td><input class="checkbox" name="newsid" type="checkbox" data-id="{{ $new->id }}" value="{{ $new->id }}"/></td>
                                              
                                                <td>{{ ($news->currentPage()-1) * $news->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    @php
                                                        $id = $new->id;
                                                        $id = \Crypt::encrypt($id);
                                                        $pageno = $news->currentPage();
                                                        $pageno =\Crypt::encrypt($pageno);
                                                    @endphp

                                                    <a href="{{ url('news/edit/'.$id.'/'.$pageno )}}">
                                                    <?= $new->title ?></a></td>
                                                <td><?= $new->link ?></td>
                                                <td><?= $new->description ?></td>
                                                <td><?= $new->creator ?></td>
                                                <td><?= $new->updator ?></td>
                                                <td><?= $new->created_at ?></td>
                                                <td><?= $new->updated_at ?></td>
                                                 
                                                <!--<td>
                                                    <a href="{{ url('news/edit/'.$new->id.'/'.$news->currentPage() )}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="btn btn-xs btn-danger" href="{{ route('news.destroy',$new->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                
                                                 <a class="btn btn-xs btn-danger" href="{{ route('news.destroy',$new->id) }}">Delete</a>
                                               
                                                </td>-->
                                                
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                    {{ $news->appends($data)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script  type="text/javascript">
           var page ='<?php echo $news->currentPage() ?>';
          /*$(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ route('news.create') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
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
                 
            var newsids = [];
                  $("input:checkbox[name=newsid]:checked").each(function(){
                      newsids.push($(this).val());
                       });
                       if (newsids.length == 0) {
                            alert("please checked at least one new that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('news.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : newsids},
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
        
       
@endsection