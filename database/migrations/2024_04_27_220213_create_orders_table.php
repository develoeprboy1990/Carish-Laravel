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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('customer_id_fk_idx');
            $table->string('order_status', 100);
            $table->char('currency', 3);
            $table->decimal('currency_value', 10)->nullable();
            $table->string('transaction_id', 100)->nullable();
            $table->decimal('total_price', 10);
            $table->decimal('subtotal_price', 10);
            $table->decimal('total_tax', 10)->nullable();
            $table->decimal('total_line_items_price', 10)->nullable();
            $table->text('tax_lines')->nullable();
            $table->decimal('total_weight', 10);
            $table->text('cancel_reason')->nullable();
            $table->string('refunds', 45)->nullable();
            $table->string('payment_method_title', 100)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->text('billing_address');
            $table->string('shipping_title', 100)->nullable();
            $table->string('shipping_method', 100)->nullable();
            $table->text('shipping_address');
            $table->string('source_name', 100)->nullable();
            $table->string('customer_ip_address', 45)->nullable();
            $table->text('customer_note')->nullable();
            $table->text('cart_hash')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
