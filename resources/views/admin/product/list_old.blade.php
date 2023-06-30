@extends('layouts.company_panel')
@section('content')
<!-- Static Table Start -->
<div class="data-table-area  mg-t-10">
    <div class="container-fluid">
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Product List</h3>
                    </div>
                     <!--<div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('product.index') }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            ProductList
                          </a>
                    </div>-->   
                  </div>
                </h4>
              </div>
<div class="card-body table-responsive">
    @if(Session::has('success')) 
                                        <script type = "text/javascript">  
                             var message = "{{Session::get('success')}}"; 
                                 callbackSuccess(message);
</script>
                                    @endif
    @php 
                                     if(isset($name))
                          $name = $name;
                      else
                          $name ="";
                     
                @endphp
                
                                     <!--start-->
                                    <form class="form-inline" action="{{route('product.index')}}" method="post">
                                          {{csrf_field()}}
                                       <div class="form-group">
                                          <label class="sr-only">Product Name</label>
                                          <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Product Name">
                                       </div>
                                      <button type="submit" class="btn btn-success">Search</button>
                                      <a  class="btn btn-reset" href="{{route('product.index')}}">Reset</a>
                                    </form>
                                    <!--end-->
    <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                     <div class="row" style="padding:10px">
                                    <div class="col-md-12">
                                       <a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a>  
                                       <a  type="button" href="{{route('product.create')}}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                                    </div>
                                   </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="false" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state"><input type="checkbox" name="category_id" id="checkall"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="codeno">Code No</th>
                                                <th data-field="name" data-editable="true"> Product Name</th>
                                                <th data-field="price" data-editable="true"> Price</th>
                                                <th data-field="size" data-editable="true"> Size</th>
                                                <th data-field="size" data-editable="true"> Stock Status</th>
                                                <th data-field="image" data-editable="true">Image</th>
                                               <!-- <th data-field="action">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($company_products as $company_product):
                                            <tr>
                                                <td><input class="checkbox" name="company_productid" type="checkbox" data-id="{{ $company_product->id }}" value="{{ $company_product->id }}"/></td>
                                 
                                                <td>{{ ($company_products->currentPage()-1) * $company_products->perPage() + $loop->index + 1 }}</td>
                                                <td><?= $company_product->code ?></td>
                                                    <td>
                                                        @php
                                                        $id = $company_product->id;
                                                        $id = \Crypt::encrypt($id);
                                                        $page = $company_products->currentPage();
                                                        $page =\Crypt::encrypt($page);
                                                         @endphp
                                                    <a class="show-modal" data-id="{{$company_product->id}}" data-code="{{$company_product->code}}" 
                                                data-product_name="{{$company_product->product_name}}"
                                                data-price="{{$company_product->price}}"
                                                data-size="{{$company_product->size}}"
                                                data-current_stock="{{$company_product->current_stock}}"
                                                data-photo="{{ $company_product->photo }}"
                                                data-product_description = "{{$company_product->product_description}}"
                                                data-created_at="{{$company_product->created_at}}" data-updated_at="{{$company_product->updated_at}}"
                                                data-url="{{ url('product/'.$id.'/'.$page.'/edit') }}"
                                                >              <?= $company_product->product_name ?></a></td>
                                                <td><?= $company_product->price ?></td>
                                                <td><?= $company_product->size ?></td>
                                                <td><?= $company_product->current_stock ?></td>
                                                <td>
                                                    @if($company_product->photo != null && $company_product->photo !='undefined')
                                                    <img src="{{asset('storage/product/'.$company_product->photo)}}" class="img img-thumbnail" style="width:100px;height:100px;">
                                                    @endif
                                                </td>
                                                <!--<td>
                                              
                                                     <a href="{{route('product.destroy',$company_product->id)}}" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </a>
                                                </td>-->
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
                                        {{ $company_products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="showModal">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                   <center><h4 class="modal-title"></h4></center>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-10">
                         <table class="table table-hover no-border">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <center id="photo">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                         <div id="product_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>
                                         <div id="price">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <td>
                                         <div id="code">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>
                                         <div id="size">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Current Stock</td>
                                    <td>
                                         <div id="current_stock">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                         <div id="product_description">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>
                                         <div id="created_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Updated Date</td>
                                    <td>
                                         <div id="updated_at">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> 
                                      <a type="button" id="company_product-edit" href="" class="btn btn-success editeducationBtn">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                           </table>   
                       </div>
                   </div>
                  </div>
                </div>
      </div>
<!--image upload-modal end--> 
        <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script  type="text/javascript">
        
           var page ='<?php echo $company_products->currentPage() ?>';
          /*$(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
            $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{route('product.create')}}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
            $('.fixed-table-toolbar').append('<div style="float:left;width:50%;height:100%;"><a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a></div>');
         
          });*/
     </script>
        <script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.show-modal', function() {   
                    $('.modal-title').text('Product Detail');
                    $('#product_name').html($(this).data('product_name'));
                     var APP_URL = '<?php echo url('/'); ?>';
                    if($(this).data('photo') !== ''){
                      var img='<img src="'+APP_URL+'/storage/product/'+$(this).data('photo')+'" style="width:50px;height:50px">';
                      $('#photo').html(img);
                    }else{
                      $('#photo').html('');
                    }
                    $('#code').html($(this).data('code'));
                    $('#product_description').html($(this).data('product_description'));
                    $('#price').html($(this).data('price'));
                    $('#size').html($(this).data('size'));
                    $('#current_stock').html($(this).data('current_stock'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $("#company_product-edit").attr('href',$(this).data('url') );
                    $('#showModal').modal('show');
                });
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
                 /*alert('hi');*/
            var company_productids = [];
                  $("input:checkbox[name=company_productid]:checked").each(function(){
                      company_productids.push($(this).val());
                       });
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('product.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_productids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                              /*  alert(data.success);
                                location.reload();*/
                                 var message = data.success;
                                var url = window.location.href;
                                 callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        }     
               });
         });
         </script>
@endsection