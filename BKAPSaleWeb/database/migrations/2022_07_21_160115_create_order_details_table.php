<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger(column:'product_id')->unsigned();
            $table->bigInteger(column:'order_id')->unsigned();
            $table->integer(column:'quantity');
            $table->string('size', 50)->nullable();
            $table->double(column:'price');
            $table->double(column:'total_price')->unsigned();
            $table->foreign('product_id')->references('id')->on('products'); 
            $table->foreign('order_id')->references('id')->on('orders'); 
            $table->timestamps();

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
