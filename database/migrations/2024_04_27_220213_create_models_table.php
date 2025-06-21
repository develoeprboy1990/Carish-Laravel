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
        Schema::create('models', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->unsignedBigInteger('make_id')->index('make_id');
            $table->integer('vehicle_type_id')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();
            $table->integer('sort_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
