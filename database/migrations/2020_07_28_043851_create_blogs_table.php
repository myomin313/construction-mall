<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('blogs'))){
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_user_id');
            $table->integer('approved_user_id')->nullable();
            $table->enum('is_active',['0','1'])->default('1');
            $table->string('title',255);
            $table->string('image',255)->nullable();
            $table->integer('blog_category_id')->nullable();
            $table->text('description');
            $table->enum('deleted',['0','1'])->default('0');
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
        Schema::dropIfExists('blogs');
    }
}
