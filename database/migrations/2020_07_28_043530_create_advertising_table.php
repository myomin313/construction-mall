<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('advertisings'))){
        Schema::create('advertisings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advertising_plan_id');
            $table->integer('user_id');
            $table->string('photo',255);
            $table->string('link',100)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('is_active',['0','1'])->default('1');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('company_name');
            $table->text('address')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->integer('priority');
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
        Schema::dropIfExists('advertisings');
    }
}
