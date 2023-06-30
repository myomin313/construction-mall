@extends('layouts.company_new_panel')
@section('title','Myanbox | Coin Plan')
@section('content')
<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
@include('element.header')
  <!--main-header end--> 
   @if(Session::get('parent_category_id') == 1)
       @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->service_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 2)
   @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->supplier_default_background_image) }}');">
  @endif
  @elseif(Session::get('parent_category_id') == 3)
   @if(!empty($company->cover_photo))
  <section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.$company->cover_photo) }}');">
 @else
<section class="inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'.
    $projectsetting->reno_default_background_image) }}');">
  @endif
  @endif
    <div class="container">
      <h1>Request To Buy Coin</h1>
    </div>
  </section>
  <div class="container-fluid" style="margin-top: -3em;z-index: 4;">
      <input type="file" id="cover_file" name="cover_photo" accept="image/*" class="hide">
       <label class="pull-right edit_btn" for="cover_file">
    <i class="fa fa-camera" style="color:white;padding:10px;background: #ffcc32;border-radius: 20px" aria-hidden="true"></i></label>
    </div>
<!--inner content start-->
  
  <section class="inner-wrap service_detail"> 
    <!--container start-->
    <div class="container">
      <!--row start-->
      <ul class="blog-grid">
        
        <!--col start-->
       @include('element.company_menu')
      
         
        </div>
      <div class="col-md-9 col-sm-12">
         
          
          <li>
            <div class="row our_services">
                @php $count=1;@endphp
                  @foreach($coinplan_lists as $coinplan_list)
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service_list">
                 <h5 class="text-center">Plan {{ $count }}</h5>
                 
                 <p>Coin Count : <span class="pull-right"><?= $coinplan_list->coin_count ?></span></p>
                 <p>Price(Kyats) : <span class="pull-right"><?= $coinplan_list->price ?></span></p>
                 <center style="padding-bottom:10px">
                     <button class="btn_buy btn btn-standard" data-id="{{$coinplan_list->id}}"><i class="fa fa-paper-plane" aria-hidden="true"></i> Request to buy</button> 
                 </center>
                </div>
              </div>
              @php $count++; @endphp
                 @endforeach
                 
              <!--<div class="col-md-3 col-sm-4 col-xs-6">-->
              <!--  <div class="service_list">-->
              <!--    <h5 class="text-center">Plan 2</h5>-->
              <!--   <center>-->
              <!--   <span>Coin : 10000</span><br>-->
              <!--   <span>Price : 20000</span>-->
              <!--   <hr>-->
              <!--    <button class="btn btn-sm btn-standard"><i class="fa fa-paper-plane" aria-hidden="true"></i> Order</button>-->
              <!--  </center>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4 col-xs-6">-->
              <!--  <div class="service_list">-->
              <!--    <h5 class="text-center">Plan 2</h5>-->
              <!--   <center>-->
              <!--   <span>Coin : 10000</span><br>-->
              <!--   <span>Price : 20000</span>-->
              <!--   <hr>-->
              <!--    <button class="btn btn-sm btn-standard"><i class="fa fa-paper-plane" aria-hidden="true"></i> Order</button>-->
              <!--  </center>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4 col-xs-6">-->
              <!--  <div class="service_list">-->
              <!--    <h5 class="text-center">Plan 2</h5>-->
              <!--   <center>-->
              <!--   <span>Coin : 10000</span><br>-->
              <!--   <span>Price : 20000</span>-->
              <!--   <hr>-->
              <!--    <button class="btn btn-sm btn-standard"><i class="fa fa-paper-plane" aria-hidden="true"></i> Order</button>-->
              <!--  </center>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4 col-xs-6">-->
              <!--  <div class="service_list">-->
              <!--    <h5 class="text-center">Plan 2</h5>-->
              <!--   <center>-->
              <!--   <span>Coin : 10000</span><br>-->
              <!--   <span>Price : 20000</span>-->
              <!--   <hr>-->
              <!--    <button class="btn btn-sm btn-standard"><i class="fa fa-paper-plane" aria-hidden="true"></i> Order</button>-->
              <!--  </center>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4 col-xs-6">-->
              <!--  <div class="service_list">-->
              <!--    <h5 class="text-center">Plan 2</h5>-->
              <!--   <center>-->
              <!--   <span>Coin : 10000</span><br>-->
              <!--   <span>Price : 20000</span>-->
              <!--   <hr>-->
              <!--    <button class="btn btn-sm btn-standard"><i class="fa fa-paper-plane" aria-hidden="true"></i> Order</button>-->
              <!--  </center>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4 col-xs-6">-->
              <!--  <div class="service_list">-->
              <!--    <h5 class="text-center">Plan 2</h5>-->
              <!--   <center>-->
              <!--   <span>Coin : 10000</span><br>-->
              <!--   <span>Price : 20000</span>-->
              <!--   <hr>-->
              <!--    <button class="btn btn-sm btn-standard"><i class="fa fa-paper-plane" aria-hidden="true"></i> Order</button>-->
              <!--  </center>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-md-3 col-sm-4 col-xs-6">-->
              <!--  <div class="service_list">-->
              <!--    <h5 class="text-center">Plan 2</h5>-->
              <!--   <center>-->
              <!--   <span>Coin : 10000</span><br>-->
              <!--   <span>Price : 20000</span>-->
              <!--   <hr>-->
              <!--    <button class="btn btn-sm btn-standard"><i class="fa fa-paper-plane" aria-hidden="true"></i> Order</button>-->
              <!--  </center>-->
              <!--  </div>-->
              <!--</div>-->
            </div>
            <!-- <div class="pagination-area">-->
            <!--  <ul class="pagination">-->
            <!--    <li class="active"><a href="#">1</a></li>-->
            <!--    <li><a href="#">2</a></li>-->
            <!--    <li><a href="#">3</a></li>-->
            <!--    <li><a href="#">4</a></li>-->
            <!--    <li><a href="#">5</a></li>-->
            <!--    <li><a href="#">6</a></li>-->
            <!--    <li><a href="#">7</a></li>-->
            <!--    <li><a href="#">8</a></li>-->
            <!--  </ul>-->
            <!--</div>-->
          </li>
          
      </div>
      </ul> 

      </div>    
    </div>      
    <!--container end--> 
  </section>
 <!--inner content end--> 

<!--brand-section start-->
<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end-->
<!--brand-section end--> 
 <!--inner content end-->
@endsection
@section('script')
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
                                var url = "{{ route('company.coinplan.history') }}";
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
