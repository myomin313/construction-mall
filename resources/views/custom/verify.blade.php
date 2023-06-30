 <div class="col-md-6 col-sm-12">
              <div class="blog-inter">
                <div class="panel">
                     <div style="background:white;width:800px;margin:0 auto;">
                     <a href="{{ url('/')}}"><img class="main-logo" src="{{ asset('images/logo/logo.png') }}" alt="" /></a>
                  </div> 
                  <div style="background:white;width:800px;margin:0 auto;">
                    <h3 style="color:#000;width:100%;">Update your password</h3>
                  </div> 
                  <div class="panel-body">
               <div style="background:white;width:800px;margin:0 auto;">
               <p style="color:#000;width:100%;margin: 0 auto;font-size: 15px">Hi {{ $name }},<br><br></p>  
                </div>
              <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:100%;margin: 0 auto;font-size: 15px;">We received a request that you want to update your password. You can do this by selecting the button below. You’ll be asked to verify your identity, and then you can update your password.<br><br><br></p>     
               </div>
                <div style="background:white;width:800px;margin:0 auto;" style="text-align:center">
                    <a href="{{ route('reset.password.get',['token' => $token, 'role' => $role]) }}" style="background: #ffcc32;margin: 3px 0px 0px 0px;color: #fff !important;border-radius:15px;padding:15px;margin-left:350px;text-decoration:none">Update Password</a><br><br><br>
                </div>
                <div style="background:white;width:800px;margin:0 auto;">
               <p style="color:#000;width:100%;margin: 0 auto;font-size: 15px">If you didn't make this request, you don't need to do anything. <br><br></p>  
                </div>
                
               <div style="background:white;width:800px;margin:0 auto;">
                <p style="color:#000;width:100%;margin: 0 auto;font-size: 15px;float:left">Thanks,<br>
                    The {{ config('app.name') }} Trust & Safety Team</p>     
               </div>

                  </div>
                </div>
              </div>
        </div>

