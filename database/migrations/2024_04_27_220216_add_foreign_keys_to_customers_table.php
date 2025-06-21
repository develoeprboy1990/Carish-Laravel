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
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign(['language_id'], 'customers_ibfk_1')->references(['id'])->on('languages')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['citiy_id'], 'customers_ibfk_2')->references(['id'])->on('cities')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign('customers_ibfk_1');
            $table->dropForeign('customers_ibfk_2');
        });
    }
};
