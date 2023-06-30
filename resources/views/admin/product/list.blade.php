@extends('layouts.company_new_panel')
@section('content')
<body class="suppliers">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
@include('element.header')
  <!--main-header end--> 
   <!--<section class="inner-heading">-->
       <!--<section class="inner-wrap service_detail"> -->
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
      <h1>Product List</h1>
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
            <div class="blog-inter">
             <div class="row">
              <div class="col-md-12">
                   @include('admin.element.success-message')
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
              <form class="form-inline" action="{{route('product.index')}}" method="post">
                      {{csrf_field()}}
                    <div class="form-group col-md-8 col-xs-12 padding5">
                      <label class="sr-only">Product Name</label>
                        <input value="{{$name}}" type="text" class="form-control w_100" name="name" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group col-md-2 col-xs-6 padding5">
                      <button type="submit" class="btn btn-standard w_100"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>  
                    <div class="form-group col-md-2 col-xs-6 padding5">
                       <a class="btn btn-standard w_100" href="{{ route('product.index') }}"><i class="fa fa-refresh" aria-hidden="true"></i>Reset</a>
                    </div>   
              </form>
            </div>
            </div>
            </div>
          </li>
           <li>
            <div class="row our_service">
              <div class="col-md-8 col-sm-8 col-xs-4">
                 <div class="post-tittle">
                      <h4><a href="#">Our Products</a></h4>                     
                  </div>
              </div>
              <div class="col-md-4 col-sm-8 col-xs-8 ">
                <!-- <a type="button" href="{{ route('product.create') }}" class="btn pull-right btn-standard editeducationBtn "><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>-->
                <!--<a type="button" class="btn pull-right btn-standard deleteitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>  -->
                
                <!--start-->
                  <a type="button" href="{{ route('product.create') }}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                <a type="button" class="pull-right  deleteitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a> 
                <!--end-->
               
              </div>
            </div>
          </li>
          <li>
              @if(count($company_products) > 0 )
            <div class="row our_services">
               @php $count=1; @endphp
              @foreach($company_products as $company_product)
              <div class="col-md-4 col-sm-6">
                <div class="service_list">
                                                   @php
                                                        $id = $company_product->id;
                                                        $id = \Crypt::encrypt($id);
                                                        $page = $company_products->currentPage();
                                                        $page =\Crypt::encrypt($page);
                                                         @endphp
                    @if($company_product->photo != null && $company_product->photo !='undefined')
                    <a class="show-modal" data-id="{{$company_product->id}}" data-code="{{$company_product->code}}" 
                                                data-product_name="{{$company_product->product_name}}"
                                                data-price="{{$company_product->price}}"
                                                data-size="{{$company_product->size}}"
                                                data-current_stock="{{$company_product->current_stock}}"
                                                data-photo="{{ $company_product->photo }}"
                                                data-product_description = "{{$company_product->product_description}}"
                                                data-created_at="{{$company_product->created_at}}" data-updated_at="{{$company_product->updated_at}}"
                                                data-url="{{ url('product/'.$id.'/'.$page.'/edit') }}"
                                                >
                  <img src="{{ asset('storage/product/'.$company_product->photo) }}" alt="portfolio" class="img-responsive"></a>
                   @endif
                  <h5><input name="company_productid" type="checkbox" data-id="{{ $company_product->id }}" value="{{ $company_product->id }}"><?php echo $company_product->product_name ?></h5>
                </div>
              </div>
              @php $count +=1 @endphp
              @endforeach
             
             
            </div>
             <div class="pagination-area">
              <ul class="pagination">
                {{ $company_products->links() }}
              </ul>
            </div>
             @else
              <div class="blog-inter" style="min-height:300px">
                  there is no data
              </div>
              @endif
          </li>
          
      </div>
      </ul> 

      </div>    
    </div>      
    <!--container end--> 
  </section>

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
                                      <a type="button" id="company_product-edit" href="" class="btn btn-standard editeducationBtn">Edit</a>
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
<!--whychoose-wrap end-->
<!--brand-section start-->
@include('element.company_logo_slider')
<!--brand-section end--> 
<!--login-modal end--> 
 <!-- Static Table End -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script  type="text/javascript">        
           var page ='<?php echo $company_products->currentPage() ?>';
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
         });
           });
         </script>
         <script type="text/javascript">
         $(document).ready(function () {
             $('.deleteitemall').on('click',function(){
            var company_productids = [];
                  $("input:checkbox[name=company_productid]:checked").each(function(){
                      company_productids.push($(this).val());
                       });
                     var conf = confirm('Are you sure want to delete?');
                        if(conf == true){
                            $.ajax({ 
                          url: "{{ route('company.product.deleteall') }}",
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
 <!--inner content end--> 
 @endsection