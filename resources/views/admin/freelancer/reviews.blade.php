@extends((Auth::user()->role == 4 || Auth::user()->role == 5) ? 'layouts.admin_panel' : 'layouts.freelancer_panel')
@section('content')
<div class="content">
            <div class="container-fluid">
                 @include('admin.element.breadcrumb')
                 @include('admin.element.success-message')
                <div class="row">
                <div class="col-lg-12 col-md-12">
                <div class="card">
              <div class="card-body search_form">
                    @php 
                      if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                          
                            if(isset($commenter))
                          $commenter =$commenter;
                      else
                          $commenter ="";
                          
                             if(isset($is_active))
                          $is_active = $is_active;
                      else
                          $is_active ="2";
                          
                          
                     
                @endphp
                                 <form class="form-inline" action="{{ route('admin.freelancer.feedbacks') }}" method="get">
                                          {{csrf_field()}}
                                           @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                       <div class="form-group col-md-4 col-sm-6 col-sm-12">
                                          <label>Freelancer :</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Eg. Aung Aung">
                                       </div>
                                        @endif
                                       <div class="form-group col-md-3 col-sm-6 col-sm-12">
                                          <label>Commenter :</label>
                                          <input value="{{$commenter}}" type="text" class="form-control" name="commenter" placeholder="Eg. Su Su">
                                       </div>
                                        @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                         <div class="form-group col-md-3 col-sm-6 col-sm-12">
                                           <label>Status :</label>
                                             <select class="form-control status" name="is_active">
                                             <option value=""  <?= ($is_active==2)?"selected":""?>>Status</option>
                                             <option value="0" <?= ($is_active==0)?"selected":""?>>Inactive</option>
                                             <option value="1" <?= ($is_active==1)?"selected":""?>>Active</option>
                                           </select>
                                         </div>
                                      @endif
                                      <div class="form-group col-md-2 col-sm-6 col-sm-12 pull-right pt-2em">
                                        <button type="submit" class="btn btn-success">Search</button>
                                      @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                      <a  class="btn btn-reset" href="{{ route('admin.freelancer.feedbacks') }}">Reset</a>
                                      </div>
                                      
                                      @elseif(Auth::user()->role == 3)
                                      <a  class="btn btn-reset" href="{{ route('freelancer.feedbacks') }}">Reset</a>
                                      @endif
                                    </form>
                           </div>
                      </div>
                    </div>
                  </div>
                  <div class="row"> 
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                        
                          <div class="card-header card-header-primary">
                             <h2 class="panel-title">
                              Freelancer Feedback List
                            </h2>
                          </div>
                          <div class="card-body">

                          <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no" width="10%">No</th>
                                                @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                                <th data-field="freelancer" data-editable="true" width="10%">Freelancer</th>
                                                @endif
                                                <th data-field="comment" data-editable="true" width="20%">Comment</th>
                                                <th data-field="commenter" data-editable="true" width="10%">Commenter</th>
                                               
                                                <th data-field="is_active" data-editable="true" width="25%">Status</th>
                                               
                                                <th data-field="created_at" data-editable="true" width="15%">Created At</th>
                                                <th data-field="updated_at
                                                " data-editable="true" width="10%">Updated at</th>
                                                <!--<th>View</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php $count=1;@endphp
                                         @foreach($freelancer_comments as $freelancer_comment)
                                            
                                                @if($freelancer_comment->is_active=="1")
                                                <?php   $status='Active'; ?>
                                                @else
                                                 <?php  $status='Inactive'; ?>
                                                @endif
                                                  
                                            <tr>
                                                <td>{{ ($freelancer_comments->currentPage()-1) * $freelancer_comments->perPage() + $loop->index + 1 }}</td>
                                                
                                                
                                                @if(Auth::user()->role == 4 || Auth::user()->role == 5) 
                                                        <td><?= $freelancer_comment->freelancer_name ?>
                                                         </td>
                                                @endif
                                               
                                                <td><a style="color:#fcb80b;" id="comment_view"  data-comment="<?=  $freelancer_comment->comment ?>"
                                                            data-freelancer="<?= $freelancer_comment->freelancer_name ?>"
                                                            data-name="<?= $freelancer_comment->name ?>"
                                                            data-created="<?= $freelancer_comment->created_at ?>"
                                                            data-updated="<?= $freelancer_comment->updated_at ?>"
                                                            data-status="<?= $status ?>">
                                            <?= (strlen($freelancer_comment->comment) >50)?substr($freelancer_comment->comment,0,50)."...":$freelancer_comment->comment ?> </a></td>
                                                <td><?= $freelancer_comment->name ?></td>
                                                <td>
                                                      @if(Auth::user()->role == 3 )
                                            <?= ($freelancer_comment->is_active =='1')?'<span class="badge" style="background:green;color:white">Posted</span>':'<span class="badge" style="background:red;color:white">Pending</span>' ?>
                                             @endif
                                                       
                                                        @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                                      <select id="{{$freelancer_comment->id}}" data-control="status" name="is_active" class="form-control status_change">
                                                       <option  <?= ($freelancer_comment->is_active=="1")?"selected":""?> value="1">Active</option>
                                                        <option <?= ($freelancer_comment->is_active=="0")?"selected":""?> value="0" >Inactive</option>
                                                        </select>
                                                    </td>
                                                @endif    
                                                <td><?= $freelancer_comment->created_at ?></td>
                                                <td><?= $freelancer_comment->updated_at ?></td>
                                                <!--<td><a id="comment_view" data-comment="<?=  $freelancer_comment->comment ?>"
                                                  data-freelancer="<?= $freelancer_comment->freelancer_name ?>"
                                                  data-name="<?= $freelancer_comment->name ?>" data-created="<?= $freelancer_comment->created_at ?>"  data-updated="<?= $freelancer_comment->updated_at ?>">View</a>
                                                 </td>-->
                                            </tr>
                                            @php $count++; @endphp
                                         @endforeach  
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                        {{ $freelancer_comments->appends($data)->links() }}
                                    </div>
                        
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
       <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                <tr>
                                    <td>Freelancer</td>
                                    <td>
                                         <div id="freelancer">
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td>Commenter</td>
                                    <td>
                                         <div id="name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Comment</td>
                                    <td>
                                         <div id="comment">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Status</td>
                                    <td>
                                         <div id="status">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created at</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Updated at</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                                              
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
           var page ='<?php echo $freelancer_comments->currentPage() ?>';
           /* Show Event  */
            $(document).on('click', '#comment_view', function() { 
                    $('.modal-title').text('Comment Detail');
                    //var range = $(this).data('minimum')+"~"+$(this).data('maximum');
                    $('#freelancer').html($(this).data('freelancer'));
                    $('#name').html($(this).data('name'));
                    $('#comment').html($(this).data('comment'));
                     $('#status').html($(this).data('status'));
                    $("#created_at").html($(this).data('created'));
                    $('#updated_at').html($(this).data('updated'));
                    $('#showModal').modal('show');
                });
                
                $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        var id = $(this).attr('id');
                            $.ajax({ 
                            url: "{{ URL::route('admin.freelancer.updatestatus') }}",
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
        </script>

@endsection