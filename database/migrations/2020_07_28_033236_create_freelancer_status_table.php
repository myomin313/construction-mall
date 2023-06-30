<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('freelancer_statuses'))){
        Schema::create('freelancer_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('freelancer_status_name',100);
            $table->enum('is_active',['1','0'])->default(1);
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
        Schema::dropIfExists('freelancer_statuses');
    }
}
