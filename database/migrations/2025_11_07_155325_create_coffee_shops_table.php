<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coffee_shops', function (Blueprint $table) {
            $table->id();
            $table->string('name', 145)->default('Cozy Corner Coffee');
            $table->string('address', 255);
            $table->foreignId('city_id')->constrained('cities');
            $table->string('phone', 100);
            $table->string('opening_hours', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coffee_shops');
    }
};