<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminAuth; // Модель для таблицы admin_auth

class AdminAuthSeeder extends Seeder
{
    public function run()
    {
        AdminAuth::create([
            'username' => 'admin',
            'password' => bcrypt('password123'),
        ]);
    }
}
