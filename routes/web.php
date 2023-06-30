<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/
// Route::get('/', function () {
//     return redirect('/home');
// });


Route::get('/storage-link', function () {
    $exitCode = \Artisan::call('storage:link');
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "yes";
    // return what you want
});
Route::get('/clear-config', function() {
    $exitCode = Artisan::call('config:clear');
    return "yes";
    // return what you want
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['isBlog']], function () {
     //freelancer blog //admin blog
Route::get('add/blog','Admin\BlogController@addBlog')->name('add.blog');
Route::post('add/blog','Admin\BlogController@createBlog')->name('add.blog');
Route::post('upload_blog','Admin\BlogController@blogimageCrop')->name('freelancer.croppie.upload-blog-image');
Route::any('blog-list','Admin\BlogController@blogList')->name('freelancer.blogs');
Route::get('blog/delete/{id}', ['as'=> 'freelancer.blog.delete', 'uses' => 'Admin\BlogController@deleteBlog']);
Route::get('blog/edit/{id}/{page}', ['as'=> 'freelancer.blog.edit', 'uses' => 'Admin\BlogController@editBlog']);
Route::post('blog/update/{id}','Admin\BlogController@updateBlog')->name('update.blog');
Route::post('blog/updatestatus','Admin\BlogController@updateBlogStatus')->name('blog.updatestatus');
Route::post('/blog/store-checkbox','Admin\BlogController@storesession')->name('blog.store-checkbox');
Route::post('/blog/deleteall','Admin\BlogController@deleteall')->name('blog.deleteall');
Route::any('admin/freelancer/feedbacks','Admin\FreelancerCommentController@feedbackList')->name('admin.freelancer.feedbacks');
});

Route::group(array('middleware' => 'auth'),function(){
    //multiple
Route::post('/projecttype','Admin\CompanyProjectController@getProjectType')->name('getProjectType');
Route::post('/getskill','Admin\FreelancerController@getskill')->name('getskill');
Route::post('crop-image', ['as'=>'croppie.upload-image','uses'=>'Admin\CompanyController@imageCrop']);
// Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
//image upload

/* Quotation Route */
// Route::get('company/received_quotation/{status}','Admin\QuotationController@receivedQuotationStatus')->name('company.quotation.status');
//myomin routes
// Route::get('/freelancer/dashboard','Admin\FreelancerController@dashboard')->name('freelancer.dashboard');

// feedback
// Route::any('/service-companies','HomeController@searchServicecompanies')->name('service-companies');
// Route::get('/supplier-companies/{category_id}','HomeController@suppliercompany');
// Route::any('/supplier-companies','HomeController@searchSuppliercompanies')->name('supplier-companies');
// Route::get('/renobusiness-companies/{category_id}','HomeController@renobusinesscompany');
// Route::any('/renobusiness-companies','HomeController@searchRenobusinesscompanies')->name('renobusiness-companies');
// Blog Category//

// Route::any('/blogcategory/search','Admin\BlogCategoryController@search')->name('blogcategory.search');
//Route::any('/blogcategory/search','Admin\BlogCategoryController@search')->name('blogcategory.search');
//Route::any('/supplier-companies/{category_id}','HomeController@suppliercompany');
//Route::any('/renobusiness-companies/{category_id}','HomeController@renobusinesscompany')->name('renobusinesscompany');

// Route::any('/companycategory/search','Admin\CompanyCategoryController@search')->name('companycategory.search');

  // may oo routes start
  ///user dashboard
  //User Route
//   Route::post('/company/upload_cover','Admin\CompanyController@companyCoverCrop')->name('company.croppie.upload-profile');
 // Route::post('/admin/upload_profile','Admin\UserController@adminprofileCrop')->name('admin.croppie.upload-profile');
    //Coin Plan Route

   //User Coin Route
//   Route::get('/usercoin/index','Admin\CoinPlanController@index')->name('usercoin.index');
//   Route::get('/usercoin/{id}/delete','Admin\UserCoinController@delete')->name('usercoin.delete');


 
//   Route::post('/quotation/detail','Admin\QuotationController@detail')->name('quotation.detail');
// start
Route::get('/coinplannew','Admin\CoinPlanController@new')->name('coinplan.new');
Route::post('/coinplanstore','Admin\CoinPlanController@store')->name('coinplan.store');
Route::post('/company/upload_logo','Admin\CompanyController@profileCropForCompany')->name('company.croppie.upload-profile');
Route::post('/user/upload_profile','Admin\UserController@profileCrop')->name('user.croppie.upload-profile');
 //change role by myommin
    Route::post('/admin/account','Admin\UserController@updateAccount')->name('admin.account.update');
   
});


