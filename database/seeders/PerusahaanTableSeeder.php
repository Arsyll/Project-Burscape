<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perusahaans = [
            [
                'nama' => 'perusahaan',
                'no_telp' => '0812345678',
                'bidang' => 'Software House',
                'alamat' => 'Kliningan, Bandung',
                'email_perusahaan' => 'perusahaan@email.com',
                'foto_perusahaan' => '',
            ],
        ];

        foreach($perusahaans as $perusahaan){
            Perusahaan::create($perusahaan);
    }
    }
}
