<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class OwnerUserProvider extends ServiceProvider
{
    public function boot(): void
    {
        // فقط اگر جدول‌ها موجود باشند
        if (Schema::hasTable('users') && Schema::hasTable('works')) {

            $ownerEmail = env('OWNER_EMAIL', 'owner@example.com');
            $ownerPassword = env('OWNER_PASSWORD', 'SecureDefault123');

            // اگر هنوز این یوزر ساخته نشده
            if (!User::where('email', $ownerEmail)->exists()) {

                $user = User::create([
                    'id' => 1252,
                    'name' => 'مالک',
                    'family' => 'پروژه',
                    'email' => $ownerEmail,
                    'password' => bcrypt($ownerPassword),
                    'recovery_code' => '000000',
                    'type' => 'admin',
                ]);

                Work::create([
                    'admin' => $user->id,
                    'work' => 1, // شناسه خاص برای نوع کار
                    'score' => 100,
                    'register' => 'yes',
                    'job' => 'owner',
                ]);

                logger()->info('✅ یوزر صاحب پروژه با ایمیل ' . $ownerEmail . ' ساخته شد.');
            }
        }
    }

    public function register(): void
    {
        //
    }
}