Route::group(['middleware' => ['isAdminCompanyUser']], function () {
    
    //end
Route::get('company_quotation/{status}','Admin\QuotationController@quotation')->name('company.received.quotation');//company/admin/user
Route::post('quotation/updatestatus', 'Admin\QuotationController@updatestatus')->name('quotation.updatestatus');//company/admin/user
Route::post('quotation/updatereceivedstatus', 'Admin\QuotationController@updateReceivedStatus')->name('quotation.updatereceivedstatus');//company/admin/user
/* Package Plan route */
Route::post('package/store', 'Admin\PackagePlanController@store')->name('package.store');//company/admin/user
Route::get('package/history', 'Admin\PackagePlanController@history')->name('package.history');//company/admin/user
Route::get('coinplan/history', 'Admin\CoinPlanController@buyCoinhistory')->name('coinplan.history');//company/user/admin
//add new by myomin
Route::get('company/coinplan/history', 'Admin\CoinPlanController@buyCompanyCoinhistory')->name('company.coinplan.history');
//end
Route::get('user/coinplan/history', 'Admin\CoinPlanController@buyUserCoinhistory')->name('user.coinplan.history');//company/user/admin
 // Quotation Route
Route::get('user/quotation/{status}','Admin\QuotationController@quotation')->name('user.received.quotation');//admin/company
// start
Route::get('user/user-quotation/{status}','Admin\QuotationController@userquotation')->name('user.received.user_quotation');//user
// end
Route::post('/quotation/updatestatus','Admin\QuotationController@updatestatus')->name('quotation.updatestatus');//user//admin//company
Route::post('/quotation/updatestatusrequest','Admin\QuotationController@updatestatusrequest')->name('quotation.updatestatusrequest');//admin/user/company
Route::get('quotation/{status}','Admin\QuotationController@quotation')->name('received.quotation');//admin/company/user   
Route::post('company/{id}','Admin\CompanyController@update')->name('companies.update');
Route::post('company/update/{id}','Admin\CompanyController@profile_update')->name('companies.profile_update');

Route::get('package', 'Admin\PackagePlanController@index')->name('package.index');
});


Route::group(['middleware' => ['isCompanyUser']], function () {
    //user and company
Route::get('/user/index_changepassword','Admin\UserController@index_changepassword')->name('user.index_changepassword');
Route::get('company/change_password','Admin\UserController@company_changepassword')->name('company.change_password');
Route::get('/user/change_password','Admin\UserController@user_index_changepassword')->name('user.change_password');
Route::get('/usercoin/index_usedcoinhistory','Admin\CoinPlanController@index_usedcoinhistory')->name('usercoin.index_usedcoinhistory');//company/user
//Coin Plan Route
Route::get('coinplan','Admin\CoinPlanController@index')->name('coinplan.index');//company/user
Route::get('user/coinplan','Admin\CoinPlanController@buyuserCoinplan')->name('user.coinplan.index');//user/coinplan

Route::get('company/coinplan','Admin\CoinPlanController@buycompanyCoinplan')->name('company.coinplan.index');//company/coinplan

Route::post('coinplan/buycoin','Admin\CoinPlanController@buyCoin')->name('coinplan.buycoin');//company/user
Route::get('coinplan/usecoin','Admin\CoinPlanController@usedCoinHistory')->name('coinplan.usecoin');//company/user
});


