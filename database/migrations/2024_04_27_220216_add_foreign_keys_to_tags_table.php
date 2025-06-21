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
        Schema::table('tags', function (Blueprint $table) {
            $table->foreign(['make_id'])->references(['id'])->on('makes')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['model_id'])->references(['id'])->on('models')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['suggesstion_id'])->references(['id'])->on('suggesstions')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropForeign('tags_make_id_foreign');
            $table->dropForeign('tags_model_id_foreign');
            $table->dropForeign('tags_suggesstion_id_foreign');
        });
    }
};
