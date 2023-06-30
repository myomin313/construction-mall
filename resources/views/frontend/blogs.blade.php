@extends('frontend.layouts.homeapp')
@section('title','Myanbox | Blog')
@section('extra_css')
 <style>
        .blogs .categories li.active a {
            color: {{ $projectsetting->blog_nav_first_background_and_icon }} !important;
        }
    </style>
@endsection
@section('content')

<body class="blogs">
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
 @include('element.header')
  <!--main-header end--> 
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
      <div class="row"> 
        <ul class="blog-grid">
          <div class="col-md-9 col-sm-12">
            <div class="row">
             @if(!$blogstopfive->isEmpty()) 
             <!-- Count 1 Case !-->
              @if($blogstopfive->count() == 1)
                @foreach($blogstopfive as $blogfive)
                 <li class="col-md-12 col-sm-12">
                   <div class="blog-inter">
                    <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$blogfive->image) }}" class="img-responsive w_100" alt="portfolio">
                      <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                      <a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"></a> </figure>
                    <div class="post-tittle">
                      <h4><a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"><?php echo 
                            // substr( $blogfive->title, 0, 10);
                            mb_substr($blogfive->title, 0, 100);
                            
                            ?></a></h4>
                    </div>
                     <ul class="blogDate">
                        <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting-> blog_nav_first_background_and_icon }} !important;"></i><span> {{ $blogfive->name }}</span> </li>
                        <li> <i class="fa fa-th-large" aria-hidden="true"style="color:{{ $projectsetting->  blog_nav_first_background_and_icon }} !important;"></i><span> <?php $count =1;                                              foreach($blogfive->category_arr as $category){
                                                                if(sizeof($blogfive->category_arr)==$count)
                                                                    echo $category;
                                                                else
                                                                    echo $category.", ";
                                                            $count++;
                                                           }
                                                        ?></span> </li>
                      </ul>
                </div>
                </li>
                @endforeach
              @elseif($blogstopfive->count() == 2 || $blogstopfive->count() == 4)
                @foreach($blogstopfive as $blogfive)
                 <li class="col-md-6 col-sm-6">
                   <div class="blog-inter">
                    <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$blogfive->image) }}" alt="portfolio">
                      <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                      <a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"></a> </figure>
                    <div class="post-tittle">
                      <h4><a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"><?php echo mb_substr($blogfive->title, 0, 45);  ?></a></h4>
                    </div>
                     <ul class="blogDate">
                        <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting-> blog_nav_first_background_and_icon }} !important;"></i><span> {{ $blogfive->name }}</span> </li>
                        <li> <i class="fa fa-th-large" aria-hidden="true"style="color:{{ $projectsetting->  blog_nav_first_background_and_icon }} !important;"></i><span>  
                                                        
                                                        <?php
                                                        
                                                        $count =1;
                                                        
                                                                $category="";
                                                                if(!empty($blogfive->category_arr))
                                                                {
                                                                    foreach($blogfive->category_arr as $blog_category){
                                                                        if(sizeof($blogfive->category_arr)==$count)
                                                                            $category .= $blog_category;
                                                                        else
                                                                            $category .=$blog_category.",";
                                                                        $count++;
                                                                    }

                                                                    echo (strlen($category) > 30)?substr($category, 0,30)."...":$category;
                                                                }
                                                                else{
                                                                    echo "-";
                                                                }
                                                                ?>
                                                        
                                                        
                                                        
                                                        </span> </li>
                      </ul>
                </div>
                </li>
                @endforeach

              @elseif($blogstopfive->count() == 3)
                 <li class="col-md-8 col-sm-8">
                   <div class="blog-inter">
                    <figure class="style-greens-two green"> <img class="img-responsive w_100" src="{{ asset('storage/blog/'.$blogstopfive[0]->image) }}" alt="portfolio">
                      <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                      <a href="{{ url('blogs-detail/'.$blogstopfive[0]->blog_url) }}"></a> </figure>
                    <div class="post-tittle">
                      <h4><a href="{{ url('blogs-detail/'.$blogstopfive[0]->blog_url) }}"><?php echo mb_substr( $blogstopfive[0]->title, 0, 70)  ?></a></h4>
                    </div>
                     <ul class="blogDate">
                        <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting-> blog_nav_first_background_and_icon }} !important;"></i><span> {{ $blogstopfive[0]->name }}</span> </li>
                        <li> <i class="fa fa-th-large" aria-hidden="true"style="color:{{ $projectsetting->  blog_nav_first_background_and_icon }} !important;"></i><span>
                            
                                                        
                                                        
                                                         <?php
                                                        
                                                        $count =1;
                                                        
                                                                $category="";
                                                                if(!empty($blogstopfive->category_arr))
                                                                {
                                                                    foreach($blogstopfive->category_arr as $blog_category){
                                                                        if(sizeof($blogstopfive->category_arr)==$count)
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
                      </ul>
                </div>
                </li>
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
                                  <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$blogfive->image) }}" class="img-responsive w_100" alt="portfolio">
                                    <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                                    <a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"></a> </figure>
                                  <div class="post-tittle">
                                    <h4><a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"><?php echo mb_substr( $blogfive->title, 0, 25)  ?></a></h4>
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
              @else
                <li class="col-md-8 col-sm-8">
                     <div class="blog-inter">
                      <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$blogstopfive[0]->image) }}" alt="portfolio">
                        <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                        <a href="{{ url('blogs-detail/'.$blogstopfive[0]->blog_url) }}"></a> </figure>
                      <div class="post-tittle">
                        <h4><a href="{{ url('blogs-detail/'.$blogstopfive[0]->blog_url) }}"><?php echo mb_substr( $blogstopfive[0]->title, 0, 80)  ?></a></h4>
                      </div>
                       <ul class="blogDate">
                          <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting-> blog_nav_first_background_and_icon }} !important;"></i><span> {{ $blogstopfive[0]->name }}</span> </li>
                          
                        </ul>
                  </div>
                  </li>  
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
                                    <h4><a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}">
                                        <?php echo mb_substr( $blogfive->title, 0, 25)  ?></a></h4>
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
                </div>
                </div>
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
                        <h4><a href="{{ url('blogs-detail/'.$blogfive->blog_url) }}"><?php echo mb_substr( $blogfive->title, 0, 25)  ?></a></h4>
                      </div>
                    </div>
                  </li>
                  @elseif($count >5)
                    @break
                  @endif
                    @php $count++; @endphp
                @endforeach
               <div class="col-md-9 col-sm-12">
                <div class="row">               
              @endif       
            @endif

            @php $count=1;$status=1; @endphp
            @if(!$bloglistall->isEmpty())
              @foreach ($bloglistall as $bloglist)
                  <li class="col-md-4 col-sm-6">
                   <div class="blog-inter">
                          <figure class="style-greens-two green"> <img src="{{ asset('storage/blog/'.$bloglist->image) }}" alt="portfolio">
                            <div><i class="fa fa-plus" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i></div>
                            <a href="{{ url('blogs-detail/'.$bloglist->blog_url) }}"></a> </figure>
                          <div class="post-tittle">
                            <h4><a href="{{ url('blogs-detail/'.$bloglist->blog_url) }}"><?php echo mb_substr( $bloglist->title, 0, 25)  ?></a></h4>
                          </div>
                           <ul class="blogDate">
                              <li> <i class="fa fa-user" aria-hidden="true" style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span>{{ $bloglist->name }}</span> </li><br>
                              <li> <i class="fa fa-th-large" aria-hidden="true"style="color:{{ $projectsetting->blog_nav_first_background_and_icon }} !important;"></i><span> 
                                                        
                                                        <?php
                                                        
                                                        $count =1;
                                                        
                                                                $category="";
                                                                if(!empty($bloglist->category_arr))
                                                                {
                                                                    foreach($bloglist->category_arr as $blog_category){
                                                                        if(sizeof($bloglist->category_arr)==$count)
                                                                            $category .= $blog_category;
                                                                        else
                                                                            $category .=$blog_category.",";
                                                                        $count++;
                                                                    }

                                                                    echo (strlen($category) > 25)?substr($category, 0,25)."...":$category;
                                                                }
                                                                else{
                                                                    echo "-";
                                                                }
                                                                ?>
                                                        
                                                        
                                                        </span> </li><br>
                              <li>
                                <p><?php echo mb_substr( strip_tags($bloglist->description), 0, 200)  ?></p>
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
                @else
                @if($blogstopfive->isEmpty())
             <div style="border: 2px solid #acacac;border-radius: 10px;">
                                @include('element.404')
             </div>
            
            @endif
            
              <!--  <div class="alert alert-info" role="alert">
                     
  <strong>No Matching Data !</strong> Sorry, we couldn't find anything to match that request, please try another option.
