<?php $padding = ($type == 'Supplier')?'pl0':'';
?>
<div class="col-md-6 pr10 {{$padding}} col-sm-6">
              <div class="panel service">
                <div class="panel-heading"> 
                   <h2 class="panel-title text-center">Top <?=$type; ?> Companies </h2>
                </div>
                 <div class="panel-body overflow">
                    <div class="row service">
                       <div class="col-md-12 ">
                          <div class="list-group">
                            @foreach($data as $company)
                             <!--@if($type =='Service')-->
                             <!-- <a href="{{ url('companydetail/'.$company->company_url )}}" class="list-group-item">-->
                             <!-- @elseif($type=='Supplier')-->
                             <!--  <a href="{{ url('companydetail/'.$company->company_url )}}" class="list-group-item">-->
                             <!-- @else-->
                                <a href="{{ url('companydetail/'.$company->company_url )}}" class="list-group-item">
                              <!--@endif-->
                              <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-3 nopadding">
                                    <img src="{{asset('storage/company_logo/'.$company->user->logo)}}" class="img-responsive">
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-9 nopadding">
                                   <h2> <?= $company->user->name ?></h2>
                                   <span><?php $count =1; $category="";
                                           if(asset($company->child_categories))
                                           {
                                             foreach($company->child_categories as $child_category){
                                                  if(sizeof($company->child_categories)==$count)
                                                      $category .= $child_category->name;
                                                  else
                                                      $category .=$child_category->name.",";
                                              $count++;
                                             }
                                             echo (strlen($category) > 40)?substr($category, 0,40)."...":$category;
                                          }
                                          else{
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