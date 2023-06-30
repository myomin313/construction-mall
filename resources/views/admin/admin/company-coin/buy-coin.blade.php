@extends('layouts.admin_panel')
@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h3 class="panel-title">Buy Coin Plan</h3>
        </div> 
        <div class="card-body">
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
              @foreach($coinplan_lists as $coinplan_list)
              <tr>
                  <td>{{$count}}</td>
               
                  <td><?= $coinplan_list->coin_count ?></td>
                  <td>
                   <?= $coinplan_list->price  ?>  
              </td>
              <td> <center>
                     <a class="btn_buy btn btn-success btn-sm" data-id="{{$coinplan_list->id}}" 
                     data-user-id="{{ $user_id }}" 
                     data-url="{{ $url }}" data-coin_count="{{ $coinplan_list->coin_count}}">Buy
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
   
     
      $(document).on('click', '.btn_buy', function() {
        var ans =confirm('Are you sure want to buy?')
        if(ans)
        {   
             var id= $(this).data('id');
             var user_id= $(this).data('user-id');
             var url=$(this).data('url');
             var coin_count=$(this).data('coin_count');
        $.ajax({
               type: "post",
               url: "{{ URL::route('admin.coinplan.buycoin') }}",
               data: {'id':id,'user_id':user_id,'url':url,'coin_count':coin_count},
               dataType: 'json',
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success:function(data)
               {
                   if($.isEmptyObject(data.errors)){
                       
                         var message = "You successfully bought coins!";
                                var url = data.url;
                                 callbackURL(message,url);
                                 
                          /* alert('You successfully bought coins');
                           window.location=data.url;*/
                           
                   }
                   else{
                        /* var message = data.errors;
                         callbackFailure(message) ;*/
                     message = '<span class="alert alert-danger">'+msg+'</span>';
                      $("#error").html(data.errors);
                   } 
                }
               
             }); 
        }
      });
    </script>

@endsection