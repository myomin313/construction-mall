<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('functions'))){
        Schema::create('functions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);           
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
        Schema::dropIfExists('functions');
    }
}
