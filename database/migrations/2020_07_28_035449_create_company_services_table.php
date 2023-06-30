<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if(!(Schema::hasTable('company_services'))){
        Schema::create('company_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name',100);
            $table->integer('company_id');
            $table->text('service_detail')->nullable();
            $table->string('image_name',30);
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
        Schema::dropIfExists('company_services');
    }
}
