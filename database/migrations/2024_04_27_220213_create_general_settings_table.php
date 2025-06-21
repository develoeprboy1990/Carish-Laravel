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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('default_language');
            $table->string('phone_number')->nullable();
            $table->string('status')->nullable();
            $table->string('logo')->nullable();
            $table->string('small_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('title')->nullable();
            $table->string('business_email')->nullable();
            $table->string('complaint_email')->nullable();
            $table->text('address')->nullable();
            $table->string('fax')->nullable();
            $table->string('bank_detail')->nullable();
            $table->string('business_name')->nullable();
            $table->string('website_link')->nullable();
            $table->string('registry_number')->nullable();
            $table->text('other_info')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->integer('ads_limit')->nullable();
            $table->integer('spare_parts_limit')->nullable();
            $table->integer('b_ads_limit')->nullable();
            $table->integer('b_spare_parts_limit')->nullable();
            $table->integer('b_service_limit')->nullable();
            $table->integer('perpage_ads')->default(50);
            $table->integer('perpage_spareparts')->default(50);
            $table->integer('perpage_services')->default(50);
            $table->integer('invoice_expiry_days')->default(7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
