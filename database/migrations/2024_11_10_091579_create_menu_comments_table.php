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
        Schema::create('menu_comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('comment');
            $table->enum('rate', ['1', '2', '3', '4', '5'])->default('2');
            $table->foreignId('menu_id')->constrained('menus')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_comments');
    }
};
