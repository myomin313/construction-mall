@extends('backend.layouts.company_panel')
@section('title','Coin Plan')
@section('content')

    <div class="col-md-9 col-sm-12">

        <li>
        <div class="row our_services">
        @php $count=1;@endphp
        @foreach($coinplan_lists as $coinplan_list)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service_list">
                <h5 class="text-center">Plan {{ $count }}</h5>

                <p>Coin Count : <span class="pull-right"><?= number_format($coinplan_list->coin_count) ?></span></p>
                <p>Price (<?= $coinplan_list->currency_unit->unit ?>): <span class="pull-right"><?= number_format($coinplan_list->price) ?></span></p>
                <center style="padding-bottom:10px">
                <button class="btn_buy btn btn-standard" data-id="{{$coinplan_list->id}}">Order Now</button>
                </center>
                </div>
            </div>
        @php $count++; @endphp
        @endforeach

        </div>

    </li>

    </div>
    @endsection
     @section('script')
        <script type="text/javascript">
            $(document).on('click','.btn_buy', function() {
               
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to request this plan!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#ffcc32',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
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