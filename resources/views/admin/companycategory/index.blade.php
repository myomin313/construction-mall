@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
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
                                    <form class="form-inline" action="{{ route('companycategory.index') }}" method="get">
                                          {{csrf_field()}}
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                          <label>Category Name</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Eg. Category Name">
                                       </div>
                                      <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                        <label>Status</label>
                                         <select class="form-control" name="is_active">
                                             <option value="" <?= ($is_active==2)?"selected":""?>>Status</option>
                                             <option value="0" <?= ($is_active==0)?"selected":""?>>Inactive</option>
                                             <option value="1" <?= ($is_active==1)?"selected":""?>>Active</option>
                                           </select>
                                      </div>
                                      <div class="form-group col-md-2 col-sm-6 col-xs-12 pull-right pt-2em">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <a  class="btn btn-reset" href="{{ route('companycategory.index') }}">Reset</a>
                                      </div>
                                      
                                    </form>
                                    <!--end-->
                </div>
              </div>
            <div class="card">
               
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Company Category List</h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                       <a  type="button" href="{{ route('companycategory.create') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a> 
                    </div>
                  </div>
                </h4>
              </div>
              <div class="card-body">
                  <!--<div class="row" style="position:center-top,width:68%">-->
                    @include('admin.element.success-message')
                    <!--</div>-->
                                    <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <!--  <th data-field="state" data-checkbox="true"></th>-->
                                                <th data-field="no">No</th>
                                                <th data-field="name" data-editable="true">Category Name</th>
                                                <th data-field="parent_name" data-editable="true"> Parent Category Name</th>
                                                <th data-field="creator" data-editable="true">Creator</th>
                                                <th data-field="updater" data-editable="true">Updator</th>
                                                <th data-field="created_at" data-editable="true">Created At</th>
                                                <th data-field="updated_at" data-editable="true">Updated At</th>
                                                <th data-field="status" data-editable="true">Status</th>
                                               <!-- <th data-field="action">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($categories as $category)
                                            <tr>
                                                <!-- <td></td>-->
                                                <td>{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    @php
                                                    $id = $category->id;
                                                    $id = \Crypt::encrypt($id);
                                                    $page = $categories->currentPage();
                                                    $page =\Crypt::encrypt($page);
                                                    @endphp
                                                    <a href="{{url('/companycategory/edit/'.$id.'/'.$page)}}" >
                                                    <?= $category->name ?></a></td>
                                                <td><?= $category->parent_name ?></td>
                                                <td><?= $category->creator ?></td>
                                                <td><?= $category->updator ?></td>
                                                 <td><?= $category->created_at ?></td>
                                                  <td><?= $category->updated_at ?></td>
                                                 
                                                   <td>
                                                    <select id="{{$category->id}}" data-control="status" name="is_active" class="form-control status_change">
                                                                                       <option value="1" <?= ($category->is_active==1)?"selected":""?>>Active</option>
                                                                                        <option value="0" <?= ($category->is_active==0)?"selected":""?>>Inactive</option>
                                                                                        </select>
                                                </td>
                                                
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                     {{ $categories->appends($data)->links() }}
                                     </div>
                                </div>
                            </div>
                          </div>


                     
        <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script  type="text/javascript">
             var page ='<?php echo $categories->currentPage() ?>';
          $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ route('companycategory.create') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');
               
          });
     </script>
        <script type="text/javascript">
            $(document).ready(function(){ 
          
              
                           /*     $('.is_active').attr('disabled', 'disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);*/
                               
                               
        //   $('#checkall').click(function(e) {
        //       alert("hi");//on click 
        //   if($(this).is(':checked',true)) 
        //   {
        //      $(".checkbox").prop('checked', true); 
        //   } else { 
        //      $(".checkbox").prop('checked',false); 
        //   }  
        //  });
        // $(document).ready(function() {
            //  $("#table #checkall").click(function() {
            //   $('.checkbox').prop('checked', this.checked);
            //  });

            //  $('.checkbox').change(function() {
            //   $("#checkall").prop("checked", $(".checkbox").length === $(".Bulkers:checked").length);
            //  });
          // });
        
        
//   $('#table').dataTable( {"sPaginationType": "full_numbers",
//                             "aoColumnDefs": [
//                               { 'bSortable': false, 'aTargets': [0] }
//                             ]
//                           });

//   $('#checkall').on('click', function(e) {
//     e.preventDefault();

//     $(".checkbox").prop('checked', $(this).is(':checked'));  
//   });

        
        //  $('#table').filter(':checkbox').prop('checked', this.checked);
              /*  $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                        var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('admin.companycategory.updatestatus') }}",
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
                            url: "{{ URL::route('admin.companycategory.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                              
                              //Notiflix.Block.Circle('#table', 'Please wait...');
                              $("[data-control='status']").prop('disabled', true);
                                  window.location.reload();
                                //  var message = data.success;
                                // var url = window.location.href;
                                //   callbackURL(message,url);
                                 
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