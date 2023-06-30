<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyAdvertisingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!(Schema::hasTable('company_company_advertising_plan'))){
        Schema::create('company_company_advertising_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('company_advertising_plan_id');
            $table->enum('is_active',['0','1'])->default('1');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('company_company_advertising_plan');
    }
}
