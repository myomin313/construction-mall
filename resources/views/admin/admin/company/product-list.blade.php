@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    @include('admin.element.breadcrumb')
                    <div class="card">
                        @include('admin.element.success-message')
                      <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                          <div class="row">
                             <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <h3 class="panel-title">{{ $company->user->name }} Company Products</h3>
                            </div>
                             <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                               @php
                                $id =  \Crypt::encrypt($id);
                                 if(isset($name))
                                    $name = $name;
                                else
                                    $name ="";
                                @endphp
                                <a href="{{ url('admin/product/create/'.$id)}}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
                                    Add New
                                </a>
                            </div>   
                          </div>
                        </h4>
                      </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                       <a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a> 
                    </div>
                    <div class="col-md-offset-3 col-lg-offset-3 col-md-5 col-lg-5 col-sm-8 col-xs-8">
                       <form class="form-inline" action="{{ url('admin/company-product/'.$id) }}" method="post">
                            {{csrf_field()}}
                         <div class="form-group">
                            <label>Search By:</label>
                            <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Product name">
                         </div>
                         <div class="form-group pull-right">
                          <button type="submit" class="btn btn-success">Search</button>
                          <a  class="btn btn-reset" href="{{ url('admin/company-product/'.$id) }}">Reset</a>
                        </div>
                      </form>
                      <!--end-->
                     </div>
                    </div>
                    
                                  <table id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th data-field="state"><input type="checkbox" name="category_id" id="checkall"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="codeno">Code No</th>
                                                <th data-field="name" data-editable="true"> Product Name</th>
                                                <th data-field="price" data-editable="true"> Price</th>
                                                <th data-field="size" data-editable="true"> Size</th>
                                                <th data-field="current_stock" data-editable="true">Stock Status</th>
                                                <th data-field="image" data-editable="true">Image</th>
                                               <!-- <th data-field="action">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $id =  \Crypt::encrypt($id);
                                            @endphp
                                            @php $count=1; @endphp
                                            @foreach($company_products as $company_product)
                                            <tr>
                                                <td><input class="checkbox" name="productid" type="checkbox" data-id="{{ $company_product->id }}" value="{{ $company_product->id }}"/></td>
                                
                                               <!-- <td><?= $count; ?></td>-->
                                               
                                                <td>{{ ($company_products->currentPage()-1) * $company_products->perPage() + $loop->index + 1 }}</td>
                                                
                                                <td><?= $company_product->code ?></td>
                                                <td>
                                                    @php
                                                    $product_id = \Crypt::encrypt($company_product->id);
                                                     $page = $company_products->currentPage();
                                                   
                                                    
                                                @endphp
                                                    <a class="show-modal" data-id="{{$company_product->id}}" data-code="{{$company_product->code}}" 
                                                data-product_name="{{$company_product->product_name}}"
                                                data-price="{{$company_product->price}}"
                                                data-size="{{$company_product->size}}"
                                                data-current_stock="{{$company_product->current_stock}}"
                                                data-photo="{{ $company_product->photo }}"
                                                data-product_description = "{{$company_product->product_description}}"
                                                data-created_at="{{$company_product->created_at}}" data-updated_at="{{$company_product->updated_at}}" data-url="{{ url('admin/product/edit/'.$product_id.'/'.$page) }}"
                                                >                                              <?= $company_product->product_name ?>
                                                </a>
                                                    
                                                    </td>
                                                <td><?= $company_product->price ?></td>
                                                <td><?= $company_product->size ?></td>
                                                <td><?= $company_product->current_stock ?></td>
                                                <td>
                                                @if($company_product->photo != null && $company_product->photo !='undefined')
                                                 <img src="{{asset('storage/product/'.$company_product->photo)}}" class="img img-thumbnail" style="width:100px;height:100px;">
                                                @endif
                                                </td>
                                                <!--<td>
                                                    
                                                    <a href="{{ route('admin.product.destroy',['id'=>$company_product->id,'company_id'=>$company_product->company_id]) }}" class="btn btn-sm btn-danger" 
                                                     >
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
        
        
          <!--<script  type="text/javascript">
          $(document).ready(function (){
            $('.search input').css({"width": "50%", "height": "100%","float":"right"});
            $('.search').append('<div style="float:left;width:50%;height:100%;text-align:center"><a  type="button" href="{{ url('/admin/product/create/'.$id) }}"  class="btn btn-success editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a></div>');  
          
            $('.fixed-table-toolbar').append('<div style="float:left;width:50%;height:100%;"><a  type="button" class="btn btn-danger deleteitemall"> <i class="fa fa-trash" aria-hidden="true"></i> Delete All</a></div>');
         
          });
     </script>-->
      
        <script type="text/javascript">
           /* Show Event  */
            $(document).on('click', '.show-modal', function() { 
                var page="<?php echo $company_products->currentPage(); ?>";
                    $('.modal-title').text('Product Detail');
                    $('#product_name').html($(this).data('product_name'));
                     var APP_URL = '<?php echo url('/'); ?>';
                    if($(this).data('photo') !== ''){
                      var img='<img src="'+APP_URL+'/storage/product/'+$(this).data('photo')+'" style="width:50px;height:50px">';
                      $('#photo').html(img);
                    }else{
                      $('#photo').html('');
                    }
                    // var image= $(this).data('photo');
                    // $('#photo').attr('src',image);
                    // $('#photo').attr('width','100px');
                    $('#code').html($(this).data('code'));
                    $('#product_description').html($(this).data('product_description'));
                    $('#price').html($(this).data('price'));
                    $('#size').html($(this).data('size'));
                    $('#current_stock').html($(this).data('current_stock'));
                    $('#created_at').html($(this).data('created_at'));
                    $('#updated_at').html($(this).data('updated_at'));
                    $("#company_product-edit").attr('href',$(this).data('url') );
                    /*$("#company_product-edit").attr('href', '{{ url('admin/product/edit/') }}'+'/'+$(this).data('id')+'/'+page);*/
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
            //                 url: "{{ URL::route('service.store-checkbox') }}",
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
             //start
             $("document").ready(function(){
               setTimeout(function(){
                    $(".alert-success").remove();
               }, 3000 );
                 });
             //end
             $('.deleteitemall').on('click',function(){
                 /*alert('hi');*/
            var productids = [];
                  $("input:checkbox[name=productid]:checked").each(function(){
                      productids.push($(this).val());
                       });
                       if (productids.length == 0) {
                            alert("please checked at least one product that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?'); 
                        if(conf == true){
                            $.ajax({ 
                            url: "{{ URL::route('product.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : productids},
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