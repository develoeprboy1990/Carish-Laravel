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
        Schema::create('featured_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ad_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('number_of_days')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_requests');
    }
};
