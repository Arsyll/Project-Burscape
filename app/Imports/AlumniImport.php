<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

class AlumniImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row)
        {
            if($key == 0){
                continue;
            }else{
                $alumni = Alumni::create([
                    'nama'          => $row[0],
                    'no_telp'       => $row[1],
                    'alamat'        => $row[2],
                    'status'        => $row[3],
                    'tanggal_lahir' => Carbon::parse($row[4]),
                    'id_jurusan'    => $row[5],
                    'angkatan'      => $row[6],
                ]);



                $user = User::create([
                    'username'      => $row[7],
                    'role'          => $row[8],
                    'email'         => $row[9],
                    'password'      => Hash::make($row[10]),
                ]);


                Role::create([
                    'id_user'   => $user->id ,
                    'id_alumni' => $alumni->id,
                ]);


            }
        }
    }
}
