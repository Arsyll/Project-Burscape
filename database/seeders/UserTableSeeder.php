<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin'),
                'email_verified_at' => now(),
                'role' => 'Admin',
            ],
            [
                'username' => 'alumni',
                'email' => 'alumni@email.com',
                'password' => bcrypt('alumni'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'perusahaan',
                'email' => 'perusahaan@email.com',
                'password' => bcrypt('perusahaan'),
                'email_verified_at' => now(),
                'role' => 'Perusahaan',
            ]
        ];
        foreach ($users as $value) {
            User::create($value);;
        }
    }
}
