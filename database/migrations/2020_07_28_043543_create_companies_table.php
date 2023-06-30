<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!(Schema::hasTable('companies'))){
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');            
            $table->string('company_url',255);
            $table->integer('location_id')->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('website',255)->nullable();
            $table->string('googleplus',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->text('description')->nullable();
            $table->text('service')->nullable();
            $table->text('vission')->nullable();
            $table->text('address')->nullable();
            $table->string('phone',100)->nullable();
            $table->string('cover_photo',255)->nullable();
            $table->enum('is_active',['1','0'])->default('1');
            $table->integer('view_count')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');            
            $table->integer('active_package_plan_id')->nullable();
            $table->string('business_opening_hours',100)->nullable();
            $table->string('business_closing_hours',100)->nullable();
            $table->string('business_days',100)->nullable();
            $table->enum('renobusiness_slide',['1','0'])->default('0');
            $table->enum('active_quotation',['1','0'])->default('0');
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
        Schema::dropIfExists('companies');
    }
}
