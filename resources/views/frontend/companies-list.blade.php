@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Company List')
@section('content')
<link href="{{ asset('css/company_style.css') }}" rel="stylesheet">
<section class="inner-heading">
  <div class="container">

    <h1>Search Result</h1>
    <ul class="xs-breadcumb">
      <li><a href="index.html"> Home /</a>Search List</li>
    </ul>
  </div>

</section>
<!--   <div class="row"> -->

  <div class="quick-quotesearchbarreno">
    <div class="container">
      <!--Row Start-->
      <form action="#" method="post">
        <div class="row">
          <div class="col-md-3">
            <input type="text" class="form-control" name="Keyword" placeholder="Company Name">
          </div>
           {{csrf_field()}}
           <input type="hidden" name="default_category_id" value="3">
          <div class="col-md-3">
            <select class="form-control" name="category_id">
              <option value="">Select Category</option>
               @foreach($renobusinessCategories as $renobusinessCategory)
            <option value="{{ $renobusinessCategory->id }}">{{ $renobusinessCategory->name }}</option>
             @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" name="location_id">
              <option value="">Select Locations</option>
              @foreach($cities as $city)
              <option value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
           <input type="submit" name="" value="Search" class="btn btn-default btn-block"></div>
         </div>
       </form></div>

       <!--Row End-->
     </div>
     <!--  </div> -->

     <!--inner-heading end-->


     <!--inner content start-->

     <section class="inner-wrap reno_company">
      <!--container start-->
      <div class="container">
        <div class="row"> </div>
        <!--row start-->
        <ul class="blog-grid">
          <!--col start-->
          <div class="col-md-8 col-sm-12">
            @foreach ($search_result as $data)
            <li>
              <div class="blog-inter">
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <figure class="style-greens-two green"> <img src="{{ asset('storage/company_logo/'.$data->user->logo) }}" >
                      <div><i class="fa fa-plus"></i></div>
                      <a href="companylist.html"></a> </figure>
                    </div>
                    <div class="col-md-8 col-sm-8">
                      <div class="list-tittle">
                        <h4><a href="#">{{ $data->name }}</a></h4>
                      </div>
                      <ul class="contextpadding">
                        <li> <i class="fa fa-user" aria-hidden="true"></i><span  class="titlesze">{{$data->user->name}}</span>
                         <i class="fa fa-envelope" aria-hidden="true"></i><span>{{ $data->email }}</span><i class="fa fa-phone" aria-hidden="true"></i> <span>{{ $data->phone }}</span>
                       </li>
                       <li><i class="fa fa-building" aria-hidden="true"> </i><span>
                         <?php $count =1; $category="";
                                           if(!empty($data->child_categories))
                                           {
                                             foreach($data->child_categories as $child_category){
                                                  if(sizeof($data->child_categories)==$count)
                                                      $category .= $child_category->name;
                                                  else
                                                      $category .=$child_category->name.",";
                                              $count++;
                                             }

                                             echo (strlen($category) > 45)?substr($category, 0,45)."...":$category;
                                          }
                                          else{
                                            echo "-";
                                          }
                                          ?>
                       </span></li>
         <!--    <li> <i class="fa fa-calendar" aria-hidden="true"></i> <span>codex@gmail.com</span> </li>
          <li> <i class="fa fa-comments" aria-hidden="true"></i> <span>09999999</span> </li> -->
        </ul>
        <p >{{ $data->description }}
        </p>
        <!-- <p><i class="fa fa-calendar" aria-hidden="true"> </i>Developers, Constructions,Flooring</p> -->

      </div>
    </div>
  </div>
</li>
@endforeach



<!-- Pagination Start -->

<div class="pagination-area">

</div>
<!-- Pagination END -->

</div>
<li class="col-md-4 col-sm-12">
 <div class="row">

  <div class="renovertical-menu">
    <a href="#" class="active" style="padding:10px;">Categories</a>
    @foreach($relatedcategories as $relatedcategories)
       <a  href="{{ url('renobusiness-companies/'.$renobusinesscategory->id ) }}">{{ $renobusinesscategory->name }}</a>
    @endforeach
  </div>

</div>

<div class="row">
  <div class="side-bar">
    <!-- Recent List -->
    <div class="side-barBox">
      <!--  <h5 class="side-barTitle">Advertising</h5>  -->
      <ul class="papimg-post">


                <!-- <li>
                  <div class="media-left"> <a href="#"><img src="images/blog.jpg" alt="Blog Title"></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </li>
    </ul>
    <!--row end-->

  </div>
  <!--container end-->

</section>

<!--inner content end-->




<!--brand-section start-->
@include('frontend.element.company_logo_slider')

<!--brand-sectionn end-->
@endsection
