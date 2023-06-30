@extends('layouts.freelancer_panel')
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
        <h1>Rates</h1>
      </div>
  </section>
           <!-- Single pro tab review Start-->
      <section class="inner-wrap">
        <div class="container">
         <div class="row">
         <ul class="blog-grid">
        <li class="col-md-9 col-sm-12">
             <div class="row">
                  <div class="col-md-12"  style="position:relative;top:-13px">
                          <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="false" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="true" data-cookie="true"   data-cookie-id-table="saveId" data-show-export="false"
                           data-click-to-select="true" data-toolbar="#toolbar"
                           style="text-align:center">
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
                                         @foreach($freelancer_rates as $freelancer_rate)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>
                                                <span  class="rate-it" data-score="" title="Not rated yet!"  style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;">
                                               <i data-alt="4" class="fa fa-star" title="Not rated yet!"></i></span>  
                                                <span  style="color:{{ $projectsetting->freelancer_nav_first_background_and_icon }} !important;"> {{ $freelancer_rate->rate }}</span><br>   
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
          </li>
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
    </div>
  </section>
        <!-- </div> --> 
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