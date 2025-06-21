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
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id')->nullable();
            $table->integer('ad_id')->nullable();
            $table->decimal('credit')->default(0);
            $table->decimal('debit')->default(0);
            $table->decimal('paid_amount')->default(0);
            $table->string('number_of_days')->nullable();
            $table->string('type')->nullable();
            $table->string('detail')->nullable();
            $table->integer('status')->nullable();
            $table->dateTime('approved_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_accounts');
    }
};
