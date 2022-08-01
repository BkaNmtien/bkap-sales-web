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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger(column:'user_id')->unsigned();
            $table->tinyInteger(column:'status')->default('0');
            $table->double(column:'total_money')->unsigned();
            $table->integer(column:'phone');
            $table->string(column:'address');
            $table->string(column:'note')->nullable();
            $table->string(column:'name');
            $table->string(column:'email')->nullable();
            $table->foreign('user_id')->references('id')->on('users'); 
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
        Schema::dropIfExists('orders');
    }
};
