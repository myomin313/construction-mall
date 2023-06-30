@extends((!empty(Session::get('login_company_id'))) ? 'layouts.company_panel' : 'layouts.user')
@section('content')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Buy Coin</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{route('coinplan.history')}}" class="btn btn-default pull-right">Coin History</a>
                    </div>   
                  </div>
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                              data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                              <thead>
                                  <tr>
                                      <th data-field="no">No</th>
                                      <th data-field="coin_count" data-editable="true">Coin Count</th>
                                      <th data-field="price" data-editable="true">Price</th>
                                     
                                      <th data-field="action">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @php $count=1; @endphp
                                  @foreach($coinplan_lists as $coinplan_list):
                                  <tr>
                                      <td>{{$count}}</td>
                                      <td><?= $coinplan_list->coin_count ?></td>
                                      <td>
                                       <?= $coinplan_list->price  ?>  
                                  </td>
                                  <td> <center>
                                         <a  class="btn_buy btn btn-success btn-sm" data-id="{{$coinplan_list->id}}" 
                                          >Request To Buy
                                        </a>
                                         </center>
                                  </td>
                                  @php $count +=1 @endphp
                                @endforeach
                                 </tr>
                              </tbody>
                          </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    
    
      $(document).on('click', '.btn_buy', function() {
      
       $(".btn_buy").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);


       /* var ans =confirm('Are you sure to buy?')
        if(ans)
        {   */
             var id = $(this).data('id');
             console.log(id);
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
                                var url = "{{ route('coinplan.index') }}";
                                 callbackURL(message,url);
                                 
                   /* alert(data.success);*/
                   }
                   else{
                      message = '<span class="alert alert-danger">'+msg+'</span>';
                      $("#error").html(data.errors);
                   } 
                }
               
             }); 
       /* }*/
      });
    </script>

@endsection