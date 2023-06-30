<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    if(!(Schema::hasTable('freelancer_skills'))){
        Schema::create('freelancer_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freelancer_id');            
            $table->integer('skill_id');
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
        Schema::dropIfExists('freelancer_skills');
    }
}
