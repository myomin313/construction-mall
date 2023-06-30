@extends('backend.layouts.company_panel')
@section('title','Company Package')
@section('content')

    <div class="col-md-9 col-sm-12">
        <li>
            <div class="row our_services">

                @foreach($package_plans as $package_plan)

                <div class="col-md-4 col-sm-6">
                    <div class="side-bar package">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title text-center">{{$package_plan->name}} Package</h2>
                            </div>
                            <div class="panel-body left_menu">
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{($package_plan->id ==1)?"Unlimited" : $package_plan->periods}}</b> Days</p>
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> <b>{{number_format($package_plan->price)}}</b> {{$package_plan->currency_unit->unit}}</p>
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> Received <b>
                                        {{($package_plan->id == 1)?'a little':(($package_plan->id == 2)?'more':'a lot of')}}</b> quotation request</p>
                                <p><i class="fa fa-{{($package_plan->id == 1)? 'times text-danger':'check text-success'}}" aria-hidden="true"></i> Display company in <b>home</b> page</p>
                                 @if(Session::get('parent_category_id') != 3)
                                <p><i class="fa fa-{{($package_plan->id == 1)? 'times text-danger':'check text-success'}}" aria-hidden="true"></i> Display company's product, project, service information.</p>
                                @endif
                                <p><i class="fa fa-check text-success" aria-hidden="true"></i> Display company in <b>
                                        {{($package_plan->id == 1)?'lower position':(($package_plan->id == 2)?'Upper position of free package':'top position')}}</b></p>
                                <p><i class="fa fa-{{($package_plan->id == 1 || $package_plan->id == 2)? 'times text-danger':'check text-success'}}" aria-hidden="true"></i> Can request for changing company's all informations.</p>
                            </div>
                            <!--standard-->
                            @if($package_plan->id != 1)
                            <div class="row">
                                <div class="col-lg-12">
                                    <center>
                                        <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-standard btn_buy" data-dismiss="modal" aria-label="Close" data-id="{{ $package_plan->id}}">Order Now</button>
                                    </center>
                                </div>
                            </div>
                            @endif
                            <!--end-->
                        </div>
                    </div>
                    <!--start-->
                </div>
                @endforeach
            </div>
        </li>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        url: "{{ URL::route('package.store') }}",
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





