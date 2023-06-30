<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('project_settings'))){
        Schema::create('project_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home_nav_first_background',50);
            $table->string('home_nav_second_background',50);
            $table->string('home_nav_front_color',50);
            $table->string('supplier_nav_first_background_and_icon',50);
            $table->string('supplier_nav_second_background',50);
            $table->string('supplier_nav_front_color',50);
            $table->string('service_nav_first_background_and_icon',50);
            $table->string('service_nav_second_background',50);
            $table->string('service_nav_font_color',50);
            $table->string('reno_nav_first_background_and_icon',50);
            $table->string('reno_nav_second_background',50);
            $table->string('reno_nav_font_color',50);
            $table->string('freelancer_nav_first_background_and_icon',50);
            $table->string('freelancer_nav_second',50);
            $table->string('freelancer_nav_font_color',50);
            $table->string('footer_background',50);
            $table->string('footer_font_color',50);
            $table->string('copyright_background',50);
            $table->string('copyright_font_color',50);
            $table->string('facebook_link',255);
            $table->string('instagram_link',255);
            $table->string('youtube_link',255);
            $table->string('pinterest_link',255);
            $table->string('linkedin_link',255);
            $table->string('website_mail',255);
            $table->string('website_name',255);
            $table->string('other_mail',255);            
            $table->string('phone',255);
            $table->string('address',100);
            $table->integer('user_login_coin');
            $table->integer('user_register_coin');
            $table->integer('company_register_coin');
            $table->integer('quotation_coin');
            $table->integer('company_login_coin');
            $table->string('member_default_logo',255);
            $table->string('freelancer_default_logo',255);
            $table->string('service_default_logo',255);
            $table->string('supplier_default_logo',255);
            $table->string('reno_default_logo',255);
            $table->string('service_default_background_image',255);

            $table->string('freelancer_detail_image',255);
            $table->string('supplier_default_background_image',255);
            $table->string('reno_default_background_image',255);
            $table->string('blog_nav_first_background_and_icon',50);
            $table->string('blog_nav_second_background',50);
            $table->string('blog_nav_font_color',50);
            $table->string('home_category_default_color',255);
            $table->string('service_list_image',255);
            $table->string('supplier_list_image',255);
            $table->string('reno_list_image',255);
            $table->string('freelancer_list_image',255);
            $table->string('blog_list_image',255);
            $table->string('privacy',255);
            $table->string('terms_and_condition',255);
            $table->text('about_us');
            $table->timestamps();
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_settings');
    }
}
