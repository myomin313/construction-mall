  <!--inner content start-->

     <section class="inner-wrap reno_company"> 
      <!--container start-->
      <div class="container">
        <div class="row"> </div>
        <!--row start-->
        <ul class="blog-grid">
          <!--col start-->
          <div class="col-md-8 col-sm-12">
            @foreach ($datas as $data)
            <li>
              <div class="blog-inter">
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <figure class="style-greens-two green"> <img src="{{ asset('storage/company_logo/'.$data->logo) }}" >
                      <div><i class="fa fa-plus"></i></div>
                      <a href="companylist.html"></a> </figure>
                    </div>
                    <div class="col-md-8 col-sm-8">
                      <div class="list-tittle">
                        <h4><a href="{{ url('renobusinessdetail/'.$data->id) }}">{{ $data->name }}</a></h4>
                      </div>
                      <ul class="contextpadding">
                        <li> <i class="fa fa-user" aria-hidden="true"></i><span  class="titlesze">Service Company</span> 
                         <i class="fa fa-envelope" aria-hidden="true"></i><span>{{ $data->email }}</span><i class="fa fa-phone" aria-hidden="true"></i> <span>{{ $data->phone }}</span>
                       </li>
                       <li><i class="fa fa-building" aria-hidden="true"> </i><span>
                         <?php $count =1; $category="";
                         dd($data->child_categories);
                               if(asset($data->child_categories))
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
       
        </ul>
        <p >{{ $data->description }}
        </p>
        

      </div>
    </div>
  </div>
</li>
@endforeach

