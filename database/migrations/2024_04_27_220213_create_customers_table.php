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
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('customer_firstname', 200)->nullable();
            $table->string('customer_lastname', 200)->nullable();
            $table->string('customer_company')->nullable();
            $table->string('customer_vat')->nullable();
            $table->string('customer_registeration')->nullable();
            $table->char('customer_gender', 5)->default('Male');
            $table->dateTime('customers_dob')->nullable();
            $table->string('customer_email_address', 200);
            $table->string('website')->nullable();
            $table->text('customer_default_address')->nullable();
            $table->string('customers_telephone', 45);
            $table->string('customer_fax', 45)->nullable();
            $table->string('customer_password', 200);
            $table->string('password_reset_token')->nullable();
            $table->char('customer_newsletter', 3)->nullable()->default('No');
            $table->text('remember_token')->nullable();
            $table->dateTime('password_reset_date')->nullable();
            $table->enum('customer_status', ['Active', 'Inactive', 'Suspend'])->default('Inactive');
            $table->integer('country_id')->nullable();
            $table->unsignedBigInteger('citiy_id')->nullable()->index('citiy_id');
            $table->string('logo', 111)->nullable();
            $table->string('preferred_language', 30)->nullable();
            $table->string('customer_avatar')->nullable();
            $table->unsignedInteger('language_id')->nullable()->index('language_id');
            $table->enum('customer_role', ['individual', 'business', 'subscriber'])->nullable()->default('individual');
            $table->integer('login_status')->default(0);
            $table->text('token_for_admin_login')->nullable();
            $table->integer('phone_verification_status')->default(0);
            $table->string('provider_id')->nullable();
            $table->string('provider')->nullable();
            $table->integer('is_adminverify')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
