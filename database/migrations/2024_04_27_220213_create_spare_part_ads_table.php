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
        Schema::create('spare_part_ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->index('customer_id');
            $table->string('title');
            $table->string('product_code');
            $table->unsignedBigInteger('city_id')->index('city_id');
            $table->integer('parent_id')->nullable();
            $table->integer('category_id');
            $table->double('price', 8, 2);
            $table->integer('vat');
            $table->integer('neg');
            $table->string('condition');
            $table->text('description');
            $table->integer('status')->default(0);
            $table->string('make_id', 255)->nullable();
            $table->string('model_id', 255)->nullable();
            $table->string('f2_engine_power', 255);
            $table->string('f2_liter', 255)->nullable();
            $table->string('f2_kw', 255)->nullable();
            $table->string('brand', 255)->nullable();
            $table->string('num_of_channel', 255)->nullable();
            $table->string('size', 255)->nullable();
            $table->string('screen_size', 255)->nullable();
            $table->string('size_inch', 255)->nullable();
            $table->string('f3_tyre_manufacturer', 255)->nullable();
            $table->string('f3_size', 255)->nullable();
            $table->string('f3_type', 255)->nullable();
            $table->string('f3_quantity', 255)->nullable();
            $table->string('f4_wheel_manufacturer', 255)->nullable();
            $table->string('f4_size_inch', 255)->nullable();
            $table->string('f4_offset_mm', 255)->nullable();
            $table->string('f4_style', 255)->nullable();
            $table->string('f4_num_of_holes', 255)->nullable();
            $table->string('f4_distance_between_holes', 255)->nullable();
            $table->string('f4_quantity', 255)->nullable();
            $table->string('poster_name');
            $table->string('poster_email');
            $table->string('poster_phone');
            $table->integer('poster_city');
            $table->dateTime('active_until')->nullable();
            $table->enum('is_featured', ['true', 'false'])->default('false');
            $table->dateTime('feature_expiry_date')->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spare_part_ads');
    }
};
