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
        Schema::create('course_videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_label');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->enum('type',['local','youtube']);
            $table->string('video_url')->nullable(); // Add video_url column after slug
            $table->string('video_thumbnail')->nullable(); // Add thumbnail column after video_url
            $table->enum('open_for_all_users',['public','private'])->default('private');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_videos');
    }
};
