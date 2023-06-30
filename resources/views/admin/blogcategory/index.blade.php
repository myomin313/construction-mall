@extends('layouts.admin_panel')
@section('content')

         <!-- Static Table Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                    
                                    @include('admin.element.success-message')
                                    <!--start-->
                                    <form class="form-inline" action="{{ route('blogcategory.index') }}" method="get">
                                          {{csrf_field()}}
                                       <div class="form-group  col-md-6 col-sm-6 col-xs-12">
                                          <label>Category Name</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Eg. Entertainment News ">
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
                                          <button type="submit" class="btn btn-success ">Search</button>
                                        <a  class="btn btn-reset" href="{{ route('blogcategory.index') }}">Reset</a>
                                      </div>
                                     
                                    </form>
                                    <!--end-->
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
                                 <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h3 class="panel-title">Blog Category List</h3>
                                </div>
                                
                                <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  <a  type="button" href="{{ route('blogcategory.create') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a> 
                                 </div>
                                    
                              </div>
                            </h4>
                          </div>
                <div class="card-body">
                 
                                     
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                              <!--  <th data-field="state" data-checkbox="true"></th>-->
                                                <th data-field="no">No</th>
                                                <th data-field="category_name" data-editable="true"> Category Name</th>
                                                <th data-field="status" data-editable="true"> Status</th>
                                                <th data-field="created_at" data-editable="true"> Created At</th>
                                                <th data-field="updated_at" data-editable="true"> Updated At</th>
                                                <!--<th data-field="action">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($categories as $category)
                                            <tr>
                                               
                                                <td>{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    @php
                                                        $id = $category->id;
                                                        $id = \Crypt::encrypt($id);
                                                        $pageno = $categories->currentPage();
                                                        $pageno =\Crypt::encrypt($pageno);
                                                    @endphp
                                                    <a href="{{ url('/blogcategory/edit/'.$id.'/'.$pageno)}}">
                                                    <?= $category->category_name ?>
                                                    </a></td>
                                                 <!--<td>
                                                @if($category->is_active == '1')
                                                  <span style="color:green">
                                                  <?php echo "active"; ?>
                                                </span>
                                                  @else
                                                  <span style="color:red">
                                                  <?php echo "unactive"; ?>
                                                  </span>
                                                @endif
                                                   <select id="<?= $category->id ?>" class="form-control status_change" name="is_active">
                                                      <option value="">change</option>
                                                      <option value="1">active</option>
                                                      <option value="0">unactive</option>
                                                     </select>
                                                </td>-->
                                                <td>
                                                      <select id="{{$category->id}}" data-control="status" name="is_active" class="form-control status_change">
                                                       <option value="1" <?= ($category->is_active==1)?"selected":""?>>Active</option>
                                                        <option value="0" <?= ($category->is_active==0)?"selected":""?>>Inactive</option>
                                                        </select>
                                                </td>
                                                <td><?= $category->created_at ?></td>
                                                <td><?= $category->updated_at ?></td>
                                                <!--<td>
                                                    <a href="{{ url('/blogcategory/edit/'.$category->id.'/'.$categories->currentPage())}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                </td>-->
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                        </tbody>
                                    </table>
                                    {{ $categories->appends($data)->links() }}
                                </div>
                            </div>
                        </div>
                   
        <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
         <!-- Notifix JS Start
        ============================================ -->
        <!--<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script> -->
        <script src="{{ asset('admin/js/notiflix/notiflix-2.6.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/notiflix/notiflix-aio-2.6.0.min.js')}}"></script>
        <!-- Notifix JS End 
        ============================================ -->
        
        <script  type="text/javascript">
           var page ='<?php echo $categories->currentPage() ?>';
          
          $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ route('blogcategory.create') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
          });
          
                 function callbackURL(message, url) 
{
    Notiflix.Notify.Init({position:"center-top",width:"70%"});
    Notiflix.Notify.Success(message);
    setTimeout(function(){
        window.location = url;
      }, 3000);
}

     </script>
   
        <script type="text/javascript">
          /*  $(document).ready(function(){
                 $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                        var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('blogcategory.updatestatus') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                var message = data.success;
                                var url = location.reload();
                                 callbackURL(message,url);
                                //alert(data.success);
                               // location.reload();
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
                        var is_active = $(this).val();
                        var id = $(this).attr('id'); 
                            $.ajax({ 
                            url: "{{ URL::route('blogcategory.updatestatus') }}",
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
                                //alert(data.success);
                               // location.reload();
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