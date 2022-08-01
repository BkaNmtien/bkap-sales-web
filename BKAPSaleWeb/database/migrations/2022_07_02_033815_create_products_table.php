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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger(column:'brand_id')->unsigned();
            $table->bigInteger(column:'category_id')->unsigned();
            $table->string(column:'name')->unique();
            $table->double(column:'price');
            $table->double(column:'sale_price')->nullable();
            $table->integer(column:'quantity');
            $table->string(column:'image');
            $table->tinyInteger(column:'status')->default(1);
            $table->longText(column:'description')->nullable(); 
            $table->foreign('brand_id')->references('id')->on('brands');        
            $table->foreign('category_id')->references('id')->on('categories');        
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
        Schema::dropIfExists('products');
    }
};
