@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
<div class="data-table-are">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body search_form">
                               
                                @php 
                                     if(isset($name))
                          $name = $name;
                          else
                          $name ="";
                     
                           @endphp
                                     <!--start-->
                                         <form class="form-inline" action="{{ route('dailyproductprice.index') }}" method="post">
                                          {{csrf_field()}}
                                           <div class="form-group col-md-10 col-sm-6 col-xs-12">
                                              <label>Product Name</label>
                                              <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Product Name">
                                           </div>
                                           <div class="col-md-2 col-sm-6 col-xs-12 pt-2em">
                                               <button type="submit" class="btn btn-success">Search</button>
                                               <a  class="btn btn-reset" href="{{ route('dailyproductprice.index') }}">Reset</a>
                                           </div>
                                          
                                        </form>
                                    <!--end-->
                             </div>
                           </div>
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Daily Product Price List</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
                        <a  type="button" href="{{ route('dailyproductprice.create') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                     </div>
                  </div>
                </h4>
              </div>
<div class="card-body table-responsive">
    <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                   
                                    
                        @include('admin.element.success-message')
                            
                             
                                    
                                            
                                    <div class="row" style="padding:10px">
                                    <div class="col-md-12">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a>  
                                 </div>
                                    </div>
                                   </div>

                                                    
                                    <table id="table">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="category_id" id="checkall"></th>
                                                <th>No</th>
                                                <th> Product Name</th>
                                                <th> Price</th>
                                                <th> Currency</th>
                                                <th> Created At</th>
                                                <th> Updated At</th>
                                               <!-- <th data-field="action">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($products as $product)
                                            <tr>
                                                <td><input class="checkbox" name="productid" type="checkbox" data-id="{{ $product->id }}" value="{{ $product->id }}"/></td>
                                                
                                                 <td>{{ ($products->currentPage()-1) * $products->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    @php
                                                    $id = $product->id;
                                                    $id = \Crypt::encrypt($id);
                                                    $pageno = $products->currentPage();
                                                    $pageno =\Crypt::encrypt($pageno);
                                                @endphp
                                                    <a href="{{ url('dailyproductprice/edit/'.$id.'/'.$pageno)}}" >
                                                    <?= $product->product_name ?></a></td>
                                                <td><?= $product->price ?></td>
                                                <td><?= $product->currency ?></td>
                                                <td><?= $product->created_at ?></td>
                                                <td><?= $product->updated_at ?></td>
                                                <!--<td>
                                                    <center>
                                                     <a class="btn btn-xs btn-danger" href="{{ route('dailyproductprice.destroy',$product->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                </center>
                                                </td>-->
                                            </tr>
                                            @php $count++; @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                    {{ $products->appends($data)->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script  type="text/javascript">
           var page ='<?php echo $products->currentPage() ?>';
         /* $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
             $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ route('dailyproductprice.create') }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
          
             $('.fixed-table-toolbar').append('<div style="float:left;width:50%;height:100%;"><a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a></div>');
         
          });*/
     </script>
     <script type="text/javascript">
           $(document).ready(function () {
        $('#table #checkall').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $("#table .checkbox").prop('checked', true);  
         } else {  
            $("#table .checkbox").prop('checked',false);  
         }  
        });

         $('#table .checkbox').on('click',function(){
            if($('#table .checkbox:checked').length == $('.checkbox').length){
                $('#table #checkall').prop('checked',true);
                
            }else{
                $('#table #checkall').prop('checked',false);
            }
            //  if($(this).prop("checked") == true){
                 
            //       var ids = $("input:checkbox:checked").map(function(){
            //                     return $(this).data('id');
            //                      }).get();
            //                      alert(ids);
            //                 $.ajax({ 
            //                 url: "{{ URL::route('myanboxtube.store-checkbox') }}",
            //                 type: 'POST',
            //                 data: {'ids' : ids},
            //                 dataType: 'json',
            //                 headers: {
            //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                 },
            //                 success: function(data){ 
            //                 },
            //                 error:function(e)
            //                 {
            //                     console.log(e);
            //                 }
            //                 });
               
            // }
            // else if($(this).prop("checked") == false){
            //     alert('false');
            // }
         });
           });
         </script>
         <script type="text/javascript">
         $(document).ready(function () {
             $('.deleteitemall').on('click',function(){
                 
            var dailyproductpriceids = [];
                  $("input:checkbox[name=productid]:checked").each(function(){
                      dailyproductpriceids.push($(this).val());
                       });
                       if (dailyproductpriceids.length == 0) {
                            alert("please checked at least one daily product price that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('dailyproductprice.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : dailyproductpriceids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                 /* alert(data.success);
                                location.reload();*/
                                 //var message = data.success;
                                var url = window.location.href;
                                window.location=url;
                                // callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        }
                      }
               });
         });
         </script>
       
@endsection