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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Liên kết với bảng users
            $table->decimal('total_price', 10, 2); // Tổng giá trị đơn hàng
            $table->enum('status', ['pending', 'completed', 'cancelled', 'shipped'])->default('pending'); // Trạng thái của đơn hàng
            $table->timestamp('order_date')->useCurrent(); // Ngày đặt hàng
            $table->timestamps();

            // Tạo khóa ngoại cho user_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
