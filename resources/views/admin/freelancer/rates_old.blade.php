@extends('layouts.freelancer_panel')
@section('content')
<div class="quotation-area mg-tb-30">
            <div class="container-fluid">
                <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Freelancer Rates List</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
                          <div class="panel-body table-responsive">
                          <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                           data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="range_id" data-editable="true">Rates</th>
                                                <th data-field="category_id" data-editable="true">User</th>
                                                <th data-field="view" data-editable="true">Created At</th>
                                                <th data-field="action" data-editable="true">Updated at</th>
                                                <!-- <th>View</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @php $count=1;@endphp
                                         @foreach($freelancer_rates as $freelancer_rate):
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>
                                               <!--  <i class="fa fa-star"></i> -->
                                                <!-- start -->
                                                <span  class="rate-it" data-score="" title="Not rated yet!" style="color: #1E8840;">
                                               <i data-alt="4" class="fa fa-star" title="Not rated yet!"></i></span>  
                                                <span style="color: #1E8840;"> {{ $freelancer_rate->rate }}</span><br>   
                                               <br>
                                                </td>
                                                <td><?= $freelancer_rate->name ?></td>
                                                <td><?= $freelancer_rate->created_at ?></td>
                                                <td><?= $freelancer_rate->updated_at ?></td>
                                            </tr>
                                            @php $count++; @endphp
                                         @endforeach  
                                        </tbody>
                                    </table>
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
                                <tr>
                                    <td>Name</td>
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
           
           /* Show Event  */
            $(document).on('click', '#comment_view', function() { 
                    $('.modal-title').text('Comment Detail');
                    //var range = $(this).data('minimum')+"~"+$(this).data('maximum');
                    $('#name').html($(this).data('name'));
                    $('#comment').html($(this).data('comment'));
                    $("#created_at").html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $('#showModal').modal('show');
                });
        </script>

@endsection