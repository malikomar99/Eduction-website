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
        Schema::create('user_course_purchases', function (Blueprint $table) {
            // {{-- payment method payment slip status orderID prnt --}}
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_file_id')->constrained()->cascadeOnDelete();
            $table->timestamp('purchase_date')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_slip')->nullable();
            $table->enum('status',['pending','approved','denied'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_course_purchases');
    }
};
