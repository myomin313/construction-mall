
<!-- Category start -->
<section class="category">
  <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
           <h1 class="text-center">Get work done in different category</h1>
        </div>
      </div>
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8">
          <div class="row">
              <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/construction.png" class="img-responsive">
                        </center>

                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/6/1')}}">Construction</a></h4>
                        </div>      
                    </div>           
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/design.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/9/1')}}">Design</a></h4>
                        </div>      
                    </div>           
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/renovation.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/28/3')}}">Renovation</a></h4>
                        </div>      
                    </div>           
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/decoration.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/7/1')}}">Decoration</a></h4>
                        </div>      
                    </div>           
                </div> 
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/flooring.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/14/2')}}">Flooring</a></h4>
                        </div>      
                    </div>           
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/architecture.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/8/1')}}">Architecture</a></h4>
                        </div>      
                    </div>           
                </div> 
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/meengineering.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/10/1')}}">M&E Engin..</a></h4>
                        </div>      
                    </div>           
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/real_estate.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/27/3')}}">Real Estate</a></h4>
                        </div>      
                    </div>           
                </div> 
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/heavy_duty.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/19/2')}}">Heavy Duty</a></h4>
                        </div>      
                    </div>           
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/rental.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/31/3')}}">Rental</a></h4>
                        </div>      
                    </div>           
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/estimate.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ url('companies/33/3')}}">Estimate</a></h4>
                        </div>      
                    </div>           
                </div> 
                <div class="col-md-2 col-sm-3 col-xs-4">
                   <div class="category-desc">
                        <center>
                            <img src="images/category/freelancer.png" class="img-responsive">
                        </center>
                        <div class="category-detail category-desc-text">
                            <h4 class="text-center"> <a href="{{ route('freelancers') }}">Freelancer</a></h4>
                        </div>      
                    </div>           
                </div> 
              </div>
            </div>
         </div>
      </div>
    </div>
  </div>
</section>
<!-- Category end -->

<!--counter start-->
<section class="complete">
  <!--container start-->
  <div class="container"> 
    <!--row start-->
    <div class="row p10"> 
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon complete_service">
            <center><img src="{{ asset('images/complete/service.png')}}" class="img-responsive"></center>
          </div>
          <div class="counter_area"><span class="counter-number" data-from="1" data-to="<?=  $companies_count[0] ?>" data-speed="1000"><?= $companies_count[0] ?></span><br> <span class="counter-text">Service</span> </div>
        </div>
      </div>
      <!--col end--> 
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon complete_supplier">
            <center><img src="{{ asset('images/complete/supplier.png')}}" class="img-responsive"></center>
          </div>
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?=  $companies_count[1] ?>" data-speed="2000"><?=  $companies_count[1] ?></span><br> <span class="counter-text">Supplier</span> </div>
        </div>
      </div>
      <!--col end--> 
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon complete_reno">
            <center><img src="{{asset('images/complete/reno.png')}}" class="img-responsive"></center>
          </div>          
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?=  $companies_count[2] ?>" data-speed="3000"><?=  $companies_count[2] ?></span><br> <span class="counter-text">Reno Business</span> </div>
        </div>
      </div>
      <!--col end--> 
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon complete_freelancer">
            <center><img src="{{ asset('images/complete/freelancer.png')}}" class="img-responsive"></center>
          </div>
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?= sizeof($freelancers) ?>" data-speed="4000"><?= sizeof($freelancers) ?></span> <br><span class="counter-text">Freelancer</span></div>
        </div>
      </div>
      <!--col end--> 
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon complete_quote">
            <center><img src="{{asset('images/complete/quote.png')}}" class="img-responsive"></center>
          </div>          
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?= $quotation_count ?>" data-speed="3000"><?= $quotation_count ?></span><br> <span class="counter-text">Request Quotate</span> </div>
        </div>
      </div>
      <!--col end--> 
      <!--col start-->
      <div class="col-md-2 col-sm-4 col-xs-4 counter-item">
        <div class="counterbox">
          <div class="counter-icon">
            <center><img src="images/complete/project.png" class="img-responsive"></center>
          </div>     
          <div class="counter_area"> <span class="counter-number" data-from="1" data-to="<?= $project_count ?>" data-speed="4000"><?= $project_count ?></span><br> <span class="counter-text">Project</span></div>
        </div>
      </div>
      <!--col end--> 
      <!--col start--> 
    </div>
    <!--row end--> 
  </div>
  <!--container end--> 
</section>
<!--counter end--> 
