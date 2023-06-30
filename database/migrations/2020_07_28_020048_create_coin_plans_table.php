<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    
        if(!(Schema::hasTable('coin_plans'))){
        Schema::create('coin_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coin_count');
            $table->decimal('price',10,4);        
            $table->enum('is_active',['1','0'])->default('1');          
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
        Schema::dropIfExists('coin_plans');
    }
}
