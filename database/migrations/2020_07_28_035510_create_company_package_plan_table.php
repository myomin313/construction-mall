<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPackagePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('company_package_plan'))){
        Schema::create('company_package_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('package_plan_id');
            $table->enum('is_active',['0','1'])->default('1');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('approve',['Pending','Cancel','Success'])->default('Pending');
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
        Schema::dropIfExists('company_package_plan');
    }
}
