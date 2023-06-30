@extends('layouts.user')
@section('content')
<body class="freelancers">
    <style>
         th{
           text-align:center;   
         }
    </style>
<div class="page-wrapper"> 
  <div class="preloader"></div>
  
   @include('element.header')
   <section class="inner-heading" style="background-image: url('{{ asset('storage/member/'.$projectsetting->member_background_image)}}');">
    <div class="container">
    <h1>{{ Auth()->user()->name }}'s Ordered Coin History</h1>    
    </div>
  </section>
  <section class="inner-wrap">
      <div class="container">
        <div class="row">
           <ul class="blog-grid">
                        <div class="col-md-9 col-sm-12">
                            <li>
                                 @if(count($coin_histories) > 0 )
                    <div class="blog-inter">
                                  <div class="row">
                                     <div class="col-md-12">
                                         
                              <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="false" 
                          data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" 
                          data-resizable="false" data-cookie="true" data-cookie-id-table="saveId" data-show-export="false"
                           data-click-to-select="true" data-toolbar="#toolbar" style="text-align:center !important">
                                        <thead>
                                            <tr>
                                               <th data-field="no">No</th>
                                               <th data-field="coin_count" data-editable="true">Coin Count</th>
                                               <th data-field="price" data-editable="true">Price</th>
                                               <th data-field="status" data-editable="true">Status</th>
                                               <th data-field="order_date" data-editable="true">Ordered Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>                         
                                                @php $coin_plan_count= 1; @endphp
                                                    @foreach($coin_histories as $coinplan_list)
                                                        <tr>
                                                            <td>{{ $coin_plan_count }}</td>
                                                            <td><?= $coinplan_list->coin_count ?></td>
                                                            <td>
                                                             <?= $coinplan_list->price  ?>  
                                                            </td>
                                                            <td><?= $coinplan_list->pivot->status ?></td>
                                                            <td>
                                                             <?= $coinplan_list->pivot->created_at  ?>  
                                                            </td>
                                                        </tr>
                                                        @php $coin_plan_count +=1 @endphp
                                                      @endforeach
                                        </tbody>
                                    </table>
                                      <div class="pagination-area">
                                        <ul class="pagination">
                                         {!! $coin_histories->links() !!}
                                          </ul>
                                       </div>
                                     </div>
                                    </div>
                                </div>
                                @else
                                <div class="blog-inter" style="min-height:350px">
                                    @include('element.404')
                                 </div>
                                 @endif
                                </li>
                                </div>
                                <li class="col-md-3 col-sm-12">
                                    <div class="side-bar" > 
            <!--  <div class="side-barBox"> -->
              <div class="side-barBox" >
                 <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->freelancer_nav_first_background_and_icon }} 50%, {{ $projectsetting->freelancer_nav_second }}) !important;color:{{ $projectsetting->freelancer_nav_font_color}} !important">Summary</h5>
                     <table class="table">
                  <tbody>
                     
                    <tr>
                      <td colspan="3">Total Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->coin }}</td>
                    </tr>
                    <tr>
                      <td colspan="3">Left Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->left_coin }}</td>
                    </tr>
                    <tr>
                      <td colspan="3">Used Coin
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ Auth::user()->coin  -  Auth::user()->left_coin }}</td>
                    </tr>
                    
                     <tr>
                      <td colspan="3">Request Quotation
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $quotations_request_count }}</td>
                    </tr>
                     <tr>
                      <td colspan="3">Approve Quotation
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $quotations_success_count }}</td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">Request Coin Plan
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $usercoin_lists_count }}</td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">Received Coin Plan
                      <!--<span>Par Square Meter</span>-->
                      </td>
                      <td>{{ $usercoin_received }}</td>
                    </tr>
                    
                  </tbody>
                </table>
                </div>
             <!-- </div> -->
          </div>
                                    
                                </li>
                                </ul>
                        </div>
                    </div>
                     </section>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           <script type="text/javascript">
          
            $(document).ready(function(){
                $('#table').on('change','.status_change',function(){ 
                        var status = $(this).val();
                        var id = $(this).attr('id');
                        var user_id=$(this).attr('user_id');
                        var coin_count =$(this).attr('coin_count');
                       /* var conf = confirm('Are you sure want to change status?'); 
                        if(conf == true){*/
                            $.ajax({ 
                            url: "{{ URL::route('admin.request.coin.update') }}",
                            type: 'POST',
                            data: {'id' : id,"status":status,"coin_count":coin_count,"user_id":user_id},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                                 
                              /*  alert(data.success);
                                location.reload();*/
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                      /*  }
                        else{
                            $(this).val(selectedvalue);
                            $(this).bind('focus');
                            return false;
                        }*/
                 });
             });
        </script>
@endsection