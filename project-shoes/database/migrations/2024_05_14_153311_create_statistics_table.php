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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->dateTime('order_date'); // Thay đổi kiểu dữ liệu từ 'date' sang 'dateTime'
            $table->decimal('profit', 10, 2); // Lợi nhuận
            $table->integer('quantity'); // Số lượng
            $table->integer('total_order'); // Tổng đơn hàng
            $table->timestamps(); // Thời gian tạo và cập nhật

            // Indexes
            $table->index('order_date');
            $table->index('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
