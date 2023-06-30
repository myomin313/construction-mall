<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!(Schema::hasTable('ranges'))){
        Schema::create('ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('minimum_price');
            $table->decimal('maximum_price');
            $table->enum('is_active',['0','1'])->default('1');
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
        Schema::dropIfExists('ranges');
    }
}
