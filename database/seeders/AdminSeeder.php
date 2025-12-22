<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'abc123',
            ],
        ];

        foreach ($admins as $admin) {

            $oldAdmin = User::where('email', $admin['email'])->first();
            if (!$oldAdmin) {
                User::create([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'password' => bcrypt($admin['password']),
                ]);
            }
        }
    }
}
