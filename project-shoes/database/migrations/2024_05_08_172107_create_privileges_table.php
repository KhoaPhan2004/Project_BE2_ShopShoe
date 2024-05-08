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
        Schema::create('privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('Url_match', 100);
            $table->unsignedInteger('Group_id');
            $table->timestamps();

            $table->foreign('Group_id')->references('id')->on('group_privileges');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privileges');
    }
};
