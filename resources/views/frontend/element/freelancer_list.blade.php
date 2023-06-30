 <div class="col-md-6 pl0 pr10 col-sm-6">
               <div class="panel freelancer">
                <div class="panel-heading">
                   <h2 class="panel-title text-center">Top {{$type}}</h2>
                </div>
                <div class="panel-body overflow">
                  <div class="row ">
                       <div class="col-md-12 freelancer">
                          <div class="list-group">
                            @foreach($freelancers as $freelancer)
                            <a href="{{ url('freelancerdetails/'.$freelancer->id)}}" class="list-group-item">
                              <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-3 nopadding">
                                    <img src="{{asset('storage/freelancer/'.$freelancer->user->logo)}}" class="img-responsive">
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-9 nopadding">
                                   <h2><?= $freelancer->user->name ?></h2>
                                   <span>
                                    <?php $count =1; $skills ="";
                                        if(asset($freelancer->skillForFreelancer))
                                        {
                                         foreach($freelancer->skillForFreelancer as $skill){
                                              if(sizeof($freelancer->skillForFreelancer)==$count)
                                                $skills .= $skill['skill_name'];
                                              else
                                                $skills .= $skill['skill_name'].",";
                                          $count++;
                                         } 
                                          echo (strlen($skills) > 45)?substr($skills, 0,45)."...":$skills;
                                        }else{
                                          echo "-";
                                        }
                                      ?></span>
                                </div>
                              </div>
                            </a>
                           @endforeach
                          </div>  
                       </div>
                    </div>
                </div>
              </div>
            </div>