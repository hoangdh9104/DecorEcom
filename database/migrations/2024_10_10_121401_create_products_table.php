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
            $table->id();
            $table->string('name',255)->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price',10,2);
            $table->integer('quantity')->default(0);
            // số lượt xem sản phẩm
            $table->integer('views')->default(0);
            $table->softDeletes();
            $table->foreignId('category_id')->constrained();

            $table->timestamps();
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
