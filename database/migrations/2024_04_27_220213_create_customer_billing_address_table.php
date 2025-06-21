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
        Schema::create('customer_billing_address', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('customer_id_fk_idx');
            $table->integer('state_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('billing_first_name', 200);
            $table->string('billing_last_name', 200);
            $table->string('billing_email', 200);
            $table->string('billing_address')->nullable();
            $table->string('billng_city', 200)->nullable();
            $table->string('billing_company', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_billing_address');
    }
};
