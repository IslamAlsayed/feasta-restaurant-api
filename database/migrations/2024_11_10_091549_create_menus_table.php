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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 62, 2);
            $table->enum('rating', ['1', '2', '3', '4', '5']);
            $table->integer('quantity')->default(1);
            $table->string('cooking')->nullable();
            $table->enum('mealType', ['breakfast', 'lunch', 'dinner', 'dessert']);
            $table->integer('vat')->default(10);
            $table->string('item_code')->nullable();
            $table->decimal('offer_price', 62, 2);
            $table->date('offer_end_at')->nullable();
            $table->integer('discount')->nullable();
            $table->longText('description');
            $table->string('image');
            $table->foreignId('chef_id')->constrained('chefs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
