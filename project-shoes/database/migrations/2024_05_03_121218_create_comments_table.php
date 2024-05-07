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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');   
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            //   khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
