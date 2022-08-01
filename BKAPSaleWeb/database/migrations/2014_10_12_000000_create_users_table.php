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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string(column:'name');
            $table->string(column:'email')->unique();
            $table->timestamp(column:'email_verified_at')->nullable();
            $table->string(column:'password');
            $table->rememberToken()->nullable();
            $table->string(column:'phone')->nullable();
            $table->string(column:'address')->nullable();
            $table->tinyInteger(column:'level')->default(0);
            $table->string(column:'avatar')->nullable();
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
        Schema::dropIfExists('users');
    }
};
