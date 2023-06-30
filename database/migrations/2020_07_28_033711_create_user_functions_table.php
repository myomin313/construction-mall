<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(!(Schema::hasTable('user_functions'))){
        Schema::create('user_functions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('function_id');
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
        Schema::dropIfExists('user_functions');
    }
}
