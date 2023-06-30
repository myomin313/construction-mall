@extends((Auth::user()->role == 4 || Auth::user()->role == 5) ? 'layouts.admin_panel' : 'layouts.freelancer_panel')
@section('content')
 <!-- start -->
 <body class="freelancers">
 <div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <style>
      th{
          text-align:center;
      }
  </style>
<!--main-header end--> 
@include('element.header')

   <section class="inner-heading"  style="background: url('{{ asset('storage/freelancer/'.$projectsetting->freelancer_detail_image)}}') 100%;">
    <div class="container">
    <h1>Feedbacks</h1>
    </div>
  </section>
           <!-- Single pro tab review Start-->
      <section class="inner-wrap freelancer_detail">
        <div class="container">
         <!--<div class="row">-->
         <ul class="blog-grid">
         
        <div class="col-md-9 col-sm-12">
            <li>
                 <div class="blog-inter">
             <div class="row">
              <div class="col-md-12">
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
                             <!--<div class="row" style="border: 2px solid #acacac;border-radius: 10px">-->
                             <!-- <div class="col-md-12" style="padding:20px">-->
                             <form class="form-inline" action="{{ route('admin.freelancer.feedbacks') }}" method="post"
                            >
                                          {{ csrf_field() }}
                                          
                                        <div class="form-group col-md-8 col-xs-12 padding5">
                                          <input value="{{$commenter}}" type="text" class="form-control w_100" name="commenter" placeholder="Eg. Su Su">
                                       </div>
                                       
                                        <div class="form-group col-md-2 col-xs-6 padding5">
                                        <button type="submit" class="btn btn-standard w_100"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                        </div>
                                        
                                        <div class="form-group col-md-2 col-xs-6 padding5">
                                        <a class="btn btn-standard w_100" href="{{ route('freelancer.feedbacks') }}"><i class="fa fa-refresh" aria-hidden="true"></i>Reset</a></div>
                                      
                                    </form>
                                  </div>
                                  </div> 
                                  </div>
                                  </li>
                                  <li>
                          <div class="row">
                               <div class="col-md-12">
                          <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" 
                          data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                           data-click-to-select="true" data-toolbar="#toolbar"
                           style="text-align:center">
                                        <thead>
                                            <tr>
                                                <th data-field="no" width="10%">No</th>
                                                @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                                <th data-field="freelancer" data-editable="true" >Freelancer</th>
                                                @endif
                                                <th data-field="comment" data-editable="true" >Comment</th>
                                                <th data-field="commenter" data-editable="true" >Commenter</th>
                                               
                                                <th data-field="is_active" data-editable="true" >Status</th>
                                               
                                                <th data-field="created_at" data-editable="true" >Created At</th>
                                                <th data-field="updated_at
                                                " data-editable="true" >Updated at</th>
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
                                                      <select id="{{$freelancer_comment->id}}" name="is_active" class="form-control status_change">
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
                                    <div class="pagination-area">
                                      <ul class="pagination">
                            {{ $freelancer_comments->appends($data)->links() }}
                                       </ul>
                                    </div>
                                     </div>
                                     </div>
                        <!-- </div>
                    </div>
                  </div>
                </div> -->
                </li>
            </div>
       <!--  </div> -->
      <!--</div>-->
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
  <!--</div>-->
</div>
</section>
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
                 });
        </script>

@endsection