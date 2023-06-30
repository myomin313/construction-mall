@extends((Auth::user()->role == 3) ? 'layouts.freelancer_panel' :'layouts.admin_panel')
@section('content')
<!-- start -->
 <body class="freelancers">
 <div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
<!--main-header end--> 
@include('element.header')
<style>
    th{
        text-align:center;
    }
</style>

   <section class="inner-heading" style="background: url('{{ asset('storage/freelancer/'.$projectsetting->freelancer_detail_image)}}') 100%;">
    <div class="container">
    <h1>Blogs</h1>
     
    </div>
  </section>

  
  <section class="inner-wrap freelancer_detail">
 <div class="container">
      <!--<div class="row">-->
        <ul class="blog-grid">
           
        <div class="col-md-9 col-sm-12">
<!-- <div class="quotation-area"> -->
            <!--<div class="container-fluid">-->
             <li>
            <div class="blog-inter">
             <div class="row">
                 <div class="col-md-12">
              <!--<div class="col-md-12">-->
              
               <!--  <div class="card"> -->
              <!-- <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">  Blog List</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                       <a  type="button" href="{{ route('add.blog') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a> 
                    </div>   
                  </div>
                </h4>
              </div> -->
              <!-- <div class="card-body"> -->

                      @if(Session::has('success')) 
                                        <script type = "text/javascript">  
                             var message = "{{Session::get('success')}}"; 
                                 callbackSuccess(message);
    </script>
                                    @endif
                   @php 
                                     if(isset($title))
                          $title = $title;
                      else
                          $title ="";
                          
                           if(isset($posted_user))
                          $posted_user = $posted_user;
                      else
                          $posted_user ="";
                          
                            if(isset($is_active))
                          $is_active =$is_active;
                      else
                          $is_active ="2";
                     
                @endphp
                     <!-- start -->
                     <!--<div class="row"  style="border: 2px solid #acacac;border-radius: 10px">-->
                      
                    <form class="form-inline" action="{{ route('freelancer.blogs') }}" method="post">

                                          {{csrf_field()}}
                                       <div class="form-group col-md-4 col-xs-6 padding5">
                                          <input value="{{$title}}" type="text" class="form-control" name="title" placeholder="Eg.Blog Title">
                                       </div>
                                     
                                      <div class="form-group col-md-4 col-xs-6 padding5">
                                         <select class="form-control status" name="is_active">
                                             <option value=""<?= ($is_active==2)?"selected":""?>>Status</option>
                                             <option value="1"<?= ($is_active==1)?"selected":""?>>Posted</option>
                                             <option value="0"<?= ($is_active==0)?"selected":""?>>Pending</option>
                                           </select>
                                      </div>
                                      <div class="form-group col-md-2 col-xs-6 padding5">
                                     <button type="submit" class="btn btn-standard w_100"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                      </div>
                                      <div class="form-group  col-md-2 col-xs-6 padding5">
                                      <a class="btn btn-standard w_100" href="{{ route('freelancer.blogs') }}"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</a>
                                      </div>

                                    </form>
                                    </div>
                                    <!--</div>-->
               <!--  </div> -->
                </div>
                </div>
                </li>
                    <!--</div>-->
                     <li>
                         <div class="row our_service">
              <div class="col-md-8 col-sm-8 col-xs-4">
                 <div class="post-tittle">
                      <!--<h4><a href="#">Blog</a></h4>                     -->
                  </div>
              </div>
                       <div class="col-md-4 col-sm-8 col-xs-8 ">
                           
                           <!--<a  type="button" href="{{ route('add.blog') }}"  class="btn pull-right btn-standard editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>-->
                           
                           <!-- <a  type="button" class="btn pull-right btn-standard deleteitemall mr-10"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>-->
                            
                            <a type="button" href="{{ route('add.blog') }}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                            <a type="button" class="pull-right  deleteitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a> 
                        </div>
                        </div>
                     </li>
                         <li>
                          <div class="row our_services"> 
                          <div class="col-md-12">
                          <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="false" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                           data-click-to-select="true" data-toolbar="#toolbar" style="text-align:center !important">
                                        <thead>
                                            <tr>
                                                <th data-field="state"><input type="checkbox" name="category_id" id="checkall"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="range_id" data-editable="true">Titile</th>
                                                <th data-field="category_id" data-editable="true">Image</th>
                                                <th style="width:20px;" data-field="project_current_situation" data-editable="true">Category</th>
                                               <!--  <th data-field="used_coin" data-editable="true">detail</th> -->
                                                <th data-field="send_status_id" data-editable="true">Status</th>
                                                <th data-field="send_user_id" data-editable="true">Created Date</th>
                                             
                                                @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                                <th data-field="posted_by" data-editable="true">Posted By</th>
                                                <th data-field="approved_by" data-editable="true">Approved By</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php $count=1;@endphp
                                         @foreach($blogs as $blog)
                                            <tr>
                                                 <td><input class="checkbox" name="blogid" type="checkbox" data-id="{{ $blog->id }}" value="{{ $blog->id }}"/></td>
                                               
                                                 <td>{{ ($blogs->currentPage()-1) * $blogs->perPage() + $loop->index + 1 }}</td>
                                                 <td>
                                                     @php
                                                        $id = $blog->id;
                                                        $id = \Crypt::encrypt($id);
                                                        $page = $blogs->currentPage();
                                                        $page =\Crypt::encrypt($page);
                                                     @endphp
                                                     <a  class="show-modal"  data-id="{{ $blog->id }}" data-title="{{ $blog->title }}" 
                                                   data-image ="{{ $blog->image }}"
                                                   data-category-name ="{{  implode(',', $blog->category_arr) }}"
                                                   data-description ="{{ $blog->description }}"
                                                   data-created ="{{  $blog->created_at }}" 
                                                   data-id="{{ $blog->id }}"
                                                   data-url="{{ url('blog/edit/'.$id.'/'.$page) }}"><?= $blog->title ?></a></td>
                                                <td>
                                                     @if($blog->image != null && $blog->image !='undefined')
                                                    <img src="{{ asset('storage/blog/'.$blog->image) }}" alt="" title="" style="width:50px;height:50px">
                                                     @endif
                                                  </td>
                                                <td><?php $count =1;                                              foreach($blog->category_arr as $category){
                                                                if(sizeof($blog->category_arr)==$count)
                                                                    echo $category;
                                                                else
                                                                    echo $category.", ";
                                                            $count++;
                                                           }
                                                        ?></td>
                                              
                                                <td>
                                                    @if(Auth::user()->role == 3 )
                                            <?= ($blog->is_active =='1')?'<span class="badge" style="background:green;color:white">Posted</span>':'<span class="badge" style="background:red;color:white">Pending</span>' ?>
                                             @endif
                                            
                                            @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                            <select id="{{$blog->id}}" name="is_active" class="form-control status_change">
                                            <option value="1" <?= ($blog->is_active==1)?"selected":""?>>Posted</option>
                                            <option value="0" <?= ($blog->is_active==0)?"selected":""?>>Pending</option>
                                           </select>
                                           @endif
                                              </td>
                                                <td><?php  echo $blog->created_at; ?></td> 

                                                @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                                    <td><?= $blog->posted_by ?></td>
                                                    <td><?= $blog->approved_by ?></td>
                                                @endif

                                              
                                            </tr>
                                            @php $count++; @endphp
                                         @endforeach  
                                        </tbody>
                                    </table>
                                    <div class="pagination-area">
                                      <ul class="pagination">
                                         {{ $blogs->appends($data)->links() }}
                                       </ul>
                                    </div>
                                    </div>
                                    <!-- <div class="pull-right">
                                         {{ $blogs->appends($data)->links() }}
                                    </div> -->
                                  </div>
                                  </li>
                       <!--   </div> -->
                      <!--   </div> -->
              </div>
               <li class="col-md-3 col-sm-12"> 
            @include('admin.freelancer.freelancer_menu')
          <!-- end advertising -->
            @foreach($advertisings as $advertising)
          <div class="side-bar"> 
              <div class="advertise">
                   <a href="{{ $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
              </div> 
          </div>
           @endforeach 
        </li>
            </ul>
                </div>
              <!--</div>-->
            </section>
       <!--image upload-modal start-->
      <div class="modal fade" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4> <div id="image"></div></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td>Title</td>
                                    <td>
                                         <div id="title">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Category Name</td>
                                    <td>
                                         <div id="category_name">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Created</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Detail</td>
                                    <td>
                                         <div id="blog-detail">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                   <td></td>
                                    <td>
                                         <a type="button" id="blog-edit" href="" class="btn btn-standard editeducationBtn">Edit</a>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>Used Coin</td>
                                    <td>
                                         <div id="used_coin">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requested User</td>
                                    <td>
                                         <div id="send_user_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Received Status</td>
                                    <td>
                                         <div id="received_status">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Request Status</td>
                                    <td>
                                         <div id="requested_status">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated User</td>
                                    <td>
                                         <div id="updated_by">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requested Date</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>File</td>
                                    <td>
                                         <div id="file">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Summary</td>
                                    <td>
                                         <div id="summary">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Policy</td>
                                    <td>
                                         <div id="policy">
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end--> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--<script  type="text/javascript">
          $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ route('add.blog') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
          
             $('.fixed-table-toolbar').append('<div style="float:left;width:50%;height:100%;"><a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a></div>');
        
          });
     </script>-->
        <script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.show-modal', function() { 
                  var APP_URL = '<?php echo url('/'); ?>';  
                  var page ='<?php echo $blogs->currentPage() ?>';
                  if($(this).data('image') !== ''){
                     var img='<img src="'+ APP_URL+'/storage/blog/'+$(this).data('image')+'" style="width:50px;height:50px">';
                      $('#image').html(img);
                    }else{
                      $('#image').html('');
                      $('.img-border').css("border-top","none");
                    }

                    $('.modal-title').text('Blog Detail');
                    //var range = $(this).data('minimum')+"~"+$(this).data('maximum');
                    $('#title').html($(this).data('title'));
                    $('#category_name').html($(this).data('category-name'));
                    // $("#image").attr('src', APP_URL+'/storage/blog/'+$(this).data('image'));
                    $('#blog-detail').html($(this).data('description'));
                    $('#created_at').html($(this).data('created'));
                    /*$("#blog-edit").attr('href', '{{ url('blog/edit/') }}'+'/'+$(this).data('id')+'/'+page);*/ 
                    $("#blog-edit").attr('href',$(this).data('url') );
                    // $('#project_current_situation').html($(this).data('project_situation'));
                    // $('#used_coin').html($(this).data('used_coin'));
                    // $('#summary').html($(this).data('summary'));
                    // $('#file').html($(this).data('file'));
                    // $('#policy').html($(this).data('policy'));
                    // $('#send_user_name').html($(this).data('send_user_name'));
                    // $('#received_status').html($(this).data('received_status'));
                    // $('#requested_status').html($(this).data('requested_status'));
                    // $('#created_by').html($(this).data('created_at'));
                    // $('#updated_by').html($(this).data('updated_by'));
                    // $('#created_at').html($(this).data('created_at'));
                    // $('#updated_at').html($(this).data('updated_at'));
                    $('#showModal').modal('show');
                });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                
            $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                     /*  var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){ */
                            $.ajax({ 
                            url: "{{ URL::route('blog.updatestatus') }}",
                            type: 'POST',
                            data: {'id':id,"is_active":is_active},
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
                       /*    }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        } */
                 });
                 
                
                 
             });
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
            var blogids = [];
                  $("input:checkbox[name=blogid]:checked").each(function(){
                      blogids.push($(this).val());
                       });
                       
                       if(blogids.length == 0) {
                            alert("please checked at least one blog that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('blog.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : blogids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                //var message = data.success;
                                var url = window.location.href;
                                window.location=url;
                                 //callbackURL(message,url);
                                //location.reload();
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