$appRoutes = function() {
    
Route::get('/', 'HomeController@index')->name('home');
//Auth::routes();
//Process:: registering
Route::post('register','Auth\RegisterController@register')->name('do.register');
//Register Complete Page
Route::get('register/success','Auth\RegisterController@success')->name('register.success');

//Process::Send email to registerer.
Route::get('register/send_mail','Auth\RegisterController@sendMail')->name('register.send_mail');

//PRocess:: verify registerer.
Route::get('register/verify/email','Auth\RegisterController@verify')->name('register.verify.email');

Route::any("/login",'Auth\LoginController@login')->name('login');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/township','Admin\LocationController@getTownShip')->name('location.getTownship');
// Route::get('/home', 'HomeController@index')->name('home');
//Searching Home page
Route::get('/advanced_search/{keyword?}/{default_category_id?}/{category_id?}/{location?}', 'HomeController@advanced_search')->name('advanced_search');
Route::get('/search', 'HomeController@list_search')->name('search');
Route::get('/companies/{category_url?}','HomeController@servicecompany')->name('home.companies');
Route::get('/companies/{parent_url}/{category_url?}','HomeController@servicecompany');
Route::get('/service-companies/{category_id}','HomeController@servicecompany')->name('service-companies.category');
 Route::get('/supplier-companies/{category_id}','HomeController@suppliercompany')->name('supplier-companies.category');
 Route::get('/renobusiness-companies/{category_id}','HomeController@renobusinesscompany')->name('renobusiness-companies.category');
 
 Route::get('/servicecompanydetail/{category_url}/{company_url}','HomeController@servicecompanydetail')->name('servicecompanydetail');
Route::get('/suppliercompanydetail/{category_url}/{company_url}','HomeController@suppliercompanydetail')->name('suppliercompanydetail');
Route::get('/renobusinessdetail/{category_url}/{company_url}','HomeController@renobusinessdetail')->name('renobusinessdetail');
//myomin20062021
Route::get('/companydetail/{category_url}/{company_url}','HomeController@companydetail')->name('companydetail');
 Route::any('/blogs','HomeController@bloglist')->name('blogs');
//freelancer comments
  Route::post('/freelancercomments_add/{id}','HomeController@freelancercomments_add')->name('freelancercomments_add');
  Route::post('/freelancercomments_edit','HomeController@freelancercomments_edit')->name('freelancercomments_edit');
  Route::post('/freelancercomments_delete/{id}','HomeController@freelancercomments_delete')->name('freelancercomments_delete');
  Route::post('/freelancerrating/{id}','HomeController@freelancerrating')->name('freelancerrating');


    //Freelancer Route
 Route::any('/professionals','HomeController@freelancers')->name('professionals');
 Route::any('/professionals/{category_url}','HomeController@freelancersbycategory');
 Route::get('/professionals-detail/{freelancer_url}','HomeController@freelancerdetails')->name('freelancerdetails');
 
 Route::get('/freelancercomments_delete/{id}','HomeController@freelancercomments_delete')->name('freelancercomments_delete');
 Route::post('/freelancerrating/{id}','HomeController@freelancerrating')->name('freelancerrating');
 //Route::post('/update_freelancer_comment','HomeController@freelancercomments_edit')->name('freelancercomments_update');

 //Blog
// Route::any('/blogs','HomeController@bloglist')->name('blogs');
// Route::get('/blogssearch/{id}','HomeController@blogssearch')->name('blogssearch'); 
//company project
Route::get('project-detail/{main_company_url}/{category_url}/{company_url}/{project_url}','HomeController@projectDetail'); 
//blog by may oo

Route::get('/blogssearch/{category_url}','HomeController@blogssearch')->name('blogssearch');
Route::get('/blogs-detail/{blog_url}','HomeController@blogsdetail')->name('blogsdetail');
//Send Quotation
Route::get('/home/getChildCategory','HomeController@getChildCategory')->name('home.getChildCategory');
Route::any('/send_quotation_detail_form','HomeController@sendQuotationDetailForm')->name('company.send_quotation_detail_form');
Route::post('/send_quotation_data','HomeController@sendQuotationData')->name('company.send_quotation_data');
Route::any('/send_quotation_form','HomeController@sendQuotationForm')->name('company.send_quotation_form');
Route::post('/send_quotation','HomeController@sendQuotation')->name('company.send_quotation');
Route::post('/company_search','HomeController@CompanySearch')->name('company.search');
Route::post('/getCompany','HomeController@getCompany')->name('company.getCompany');

//contact us
Route::get('/contact','ContactController@contactUs')->name('contact-us');
Route::any('/send-feedback','ContactController@sendcontactUs')->name('contact');
Route::post('/service_company/send_quotation','HomeController@servicesendQuotation')->name('service_company.send_quotation');
//admin login

Route::get('/myanbox-tube','HomeController@Myanboxtube')->name('myanboxtube');


//start
Route::group(['middleware' => ['isFreelancer']], function () {
Route::get('/freelancer/update','Admin\FreelancerController@edit')->name('freelancer.edit');
Route::post('/freelancer/update','Admin\FreelancerController@update')->name('freelancer.update');
Route::post('/freelancer/upload_profile','Admin\FreelancerController@imageCrop')->name('freelancer.croppie.upload-image');
Route::post('/freelancer/upload_croopie_profile','Admin\FreelancerController@imagefreelancerCrop')->name('freelancer.croppie.upload-profile');
Route::get('/freelancer/getexperience','Admin\FreelancerController@getExperienceToUpdate')->name('freelancer.getexperience');
Route::get('/freelancer/geteducation','Admin\FreelancerController@getEducationToUpdate')->name('freelancer.geteducation');
Route::get('/freelancer/getskill','Admin\FreelancerController@getSkillToUpdate')->name('freelancer.getskill');
Route::get('/freelancer/getproject','Admin\FreelancerController@getProjectToUpdate')->name('freelancer.getproject');

Route::post('/freelancer/update_experience','Admin\FreelancerController@updateExperience')->name('freelancer.update_experience');
Route::post('/freelancer/update_education','Admin\FreelancerController@updateEducation')->name('freelancer.update_education');
Route::post('/freelancer/update_project','Admin\FreelancerController@updateProject')->name('freelancer.update_project');
Route::post('/freelancer/update_skill','Admin\FreelancerController@updateSkill')->name('freelancer.update_skill');

Route::get('freelancer/experience/delete/{id}', ['as'=> 'freelancer.experience.delete', 'uses' => 'Admin\FreelancerController@deleteExperience']);

Route::get('freelancer/skill/delete/{id}', ['as'=> 'freelancer.skill.delete', 'uses' => 'Admin\FreelancerController@deleteSkill']);
Route::get('freelancer/project/delete/{id}', ['as'=> 'freelancer.project.delete', 'uses' => 'Admin\FreelancerController@deleteProject']);
Route::get('freelancer/education/delete/{id}', ['as'=> 'freelancer.education.delete', 'uses' => 'Admin\FreelancerController@deleteEducation']);
Route::get('/freelancer/rates','Admin\FreelancerCommentController@RateList')->name('freelancer.rates');
Route::get('/freelancer/profile','Admin\FreelancerController@profile')->name('freelancer.profile');
Route::get('/freelancer/account','Admin\FreelancerController@account')->name('freelancer.account');
Route::get('/freelancer/feedbacks','Admin\FreelancerCommentController@feedbackList')->name('freelancer.feedbacks');
});
Route::group(['middleware' => ['isUser']], function () {
  Route::get('/user/index','Admin\UserController@index')->name('user.index'); 
  Route::get('/user/dashboard','Admin\UserController@dashboard')->name('user.dashboard');
  Route::any('/user/update','Admin\UserController@update')->name('user.update');
  Route::get('/user/edit','Admin\UserController@edit')->name('user.edit');
 // Route::get('/user/index_changepassword','Admin\UserController@index_changepassword')->name('user.index_changepassword');
  Route::post('/user/changepassword','Admin\UserController@updateAccount')->name('user.changepassword');
  Route::get('quotation', 'Admin\QuotationController@index')->name('quotation.index');
  Route::get('/usercoin/index_usercoinhistorylist','Admin\UserCoinController@index_usercoinhistorylist')->name('usercoin.index_usercoinhistorylist');
    Route::get('quotation','Admin\QuotationController@index')->name('quotation.index');//user
});
Route::group(['middleware' => ['isCompany']], function () {
    Route::post('/company/project/deleteall','Admin\CompanyProjectController@deleteall')->name('company.project.deleteall');
    // Company Route
Route::get('company', 'Admin\CompanyController@index')->name('companies.index');
Route::get('company/edit','Admin\CompanyController@edit')->name('companies.edit');
Route::get('company', 'Admin\CompanyController@profile')->name('companies.profile');
Route::get('company/dashboard', 'Admin\CompanyController@dashboard')->name('companies.dashboard');
//Service Route
Route::get('service/create', 'Admin\CompanyServiceController@create')->name('service.create');  
Route::post('service/store','Admin\CompanyServiceController@store')->name('service.store');
Route::any('service', 'Admin\CompanyServiceController@index')->name('service.index');
Route::get('service/{id}/{page}/edit','Admin\CompanyServiceController@edit')->name('service.edit');
Route::post('service/{id}','Admin\CompanyServiceController@update')->name('service.update');
// Route::get('service/{id}/{status}', 'Admin\CompanyServiceController@show')->name('service.show');
Route::get('service/destroy/{id}', 'Admin\CompanyServiceController@destroy')->name('service.destroy');
Route::post('/company/service/deleteall','Admin\CompanyServiceController@deleteall')->name('company.service.deleteall');
/* Product Route */
Route::get('product/create', 'Admin\CompanyProductController@create')->name('product.create');  
Route::post('product/store','Admin\CompanyProductController@store')->name('product.store');
Route::any('product', 'Admin\CompanyProductController@index')->name('product.index');
Route::get('product/{id}/{page}/edit','Admin\CompanyProductController@edit')->name('product.edit');
Route::get('product/{id}', 'Admin\CompanyProductController@show')->name('product.show');
Route::post('product/store-checkbox','Admin\CompanyProductController@storesession')->name('product.store-checkbox');
Route::post('product/deleteall','Admin\CompanyProductController@deleteall')->name('company.product.deleteall');
Route::get('product/destroy/{id}', 'Admin\CompanyProductController@destroy')->name('product.destroy');
Route::post('/admin/product/store-checkbox','Admin\CompanyProductController@storesession')->name('product.store-checkbox');
Route::post('product/{id}','Admin\CompanyProductController@update')->name('product.update');
/* Project Route */
Route::get('project/create', 'Admin\CompanyProjectController@create')->name('project.create');  
Route::post('project/store','Admin\CompanyProjectController@store')->name('project.store');
Route::any('project', 'Admin\CompanyProjectController@index')->name('project.index');
Route::get('project/{id}/edit','Admin\CompanyProjectController@edit')->name('project.edit');
Route::post('project/{id}','Admin\CompanyProjectController@update')->name('project.update');
Route::get('project/{id}/{page}', 'Admin\CompanyProjectController@show')->name('project.show');
Route::get('project/destroy/{id}', 'Admin\CompanyProjectController@destroy')->name('project.destroy');
// package plan
// Route::get('package', 'Admin\PackagePlanController@index')->name('package.index');
});







Route::get('/privacy-policy','HomeController@privacy')->name('privacy');
Route::get('/terms-and-service','HomeController@termsandservice')->name('terms-and-service');
Route::get('/advertise-with-us','HomeController@advertiseWithUs')->name('advertise-with-us');
Route::get('/about-us','HomeController@aboutUs')->name('about-us');

Route::get('/login/facebook','Auth\LoginController@redirectToFacebook')->name('social_login');
Route::get('/login/linkedin','Auth\LoginController@redirectToLinkedin')->name('linkedin_login');
Route::get('/login/google','Auth\LoginController@redirectToGoogle')->name('google_login');

Route::get('/login/google/callback_url', 'Auth\LoginController@handleGoogleCallback');

Route::get('/login/facebook/callback_url', 'Auth\LoginController@handleFacebookCallback');

Route::get('/login/linkedin/callback_url', 'Auth\LoginController@handleLinkedInCallback');

Route::post('/about-us/video/upload-image','Admin\AboutusController@uploadAboutVideoPhoto')->name('about-us.croppie.upload-blog-image');
//Route::get('Sitefinity/Authenticate/OpenID/signin-linkedin', 'Auth\LoginController@handleProviderCallback');
// myo min start
Route::get('/reset/mail/{role}','Auth\ResetPasswordController@resetView');
Route::post('/reset/password','Auth\ResetPasswordController@postReset')->name('reset.password');
Route::get('reset-password/{token}/{role}','Auth\ResetPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password','Auth\ResetPasswordController@submitResetPasswordForm')->name('reset.password.post');
 Route::get('/{company_url}','HomeController@companydetail')->name('companydetail');
};


