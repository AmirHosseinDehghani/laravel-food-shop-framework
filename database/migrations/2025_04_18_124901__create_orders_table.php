<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // شناسه اصلی
            $table->integer('buyer');
            $table->integer('price');
            $table->json('baskets');
            $table->enum('type', ['pay', 'dont_pay', 'send', 'dont_send', 'receive'])->default('dont_pay'); // نوع کاربر (خریدار، فروشنده، مدیر)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders'); // حذف جدول در صورت بازگشت
    }
};
