<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(!(Schema::hasTable('freelancers'))){
        Schema::create('freelancers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('facebook',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('website',255)->nullable();
            $table->string('googleplus',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->string('freelancer_url',255);
            $table->date('date_of_birth')->nullable();
            $table->string('nrc',50)->nullable();
            $table->text('address')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('current_work_status')->nullable();
            $table->text('description')->nullable();            
            $table->integer('total_experiences')->nullable();
            $table->integer('freelancer_status_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('freelancer_company')->nullable();
            $table->integer('category_id');
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
        Schema::dropIfExists('freelancers');
    }
}
