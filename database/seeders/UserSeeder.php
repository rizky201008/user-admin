<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'Admin',
                'is_aktif' => true
            ],
            [
                'name' => 'User Account',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'User',
                'is_aktif' => true
            ],
        ];

        foreach ($data as $value) {
            $user = User::create($value);
            $user->detailData()->create([]);
        }
    }
}
