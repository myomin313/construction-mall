@extends('frontend.layouts.homeapp')
@section('title','Myanbox | '.$category_name)
@section('extra_css')
    <style>
.company_services .categories li.active a {
 color: {{ $projectsetting->service_nav_first_background_and_icon }} !important;
}
.suppliers .categories li.active a {
color: {{ $projectsetting->supplier_nav_first_background_and_icon }} !important;
         }
.reno_business .categories li.active a {
color: {{ $projectsetting->reno_nav_first_background_and_icon }} !important;
        }
    </style>
@endsection
@section('content')

    @php
        if ($parent_url == "service"){
            $class ="company_services";
            $background_image = $projectsetting->service_list_image;
            $nav_first_background_and_icon = $projectsetting->service_nav_first_background_and_icon;
            $nav_second_background = $projectsetting->service_nav_second_background;
            $default_id = 1;
            $nav_font_color = $projectsetting->service_nav_font_color;
            $default_logo = $projectsetting->service_default_logo;
        }
        elseif ($parent_url == "supplier"){
            $class = "suppliers";
            $background_image = $projectsetting->supplier_list_image;
            $nav_first_background_and_icon = $projectsetting->supplier_nav_first_background_and_icon;
            $nav_second_background = $projectsetting->supplier_nav_second_background;
            $default_id = 2;
            $nav_font_color = $projectsetting->supplier_nav_font_color;
            $default_logo = $projectsetting->supplier_default_logo;
        }
        elseif ($parent_url == "reno-business"){
            $class = "reno_business";
            $background_image = $projectsetting->reno_list_image;
            $nav_first_background_and_icon = $projectsetting->reno_nav_first_background_and_icon;
            $nav_second_background = $projectsetting->reno_nav_second_background;
            $default_id = 3;
            $nav_font_color = $projectsetting->reno_nav_font_color;
            $default_logo = $projectsetting->reno_default_logo;
        }

    @endphp
    
    <div class="{{$class}}">
        <section class="suplier inner-heading" style="background-image: url('{{ asset('storage/company_coverphoto/'. $background_image)}}');">
            <div class="container">
                <h1>{{ $category_name }}</h1>
                <ul class="xs-breadcumb">
                    <li><a href="{{ url('/')}}" style="color: {{$nav_first_background_and_icon}}">Home /</a>  {{ $category_name }}</li>
                </ul>
            </div>
        </section>
       
        <!--search form start-->
        <div class="quick-quote">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="advanced_search">
                        @php
                            if(isset($request->keyword))
                               $keyword = $request->keyword;
                           else
                               $keyword ="";
                           if(isset($request->category))
                               $category = $request->category;
                           else
                               $category = "";
                           if(isset($request->location_id))
                               $location_id = $request->location_id;
                           else
                               $location_id = "";
                        @endphp
                        <!--Row Start-->
                            <form class="form-inline advanced_search_form" action="{{ route('search') }}">
                                <div class="form-group col-md-4  inner-addon left-addon">
                                    <i class="fa fa-search"></i>
                                    <input type="text" class="form-control" name="keyword" placeholder="Skill,Company,Keyword" value="{{$keyword}}" />
                                </div>
                                {{csrf_field()}}

                                <input type="hidden" name="default_category_id" value="{{$default_id}}">
                                <div class="form-group col-md-3 inner-addon left-addon">
                                    <i class="fa fa-folder-open"></i>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $company_category)
                                            @php
                                                if($category == $company_category->id || $id == $company_category->id)
                                                    $choose = "selected";
                                                else
                                                    $choose = "";
                                            @endphp
                                            <option value="{{ $company_category->id }}" {{$choose}}>{{ $company_category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 inner-addon left-addon ">
                                    <i class="fa fa-map-marker"></i>
                                    <select class="form-control" name="location_id">
                                        <option value="">Select Locations</option>
                                        @foreach($cities as $city)
                                            @php
                                                if($location_id == $city->id)
                                                    $choose = "selected";
                                                else
                                                    $choose = "";
                                            @endphp
                                            <option value="{{ $city->id }}" {{$choose}}>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                    <input type="submit" name="" class="btn btn-sm advanced_search_btn" value="Search"
                                           style="background:linear-gradient(90deg, {{ $nav_first_background_and_icon }} 50%, {{ $nav_second_background }}) !important;color:{{ $nav_font_color}} !important">
                                </div>
                            </form>
                            <!--Row End-->
                        </div>

                    </div>

                </div>
            </div>
        </div>
       
        <!-- search form end -->
        <!--inner content start-->

        <section class="inner-wrap">
            <!--container start-->
            <div class="container">
                <div class="row">
                    <!--row start-->
                    <ul class="blog-grid">

                        <!--col start-->
                        <div class="col-md-9 col-sm-12">
                            @if(!$search_result->isEmpty())
                                @foreach ($search_result as $data)
                                    <li>
                                        <div class="blog-inter">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <figure class="style-greens-two green">
                                                          
                                                        <figure class="style-greens-two green">
                                                            @if(isset($data->user) && $data->user->logo != Null && $data->user->logo !='undefined')
                                                                <img src="{{ asset('storage/company_logo/'.$data->user->logo) }}" alt="portfolio" class="img-responsive">
                                                            @else
                                                                @if(isset($parent_url))
                                                                    <img src="{{ asset('storage/company_logo/'.$default_logo) }}" alt="portfolio" class="img-responsive">
                                                                @else
                                                                    <img  class="img-responsive" src="https://ui-avatars.com/api/?name={{$data->user->name}}" alt="">
                                                                @endif
                                                            @endif
                                                            
                                                            <div><i class="fa fa-plus"></i></div>
                                                            <a href="{{ url($data->company_url) }}"></a> </figure>
                                                </div>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="post-tittle">
                                                        <h4><a href="{{ url($data->company_url) }}">{{ $data->user->name }}</a></h4>
                                                    </div>
                                                    <ul class="blogDate">
                                                        <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $nav_first_background_and_icon }} !important;"></i><span>
                    {{isset($data->parent_categories[0]->name)?$data->parent_categories[0]->name:''}} Company</span>
                        
                    </li>
                                                        <li> <i class="fa fa-envelope" aria-hidden="true" style="color:{{ $nav_first_background_and_icon }} !important;"></i> <span><a href="mailto:{{ empty($data->email)? $data->user->email:$data->email }}" style="color:#acacac">{{ empty($data->email)? $data->user->email:$data->email }}</a></span> </li>
                                        @if(!empty($data->phone))                
                                                        <li> <i class="fa fa-phone" aria-hidden="true" style="color:{{ $nav_first_background_and_icon }} !important;"></i> <span>
                                                                <a href="tel:{{ empty($data->phone)?$data->user->phone:$data->phone }}" style="color:#acacac">{{ empty($data->phone)?$data->user->phone:$data->phone }}</a></span> </li>
                                        @endif                        
                                                                
                                                    </ul>
                                                    <ul class="blogDate">
                                                        <li> <i class="fa fa-home" aria-hidden="true" style="color:{{ $nav_first_background_and_icon }} !important;"></i><span> <?php
                                                                echo isset($data->parent_categories)?$data->parent_categories[0]->name.",":'';
                                                                $count =1; $category="";
                                                                if(!empty($data->child_categories))
                                                                {
                                                                    foreach($data->child_categories as $child_category){
                                                                        if(sizeof($data->child_categories)==$count)
                                                                            $category .= $child_category->name;
                                                                        else
                                                                            $category .=$child_category->name.",";
                                                                        $count++;
                                                                    }

                                                                    echo (strlen($category) > 60)?substr($category, 0,60)."...":$category;
                                                                }
                                                                else{
                                                                    echo "-";
                                                                }
                                                                ?>
                                                                
                                                                 </span> </li>
                                                    </ul>
                        @if(!empty($data->address)|| !empty($data->location))
                                                    <ul class="blogDate">
                                                        
                                                        <li><i class="fa fa-map-marker" style="color:{{ $nav_first_background_and_icon }} !important;"></i> <span>
                                        @if(!empty($data->address)) 
                                        
                                        {{(strlen($data->address)>40)?substr($data->address,0,40).'...':$data->address}}
                                        @endif
                                        @if(!empty($data->location))
                                            {{isset($data->location)?$data->location->name:""}},
                                        @endif
                                        @if(!empty($data->location->parent->name))
                                            {{isset($data->location->parent->name)?$data->location->parent->name:''}}
                                        @endif        
                                            </span></li>
                                                               
                                                    </ul>
                         @endif
                         @if(!empty($data->description)) 
                                                    <p>
                                                       {{(strlen($data->description)>250)?substr($data->description,0,250).'...':''}}
                                                        
                                                       
                                                    </p
                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                
                                @endforeach
                            @else
                             
                                <li>
                                    <div class="blog-inter">
                                    @include('element.404')
                                    </div>
                                </li>
                            @endif
                            <li>
                                <div class="pagination-area">
                                    <ul class="pagination">
                                        {{ $search_result->appends(Request::all())->links() }}


                                    </ul>
                                </div>
                                <!--row end-->
                            </li>
                        </div>
                        <li class="col-md-3 col-sm-12">
                            <div class="side-bar">
                                <!-- Categories -->
                                <div class="side-barBox">
                                    <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $nav_first_background_and_icon }} 50%, {{ $nav_second_background }}) !important;color:{{ $nav_font_color}} !important">Categories</h5>
                                    <ul class="categories">
                                        @foreach($categories as $company_category)
                                        
                                            <li class="{{ $company_category->name == $category_name ? 'active' : '' }}"><a  href="{{ url('companies/'.$parent_url.'/'.$company_category->category_url) }}">{{ $company_category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @foreach($advertisings as $advertising)
                                <div class="side-bar">
                                    <div class="advertise">
                                        <!--<center>-->
                                        <a href="{{  $advertising->link }}"><img src="{{ asset('storage/advertising/'.$advertising->photo) }}" alt="{{ $advertising->company_name }}" style="height:100%;width:100%"></a>
                                        <!--</center>-->
                                    </div>
                                </div>
                            @endforeach

                        </li>
                    </ul>
                </div>
            </div>
            <!--container end-->
        </section>
        <!--inner content end-->


        <!--brand-section start-->
    @include('element.company_logo_slider')

    <!--brand-section end-->
    </div>
@endsection
