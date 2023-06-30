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
                        <h3 class="panel-title">Project List</h3>
                    </div>
                   <!--  <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{route('project.create')}}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add New
                        </a>
                    </div> -->  
                  </div>
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    
 @if(Session::has('success')) 
                                        <script type = "text/javascript">  
                             var message = "{{Session::get('success')}}"; 
                                 callbackSuccess(message);
</script>
                                    @endif
                    @php
                                            
                                             if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                                            @endphp
                                                  
                                      <!--start-->
                                      
                                    <form class="form-inline" action="{{route('project.index')}}" method="post">
                                          {{csrf_field()}}
                                       <div class="form-group">
                                          <label class="sr-only">Project Name</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Project name">
                                       </div>
                                      <button type="submit" class="btn btn-success">Search</button>
                                      <a  class="btn btn-reset" href="{{route('project.index')}}">Reset</a>
                                    </form>
                                    <!--end-->
                     <div class="row" style="padding:10px">
                                    <div class="col-md-12">
                                       <a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a>  
                                       <a  type="button" href="{{route('project.create')}}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                                    </div>
                                   </div>
                    <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                        <thead class="text-primary">
                            <tr>
                                <th data-field="state"><input type="checkbox" name="category_id" id="checkall"></th>
                                <th data-field="no">No</th>
                                <th data-field="name" data-editable="true"> Project Name</th>
                                 <th data-field="range" data-editable="true"> Range</th>
                                <th data-field="description" data-editable="true">Description</th>
                                <th data-field="business_type" data-editable="true">Business Type</th>
                               <!-- <th data-field="action">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=1; @endphp
                            @foreach($company_projects as $company_project):
                            <tr>
                                <td><input class="checkbox" name="company_projectid" type="checkbox" data-id="{{ $company_project->id }}" value="{{ $company_project->id }}"/></td>
                                               
                                <td>{{ ($company_projects->currentPage()-1) * $company_projects->perPage() + $loop->index + 1 }}</td>
                                <td>
                                @php
                                    $id = $company_project->id;
                                    $id = \Crypt::encrypt($id);
                                    $page = $company_projects->currentPage();
                                    $page =\Crypt::encrypt($page);
                                @endphp
                                  <a href="{{route('project.show',['id'=>$id,'page'=>$page])}}" ><?= $company_project->project_name ?>
                                    </a>
                                   
                                  </td>
                                <td><?= $company_project->range->minimum_price ?> ~ <?= $company_project->range->maximum_price ?></td>
                                <td>
                                 <?= substr($company_project->project_description , 0,100); ?>  
                                </td>
                                <td>
                                   <?= $company_project->projectType->project_type_name  ?> 
                                </td>
                                <!--<td>
                                 
                                     <a href="{{route('project.destroy',['id'=>$company_project->id])}}" class="btn btn-sm btn-danger"  onClick="return confirm('Are you sure to delete?')" >
                                        Delete
                                    </a>
                                </td>-->
                            </tr>
                            @php $count +=1 @endphp
                          @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                     ({{ $company_projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Static Table End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script  type="text/javascript">
           var page ='<?php echo $company_projects->currentPage() ?>';
          /*$(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
            $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{route('project.create')}}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
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
                 /*alert('hi');*/
            var company_projectids = [];
                  $("input:checkbox[name=company_projectid]:checked").each(function(){
                      company_projectids.push($(this).val());
                       });
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('project.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_projectids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                /*  alert(data.success);
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
@endsection