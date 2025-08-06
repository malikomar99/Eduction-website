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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->enum('type', ['image', 'video', 'video_link'])->default('image'); // VARCHAR(255)
            $table->string('image')->nullable();
            $table->string('image_redirection_link')->nullable();
            $table->string('video')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->string('video_link')->nullable();
            $table->dateTime('from_date')->nullable(); // Includes date and time
            $table->dateTime('to_date')->nullable();    // End date
            $table->tinyInteger('status')->default(1); // TINYINT(1), default value 1
            $table->tinyInteger('featured')->default(0); // TINYINT(1), default value 1
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
