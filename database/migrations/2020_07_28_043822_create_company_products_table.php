<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!(Schema::hasTable('company_products'))){
        Schema::create('company_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',100);
            $table->integer('company_id');
            $table->string('photo',225);
            $table->text('product_description')->nullable();
            $table->decimal('price');
            $table->string('code',100);
            $table->string('size',100);
            $table->enum('current_stock',['Instock','Out Of Stock','Preorder']);
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
        Schema::dropIfExists('company_products');
    }
}
