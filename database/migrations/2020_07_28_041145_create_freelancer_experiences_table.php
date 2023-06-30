<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    if(!(Schema::hasTable('freelancer_experiences'))){
        Schema::create('freelancer_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('position',100);
            $table->string('company');
            $table->integer('freelancer_id');
            $table->text('description')->nullable();
            $table->string('from_date',50);
            $table->string('to_date',50);
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
        Schema::dropIfExists('freelancer_experiences');
    }
}