</div>-->
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
                  <input type="text" name="keyword" placeholder="keyword" class="form-control" value="{{isset($keyword)?
                          $keyword:''}}">
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
          <div class="side-bar"> 
            <div class="side-barBox">
              <h5 class="side-barTitle"   style="background:linear-gradient(90deg, {{ $projectsetting->blog_nav_first_background_and_icon }} 50%, {{ $projectsetting->blog_nav_second_background }}) !important;color:{{ $projectsetting->blog_nav_font_color}} !important">Recent List</h5>
              <ul class="papimg-post">
                 @foreach($recentlists as $recent) 
                  <li>
                    <!--<div class="media-left"> <a href="{{ url('blogs-detail/'.$recent->blog_url) }}"><img src="{{ asset('storage/blog/'.$recent->image) }}" alt="Blog Title"></a> </div>-->
                    <div class="media-body"> <a class="media-heading" href="{{ url('blogs-detail/'.$recent->blog_url) }}"><?php echo mb_substr( $recent->title, 0, 40)  ?></a> <span>
                      <?php
                    $yrdata= strtotime($recent->updated_at);
                     echo date('M d Y', $yrdata);
                     ?></span> </div>
                  </li>
                 @endforeach
                </ul>
            </div>
          </div>
        </div>
        </ul>
      </div>
      <!--row start-->
  </div>      
    <!--container end--> 
  </section>
  <!--inner content end-->
@endsection 