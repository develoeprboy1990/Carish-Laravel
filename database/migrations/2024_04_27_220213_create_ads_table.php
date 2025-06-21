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
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->nullable()->index('customer_id');
            $table->unsignedBigInteger('city_id')->nullable()->index('city_id');
            $table->integer('country_id');
            $table->unsignedBigInteger('bought_from_id')->nullable()->index('ads_bought_from_id_foreign');
            $table->char('register_in_estonia', 7)->nullable();
            $table->unsignedBigInteger('maker_id')->nullable()->index('maker_id');
            $table->integer('model_id')->nullable()->index('model_id');
            $table->string('year', 4)->nullable();
            $table->unsignedBigInteger('color_id')->nullable()->index('color_id');
            $table->integer('millage')->nullable();
            $table->string('fuel_average');
            $table->double('price', 8, 2);
            $table->integer('vat');
            $table->integer('neg');
            $table->bigInteger('version_id')->nullable();
            $table->text('description');
            $table->text('features')->nullable();
            $table->integer('transmission_type')->nullable();
            $table->integer('fuel_type')->nullable();
            $table->enum('assembly', ['Local', 'Imported'])->nullable();
            $table->bigInteger('body_type_id')->nullable();
            $table->string('doors')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('poster_name');
            $table->string('poster_email');
            $table->string('poster_phone');
            $table->integer('poster_city');
            $table->integer('status')->default(0)->comment('0=pending , 1=active , 2=removed , 3=not-approved');
            $table->string('slug')->nullable();
            $table->string('car_number')->nullable();
            $table->dateTime('feature_expiry_date')->nullable();
            $table->dateTime('active_until')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();
            $table->integer('views')->default(0);
            $table->enum('is_featured', ['true', 'false'])->default('false');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
