<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menu_sweets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 155);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->foreignId('coffee_shop_id')->constrained('coffee_shops');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_sweets');
    }
};