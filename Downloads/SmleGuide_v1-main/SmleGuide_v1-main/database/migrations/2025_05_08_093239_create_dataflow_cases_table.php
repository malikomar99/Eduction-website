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
        Schema::create('dataflow_cases', function (Blueprint $table) {
            $table->id();
            $table->enum('title',['Dr','Mr','Miss'])->default('Dr');
            $table->string('name');
            $table->string('passport_no');
            $table->string('dataflow_email');
            $table->string('dataflow_password');
            $table->string('service_id');
            $table->string('service_name');
            $table->enum('status',['dataflow_pending','application_submitted','application_in_progress','quality_check','report_completed_positive'])->default('dataflow_pending');
            $table->string('file');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataflow_cases');
    }
};
