<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!(Schema::hasTable('locations'))){
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->integer('parent_id')->default(0);
            $table->enum('is_active',['1','0'])->default(1);
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
        Schema::dropIfExists('locations');
    }
}
