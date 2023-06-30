 <!--Row Start-->

          <form class="form-inline" method="post" action="{{ route('advanced_search') }}">
            {{csrf_field()}}
            <div class="form-group col-md-3">
              <input type="text" class="form-control col-md-4" id="exampleInputName2" name="keyword" placeholder="{{$placeholder}}">  
            </div>
          <div class="form-group col-md-3">
              <select class="form-control" name="category">
                  <option value="">Select Category</option>
                  @foreach($categories_data as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select> 
          </div>
          <div class="form-group col-md-3">
              <select class="form-control" name="location">
                  <option value="">Select Locations</option>
                  @foreach($cities as $city)
                  <option value="{{$city->id}}">{{$city->name}}</option>
                  @endforeach
              </select> 
          </div>
          <div class="form-group col-md-3">
            <input type="submit" name="" class="btn btn-default" value="Search"> 
          </div>
        </form>
  <!--Row End--> 