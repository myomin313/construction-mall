@extends('backend.layouts.user_panel')
@section('title','Myanbox | Buy Coin')
@section('content')
<div class="freelancers">
   <section class="inner-heading" style="background-image: url('{{ asset('storage/member/'.$projectsetting->member_background_image)}}');">
    <div class="container">
    <h1>{{ Auth()->user()->name }}'s Buy Coin</h1>
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
                      <p>Coin Count : <span class="pull-right"><?= number_format($coinplan_list->coin_count) ?></span></p>
                      <p>Price (<?= $coinplan_list->currency_unit->unit ?>): <span class="pull-right"><?= number_format($coinplan_list->price) ?></span></p>
                    <div style="padding-bottom:10px;"><center >
                      <button class="btn_buy btn btn-standard" data-id="{{$coinplan_list->id}}">Order Now</button>
                    </a>
                  </center></div>
                 </div>
                <!--</div>-->
               </li>
                 @php $count++; @endphp
                 @endforeach
              </div>
              </div>
                @include('backend.element.user_menu')

             </ul>
            </div>
        </div>
  </section>
    @endsection
    @section('script')
  <script type="text/javascript">
      $(document).on('click','.btn_buy', function() {
       // $(".btn_buy").attr('disabled','disabled');
       //                          setTimeout(function() {
       //                            $this.removeAttr('disabled');
       //                         }, 3000);
          Swal.fire({
              title: 'Are you sure?',
              text: "You want to request this plan!",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#ffcc32',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes',
              cancelButtonText: 'No',
              reverseButtons: true
          }).then((result) => {
              if (result.isConfirmed) {
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
                              Swal.fire(
                                  'Congratulation!!!',
                                  data.success,
                                  'success'
                              )
                          }
                          else{
                              Swal.fire(
                                  'Oops',
                                  data.errors,
                                  'error'
                              )
                          }
                      }

                  });
              }
          })

      });
    </script>

@endsection
