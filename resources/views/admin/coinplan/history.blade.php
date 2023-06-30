@extends((Auth::user()->role == 2) ? 'layouts.company_panel' : ((Auth::user()->role == 4 || Auth::user()->role == 5)?'layouts.admin_panel': 'layouts.user'))
@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                @include('admin.element.breadcrumb')
            @endif

            <div class="card">
                 @include('admin.element.success-message')
              <div class="card-header card-header-primary">
                <h4 class="card-title">
                            <div class="row">
                                 <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                     <h3 class="panel-title">{{ $user->name }} Company Ordered Coin History</h3>
                                    @else
                                     <h3 class="panel-title"> Company Ordered Coin History</h3>
                                    @endif
                                </div>
                                 <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                    <a href="{{route('coinplan.index')}}" class="btn btn-default pull-right">Buy Coin</a>
                                    @endif
                                </div>   
                            </div>
                      </h4>
                    </div>
                      <div class="card-body table-responsive">
                          <table id="table" class="table table-bordered table-stripe">
                                        <thead>
                                            <tr>
                                                <th data-field="no">No</th>
                                                <th data-field="coin_count" data-editable="true">Coin Count</th>
                                                @if(Auth::user()->role == 4|| Auth::user()->role == 5)
                                                <th data-field="user" data-editable="true">Request User</th>
                                                @endif
                                                <th data-field="price" data-editable="true">Price</th>
                                                <th data-field="status" data-editable="true">Status</th>
                                                <th data-field="order_date" data-editable="true">Ordered Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                                @php $count=1; @endphp
                                                  @foreach($coin_histories as $coinplan_list)
                                                    <tr>
                                                       <td>{{ ($coin_histories->currentPage()-1) * $coin_histories->perPage() + $loop->index + 1 }}</td>
                                                        <td><?= $coinplan_list->coin_count ?></td>
                                                        <td><?= $coinplan_list->name ?></td>
                                                        <td>
                                                         <?= $coinplan_list->price  ?>  
                                                        </td>
                                                        <td>
                                                        @if($coinplan_list->status =="Approved")
                                                         <span>{{ $coinplan_list->status }}</span> 
                                                        @else 
                                                          @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                                            @if( $coinplan_list->status != 'Approved')
                                                       <select id="<?= $coinplan_list->id ?>" data-control="status" coin_count="<?= $coinplan_list->coin_count ?>"  user_id="<?= $coinplan_list->user_id ?>" class="form-control status_change" name="status">
                                                                  <option value="Pending" <?php echo ($coinplan_list->status=='Pending')?'selected':''; ?> >Pending</option>
                                                                  <option value="Approved" <?php echo ($coinplan_list->status=='Approved')?'selected':''; ?>>Approved</option>
                                                                  <option value="Rejected" <?php echo ($coinplan_list->status=='Rejected')?'selected':''; ?>>Rejected</option>
                                                                 </select>
                                                             @endif
                                                        @endif
                                                      @endif
                                                        </td>
                                                        <td>
                                                         <?= $coinplan_list->created_at  ?>  
                                                        </td>
                                                    </tr>
                                                    @php $count +=1 @endphp
                                                  @endforeach
                                                
                                            @else                                   
                                                @php $coin_plan_count= 1; @endphp;
                                                @if(!empty($coin_histories->coin_plan))
                                                    @foreach($coin_histories->coin_plan as $coinplan_list)
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
                                                @endif
                                            @endif

                                        </tbody>
                                    </table>
                                      @if(Auth::user()->role == 4 || Auth::user()->role == 5)
                                    <div class="pull-right">
                                       {{ $coin_histories->links() }} 
                                    </div>
                                    @endif
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                $("[data-control='status']").prop('disabled', true);
                                window.location.reload();
                                // var message = data.success;
                                // var url = window.location.href;
                                //  callbackURL(message,url);
                                 
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