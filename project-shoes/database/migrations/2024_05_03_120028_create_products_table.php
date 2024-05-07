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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name', 100)->unique();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('image_url', 255);
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('origin_id');
            $table->string('size', 20)->nullable();
            $table->timestamps();

            //   khóa ngoại
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('origin_id')->references('id')->on('origins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
