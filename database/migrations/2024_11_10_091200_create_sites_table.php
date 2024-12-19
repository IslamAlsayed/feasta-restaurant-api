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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable()->default('favicon.png');
            $table->string('site_name')->nullable()->default('fake-name');
            $table->string('email')->nullable()->default('fake@email.com');
            $table->string('phone')->nullable()->default('fake-(+20) 0000000000');
            $table->string('address')->nullable()->default('this is fake my address');
            $table->string('work_hours')->nullable()->default('fake-work-hours "every day from 10am to 8pm, sunday is closed"');
            $table->longText('about_us')->nullable()->default('fake-about-us "To achieve this, it would be necessary to have uniform grammar, pronunciation and more if a common words When, while the lovely valley teems with Tuesday Wednesday Thursday"');
            $table->json('developer')->nullable()->default(json_encode(['name' => 'fake-name', 'email' => 'fake@gmail.com', 'phone' => 'fake-(+20) 0000000000']));
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
