<?php

namespace Database\Seeders;

use App\Models\KategoriPekerjaan;
use Illuminate\Database\Seeder;

class KategoriPekerjaanSeeder extends Seeder
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
                'nama_kategori' => 'Web Development',
            ],
            [
                'nama_kategori' => 'Android Development',
            ],
            [
                'nama_kategori' => 'UI/UX',
            ],
            [
                'nama_kategori' => 'Instalisasi Listrik',
            ],
            [
                'nama_kategori' => 'Robotika',
            ],
            [
                'nama_kategori' => 'Elektronika',
            ],
            [
                'nama_kategori' => 'IOT',
            ],
            [
                'nama_kategori' => 'Instalisasi Jaringan',
            ],
            
            
        ];

        foreach($jurusan as $k){
            KategoriPekerjaan::create(array_merge($k));
    }
    }
}
