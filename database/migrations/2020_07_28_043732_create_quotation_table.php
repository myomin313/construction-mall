<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('quotations'))){
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('range_id');
            $table->integer('category_id');
            $table->timestamp('project_expected_start_date');
            $table->string('project_current_situation');
            $table->text('summary')->nullable();
            $table->string('file')->nullable();
            $table->string('policy')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->enum('contact_allow',['0','1'])->default('1');
            $table->string('prefer_contact_way')->nullable();
            $table->string('best_contact_time')->nullable();
            $table->integer('send_user_id');
            $table->integer('used_coin');
            $table->enum('requested_status',['pending','success'])->default('pending');
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
        Schema::dropIfExists('quotations');
    }
}
