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
        Schema::create('services', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('customer_id');
            $table->unsignedBigInteger('primary_service_id');
            $table->integer('sub_service_id')->default(0);
            $table->integer('sub_sub_service_id')->default(0);
            $table->text('address_of_service')->nullable();
            $table->text('service_website')->nullable();
            $table->text('service_description')->nullable();
            $table->text('name_for_service')->nullable();
            $table->text('email_for_service')->nullable();
            $table->text('phone_of_service')->nullable();
            $table->enum('service_status', ['Active', 'Inactive'])->default('Inactive');
            $table->string('poster_name')->nullable();
            $table->string('poster_email')->nullable();
            $table->string('poster_phone')->nullable();
            $table->dateTime('feature_expiry_date')->nullable();
            $table->dateTime('active_until')->nullable();
            $table->enum('is_featured', ['true', 'false'])->default('false');
            $table->integer('views')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
