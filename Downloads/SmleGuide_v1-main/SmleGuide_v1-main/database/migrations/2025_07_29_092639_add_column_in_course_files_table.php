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
        Schema::table('course_files', function (Blueprint $table) {
            //
            $table->string('file_name')->after('course_id');
            $table->enum('open_for_all_users',['public','private'])->default('private')->after('file_name');
            $table->string('file_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_files', function (Blueprint $table) {
            //
            $table->dropColumn('file_name');
            $table->dropColumn('open_for_all_users');
            $table->string('file_path')->nullable(false)->change(); // Reverting to non
        });
    }
};
