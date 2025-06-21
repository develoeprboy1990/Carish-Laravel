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
        Schema::create('coupons', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 45);
            $table->integer('product_id')->index('product_id_fk_idx');
            $table->dateTime('date_expired');
            $table->integer('usage_limit')->default(0);
            $table->integer('usage_count')->default(0);
            $table->string('email_restrictions', 45)->nullable();
            $table->string('individual_use', 45);
            $table->string('discount_type', 45)->nullable()->default('Fixed Price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
