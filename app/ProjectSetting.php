<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'home_nav_first_background',
        'home_nav_second_background',
        'home_nav_font_color',
        'supplier_nav_first_background_and_icon',
        'supplier_nav_second_background',
        'supplier_nav_font_color',
        'service_nav_first_background_and_icon',
        'service_nav_second_background',
        'service_nav_font_color',
        'reno_nav_first_background_and_icon',
        'reno_nav_second_background',
        'reno_nav_font_color',
        'freelancer_nav_first_background_and_icon',
        'freelancer_nav_second',
        'freelancer_nav_font_color',
        'footer_background',
        'footer_font_color',
        'copyright_background',
        'copyright_font_color',
        'facebook_link',
        'instagram_link',
        'pinterest_link',
        'linkedin_link',
        'website_mail',
        'other_mail',
        'phone',
        'address',
        'user_login_coin',
        'user_register_coin',
        'company_register_coin',
        'quotation_coin',
        'company_login_coin',
        'created_at',
        'updated_at',
        'member_default_logo',
        'freelancer_default_logo',
        'service_default_logo',
        'supplier_default_logo',
        'reno_default_logo',
        'service_default_background_image',
        'freelancer_detail_image',
        'supplier_default_background_image',
        'reno_default_background_image',
        'home_category_default_color',
        'service_list_image',
        'reno_list_image',
        'freelancer_list_image',
        'blog_list_image',
        'privacy',
        'terms_and_condition',
        'admin_default_logo',
        'myanboxtube_list_image',
        'myanboxtube_default_image'
      ];


        
}
