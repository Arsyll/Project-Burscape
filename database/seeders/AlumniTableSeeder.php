<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AlumniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumnis = [
            [
                'nama' => 'alumni',
                'no_telp' => '0812345678',
                'alamat' => 'Kliningan, Bandung',
                'status' => 'Kuliah',
                'tanggal_lahir' => Carbon::parse('2000-01-01'),
                'foto_profile' => '',
                'jurusan' => 'Rekayasa Perangkat Lunak',
            ],
        ];

        foreach($alumnis as $alumni){
            Alumni::create($alumni);
    }
}
}