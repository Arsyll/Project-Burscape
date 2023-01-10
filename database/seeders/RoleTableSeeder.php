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
            ],
            [
                'id_user' => 4,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 2
            ],
            [
                'id_user' => 5,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 3
            ],
            [
                'id_user' => 6,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 4
            ],
            [
                'id_user' => 7,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 5
            ],
            [
                'id_user' => 8,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 6
            ],
            [
                'id_user' => 9,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 7
            ],
            [
                'id_user' => 10,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 8
            ],
            [
                'id_user' => 11,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 9
            ],
            [
                'id_user' => 12,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 10
            ],
            [
                'id_user' => 13,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 11
            ],
            [
                'id_user' => 14,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 12
            ],
            [
                'id_user' => 15,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 13
            ],
            [
                'id_user' => 16,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 14
            ],
            [
                'id_user' => 17,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 15
            ],
            [
                'id_user' => 18,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 16
            ],
            [
                'id_user' => 19,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 17
            ],
            [
                'id_user' => 20,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 18
            ],
            [
                'id_user' => 21,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 19
            ],
            [
                'id_user' => 22,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 20
            ],
            [
                'id_user' => 23,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 21
            ],
            [
                'id_user' => 24,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 22
            ],
            [
                'id_user' => 25,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 23
            ],
            [
                'id_user' => 26,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 24
            ],
            [
                'id_user' => 27,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 25
            ],
            [
                'id_user' => 28,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 26
            ],
            [
                'id_user' => 29,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 27
            ],
            [
                'id_user' => 30,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 28
            ],
            [
                'id_user' => 31,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 29
            ],
            [
                'id_user' => 32,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 30
            ],
            [
                'id_user' => 33,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 31
            ],
            [
                'id_user' => 34,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 32
            ],
            [
                'id_user' => 35,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 33
            ],
            [
                'id_user' => 36,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 34
            ],
            [
                'id_user' => 37,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 35
            ],
            [
                'id_user' => 38,
                'id_admin' => null,
                'id_perusahaan' => null,
                'id_alumni' => 36
            ],
        ];

        foreach ($roles as $value) {
            ModelsRole::create($value);
        }
    }
}
