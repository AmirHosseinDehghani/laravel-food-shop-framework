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
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // شناسه اصلی
            $table->integer('sender');
            $table->integer('receiver');
            $table->string('subject');
            $table->string('text');
            $table->integer('answer')->nullable();
            $table->enum('type', ['send', 'see', 'answered'])->default('send'); // نوع کاربر (خریدار، فروشنده، مدیر)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages'); // حذف جدول در صورت بازگشت
    }//

};
