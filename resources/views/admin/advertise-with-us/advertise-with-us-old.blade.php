@extends('layouts.homeapp')
@section('content')
<style type="text/css">
.mega-dropdown {
position: static !important;
}

.navbar-nav>li>.dropdown-menu ul li a{
  font-size: 14px;
}
</style>
<body>
<div class="page-wrapper"> 
  <!--preloader start-->
  <div class="preloader"></div>
  <!--preloader end--> 
  <!--main-header start-->
   @include('element.header')
  <!--main-header end--> 
 <section class="inner-heading advertise_with_us">
    <div class="container">
    	<center>
    		<h1>No 1. Platform as a Service</h1>
   			<span>for Construction, Decoration & design IN MYANMAR</span>
    	</center>
    </div>
  </section>
  <section class="inner-wrap advertise_with_us"> 
    <!--container start-->
    <div class="container">
    	<div class="row">
	        <div class="col-md-12 col-sm-12">
	           <center>
	           <h1>Why Myanbox ?</h1>
	           <p>As Myanmar’s no.1 leading construction, interior design, inspiration and Renovation Portal, MYANBOX is the clear choice for businesses who wish to profile their companies and showcase their services to homeowners. Our visitors are house-proud, quality-conscious consumers who are willing to spend if the price is right and quality is good. If you have a product or service that would appeal to this discerning and savvy set of people, MYANBOX is the ideal advertising platform for you.</p>
	         </center>
	        </div>
       </div>
       <div class="row">
       		<div class="col-md-6 col-sm-6 sponser">
       			<img src="images/advertisement/content_writing.png" alt="Premium List">
       		</div>
       		<div class="col-md-6 col-sm-6 sponser_info">
       			<h3><span>Content Sponsorship</span></h3>
       			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
       			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
       			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
       			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
       			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       			<a href="contact.html" class="btn btn-xs contact_btn">Contact Us To Advertise</a>
       		</div>
       </div>
       <div class="row">
	       <div class="col-md-4 col-sm-4 premium_info">
	       		<h3><span>Premium Listing</span></h3>
	       		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	       			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	       			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	       			consequat.</p>
       			<a href="contact.html" class="btn btn-xs contact_btn">Contact Us To Advertise</a>
	       </div>
	       <div class="col-md-8 col-sm-8 premium">
	       		<img src="images/advertisement/premium.jpg" alt="Premium List">
	       	</div>
	    </div>
	     <div class="row">
       		<div class="col-md-6 col-sm-6 sponser">
       			<img src="images/advertisement/content_writing.png" alt="Premium List">
       		</div>
       		<div class="col-md-6 col-sm-6 sponser_info">
       			<h3><span>Content Sponsorship</span></h3>
       			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
       			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
       			consequat.</p>
       			<a href="contact.html" class="btn btn-xs contact_btn">Contact Us To Advertise</a>
       		</div>
       </div>
       <div class="row">
	       <div class="col-md-4 col-sm-4 premium_info">
	       		<h3><span>Premium Listing</span></h3>
	       		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	       			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	       			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	       			consequat.</p>
       			<a href="contact.html" class="btn btn-xs contact_btn">Contact Us To Advertise</a>
	       </div>
	       <div class="col-md-8 col-sm-8 premium">
	       		<img src="images/advertisement/premium.jpg" alt="Premium List">
	       	</div>
	    </div>
	     <div class="row">
	        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
	           <center>
	           <h1>Benefits of your presence on Myanbox?</h1>
	           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
	         </center>
	        </div>
	   </div>
     <!-- start -->
       <div class="row">
          <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
             <center>
             <a  href="{{ route('advertise-with-us.sponsorship')}}" class="btn btn-primary">EDIT</a>
           </center>
          </div>
     </div>
     <!-- end -->
    	<div class="row">
          <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/target.png" alt="Target">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">Target Audience</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/data_analysis.png" alt="Target">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">Data Analysis</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/community.png" alt="Target">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">Community Management</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
        
            <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/direct.png" alt="Target">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">Direct To Client</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/project_management.png" alt="Target">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">Project Management</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/benefit_from_supplier.png" alt="Target">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">Benefit From Supplier</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/more_online_presence.png" alt="Target">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">More online presence</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/verify_process.png" alt="Verify Process">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">Verified Process</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
            <div class="col-md-4 col-sm-6">
               <div class="panel">
               		<div class="panel-title">
               			<center>
                        	<img src="images/advertisement/event_planning.png" alt="Target">
                    	</center>
               		</div>
                    <div class="panel-body">
                        <h4 class="text-center">Event Planning</h4>
                        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.</p>
                    </div>      
                </div>           
            </div>
        </div>
         <!-- start -->
         <div class="row">
          <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
             <center>
             <a  href="{{ route('advertise-with-us.benefits')}}" class="btn btn-primary">EDIT</a>
           </center>
          </div>
         </div>
     <!-- end -->
         <div class="row">
	       <div class="col-md-6 col-sm-6 customer_info">
	       		<h3><span>Analyze Customer Data</span></h3>
	       		<p>Lorem ipsm dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	       			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	       			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	       			consequat.</p>
       			<a href="contact.html" class="btn btn-xs contact_btn">Know More</a>
	       </div>
	       <div class="col-md-4 col-sm-6 analyze">
	       		<img src="images/advertisement/analyse_customer.png" alt="Premium List">
	       	</div>
	    </div>
    </div>
</section>
<!--counter start-->
<section class="advertisement">
  <!--container start-->
  <div class="container"> 
    <!--row start-->
    <div class="row p10"> 
      <div class="col-md-6 col-sm-6 col-xs-8">
      	<H1>Advertise with us?</H1>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-4">
      	<a href="tel:+0934 343 343" class="pull-right btn btn-lg">Call Now</a>
      </div>
    </div>
    <!--row end--> 
  </div>
  <!--container end--> 
</section>

<!--brand-section start-->
<!--brand-section end--> 
@endsection

