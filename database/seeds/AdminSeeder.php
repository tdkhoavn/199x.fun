<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'              => 'Trần Đăng Khoa',
            'email'             => 'tdkhoa.angiang@gmail.com',
            'gender'            => 1,
            'avatar'            => 'no-avatar.png',
            'birthday'          => '1993-04-16',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
            'img_mtime' => now(),
        ]);

        Admin::create([
            'name'              => 'Huỳnh Quốc Tấn',
            'email'             => 'tdkhoa.angiang@gmail.com',
            'gender'            => 1,
            'avatar'            => 'no-avatar.png',
            'birthday'          => '1995-01-01',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
            'img_mtime' => now(),
        ]);

        Admin::create([
            'name'              => 'Võ Thanh Hòa',
            'email'             => 'tdkhoa.angiang@gmail.com',
            'gender'            => 1,
            'avatar'            => 'no-avatar.png',
            'birthday'          => '1995-01-01',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
            'img_mtime' => now(),
        ]);
    }
}
