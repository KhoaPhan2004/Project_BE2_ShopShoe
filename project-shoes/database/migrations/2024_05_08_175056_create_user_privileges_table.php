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
        Schema::create('user_privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_manage');
            $table->unsignedInteger('id_privileges');
            $table->timestamps();

            $table->foreign('id_manage')->references('id')->on('user_manage');
            $table->foreign('id_privileges')->references('id')->on('privileges');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_privileges');
    }
};
