<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'nama_lengkap' => 'admin',
                'jabatan' => 'admin',
                'foto_profile' => '',
            ],
        ];

        foreach($admins as $admin){
            Admin::create($admin);
        }
    }
}
