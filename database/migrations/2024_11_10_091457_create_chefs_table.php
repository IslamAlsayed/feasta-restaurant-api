<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->integer('age');
            $table->string('titleJob');
            $table->string('specialty');
            $table->longText('description');
            $table->longText('information');
            $table->longText('about');
            $table->json('experience');
            $table->json('skills');
            $table->string('favorite_dish');
            $table->string('favorite_dish_image');
            $table->integer('years_experience');
            $table->json('media');
            $table->string('image')->nullable()->default('default.png');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chefs');
    }
};
