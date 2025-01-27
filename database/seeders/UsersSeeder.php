<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'user',
                'role' => 'user',
                'password' => bcrypt('user'),
            ],
            [
                'name' => 'sm',
                'role' => 'sm',
                'password' => bcrypt('Admin'),
            ],
            [
                'name' => 'Supplier',
                'role' => 'supplier',
                'password' => bcrypt('Supplier'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
