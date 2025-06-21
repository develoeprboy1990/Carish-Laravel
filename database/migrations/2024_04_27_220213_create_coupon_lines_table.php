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
        Schema::create('coupon_lines', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order_id')->index('order_idd_fk_idx');
            $table->integer('coupon_id')->index('coupon_id_fk_idx');
            $table->string('code', 100);
            $table->decimal('discount', 10);
            $table->string('discount_tax', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_lines');
    }
};
