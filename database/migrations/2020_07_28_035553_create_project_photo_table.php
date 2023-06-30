<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('project_photos'))){
        Schema::create('project_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_project_id');
            $table->string('photo',225);
            $table->string('image_title',100);
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('project_photos');
    }
}
