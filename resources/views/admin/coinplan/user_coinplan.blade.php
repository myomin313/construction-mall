@extends((!empty(Session::get('login_company_id'))) ? 'layouts.company_panel' : 'layouts.user')
@section('content')
<body class="freelancers">    
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
   @include('element.header')
<!--main-header end--> 
  <!--main-header end--> 
   <section class="inner-heading" style="background-image: url('{{ asset('storage/member/'.$projectsetting->member_background_image)}}');">
    <div class="container">
    <h1>{{ Auth()->user()->name }}'s Coin History</h1>     
    </div>
  </section>

  <section class="inner-wrap">
      <div class="container">
        <div class="row">
            <ul class="blog-grid"> 
          <div class="col-md-9 col-sm-12">
              <div class="row our_services">
                  @php $count=1;@endphp
                 @foreach($coinplan_lists as $coinplan_list)
              <li class="col-md-3 col-sm-6 col-xs-12">
                <!--<div class="blog-inter" style="text-align: center">-->
                  <div class="service_list">
                      <h5 class="text-center">Plan {{ $count }}</h5>
                    <p>Coin Count:<span class="pull-right"><?= $coinplan_list->coin_count ?></span></p>
                    <p>Price(Kyats):<span class="pull-right">  <?= $coinplan_list->price ?></span></p>
                    <div><center ><a  class="btn_buy btn btn-standard" data-id="{{$coinplan_list->id}}" ><i class="fa fa-paper-plane" aria-hidden="true"></i> Request To Buy
                    </a></center></div>
                 </div>
                <!--</div>-->
               </li>
                 @php $count++; @endphp
                 @endforeach
              </div>
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
      $(document).on('click','.btn_buy', function() {      
       $(".btn_buy").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);
             var id = $(this).data('id');
        $.ajax({
               type: "post",
               url: "{{ URL::route('coinplan.buycoin') }}",
               data: {'id':id},
               dataType: 'json',
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success:function(data)
               {
                   if($.isEmptyObject(data.errors)){
                       
                       var message = data.success;
                                var url = "{{ route('user.coinplan.index') }}";
                                 callbackURL(message,url);
                   }
                   else{
                      message = '<span class="alert alert-danger">'+msg+'</span>';
                      $("#error").html(data.errors);
                   } 
                }
               
             }); 
      });
    </script>

@endsection