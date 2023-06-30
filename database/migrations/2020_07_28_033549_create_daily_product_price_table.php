<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyProductPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('daily_product_prices'))){
        Schema::create('daily_product_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',100);
            $table->string('currency',100);
            $table->integer('price');
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
        Schema::dropIfExists('daily_product_prices');
    }
}
