<!--quote-modal start-->
<div class="modal fade bs-example-modal-md-2" tabindex="-1" role="dialog" id="get_quote_detail">
    <div class="modal-dialog modal-md-2" role="document">
        <div class="modal-content">
            <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">Close (X)</a></div>
            <h2 class="modal-title">GET A QUOTE</h2>
            <form class="login-form detail_next" enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <input type="hidden" id="company_id" name="company_id">
                    <input type="hidden" id="category_id" name="category_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Budget<span class="text-danger"> * </span></label>
                                <select name="budget" class="form-control">
                                    <option selected="selected" disabled="disabled">Budget</option>
                                    @foreach($ranges as $range)
                                        <option value="{{ $range->id }}">{{ $range->minimum_price }} ~ {{ $range->maximum_price }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Project Expected To Start Date</label>
                                <input type="date" name="project_expected_start_date" class="form-control" min="<?php echo date("Y-m-d"); ?>" id="project_expected_start_date" placeholder="Email Address">
                            </div>
                        </div>
                        <small class="text-danger" id="budget_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Building Type <span class="text-danger"> * </span></label>
                        <input type="text" name="building_type" class="form-control" id="building_type" placeholder="Building Type">
                        <small class="text-danger" id="building_type_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Project Information<span class="text-danger"> * </span></label>
                        <textarea  rows="4" cols="50" name="project_information" class="form-control" id="project_information" placeholder="Please Enter Project Information" style="resize: none;"></textarea>
                        <small class="text-danger" id="project_information_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label>City<span class="text-danger"> * </span></label>
                                <select class="form-control" name="city" id="quote_detail_city">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger" id="city_label">
                                </small>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label>Township<span class="text-danger"> * </span></label>
                                <select class="form-control" name="township" id="quote_detail_township">
                                    <option value="">Select Township</option>
                                </select>
                                <small class="text-danger" id="township_label">
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Street Address<span class="text-danger"> * </span></label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Street Address">
                        <small class="text-danger" id="address_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Contact Person Name</span></label>
                        <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Contact Person Name" maxlength="50">
                    </div>
                    <div class="form-group" id="add_more_field">
                        <!-- //initially one field is set -->
                        <label>Contact Email Address</label>
                        <div class="row meta-field">
                            <div class="col-md-11 col-sm-10 col-xs-10">
                                <div class="form-group">
                                    <input class="form-control" id="detail_contact_email1" name="contact_email" value="" type="email" placeholder="Contact Email Address">
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 col-xs-2">
                                <div class="bordered">
                                    <a class="add_more" class="pull-right"  href="#" ><i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="add_more_field1">
                        <label>Contact Phone Number<span class="text-danger"> * </span></label>
                        <!-- //initially one field is set -->
                        <div class="row meta-field1">
                            <div class="col-md-11 col-sm-10 col-xs-10">
                                <div class="form-group">
                                    <input class="form-control" id="detail_contact_phone1" name="contact_phone" value="" type="number" placeholder="Contact Phone Number"  maxlength="11">
                                    <small class="text-danger" id="contact_phone_label"></small>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 col-xs-2">
                                <a class="add_more1" href="#" ><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Please Upload Files <small class="file_error">(Allowed file type :doc, docx,pdf,txt.)</small></label>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="quotation_file" class="form-control" id="quotation_file" title="No File" >
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="quotation_file1" class="form-control" id="quotation_file1">
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="quotation_file2" class="form-control" id="quotation_file2">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="contact_allow" name="contact_allow" value="1">  <span>Allow companies to contact regarding your project query<span class="text-danger"> * </span></span>
                        </label>
                       <br>
                        <small class="text-danger" id="contact_allow_label">
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="contact_way" class="pr-10">Prefer way to contact<span class="text-danger">*</span></label><br>
                        <label>
                            <input type="checkbox" id="email_contact" name="prefer_contact_way[]"  value="email">  <span>By email</span>
                        </label>
                        <label>
                           <input type="checkbox" id="phone_contact" name="prefer_contact_way[]" value="phone">  <span>By phone</span> 
                        </label>
                        
                        
                        <div class="pull-left" style="width: 100%">
                            <small class="text-danger pull-left" id="prefer_contact_way_label"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_way" class="pr-17">Best time to contact<span class="text-danger">*</span></label><br>
                        <label>
                             <input type="checkbox" id="best_contact_time1" name="best_contact_time[]" value="8am-12pm">  <span>8am-12pm</span>
                        </label>
                        <label>
                             <input type="checkbox" id="best_contact_time2" name="best_contact_time[]"  value="12pm-5pm">  <span>12pm-5pm</span>
                        </label>
                        <label>
                             <input type="checkbox" id="best_contact_time3" name="best_contact_time[]" value="5pm-9pm">  <span>5pm-9pm</span>
                        </label>
                       
                        <div class="pull-left" style="width: 100%">
                            <small class="text-danger" id="best_contact_time_label"></small>
                        </div>
                    </div>
                    <button class="tg-theme-btn tg-theme-btn-lg" type="submit">Next</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<!--quote-modal end-->
