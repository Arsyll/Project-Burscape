<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            
            [
                'id_user' => 1,
                'id_admin' => 1,
                'id_perusahaan' => null,
                'id_alumni' => null
            ],
            [
                'id_user' => 2,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 1
            ],
            [
                'id_user' => 3,
                'id_admin' => null,
                'id_perusahaan' => 1,
                'id_alumni' => null
            ]
        ];

        foreach ($roles as $value) {
            ModelsRole::create($value);
        }
    }
}
