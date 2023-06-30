<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('users'))){
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('email',50)->unique();
            $table->string('phone',50);
            $table->enum('role',['1','2','3','4','5']);
            $table->enum('is_active',['1','0'])->default('1');
            $table->string('logo',225)->nullable();
            $table->integer('coin')->nullable();
            $table->integer('left_coin')->nullable();
            $table->date('last_login_date')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
