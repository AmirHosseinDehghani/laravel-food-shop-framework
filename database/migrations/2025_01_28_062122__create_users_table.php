<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // شناسه اصلی
            $table->string('name'); // نام
            $table->string('family'); // نام
            $table->string('email')->unique(); // ایمیل (باید یکتا باشد)
            $table->string('password'); // رمز عبور
            $table->string('recovery_code'); // کد بازیابی
            $table->enum('type', ['buyer', 'seller', 'admin'])->default('buyer'); // نوع کاربر (خریدار، فروشنده، مدیر)
            $table->string('remember_token', 100)->nullable(); // توکن یادآوری برای ورود
            $table->timestamps(); // زمان‌های ایجاد و به روز رسانی
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // حذف جدول در صورت بازگشت
    }
}