Route::group(array('domain' => 'myanbox.com'), $appRoutes);
Route::group(array('domain' => 'myanbox.com.mm'), $appRoutes);


//start admin dashboard
Route::group(['domain' => 'admin.myanbox.com.mm'], function() {
    
    Route::get('/','Auth\LoginController@adminLoginForm');
    Route::get('/admin/login','Auth\LoginController@adminLoginForm');
Route::post('/admin/login','Auth\LoginController@adminLogin')->name('admin.login');

    Route::group(['middleware' => ['isAdmin']], function () {
    Route::any('admin/freelancer/feedbacks/search','Admin\FreelancerCommentController@feedbackListSearch')->name('admin.freelancer.feedbacks.search');
// blog category    
Route::get('/blogcategory','Admin\BlogCategoryController@create')->name('blogcategory.create');
Route::post('/blogcategorystore/store','Admin\BlogCategoryController@store')->name('blogcategory.store');
Route::any('/blogcategory/index','Admin\BlogCategoryController@index')->name('blogcategory.index');
Route::get('/blogcategory/edit/{id}/{pageno}','Admin\BlogCategoryController@edit')->name('blogcategory.edit');
Route::post('/blogcategorystore/update/{id}','Admin\BlogCategoryController@update')->name('blogcategory.update');
Route::post('/blogcategory/updatestatus','Admin\BlogCategoryController@updateStatus')->name('blogcategory.updatestatus');
// admin company category
Route::get('/companycategory','Admin\CompanyCategoryController@create')->name('companycategory.create');
Route::post('/companycategorystore/store','Admin\CompanyCategoryController@store')->name('companycategory.store');
Route::any('/companycategory/index','Admin\CompanyCategoryController@index')->name('companycategory.index');
Route::get('/companycategory/edit/{id}/{page}','Admin\CompanyCategoryController@edit')->name('companycategory.edit');
Route::post('/companycategorystore/update/{id}','Admin\CompanyCategoryController@update')->name('companycategory.update');
Route::post('/admin/companycategory/updatestatus','Admin\CompanyCategoryController@updatestatus')->name('admin.companycategory.updatestatus');
//freelancer category CRUD
Route::any('/freelancercategory/search','Admin\FreelancerCategoryController@search')->name('freelancercategory.search');
Route::get('/freelancercategory','Admin\FreelancerCategoryController@create')->name('freelancercategory.create');
Route::post('/freelancercategory/store','Admin\FreelancerCategoryController@store')->name('freelancercategory.store');
Route::get('/freelancercategory/index','Admin\FreelancerCategoryController@index')->name('freelancercategory.index');
Route::get('/freelancercategory/edit/{id}/{page}','Admin\FreelancerCategoryController@edit')->name('freelancercategory.edit');
Route::post('/freelancercategory/update/{id}','Admin\FreelancerCategoryController@update')->name('freelancercategory.update');
//myanboxtube CRUD
//Route::any('/myanboxtube/search','Admin\MyanBoxTubeController@search')->name('myanboxtube.search');
Route::get('/myanboxtube','Admin\MyanBoxTubeController@create')->name('myanboxtube.create');
Route::post('/myanboxtube/store','Admin\MyanBoxTubeController@store')->name('myanboxtube.store');
Route::any('/myanboxtube/index','Admin\MyanBoxTubeController@index')->name('myanboxtube.index');
Route::get('/myanboxtube/edit/{id}/{page}','Admin\MyanBoxTubeController@edit')->name('myanboxtube.edit');
Route::post('/myanboxtube/update/{id}','Admin\MyanBoxTubeController@update')->name('myanboxtube.update');
Route::get('/myanboxtube/destroy/{id}','Admin\MyanBoxTubeController@destroy')->name('myanboxtube.destroy');
Route::post('/myanboxtube/updatestatus/','Admin\MyanBoxTubeController@updatestatus')->name('myanboxtube.updatestatus');
Route::post('/myanboxtube/store-checkbox','Admin\MyanBoxTubeController@storesession')->name('myanboxtube.store-checkbox');
Route::post('/myanboxtube/deleteall','Admin\MyanBoxTubeController@deleteall')->name('myanboxtube.deleteall');
// daily product price CRUD
// Route::any('/dailyproductprice/search','Admin\DailyproductpriceController@search')->name('dailyproductprice.search');
Route::get('/dailyproductprice','Admin\DailyproductpriceController@create')->name('dailyproductprice.create');
Route::post('/dailyproductprice/store','Admin\DailyproductpriceController@store')->name('dailyproductprice.store');
Route::any('/dailyproductprice/index','Admin\DailyproductpriceController@index')->name('dailyproductprice.index');
Route::get('/dailyproductprice/edit/{id}/{page}','Admin\DailyproductpriceController@edit')->name('dailyproductprice.edit');
Route::post('/dailyproductprice/update/{id}','Admin\DailyproductpriceController@update')->name('dailyproductprice.update');
Route::get('/dailyproductprice/destroy/{id}','Admin\DailyproductpriceController@destroy')->name('dailyproductprice.destroy');
Route::post('/dailyproductprice/store-checkbox','Admin\DailyproductpriceController@storesession')->name('dailyproductprice.store-checkbox');
Route::post('/dailyproductprice/deleteall','Admin\DailyproductpriceController@deleteall')->name('dailyproductprice.deleteall');
Route::any('/admin/companies','Admin\CompanyController@companiesForAdmin')->name('admin.companies');
// Route::any('/admin/companies/search','Admin\CompanyController@companiessearchForAdmin')->name('admin.companies.search');
Route::get('/admin/service-companies/{id}','Admin\CompanyController@servicecompanies')->name('admin.service-companies');
Route::get('/admin/company-edit/{id}','Admin\CompanyController@editcompanybyadmin');
Route::get('/admin/company-profile/{id}/{page}','Admin\CompanyController@viewcompanyprofilebyadmin');
//company project by admin
//Route::any('/admin/company-project/{id}','Admin\CompanyProjectController@viewcompanyprojectbyadmin');
Route::any('/admin/company-project/{id}','Admin\CompanyProjectController@index')->name('admin.company.project');
Route::any('/admin/company-product/{id}','Admin\CompanyProductController@index');
Route::get('/admin/project/create/{id}','Admin\CompanyProjectController@createcompanyprojectbyadmin');
Route::post('/admin/project/store','Admin\CompanyProjectController@store')->name('admin.project.store');
Route::get('admin/project/edit/{id}', ['as'=> 'admin.project.edit', 'uses' => 'Admin\CompanyProjectController@edit']);
Route::post('admin/project/update/{id}', ['as'=> 'admin.project.update', 'uses' => 'Admin\CompanyProjectController@update']);
//company product by admin
//Route::get('/admin/company-product/{id}','Admin\CompanyProductController@index');
Route::get('/admin/product/create/{id}','Admin\CompanyProductController@createcompanyproductbyadmin');
Route::post('/admin/product/store','Admin\CompanyProductController@store')->name('admin.product.store');
Route::get('admin/product/edit/{id}/{page}', ['as'=> 'admin.product.edit', 'uses' => 'Admin\CompanyProductController@edit']);
Route::post('admin/product/update/{id}', ['as'=> 'admin.product.update', 'uses' => 'Admin\CompanyProductController@update']);
Route::post('/admin/product/deleteall','Admin\CompanyProductController@deleteall')->name('product.deleteall');
//company product by admin
Route::any('/admin/company-service/{id}','Admin\CompanyServiceController@index');
//Route::get('/admin/company-service/{id}','Admin\CompanyServiceController@index');

Route::get('/admin/service/create/{id}','Admin\CompanyServiceController@createcompanyservicebyadmin');
Route::post('/admin/service/store','Admin\CompanyServiceController@store')->name('admin.service.store');
Route::get('/admin/service/edit/{id}/{page}', ['as'=> 'admin.service.edit', 'uses' => 'Admin\CompanyServiceController@edit']);
Route::post('/admin/service/update/{id}', ['as'=> 'admin.service.update', 'uses' => 'Admin\CompanyServiceController@update']);
Route::post('/admin/service/store-checkbox','Admin\CompanyServiceController@storesession')->name('service.store-checkbox');
Route::post('/admin/service/deleteall','Admin\CompanyServiceController@deleteall')->name('service.deleteall');
//company quotations by admin
Route::any('/admin/quotations/{status}','Admin\QuotationController@admincompanyQuotation')->name('admin_company.quotation');
Route::any('/company/request/coin/history', 'Admin\CoinPlanController@requestCoinhistoryForCompanyByAdmin')->name('admin.company.request.coin');
// Route::any('/company/request/coin/history/search', 'Admin\CoinPlanController@requestCoinhistorySearchForCompanyByAdmin')->name('admin.company.request.coin.search');
//company request package by admin
Route::any('/admin/company/package','Admin\PackagePlanController@admincompanyPackage')->name('admin.company.request.package');

Route::any('/admin/company/updatestatus','Admin\CompanyController@admincompanyUpdateStatus')->name('admin.company.updatestatus');
//advertising by admin
Route::get('/admin/new/advertising','Admin\AdvertisingPlanController@newAdvertising')->name('admin.advertising.new');
Route::post('/admin/new/advertising_photo','Admin\AdvertisingPlanController@imageCrop')->name('admin.croppie.upload-advertising-image');
Route::post('/admin/add/advertising','Admin\AdvertisingPlanController@storeAdvertising')->name('admin.add.advertising');
Route::any('/admin/advertisings','Admin\AdvertisingPlanController@Advertisings')->name('admin.advertising.list');
Route::get('/admin/advertising/edit/{id}/{page}','Admin\AdvertisingPlanController@editAdvertising')->name('admin.advertising.edit');
Route::get('/admin/advertising/delete/{id}','Admin\AdvertisingPlanController@deleteAdvertising')->name('admin.advertising.delete');
Route::post('/admin/advertising/update/{id}','Admin\AdvertisingPlanController@updateAdvertising')->name('admin.advertising.update');
Route::post('/admin/advertising/store-checkbox','Admin\AdvertisingPlanController@storesession')->name('advertising.store-checkbox');
Route::post('/admin/advertising/deleteall','Admin\AdvertisingPlanController@deleteall')->name('advertising.deleteall');
Route::post('/admin/advertising/updatestatus','Admin\AdvertisingPlanController@updateAdvertisingStatus')->name('admin.advertising.updatestatus');
Route::get('/admin/company/dashboard/{id}/{page}','Admin\CompanyController@companyDashboardByAdmin')->name('admin.company.dashboard');
 // start advertising
Route::any('/companyadvertisinglist/index','Admin\CompanyAdvertisingListController@index')->name('companyadvertisinglist.index');
Route::post('/companyadvertisinglist/updatestatus','Admin\CompanyAdvertisingListController@updateAdvertisingStatus')->name('companyadvertisinglist.updatestatus');
Route::get('/companyadvertisingplan/index','Admin\CompanyAdvertisingPlanListController@index')->name('companyadvertisingplan.index');
Route::get('/companyadvertisingplan/edit/{id}','Admin\CompanyAdvertisingPlanListController@edit')->name('companyadvertisingplan.edit');
Route::post('/companyadvertisingplan/update/{id}','Admin\CompanyAdvertisingPlanListController@update')->name('companyadvertisingplan.update');
Route::get('/freelancerstatus/index','Admin\FreelancerStatusListController@index')->name('freelancerstatus.index');
Route::post('/freelancerstatus/updatestatus','Admin\FreelancerStatusListController@updatefreelancerStatus')->name('admin.freelancer_status.updatestatus');
Route::get('/projectsetting/edit','Admin\UpdateProjectSettingController@edit')->name('projectsetting.edit');
Route::post('/projectsetting/update','Admin\UpdateProjectSettingController@update')->name('projectsetting.update');
//start project show 
Route::get('admin/project/{id}/{page}', 'Admin\CompanyProjectController@adminprojectshow')->name('admin.project.show');
Route::get('admin/product/destroy/{id}/{company_id}', 'Admin\CompanyProductController@adminproductdestroy')->name('admin.product.destroy');
Route::get('admin/project/destroy/{id}/{company_id}', 'Admin\CompanyProjectController@adminprojectdestroy')->name('admin.project.destroy');
Route::get('admin/service/destroy/{id}/{company_id}', 'Admin\CompanyServiceController@adminservicedestroy')->name('admin.service.destroy');
Route::post('/admin/project/store-checkbox','Admin\CompanyProjectController@storesession')->name('project.store-checkbox');
Route::post('/admin/project/deleteall','Admin\CompanyProjectController@deleteall')->name('project.deleteall');
//location
// Route::any('/location/search','Admin\LocationController@search')->name('location.search');
Route::any('admin/location/','Admin\LocationController@adminlocationindex')->name('admin.location.index');
Route::get('/admin/location/edit/{id}/{page}','Admin\LocationController@edit')->name('location.edit');
Route::post('/admin/location/update/{id}','Admin\LocationController@update')->name('location.update');
Route::post('/location/updatestatus','Admin\LocationController@updateStatus')->name('admin.location.updatestatus');
//admin ranges
Route::get('/range','Admin\RangeController@create')->name('range.create');
Route::post('/range/store','Admin\RangeController@store')->name('range.store');
Route::get('/range/index','Admin\RangeController@index')->name('range.index');
Route::get('/range/edit/{id}/{page}','Admin\RangeController@edit')->name('range.edit');
Route::post('/range/update/{id}','Admin\RangeController@update')->name('range.update');
Route::post('admin/range/updatestatus','Admin\RangeController@updatestatus')->name('admin.range.updatestatus');
//advertising package plan by may thu aye
Route::get('/advertisingpackagelist/index','Admin\AdvertisingPackageListController@index')->name('advertisingpackagelist.index');
Route::get('/advertisingpackagelist/edit/{id}','Admin\AdvertisingPackageListController@edit')->name('advertisingpackagelist.edit');
Route::post('/advertisingpackagelist/update/{id}','Admin\AdvertisingPackageListController@update')->name('advertisingpackagelist.update');
Route::get('/advertisingpackagelist/destroy/{id}','Admin\AdvertisingPackageListController@destroy')->name('advertisingpackagelist.destroy');
//packageplan by may thu aye
Route::get('/packageplans/index','Admin\PackagePlanController@packageplanlistbyadmin')->name('packageplans.index');
Route::get('/packageplans/edit/{id}','Admin\PackagePlanController@edit')->name('packageplans.edit');
Route::post('/packageplans/update/{id}','Admin\PackagePlanController@update')->name('packageplans.update');
Route::get('/packageplans/destroy/{id}','Admin\PackagePlanController@destroy')->name('packageplans.destroy');
//Admin CRUD Route
Route::get('/admin/add_admin/','Admin\UserController@create')->name('users.createadmin');
Route::post('/admin/store_admin','Admin\UserController@store')->name('users.storeadmin');
Route::any('/admin/admin_list','Admin\UserController@userTypeList')->name('users.adminlist');
Route::get('/admin/edit_admin/{id}','Admin\UserController@editAdmin')->name('users.editadmin');
Route::post('/admin/update_admin/','Admin\UserController@updateAdmin')->name('users.updateadmin');
//Freelancer List Route
Route::any('/admin/freelancer_list','Admin\UserController@userTypeList')->name('users.freelancerlist');
Route::get('admin/freelancer/detail/{id}','Admin\FreelancerController@profile_by_admin')->name('admin.freelancer.detail');
Route::post('admin/freelancer/updatestatus','Admin\FreelancerCommentController@adminfreelancerUpdateStatus')->name('admin.freelancer.updatestatus');
//Member List Route
Route::any('/admin/member_list','Admin\UserController@userTypeList')->name('users.memberlist');
//Quotation List
Route::get('/admin/quotation/{status}','Admin\QuotationController@quotation')->name('admin.quotation');
//Coin List
Route::any('/admin/coinplan/history/{role}', 'Admin\CoinPlanController@requestCoinhistoryForUserByAdmin')->name('admin.coinplan.history');
Route::post('/admin/quotation/updatestatus', 'Admin\QuotationController@updatestatus')->name('coin.updatestatus');
//User Change Status Route
Route::post('admin/updatestatus', 'Admin\UserController@updatestatus')->name('users.updatestatus');
Route::post('admin/packageplan/updateapprove', 'Admin\PackagePlanController@updateapprove')->name('admin.packageplan.updateapprove');
//admin blog
Route::get('/admin/functions/edit/{id}/{page}', 'Admin\UserfunctionController@editUserFunctionsbyadmin')->name('users.functions.admin');
Route::post('/admin/functions/update/{id}', ['as'=> 'users.functions.update', 'uses' => 'Admin\UserfunctionController@updateUserFunctionsbyadmin']);

//start news by may thu aye
//Route::any('/news/search','Admin\NewsController@search')->name('news.search');
Route::get('/news','Admin\NewsController@create')->name('news.create');
Route::post('/news/store','Admin\NewsController@store')->name('news.store');
Route::any('/news/index','Admin\NewsController@index')->name('news.index');
Route::get('/news/edit/{id}/{page}','Admin\NewsController@edit')->name('news.edit');
Route::post('/news/update/{id}','Admin\NewsController@update')->name('news.update');
Route::get('/news/destroy/{id}','Admin\NewsController@destroy')->name('news.destroy');
Route::post('/news/store-checkbox','Admin\NewsController@storesession')->name('news.store-checkbox');
Route::post('/news/deleteall','Admin\NewsController@deleteall')->name('news.deleteall');
Route::get('/company/active_quotation','Admin\CompanyController@updateActiveQuotation')->name('company.active_quotation');

Route::get('/admin/privacy','Admin\PrivacyController@privacyViewByAdmin')->name('admin.privacy');
Route::get('/privacy/edit','Admin\PrivacyController@editPrivacyByAdmin')->name('privacy.edit');
Route::post('/privacy/update','Admin\PrivacyController@updatePrivacy')->name('privacy.update');
Route::get('/admin/terms-of-service','Admin\TermsServiceController@termOfServiceViewByAdmin')->name('admin.terms-of-service');
Route::get('/terms-of-service/edit','Admin\TermsServiceController@editTermOfServiceByAdmin')->name('terms-of-service.edit');
Route::post('/terms-of-service/update','Admin\TermsServiceController@updateTermsOfService')->name('terms-of-service.update');
Route::post('/terms-of-service/upload-image','Admin\TermsServiceController@uploadtermsofservicePhoto')->name('terms-of-service.croppie.upload-blog-image');

Route::get('/admin/advertise-with-us','Admin\AdvertisewithusController@advertisewithusViewByAdmin')->name('admin.advertise-with-us');
Route::get('/advertise-with-us/sponsorship','Admin\AdvertisewithusController@advertisewithusSponsorViewByAdmin')->name('advertise-with-us.sponsorship');
Route::get('/advertise-with-us/benefits','Admin\AdvertisewithusController@advertisewithusBenefitsViewByAdmin')->name('advertise-with-us.benefits');
Route::get('/advertise-with-us/edit','Admin\AdvertisewithusController@editAdvertiseWithUsByAdmin')->name('advertise-with-us.edit');
Route::get('/advertise-with-us/benefits/edit','Admin\AdvertisewithusController@editAdvertiseWithUsBenefitByAdmin')->name('advertise-with-us.benefit.edit');
Route::post('/advertise-with-us/update','Admin\AdvertisewithusController@updateAdvertiseWithUsByAdmin')->name('advertise-with-us.update');
Route::post('/advertise-with-us/benefit/update/{id}','Admin\AdvertisewithusController@updateAdvertiseWithUsBenefit')->name('advertise-with-us.benefit.update');
Route::post('/advertise-with-us/upload-image','Admin\AdvertisewithusController@uploadAdvertiseWithUsPhoto')->name('advertise-with-us.croppie.upload-image');
Route::post('/advertise-with-us/upload-analyse-image','Admin\AdvertisewithusController@uploadAdvertiseWithUsAnalysePhoto')->name('advertise.croppie.upload-analyse-image');
Route::post('/advertise/upload-image','Admin\AdvertisewithusController@uploadAdvertiseHeaderPhoto')->name('advertise.croppie.upload-blog-image');//end
Route::get('/advertise-with-us/edit','Admin\AdvertisewithusController@editAdvertiseWithUsByAdmin')->name('advertise-with-us.edit');
Route::post('/advertise-with-us/update','Admin\AdvertisewithusController@updateAdvertiseWithUsByAdmin')->name('advertise-with-us.update');
Route::post('/privacy/upload-image','Admin\PrivacyController@uploadPrivacyPhoto')->name('privacy.croppie.upload-blog-image');//start about us
Route::get('/admin/about-us','Admin\AboutusController@getAboutUs')->name('admin.about-us');
Route::post('/about-us/update','Admin\AboutusController@updateAboutUs')->name('about-us.update');
Route::get('/about-us/edit','Admin\AboutusController@editAboutusByAdmin')->name('about-us.edit');
//this is end
Route::post('/about-us/upload-image','Admin\AboutusController@uploadAboutUsPhoto')->name('about-us.croppie.upload-image');
Route::post('importExcel', 'Admin\CompanyController@importExcel');
//buy coin
Route::get('admin/company-buy-coin/{id}/{status}/{page}','Admin\CoinPlanController@tobuycoinByAdmin');//admin
Route::post('admin/coinplan/buycoin','Admin\CoinPlanController@buyCoinByAdmin')->name('admin.coinplan.buycoin');//admin
//start
Route::get('admin/company/quotation/{id}/{status}','Admin\QuotationController@admincompanyQuotationForCompany');
Route::get('admin/company/coin/{id}','Admin\CoinPlanController@adminCoinForCompany');
Route::post('/admin/request/coin/update','Admin\CoinPlanController@updateRequestCoin')->name('admin.request.coin.update');
Route::get('admin/company/package/{id}','Admin\PackagePlanController@packageListsOfcompanyByAdmin');
//admin coinplan
Route::get('admin/coinplan','Admin\CoinPlanController@admincoinplanindex')->name('admin.coinplan.index');
Route::get('/coinplans/edit/{id}/{page}','Admin\CoinPlanController@edit')->name('coinplanlist.edit');
Route::post('/coinplans/update/{id}','Admin\CoinPlanController@update')->name('coinplanlist.update');
Route::get('/coinplans/destroy/{id}','Admin\CoinPlanController@destroy')->name('coinplanlist.destroy');
Route::post('/coinplan/updatestatus','Admin\CoinPlanController@updateCoinPlanStatus')->name('admin.coinplan.updatestatus');
// end
Route::get('/admin/account','Admin\UserController@account')->name('admin.account');
//  Route::get('/coinplan/index','Admin\CoinPlanController@index')->name('coinplan.index');
  Route::get('/coinplan/{id}/create','Admin\CoinPlanController@create')->name('coinplan.create');//admin
  //send mail
  Route::get('quotation-mail-send/{id}/{page}','Admin\QuotationController@sendQuotationMail');
  
  Route::get('/companyadvertisinglist/create','Admin\CompanyAdvertisingListController@create')
->name('companyadvertisinglist.create');
Route::post('/companyadvertisinglist/store','Admin\CompanyAdvertisingListController@store')
->name('companyadvertisinglist.store');
//myomin added 
 Route::get('/admin/company/buy-package/{id}','Admin\PackagePlanController@buypackages')->name('admin.buy-package');
  Route::post('admin/company/package/store', 'Admin\PackagePlanController@adminpackagestoreforCompany')->name('admin.company.package.store');//company/admin/user
  
Route::resource('currency-unit','Admin\CurrencyUnitController');
Route::get('/currency-unit/edit/{id}/{page}','Admin\CurrencyUnitController@edit')->name('admin.currency-unit.edit');
Route::post('/currency-unit/update-status','Admin\CurrencyUnitController@updateStatus')->name('admin.currency-unit.update-status');

});

});

Route::post('/summernote/upload','Admin\BlogController@summernoteUpload')->name('summernote.upload');
//end


