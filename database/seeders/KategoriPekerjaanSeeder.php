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
                'nama_kategori' => 'Front-End Development',
            ],
            [
                'nama_kategori' => 'Back-End Development',
            ],
            [
                'nama_kategori' => 'Game Development',
            ],
            [
                'nama_kategori' => 'Machine Learning',
            ],
            [
                'nama_kategori' => 'Data Science',
            ],
            [
                'nama_kategori' => 'Data Analysist',
            ],
            [
                'nama_kategori' => 'IOT',
            ],
            [
                'nama_kategori' => 'UI/UX',
            ],
            [
                'nama_kategori' => 'Video Editing',
            ],
            
        ];

        foreach($jurusan as $k){
            KategoriPekerjaan::create(array_merge($k));
    }
    }
}
