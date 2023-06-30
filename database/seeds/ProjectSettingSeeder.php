<?php

use Illuminate\Database\Seeder;
use App\ProjectSetting;

class ProjectSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         ProjectSetting::create([
            'home_nav_first_background'=>'#ffcc00',
            'home_nav_second_background'=>'#ffcc00',
            'home_nav_front_color'=>'#ffffff',
            'supplier_nav_first_background_and_icon'=>'#ffcc00',
            'supplier_nav_second_background'=>'#ffcc00',
            'supplier_nav_front_color'=>'#ffffff',
            'service_nav_first_background_and_icon'=>'#ffcc00',
            'service_nav_second_background'=>'#ffcc00',
            'service_nav_font_color'=>'#ffffff',
            'reno_nav_first_background_and_icon'=>'#ffcc00',
            'reno_nav_second_background'=>'#ffcc00',
            'reno_nav_font_color'=>'#ffffff',
            'freelancer_nav_first_background_and_icon'=>'#ffcc00',
            'freelancer_nav_second'=>'#ffcc00',
            'freelancer_nav_font_color'=>'#ffffff',
            'footer_background'=>'#ffcc00',
            'footer_font_color'=>'#ffffff',
            'copyright_background'=>'#ffcc00',
            'copyright_font_color'=>'#ffcc00',
            'facebook_link'=>'https://web.facebook.com/',
            'instagram_link'=>'https://www.instagram.com/?hl=en',
            'pinterest_link'=>'https://www.pinterest.com/',
            'linkedin_link'=>'https://www.linkedin.com/',
            'website_mail'=>'customercare@msquaremyanmar.com',
            'other_mail'=>'customercare@msquaremyanmar.com',
            'phone'=>'+959256 999918',
            'address'=>'No.252, Khayae Myaing Street,VIp-3, Thuwunna Township, Yangon',
            'user_login_coin'=>100,
            'user_register_coin'=>1000,
            'company_register_coin'=>10000,
            'quotation_coin'=>200,
            'company_login_coin'=>100,
            'about_us'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet, massa ac ornare feugiat, nunc dui auctor ipsum, sed posuere eros sapien id quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet,Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'created_at'=>date("Y-m-d H:m:i"),
            'updated_at'=>date("Y-m-d H:m:i")

        ]);
    }
}
