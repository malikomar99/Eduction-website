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
        Schema::table('user_course_purchases', function (Blueprint $table) {
            //
            $table->dropForeign(['course_file_id']); // Drop the FK constraint
            $table->dropColumn('course_file_id');    // Now drop the column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_course_purchases', function (Blueprint $table) {
            //
        });
    }
};
