@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Blog')
@section('extra_css')
    <style>
        .blogs .categories li.active a {
            color: {{ $projectsetting->blog_nav_first_background_and_icon }};
        }
    </style>
@endsection
@section('content')
<div class="blogs">
   <section class="suplier inner-heading" style="background-image: url('{{ asset('storage/blog/'.$projectsetting->blog_list_image )}}');">
    <div class="container">
    <h1>Blogs</h1>
      <ul class="xs-breadcumb">
         <li><a href="{{ url('/')}}" style="color : {{ $projectsetting->blog_nav_first_background_and_icon }}"> Home / </a>  Blogs </li>
      </ul>
    </div>
  </section>
<!--inner content start-->
  <section class="inner-wrap blogs">
    <!--container start-->
    <div class="container">
      <div class="row blog_list">
        <ul class="blog-grid">
          <li class="col-md-9 col-sm-9">
            <div class="row">
              <!-- start -->
              <ul class="blog-grid">
                 @php $count=1;$status=1; @endphp
                @if(!$blogstopfive->isEmpty())
                     @foreach ($blogstopfive as $blogfive)
                     @if($count ==1)
                      <li class="col-md-8 col-sm-8">
                         <div class="blog-inter">
                          <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$blogfive->image) }}" alt="portfolio">
                            <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                            <a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"></a> </figure>
                          <div class="post-tittle">
                            <h4><a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"><?php echo substr( $blogfive->title, 0, 10)  ?></a></h4>
                          </div>
                           <ul class="blogDate">
                              <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting-> blog_nav_first_background_and_icon }} !important;"></i><span> {{ $blogfive->name }}</span> </li>
                              <li> <i class="fa fa-th-large" aria-hidden="true"style="color:{{ $projectsetting->  blog_nav_first_background_and_icon }} !important;"></i><span> {{ $blogfive->category_name }}</span> </li>
                            </ul>
                      </div>
                      </li>
                     @else
                        @break;
                  @endif
                 @php $count++; @endphp
                @endforeach
                <li class="col-md-4 col-sm-4">
                  <div class="row">
                    <ul class="blog-grid">
                       @php $count=1;$status=1; @endphp
                        @foreach ($blogstopfive as $blogfive)
                           @if($count == 1)
                              @php $count++ @endphp
                              @continue;
                           @elseif($count ==2 || $count == 3)
                            <li class="col-md-12 col-sm-12">
                                 <div class="blog-inter">
                                  <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$blogfive->image) }}" alt="portfolio">
                                    <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                                    <a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"></a> </figure>
                                  <div class="post-tittle">
                                    <h4><a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"><?php echo substr( $blogfive->title, 0, 10)  ?></a></h4>
                                  </div>
                                </div>
                            </li>
                            @else
                              @break;
                            @endif
                       @php $count++; @endphp
                      @endforeach
                    </ul>
                  </div>
                </li>
                @endif
              </ul>
              <!-- end -->
            </div>
        </li>
        @php $count=1; @endphp
            @foreach ($blogstopfive as $blogfive)
                @if($count <3)
                    @php $count++ @endphp
                    @continue
                @elseif($count ==4 || $count == 5)
                  <li class="col-md-3 col-sm-3">
                    <div class="blog-inter">
                      <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$blogfive->image) }}" alt="portfolio">
                        <div><i class="fa fa-plus" style="color:{{ $projectsetting->  blog_nav_first_background_and_icon }} !important;"></i></div>
                        <a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"></a> </figure>
                      <div class="post-tittle">
                        <h4><a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"><?php echo substr( $blogfive->title, 0, 10)  ?></a></h4>
                      </div>
                    </div>
                  </li>
                  @elseif($count >5)
                    @break
                  @endif
                    @php $count++; @endphp
                @endforeach

       </ul>
      </div>
      <div class="row blog_lists">
        <ul class="blog-grid">
        <div class="col-md-9 col-sm-12">
          <div class="row">
            @php $count=1;$status=1; @endphp
            @if(!$bloglistall->isEmpty())
              @foreach ($bloglistall as $bloglist)
                  <li class="col-md-4 col-sm-6">
                   <div class="blog-inter">
                          <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$bloglist->image) }}" alt="portfolio">
                            <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                            <a href="{{ url('blogs-detail/'.$bloglist->blog_url) }}"></a> </figure>
                          <div class="post-tittle">
                            <h4><a href="{{ url('blogs-detail/'.$bloglist->blog_url) }}"><?php echo substr( $bloglist->title, 0, 10)  ?></a></h4>
                          </div>
                           <ul class="blogDate">
                              <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span>{{ $bloglist->name }}</span> </li><br>
                              <li> <i class="fa fa-th-large" aria-hidden="true"style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span>{{ $bloglist->category_name }}</span> </li><br>
                              <li>
                                <p><?php echo substr( strip_tags($bloglist->description), 0, 200)  ?></p>
                              </li>
                              <li class=" pull-right">
                              <a href="{{ url('blogs-detail/'.$bloglist->blog_url) }}" class="btn btn-xs more_btn"  style="background:linear-gradient(90deg, {{ $projectsetting->blog_nav_first_background_and_icon }} 50%, {{ $projectsetting->blog_nav_second_background }}) !important;color:{{ $projectsetting->blog_nav_font_color}} !important">More Info</a>
                             </li>
                              <div class="clearfix"></div>
                            </ul>
                            </p>
                      </div>
                </li>
            @endforeach
                @endif

        </div>
          <li>
             <div class="pagination-area">
                <ul class="pagination">
                    {{ $bloglistall->links() }}
                </ul>
              </div>
          <!--row end-->
          </li>
        </div>
        <div class="col-md-3 col-sm-12">
           <div class="side-bar">
              <form action="{{ route('blogs') }}" method="POST">
                   {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="keyword" placeholder="keyword" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="search" class="blog_search_btn btn-sm btn pull-right"   style="background:linear-gradient(90deg, {{ $projectsetting->blog_nav_first_background_and_icon }} 50%, {{ $projectsetting->blog_nav_second_background }}) !important;color:{{ $projectsetting->blog_nav_font_color}} !important">
                </div>
                <div class="clearfix"></div>
              </form>
          </div>
           <div class="side-bar">
            <!-- Categories -->
            <div class="side-barBox">
              <h5 class="side-barTitle"   style="background:linear-gradient(90deg, {{ $projectsetting->blog_nav_first_background_and_icon }} 50%, {{ $projectsetting->blog_nav_second_background }}) !important;color:{{ $projectsetting->blog_nav_font_color}} !important">Categories</h5>
              <ul class="categories">
                @foreach ($blogcategorylists as $blogcategorylist)
                <li class="{{ request()->is('blogssearch/'.$blogcategorylist->category_url) ? 'active' : '' }}"><a href="{{url('blogssearch/'.$blogcategorylist->category_url)}}"> {{ $blogcategorylist->category_name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          @if(count($recentlists) > 0)
          <div class="side-bar">
            <div class="side-barBox">
              <h5 class="side-barTitle"   style="background:linear-gradient(90deg, {{ $projectsetting->blog_nav_first_background_and_icon }} 50%, {{ $projectsetting->blog_nav_second_background }}) !important;color:{{ $projectsetting->blog_nav_font_color}} !important">Recent List</h5>
              <ul class="papimg-post">
                 @foreach($recentlists as $recent)
                  <li>
                    <div class="media-left"> <a href="{{ url('blogs-detail/'.$recent->blog_url) }}"><img src="{{ asset('storage/blog/'.$recent->image) }}" alt="Blog Title"></a> </div>
                    <div class="media-body"> <a class="media-heading" href="{{ url('blogs-detail/'.$recent->blog_url) }}"><?php echo substr( $recent->title, 0, 10)  ?></a> <span>
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
@include('element.company_logo_slider')

<!--inner content end-->
@endsection
