<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('company_projects'))){
        Schema::create('company_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_type_id');
            $table->string('project_name',100)->nullable();
            $table->integer('company_id');
            $table->text('project_description')->nullable();
            $table->integer('range_id');
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
        Schema::dropIfExists('company_projects');
    }
}
