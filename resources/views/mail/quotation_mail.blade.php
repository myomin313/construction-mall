 <div class="col-md-6 col-sm-12">
              <div class="blog-inter">
                <div class="panel">
                     <div style="background:white;width:800px;margin:0 auto;">
                     <a href="{{ url('/')}}"><img class="main-logo" src="{{ asset('admin/images/logo/logo.png')}}" alt="" /></a>
                  </div> 
                  <div style="background:white;width:800px;margin:0 auto;">
                    <H1 style="text-align:center;color:#000;width:50%;">Requested Quotation Detail</H1>
                  </div> 
                  <div class="panel-body">
              @if(!empty($quotation['category_name']))
               <div style="background:white;width:800px;margin:0 auto;">
              <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Project Type</p>
              <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - {{ $quotation['category_name'] }}</p>      
                </div>
              @endif
              @if(!empty($quotation['building_type']))
              <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Building Type</p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - {{ $quotation['building_type'] }}</p>      
               </div>
              @endif
              @if(!empty($quotation['location_name']))
               <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Project Location</p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - {{ $quotation['location_name'] }}</p>      
               </div>
              @endif
              @if(!empty($quotation['project_expected_start_date']))
               <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Project Expected Start Date</p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - {{ $quotation['project_expected_start_date'] }}</p>      
               </div>
              @endif

              @if(!empty($quotation['minimum_price']))
              
                  <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Budget</p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - {{ $quotation['minimum_price'] }} - {{ $quotation['maximum_price'] }}</p>      
               </div>
              @endif
              
              @if(!empty($quotation['contact_allow']))
              <div style="background:white;width:800px;margin:0 auto;">
                <div style="width:100%">
                  <p class="text text-danger">You had been allowed companies to contact regarding your project query</p>
                </div>
              </div>
              @endif
              @if(!empty($quotation['contact_person_name']))
                  <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Contact Person Name</p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - {{ $quotation['contact_person_name'] }}</p>      
               </div>
              @endif
              @if(!empty(unserialize($quotation['prefer_contact_way'])))
              <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Prefer way to contact </p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - 
                   @php
                    $way_count = 1;
                    foreach(unserialize($quotation['prefer_contact_way']) as $way){
                      if($way_count == sizeof(unserialize($quotation['prefer_contact_way']) ))
                        echo $way;
                      else
                        echo $way.",";
                    }
                      $way_count++;
                  @endphp 
                </p>      
               </div>
              @endif
              @if(!empty(unserialize($quotation['best_contact_time'])))
                  <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Best Time to contact </p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - 
                    @php
                    $contact_count = 1;
                    foreach(unserialize($quotation['best_contact_time']) as $way){
                      if($contact_count == sizeof(unserialize($quotation['best_contact_time']) ))
                        echo $way;
                      else
                        echo $way.",";
                    }
                      $contact_count++;
                  @endphp 
                </p>      
               </div>
              @endif
               @if(!empty($quotation['contact_phone']))
                  <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Contact Phone</p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - {{ $quotation['contact_phone'] }}</p>      
               </div>
              @endif
               @if(!empty($quotation['contact_email']))
                  <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:30%;margin: 0 auto;font-size: 15px;float:left">Contact Email</p>
                <p style="color:#000;width:70%;margin: 0 auto;font-size: 15px;float:right"> - {{ $quotation['contact_email'] }}</p>      
               </div>
              @endif
                  </div>
                </div>
              </div>
        </div>