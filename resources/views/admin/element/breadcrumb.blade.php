 <div class="bread_crumb">
      <ol class="breadcrumb">
          @php
            if(!request()->is('admin/project/create/*') && request()->is('admin/project/*')){
              $project_id = $company_project->id; 
              $project_id =\Crypt::encrypt($project_id);
            }
            if(isset($company)){
             $id = isset($company_id)?$company_id:$company->id;
             $id =\Crypt::encrypt($id);            
             $pageno = Session::get('page');
             $pageno =\Crypt::encrypt($pageno);
             $name = isset($company->user)?$company->user->name:(isset($company->name)?$company->name:'');
             }
          @endphp
        <li><a href="{{ route('users.editadmin',\Crypt::encrypt(Auth::user()->id) ) }}">Admin</a></li>

          <!-- Company List !-->
        @if(request()->is('admin/companies') || 
            request()->is('admin/company-profile/*') ||
            request()->is('admin/company-edit/*') ||
            request()->is('admin/company/dashboard/*') ||
            request()->is('admin/company-service/*') ||
            request()->is('admin/service/edit/*') ||
            request()->is('admin/service/create/*') ||
            request()->is('admin/company-project/*') ||
            request()->is('admin/project/edit/*') ||
            request()->is('admin/project/create/*') ||
            request()->is('admin/project/*') ||
            request()->is('admin/company-product/*') ||
            request()->is('admin/product/edit/*') ||
            request()->is('admin/product/create/*') ||
            request()->is('admin/company/quotation/*') ||
            request()->is('admin/company/coin/*') ||
            request()->is('admin/company/package/*') ||
            request()->is('admin/company/buy-package/*'))
        <li class="{{request()->is('admin/companies')?'active':''}}"><a href="{{ url('admin/companies') }}">Company List</a></li>
        @endif 
        @if(request()->is('admin/company-profile/*') ||
            request()->is('admin/company-edit/*'))
        <li class="active"><a href="{{ (isset($id) && isset($pageno))?(url('admin/company-profile/'.$id.'/'.$pageno)):'' }}">Company Profile</a></li>
        @endif
        @if(request()->is('admin/company-edit/*'))
        <li class="active"><a href="">Update Company</a></li>
        @endif 
        @if(request()->is('admin/company/dashboard/*') ||
            request()->is('admin/company-service/*') ||
            request()->is('admin/service/edit/*') ||
            request()->is('admin/service/create/*') ||
            request()->is('admin/company-project/*') ||
            request()->is('admin/project/edit/*') ||
            request()->is('admin/project/create/*') ||
            request()->is('admin/project/*') ||
            request()->is('admin/company-product/*') ||
            request()->is('admin/product/edit/*') ||
            request()->is('admin/product/create/*') ||
            request()->is('admin/company/quotation/*') ||
            request()->is('admin/company/coin/*') ||
            request()->is('admin/company/package/*') ||
            request()->is('admin/company/buy-package/*'))
        <li class="active"><a href="{{ (isset($id) && isset($pageno))?(url('admin/company/dashboard/'.$id.'/'.$pageno)):'' }}">{{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Dashboard</a></li>
        @endif

        @if(request()->is('admin/company-service/*') ||
            request()->is('admin/service/edit/*') ||
            request()->is('admin/service/create/*'))
        <li class="active"><a href="{{ isset($id)?url('/admin/company-service/'.$id):'' }}">{{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Services</a></li>
        @endif
        @if(request()->is('admin/service/edit/*'))
        <li class="active"><a href="">Change {{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Services</a></li>
        @endif
        @if(request()->is('admin/service/create/*'))
        <li class="active"><a href="">Add New {{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Services</a></li>
        @endif

         @if(request()->is('admin/company-project/*') ||
            request()->is('admin/project/edit/*') ||
            request()->is('admin/project/create/*') ||
            request()->is('admin/project/*'))
        <li class="active"><a href="{{ isset($id)?url('/admin/company-project/'.$id):'' }}">{{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Project</a></li>
        @endif
         @if(request()->is('admin/project/*'))
         @php

         @endphp
        <li class="active"><a href="{{isset($project_id)?url('admin/project/'.$project_id.'/'. $pageno):''}}">{{isset($company_project->project_name)?(strlen($company_project->project_name)>20?substr($company_project->project_name,0,20).'...':$company_project->project_name):'' }} Project Detail</a></li>
        @endif 
        @if(request()->is('admin/project/edit/*'))
        <li class="active"><a href="">Change  
        {{isset($company_project->project_name)?(strlen($company_project->project_name)>20?substr($company_project->project_name,0,20).'...':$company_project->project_name):'' }} Project</a></li>
        @endif
        @if(request()->is('admin/project/create/*'))
        <li class="active"><a href="">Add New {{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Project</a></li>
        @endif
        


        @if(request()->is('admin/company-product/*') ||
            request()->is('admin/product/edit/*') ||
            request()->is('admin/product/create/*'))
        <li class="active"><a href="{{ isset($id)?url('/admin/company-product/'.$id):'' }}">{{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Product</a></li>
        @endif
        @if(request()->is('admin/product/edit/*'))
        <li class="active"><a href="">Change {{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Product</a></li>
        @endif
        @if(request()->is('admin/product/create/*'))
        <li class="active"><a href="" >Add New {{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Product</a></li>
        @endif

        @if(request()->is('admin/company/quotation/*'))
        <li class="active"><a href="" class="text-capitalize">{{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company {{isset($status)?$status:''}} Quotation List</a></li>
        @endif

        @if(request()->is('admin/company/coin/*'))
        <li class="active"><a href="" class="text-capitalize">{{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company {{isset($status)?$status:''}} Ordered Coin History</a></li>
        @endif

        @if(request()->is('admin/company/package/*') ||
            request()->is('admin/company/buy-package/*'))
        <li class="active"><a href="" class="text-capitalize">{{isset($name)?(strlen($name)>15?substr($name,0,15).'...':$name):''}} Company Ordered Package History</a></li>
        @endif

        @if(request()->is('admin/company/buy-package/*'))
        <li class="active"><a href="" class="text-capitalize">Seller Package List</a></li>
        @endif

        <!-- End Company List !-->

        <!-- Quotation History List -->
        @if(request()->is('admin/quotations/received'))
        <li class="active"><a href="" class="text-capitalize">Quotation History List</a></li>
        @endif
        <!-- End Quotation History List -->

         <!-- Coin History List -->
        @if(request()->is('admin/coinplan/history/2'))
        <li class="active"><a href="" class="text-capitalize">Coin History List</a></li>
        @endif
        <!-- End Coin History List -->

        <!-- Package History List -->
        @if(request()->is('admin/company/package'))
        <li class="active"><a href="" class="text-capitalize">Package History List</a></li>
        @endif
        <!-- End Package History List -->

        <!-- Company Category -->
         @if(request()->is('companycategory/index') ||
            request()->is('companycategory/edit/*') ||
            request()->is('companycategory'))
        <li class="active"><a href="{{ url('companycategory/index') }}">Company Category List</a></li>
        @endif
        @if(request()->is('companycategory/edit/*'))
        <li class="active"><a href="">Change Company Category</a></li>
        @endif
        @if(request()->is('companycategory'))
        <li class="active"><a href="" >Add New Company Category</a></li>
        @endif
        <!-- End Company Category -->

         <!-- Freelancer List !-->
        @if(request()->is('admin/freelancer_list'))
        <li class="{{request()->is('admin/freelancer_list')?'active':''}}"><a href="{{route('users.memberlist')}}">Freelancer List</a></li>
        @endif 
        <!-- End Freelancer List !-->

        <!-- Freelancer Feedback List !-->
        @if(request()->is('admin/freelancer/feedbacks'))
        <li class="{{request()->is('admin/freelancer/feedbacks')?'active':''}}"><a href="{{route('admin.freelancer.feedbacks')}}">Freelancer Feedback List</a></li>
        @endif 
        <!-- End Freelancer Feedback List !-->

         <!-- Freelancer Category List !-->
        @if(request()->is('freelancercategory/index'))
        <li class="{{request()->is('freelancercategory/index')?'active':''}}"><a href="{{ route('freelancercategory.index') }}">Freelancer Category List</a></li>
        @endif 
        <!-- End Freelancer Category List !-->

          <!-- Freelancer Status List !-->
        @if(request()->is('freelancerstatus/index'))
        <li class="{{request()->is('freelancerstatus/index')?'active':''}}"><a href="{{ route('freelancerstatus.index') }}">Freelancer Status List</a></li>
        @endif 
        <!-- End Freelancer Status List !-->

        <!-- Quotation History List !-->
        @if(request()->is('admin/quotations/requested'))
        <li class="{{request()->is('admin/quotations/requested')?'active':''}}"><a href="{{route('admin_company.quotation','requested')}}">Quotation History List</a></li>
        @endif
        <!-- End Quotation History List !-->

         <!-- Coin History List !-->
        @if(request()->is('admin/coinplan/history/1'))
        <li class="{{request()->is('admin/coinplan/history/1')?'active':''}}"><a href="{{ url('admin/coinplan/history/1') }}">Coin History List</a></li>
        @endif
        <!-- End Coin History List !-->

        <!-- Member List !-->
        @if(request()->is('admin/member_list'))
        <li class="{{request()->is('admin/member_list')?'active':''}}"><a href="{{route('users.memberlist')}}">Member List</a></li>
        @endif
        <!-- End Member List !-->

        <!-- Admin List !-->
        @if(request()->is('admin/admin_list') || request()->is('admin/add_admin') || request()->is('admin/functions/edit/*'))
        <li class="{{request()->is('admin/admin_list')?'active':''}}"><a href="{{route('users.adminlist')}}">Admin List</a></li>
        @endif
        @if(request()->is('admin/add_admin'))
          <li class="active"><a href="#">Add New Admin</a></li> 
        @endif
        @if(request()->is('admin/functions/edit/*'))
          <li class="active"><a href="#">Update Admin</a></li> 
        @endif 
        <!-- End Admin List !-->

         <!-- Advertising List !-->
        @if(request()->is('admin/advertisings') || request()->is('admin/new/advertising') || request()->is('admin/advertising/edit/*'))
        <li class="{{request()->is('admin/advertisings')?'active':''}}"><a href="{{route('admin.advertising.list')}}">Advertising List</a></li>
        @endif
        @if(request()->is('admin/new/advertising'))
         <li class="active"><a href="#">Add New Advertising</a></li>        
        @endif
        @if(request()->is('admin/advertising/edit/*'))
          <li class="active"><a href="#">Update Advertising</a></li> 
        @endif  
        <!-- End Advertising List !-->

         <!-- Advertising Package List !-->
        @if(request()->is('advertisingpackagelist/index') || request()->is('admin/new/advertising') || request()->is('advertisingpackagelist/edit/*'))
        <li class="{{request()->is('advertisingpackagelist/index')?'active':''}}"><a href="{{route('advertisingpackagelist.index')}}">Advertising Package List</a></li>
        @endif
        @if(request()->is('advertisingpackagelist/edit/*'))
          <li class="active"><a href="#">Update Advertising Package</a></li> 
        @endif  
        <!-- End Advertising Package List !-->

         <!-- Seller Package List !-->
        @if(request()->is('packageplans/index') || request()->is('packageplans/edit/*'))
        <li class="{{request()->is('packageplans/index')?'active':''}}"><a href="{{route('packageplans.index')}}">Seller Package List</a></li>
        @endif
        @if(request()->is('packageplans/edit/*'))
          <li class="active"><a href="#">Update Seller Package</a></li> 
        @endif  
        <!-- End Advertising Package List !-->

        <!-- Advertising Package List !-->
        @if(request()->is('companyadvertisinglist/index') || request()->is('companyadvertisinglist/create'))
        <li class="{{request()->is('companyadvertisinglist/index')?'active':''}}"><a href="{{route('companyadvertisinglist.index')}}">Company Advertising List</a></li>
        @endif
        @if(request()->is('companyadvertisinglist/create'))
          <li class="active"><a href="#">Add New Company Advertising</a></li> 
        @endif 
        <!-- End Advertising Package List !-->

         <!-- Company Advertising Plan List !-->
        @if(request()->is('companyadvertisingplan/index') || request()->is('companyadvertisingplan/edit/*'))
        <li class="{{request()->is('companyadvertisingplan/index')?'active':''}}"><a href="{{route('companyadvertisingplan.index')}}">Company Advertising Plan List</a></li>
        @endif
        @if(request()->is('companyadvertisingplan/edit/*'))
          <li class="active"><a href="#">Update Company Advertising Plan</a></li> 
        @endif 
        <!-- End Company Advertising Plan List !-->

        







        <!-- Blog List !-->
        @if(request()->is('blog-list') || request()->is('add/blog') || request()->is('blog/edit/*'))
        <li class="{{request()->is('blog-list')?'active':''}}"><a href="{{route('freelancer.blogs')}}">Blog List</a></li>
        @endif
        @if(request()->is('add/blog'))
         <li class="active"><a href="#">Add New Blog</a></li>        
        @endif
        @if(request()->is('blog/edit/*'))
          <li class="active"><a href="#">Update Blog</a></li> 
        @endif  
        <!-- End Blog List !-->

          <!-- Blog Category List !-->
        @if(request()->is('blogcategory/index') || request()->is('blogcategory') || request()->is('blogcategory/edit/*'))
        <li class="{{request()->is('blogcategory/index')?'active':''}}"><a href="{{route('blogcategory.index')}}">Blog Category List</a></li>
        @endif
        @if(request()->is('blogcategory'))
         <li class="active"><a href="#">Add New Blog Category</a></li>        
        @endif
        @if(request()->is('blogcategory/edit/*'))
          <li class="active"><a href="#">Update Blog Category</a></li> 
        @endif  
        <!-- End Blog Category List !-->


         <!-- Location !-->
        @if(request()->is('admin/location') || request()->is('admin/location/edit/*'))
        <li class="{{request()->is('admin/location')?'active':''}}"><a href="{{route('admin.location.index')}}">Location List</a></li>
        @endif
        @if(request()->is('admin/location/edit/*'))
          <li class="active"><a href="#">Update Location</a></li> 
        @endif  
        <!-- End Location !-->

        <!-- Range !-->
        @if(request()->is('range/index') || request()->is('range') || request()->is('range/edit/*'))
        <li class="{{request()->is('range/index')?'active':''}}"><a href="{{route('range.index')}}">Range List</a></li>
        @endif
        @if(request()->is('range'))
         <li class="active"><a href="#">Add New Range</a></li>        
        @endif
        @if(request()->is('range/edit/*'))
          <li class="active"><a href="#">Update Range</a></li> 
        @endif  
        <!-- End Range !-->

        <!-- Coin Plan !-->
        @if(request()->is('admin/coinplan') || request()->is('coinplannew') || request()->is('coinplans/edit/*'))
        <li class="{{request()->is('admin/coinplan')?'active':''}}"><a href="{{route('admin.coinplan.index')}}">Coin Plan List</a></li>
        @endif
        @if(request()->is('coinplannew'))
         <li class="active"><a href="#">Add New Coin Plan</a></li>        
        @endif
        @if(request()->is('coinplans/edit/*'))
          <li class="active"><a href="#">Update Coin Plan</a></li> 
        @endif  
        <!-- End Coin Plan !-->

         <!-- Coin Plan !-->
        @if(request()->is('currency-unit') || request()->is('currency-unit/create') || request()->is('currency-unit/edit/*'))
        <li class="{{request()->is('currency-unit')?'active':''}}"><a href="{{route('currency-unit.index')}}">Currency Unit List</a></li>
        @endif
        @if(request()->is('currency-unit/create'))
         <li class="active"><a href="#">Add New Currency Unit</a></li>        
        @endif
        @if(request()->is('currency-unit/edit/*'))
          <li class="active"><a href="#">Update Currency Unit</a></li> 
        @endif  
        <!-- End Coin Plan !-->

          <!-- Project Setting !-->
        @if(request()->is('projectsetting/edit'))
        <li class="{{request()->is('projectsetting/edit')?'active':''}}"><a href="{{route('projectsetting.edit')}}">Update Project Setting</a></li>
        @endif
       
        <!-- End Project Setting !-->

         <!-- Privacy  !-->
        @if(request()->is('privacy/edit'))
        <li class="{{request()->is('privacy/edit')?'active':''}}"><a href="{{route('privacy.edit')}}">Update Privacy</a></li>
        @endif       
        <!-- End Privacy !-->

        <!-- Term Of Service  !-->
        @if(request()->is('terms-of-service/edit'))
        <li class="{{request()->is('terms-of-service/edit')?'active':''}}"><a href="{{route('terms-of-service.edit')}}">Update Terms Of Service</a></li>
        @endif       
        <!-- End Term Of Service !-->

         <!-- About Us  !-->
        @if(request()->is('about-us/edit'))
        <li class="{{request()->is('about-us/edit')?'active':''}}"><a href="{{route('about-us.edit')}}">Update About Us</a></li>
        @endif       
        <!-- End Term Of Service !-->

         <!-- Advertise With Us  !-->
        @if(request()->is('advertise-with-us/edit'))
        <li class="{{request()->is('advertise-with-us/edit')?'active':''}}"><a href="{{route('advertise-with-us.edit')}}">Update Advertise With Us</a></li>
        @endif       
        <!-- End Advertise With Us !-->

        <!-- Daily Product Price !-->
        @if(request()->is('dailyproductprice/index') || request()->is('dailyproductprice') || request()->is('dailyproductprice/edit/*'))
        <li class="{{request()->is('dailyproductprice/index')?'active':''}}"><a href="{{route('dailyproductprice.index')}}">Daily Product Price List</a></li>
        @endif
        @if(request()->is('dailyproductprice'))
         <li class="active"><a href="#">Add New Daily Product Price</a></li>        
        @endif
        @if(request()->is('dailyproductprice/edit/*'))
          <li class="active"><a href="#">Update Daily Product Price</a></li> 
        @endif  
        <!-- End Daily Product Price !-->

        <!-- Myanbox Tube !-->
        @if(request()->is('myanboxtube/index') || request()->is('myanboxtube') || request()->is('myanboxtube/edit/*'))
        <li class="{{request()->is('myanboxtube/index')?'active':''}}"><a href="{{route('myanboxtube.index')}}">Myanbox Tube List</a></li>
        @endif
        @if(request()->is('myanboxtube'))
         <li class="active"><a href="#">New Myanbox Tube</a></li>        
        @endif
        @if(request()->is('myanboxtube/edit/*'))
          <li class="active"><a href="#">Update Myanbox Tube</a></li> 
        @endif  
        <!-- End Myanbox Tube !-->
         
        <!-- News !-->
        @if(request()->is('news/index') || request()->is('news') || request()->is('news/edit/*'))
        <li class="{{request()->is('news/index')?'active':''}}"><a href="{{route('news.index')}}">News List</a></li>
        @endif
        @if(request()->is('news'))
         <li class="active"><a href="#">Add News</a></li>        
        @endif
        @if(request()->is('news/edit/*'))
          <li class="active"><a href="#">Update News</a></li> 
        @endif  
        <!-- End News !-->

      </ol>
  </div>