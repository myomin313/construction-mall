<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('freelancer_educations'))){
        Schema::create('freelancer_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('education_level',100);
            $table->string('from_date',50);
            $table->string('to_date',50);
            $table->string('university',100);
            $table->integer('freelancer_id');
            $table->string('country',100);
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
        Schema::dropIfExists('freelancer_educations');
    }
}
