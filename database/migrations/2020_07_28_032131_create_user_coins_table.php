<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(!(Schema::hasTable('coin_plan_user'))){
        Schema::create('coin_plan_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('coin_plan_id');
            $table->enum('status',['pending','approved','rejected'])->default('pending');
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
        Schema::dropIfExists('coin_plan_user');
    }
}
