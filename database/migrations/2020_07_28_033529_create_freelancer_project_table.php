<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!(Schema::hasTable('freelancer_projects'))){
        Schema::create('freelancer_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name',100);
            $table->string('company_name',100);
            $table->text('project_detail')->nullable();
            $table->date('project_start_date')->nullable();
            $table->date('project_end_date')->nullable();
            $table->string('project_link',100)->nullable();
            $table->integer('freelancer_id');
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
        Schema::dropIfExists('freelancer_projects');
    }
}
