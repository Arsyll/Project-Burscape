<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            ],
            [
                'nama_jurusan' => 'Multi Media',
            ],
            [
                'nama_jurusan' => 'Teknik Komputer Jaringan',
            ],
            [
                'nama_jurusan' => 'Audio Video Interleave',
            ],
            [
                'nama_jurusan' => 'Teknik Instalasi Tenaga Listrik',
            ],
            [
                'nama_jurusan' => 'Teknik Otomosi Industri',
            ],

        ];

        foreach($jurusan as $j){
            Jurusan::create(array_merge($j));
    }
    }
}
