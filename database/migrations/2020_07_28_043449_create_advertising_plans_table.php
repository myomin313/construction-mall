<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('advertising_plans'))){
        Schema::create('advertising_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price');
            $table->string('plan_name',100);
            $table->enum('is_active',['0','1'])->default('1');
            $table->integer('periods');
            $table->integer('created_by');
            $table->integer('update_by');
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
        Schema::dropIfExists('advertising_plans');
    }
}
