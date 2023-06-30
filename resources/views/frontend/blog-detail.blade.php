@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Blog Detail')
@section('extra_css')
    <style>
        .blogs .categories li.active a {
            color: {{ $projectsetting->blog_nav_first_background_and_icon }};
        }
    </style>
@endsection
@section('content')

<div class="blogs">
  <section class="inner-heading" style="background-image: url('{{ asset('storage/blog/'.$projectsetting->blog_list_image )}}');">
    <div class="container">
      <h1>BLOG</h1>
        <ul class="xs-breadcumb">
         <li><a href="{{ url('/blogs')}}" style="color : {{ $projectsetting->blog_nav_first_background_and_icon }}">Blogs / </a>

         {{ $bloglist->title }} </li>
      </ul>
    </div>
  </section>
  <!--inner-heading end-->
  <!--inner content start-->
  <section class="inner-wrap">
    <!--container start-->
    <div class="container">
      <div class="row blog_detail">
        <ul class="blog-grid">
        <div class="col-md-9 col-sm-12">
          <div class="row">
            <ul class="blog-grid">
              <li class="col-md-12 col-sm-12">
                <div class="blog-inter">

                    <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$bloglist->image) }}" alt="portfolio">
                      <div><i  style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                      <!--<a href="blog_detail.html"></a>--> </figure>
                    <div class="post-tittle detail">
                      <h4><a href="">{{ $bloglist->title }}</a></h4>
                    </div>
                     <ul class="blogDate">
                        <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span>{{ $bloglist->name }}</span> </li>
                        <li> <i class="fa fa-th-large" aria-hidden="true" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span><?php $count =1;                                              foreach($bloglist->category_arr as $category){
                                                                if(sizeof($bloglist->category_arr)==$count)
                                                                    echo $category;
                                                                else
                                                                    echo $category.", ";
                                                            $count++;
                                                           }
                                                        ?></span> </li>
                        <li><i class="fa fa-calendar" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span><?php
                    $yrdata= strtotime($bloglist->updated_at);
                     echo date('M d Y', $yrdata);
                     ?></span></li>
                      </ul>
                      <div class="blog-description">
                        <?= $bloglist->description ?>
                      </div> 
                </div>
                </li>
                   @if(!$bloglistsall->isEmpty())
                <li class="col-md-12 col-sm-12">
                 <div class="post-tittle">
                    <h4><a href="#">Related Blog</a></h4>
                  </div>
                </li>
                @foreach ($bloglistsall as $blogall)
                 <li class="col-md-12 col-sm-12">
                  <div class="blog-inter">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <figure class="style-greens-two green">
                         <img src="{{ asset('storage/blog/'.$blogall->image) }}" alt="portfolio" class="img-responsive">
                            <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                                <a href="{{ url('blogs-detail/'.$blogall->blog_url) }}"></a> </figure>
                      </div>
                      <div class="col-md-8 col-sm-8">
                          <div class="post-tittle">
                            <h4><a href="{{ url('blogs-detail/'.$blogall->blog_url) }}"><?php echo mb_substr( strip_tags($blogall->title), 0, 80)  ?></a></h4>
                          </div>
                          <ul class="blogDate">
                            <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span>{{ $blogall->name }}</span> </li>
                            <li> <i class="fa fa-th-large" aria-hidden="true"style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span> 
                                                        
                                                        
                                                        <?php
                                                        
                                                        $count =1;
                                                        
                                                                $category="";
                                                                if(!empty($blogall->category_arr))
                                                                {
                                                                    foreach($blogall->category_arr as $blog_category){
                                                                        if(sizeof($blogall->category_arr)==$count)
                                                                            $category .= $blog_category;
                                                                        else
                                                                            $category .=$blog_category.",";
                                                                        $count++;
                                                                    }

                                                                    echo (strlen($category) > 40)?substr($category, 0,40)."...":$category;
                                                                }
                                                                else{
                                                                    echo "-";
                                                                }
                                                                ?>
                                                        
                                                        
                                                        
                                                        
                                                        </span> </li>
                            <li><i class="fa fa-calendar" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span><?php
                    $yrdata= strtotime($blogall->updated_at);
                     echo date('M d Y', $yrdata);
                     ?></span></li>
                          </ul>
                          <p><?php echo substr(  strip_tags($blogall->description), 0, 1150)   ?>
                          </p>
                      </div>
                    </div>
                  </div>
                </li>
                 @endforeach
                 @endif
              </ul>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
           <div class="side-bar">
              <form action="{{ route('blogs') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="keyword" placeholder="Keywords" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="search" class="blog_search_btn btn-sm btn pull-right" style="background:linear-gradient(90deg, {{ $projectsetting->blog_nav_first_background_and_icon }} 50%, {{ $projectsetting->blog_nav_second_background }}) !important;color:{{ $projectsetting->blog_nav_font_color}} !important">
                </div>
                <div class="clearfix"></div>
              </form>
          </div>
           <div class="side-bar">
            <!-- Categories -->
            <div class="side-barBox">
              <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->blog_nav_first_background_and_icon }} 50%, {{ $projectsetting->blog_nav_second_background }}) !important;color:{{ $projectsetting->blog_nav_font_color}} !important">Categories</h5>
              <ul class="categories">
                 @foreach ($blogcategorylists as $blogcategorylist)
                <li><a  href="{{url('blogssearch/'.$blogcategorylist->category_url)}}">{{ $blogcategorylist->category_name }}</a></li>
          @endforeach
              </ul>
            </div>
          </div>
            @if(!$recentlists->isEmpty())
          <div class="side-bar">
            <div class="side-barBox recent-blog">
              <h5 class="side-barTitle" style="background:linear-gradient(90deg, {{ $projectsetting->blog_nav_first_background_and_icon }} 50%, {{ $projectsetting->blog_nav_second_background }}) !important;color:{{ $projectsetting->blog_nav_font_color}} !important">Recent List</h5>
              <ul class="papimg-post">
                 @foreach($recentlists as $recent)
                  <li>
                    <!--<div class="media-left"> <a href="#"><img src="{{ asset('storage/blog/'.$recent->image) }}" alt="Blog Title"></a> </div>-->
                    <div class="media-body"> <a class="media-heading" href="{{ url('blogs-detail/'.$recent->blog_url) }}"><?php echo mb_substr( $recent->title, 0, 55)  ?></a>  <span>
                    <?php
                    $yrdata= strtotime($recent->updated_at);
                     echo date('M d Y', $yrdata);
                     ?></span> </div>
                  </li>
                   @endforeach

                </ul>
            </div>
          </div>
          @endif
        </div>
        </ul>
      </div>
      <!--row start-->
  </div>
    <!--container end-->
  </section>
  <!--inner content end-->

    @include('element.company_logo_slider')
</div>
 @endsection
