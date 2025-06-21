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
        Schema::table('page_desciption', function (Blueprint $table) {
            $table->foreign(['page_id'], 'page_desciption_ibfk_1')->references(['id'])->on('pages')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['language_id'], 'page_desciption_ibfk_2')->references(['id'])->on('languages')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_desciption', function (Blueprint $table) {
            $table->dropForeign('page_desciption_ibfk_1');
            $table->dropForeign('page_desciption_ibfk_2');
        });
    }
};
