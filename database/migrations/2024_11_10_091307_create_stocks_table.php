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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->integer('amount');
            $table->string('category');
            $table->enum('type', ['food', 'drink']);
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->decimal('selling_price', 8, 2);
            $table->decimal('buying_price', 8, 2);
            $table->decimal('vat', 5, 2);
            $table->integer('cookTime')->nullable();
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->nullable();
            $table->string('cooking')->nullable();
            $table->integer('calories')->nullable();
            $table->enum('mealType', ['breakfast', 'lunch', 'dinner', 'dessert'])->nullable();
            $table->json('ingredients')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
