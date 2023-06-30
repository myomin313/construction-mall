 <div class="col-md-6 col-sm-12">
              <div class="blog-inter">
                <div class="panel">
                     <div style="background:white;width:800px;margin:0 auto;">
                     <a href="{{ url('/')}}"><img class="main-logo" src="{{ asset('images/logo/logo.png') }}" alt="" /></a><br><br>
                  </div> 
                  <div class="panel-body">
               <div style="background:white;width:800px;margin:0 auto;">
               <p style="color:#000;width:100%;margin: 0 auto;font-size: 15px">Hello {{ $name }},<br></p>  
                </div>
              <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:100%;margin: 0 auto;font-size: 15px;">You have successfully registered an account with  <a href="{{ url('/')}}"  style="text-decoration:none">myanbox.com.mm </a><br><br></p>     
               </div>
                <div style="background:white;width:800px;margin:0 auto;">
               <p style="color:#000;width:100%;margin: 0 auto;font-size: 15px">Thank you and welcome to <a href="{{ url('/')}}" style="text-decoration:none">myanbox.com.mm</a><br><br></p>  
                </div>
                
               
                <div style="background:white;width:800px;margin:0 auto;">
               <h6 style="color:#000;width:100%;margin: 0 auto;font-size: 15px"> @ <?php echo date('Y'); ?> <a href="{{ url('/')}}"  style="text-decoration:none">MYANBOX.COM.MM</a>. ALL RIGHTS RESERVED<br><br></h6>  
                </div>
                
               <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:100%;margin: 0 auto;font-size: 15px;float:left">Thanks,<br>
                    The {{ config('app.name') }}  Customer Support Team</p>     
               </div>

                  </div>
                </div>
              </div>
        </div>

