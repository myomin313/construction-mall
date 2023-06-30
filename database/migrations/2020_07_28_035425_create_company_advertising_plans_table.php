<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyAdvertisingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(!(Schema::hasTable('company_advertising_plans'))){
        Schema::create('company_advertising_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_name',100);
            $table->integer('periods');
            $table->integer('price');
            $table->enum('is_active',['0','1'])->default('1');
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
        Schema::dropIfExists('company_advertising_plans');
    }
}
