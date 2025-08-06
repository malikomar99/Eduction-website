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
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->nullable();
            $table->string('business_email')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('business_address')->nullable();
            $table->string('business_logo')->nullable();
            $table->string('payment_currency')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->boolean('facebook_login')->default(false);
            $table->boolean('google_login')->default(false);
            $table->string('maintenance_mode')->default(false);
            $table->string('maintenance_message')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('google_analytics_id')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('version_android')->nullable();
            $table->string('version_ios')->nullable();
            $table->string('ios_url')->nullable();
            $table->string('android_url')->nullable();
            $table->string('force_update')->nullable();
            $table->string('update_in_seven_days')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_settings');
    }
};
