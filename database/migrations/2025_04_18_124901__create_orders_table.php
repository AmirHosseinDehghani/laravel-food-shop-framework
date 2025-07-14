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
            $table->id();
            $table->integer('buyer');
            $table->integer('price');
            $table->text('adders');
            $table->integer('post')->nullable();
            $table->json('baskets');
            $table->json('ready_products')->nullable();
            $table->enum('type', ['dont_pay','pay','send','receive'])->default('dont_pay');
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
