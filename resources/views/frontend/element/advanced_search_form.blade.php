<div class="quick-quote">
    <div class="container"> 

      <div class="row">
        <div class="col-md-12 col-sm-12">
           <div class="advanced_search">
            <!--Row Start-->
           <form class="form-inline advanced_search_form"
             action="{{ route('search') }}" method="get">
              <div class="form-group col-md-4 col-sm-12 inner-addon left-addon">
                  <i class="fa fa-search"></i>      
                  <input type="text" class="form-control" name="keyword" placeholder="Skill,Company,Keyword" />
                </div>
                 {{csrf_field()}}
                <input type="hidden" name="default_category_id" value="1">
                <div class="form-group col-md-3 col-sm-6 inner-addon left-addon ">
                  <i class="fa fa-folder-open"></i>     
                    <select class="form-control" name="category">
                      <option value="1">Service</option>
                      <option value="2">Supplier</option>
                      <option value="3">Reno Business</option>
                      <option value="4">Professionals</option>
                    </select>  
                </div>
               <div class="form-group col-md-3 col-sm-6 inner-addon left-addon ">
                  <i class="fa fa-map-marker"></i> 
                     <select class="form-control" name="location_id">
                        <option value="">Select Locations</option>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group col-md-2 col-sm-12">
                    <input type="submit" name="" class="btn btn-warning btn-sm advanced_search_btn" value="Search" style="background:linear-gradient(90deg, {{ $projectsetting->home_nav_first_background}} 50%, {{ $projectsetting->home_nav_second_background}}) !important;color:{{ $projectsetting->home_nav_font_color}} !important">
                 </div>
        </form>
      </div>
      </div>
        <!--Row End--> 
      </div>
    </div>
  </div>