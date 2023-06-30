 <form class="company-profile-form"  id="basicForm" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <input type="hidden" name="information_type" value="basic">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="categories">Categories:</label><br>
                            <div class="row">
                                @foreach($categories as $category)
                                    <?php
                                    if(in_array($category->id, $category_arr))
                                        $checked = "checked";
                                    else
                                        $checked = "";
                                    ?>


                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label>

                                            <input class="category" id="subcategory_id_<?= $category->id ?>" type="checkbox" name="category[]" value="<?= $category->id ?>" <?= $checked ?>>  <span><?= $category->name ?></span> 
                                        </label>
                                        
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="name">Name:</label><span class="text-danger"> * </span>
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?= $company->user->name ?>">
                            <div id="nameError" class="error"></div>
                             </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="name">Contact Email:</label><span class="text-danger"> * </span>
                            <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $company->email ?>" id="email">
                            <div id="emailError" class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="phone">Contact Phone:</label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" value=" <?= $company->phone ?>">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="website">Website:</label>
                               <input type="text" class="form-control" name="website" placeholder="https://myanbox.com.mm" value="<?= $company->website?>" id="website">
                            <div id="websiteError" class="error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="city">City:</label><span class="text-danger"> * </span>
                            <select class="form-control" id="company_city" name="city">
                                <!--start-->
                                <option disabled="disabled" selected="selected">City:</option>
                                <?php
                                $selected = "";
                                foreach($cities as $city){
                                if(!empty($company_city))
                                    if($company_city->id == $city->id)
                                        $selected ="selected";
                                    else

                                        $selected ="";
                                ?>
                                <option value={{$city->id}} <?=$selected?>>{{$city->name}}</option>
                            <?php } ?>
                            <!--end-->
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="city">Township</label><span class="text-danger"> * </span>
                            
                            @if(empty($company->location))
                            <select class="form-control" id="company_township" name="township">
                                <option disabled="disabled" selected="selected">Township:</option>
                                    </select>
                            @else
                              
                                <select class="form-control" id="company_township" name="township">
                                <option disabled="disabled">Township:</option>
                                    @foreach($townships as $township)
                                        @if($company_city->id == $township->parent_id)
                                            @php $selected = ""; @endphp
                                            @if($company->location->id == $township->id)
                                                @php $selected = "selected"; @endphp
                                            @else
                                                @php $selected = ""; @endphp
                                            @endif

                                        <option value="{{$township->id}}" {{$selected}}>{{$township->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endif
                                  </div>
                                  </div>
                        <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" name="address" id="address" value="<?= $company->address ?>">
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="business_days">Business Days :</label><span class="text-danger"> * </span><br>
                                    <div id="day_error" class="error">                                       
                                    </div>
                                   
                                     @if(!empty($business_days))
                                        

                                        @foreach($business_days as $business_day)
                                                @if(in_array($business_day->id,$business_day_list))
                                                    @php $choose = "Checked"; @endphp
                                                @else
                                                    @php $choose = ""; @endphp
                                                @endif
                                        <div class="row" style="margin-bottom:10px;">
                                              <div class="col-md-4 col-sm-4 col-xs-12">
                                      <label>
                                         <input type="checkbox" name="business_day[]" value="{{$business_day->id}}" id=
                                         "business_day{{$business_day->id}}" {{$choose}}> {{$business_day->name}}
                                     </label>
                                 </div>
                                 <div class="col-md-8 col-sm-8 col-xs-12" >
                                     <div class="row" >
                                         <div class="col-md-2">
                                            <label class="pull-right" id="from_label{{$business_day->id}}">From:</label>  
                                         </div>
                                         <div class="col-md-4"> 
                                                    
                                                        <input type="time" name="opening_hour{{$business_day->id}}" class="form-control" id="opening_hour{{$business_day->id}}" value="{{(isset($business_opening_hour) && array_key_exists('opening_hour'.$business_day->id,$business_opening_hour))?$business_opening_hour['opening_hour'.$business_day->id]:''}}">
                                                        <div id="opening_hour_error_{{$business_day->id}}" class="error">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="pull-right" id="to_label{{$business_day->id}}">To:</label> 
                                                    </div>
                                                    <div class="col-md-4"> 
                                                       <input type="time" name="closing_hour{{$business_day->id}}" class="form-control" id="closing_hour{{$business_day->id}}" value="{{(isset($business_closing_hour) && array_key_exists('closing_hour'.$business_day->id,$business_closing_hour))?$business_closing_hour['closing_hour'.$business_day->id]:''}}">
                                                       <div id="closing_hour_error_{{$business_day->id}}" class="error">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                       
                                       @endforeach
                                    @endif

                                </div>
                        </div>
                       
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="Fackbook Link">Facebook Link:</label><span class="text-danger"> * </span>
                                <input type="text" class="form-control" placeholder="https://facebook.com" value="<?= $company->facebook ?>" name="facebook" id="facebook">
                                <div id="facebookError" class="error"></div>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="Twitter Link">Twitter Link:</label>
                                <input type="text" class="form-control" placeholder="https://twitter.com" value="<?= $company->twitter ?>" name="twitter" id="twitter">
                                <div id="twitterError" class="error"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="Google Plus Link">Google Plus Link:</label>
                                <input type="text" class="form-control" placeholder="https://myaccount.google.com/profile?" value="<?= $company->googleplus ?>" name="googleplus" id="googleplus">
                                <div id="googleplusError" class="error"></div>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="linkedin">Linkedin Link:</label>
                                <input type="text" class="form-control" placeholder="https://www.linkedin.com/in/yourname" value="<?= $company->linkedin ?>" name="linkedin" id="linkedin">
                                <div id="linkedinError" class="error"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="description">About Us:</label><span class="text-danger"> * </span>
                                <textarea name="description" class="form-control" style="resize: none;" value="<?= $company->description?>"> <?= $company->description?>                                                                   </textarea>
                                <div id="descriptionError" class="error"></div>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="service">What We Do:</label>
                                <textarea name="service" id="service" class="summernote" >
                                     <?= $company->service ?>
                                </textarea>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="vission">Vission:</label>
                                <textarea name="vission" id="vission" class="summernote" >
                                    <?= $company->vission ?>
                                </textarea>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="mission">Mission:</label>
                                <textarea name="mission" id="mission" class="summernote" >
                                    <?= $company->mission ?>
                                </textarea>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <center>
                                    <button class="btn btn-standard" type="submit" id="basic_add_btn" >Update</button>
                                </center>
                                <span class="error" id="required_error" style="display: none;">Please fill all required fields (*).</span>
                            </div>
                        </div>
                </form>