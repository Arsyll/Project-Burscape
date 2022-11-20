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
            ],
            [
                'username' => 'Adisty Nazwa Revalina',
                'email' => 'adisty@gmail.com',
                'password' => bcrypt('adisty'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Aisyah Nafilah Indra Putri',
                'email' => 'aisyah@gmail.com',
                'password' => bcrypt('aisyah'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Andhika Bayu Ramadhany',
                'email' => 'andhika@gmail.com',
                'password' => bcrypt('andhika'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Arsyl Slamet Amrulloh',
                'email' => 'arsyl@gmail.com',
                'password' => bcrypt('arsyl'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Daiva Raditya Pradipa',
                'email' => 'daiva@gmail.com',
                'password' => bcrypt('daiva'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Dhafin Qinthara Khalish',
                'email' => 'dhafin@gmail.com',
                'password' => bcrypt('dhafin'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Dio Fathir Zinedine Khalaf',
                'email' => 'dio@gmail.com',
                'password' => bcrypt('dio'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Fairuztsani Kemal Setiawan',
                'email' => 'fairuztsani@gmail.com',
                'password' => bcrypt('fairuztsani'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Fajri Zhahiran Wiriadinata',
                'email' => 'fajri@gmail.com',
                'password' => bcrypt('fajri'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Fauzan Subagja',
                'email' => 'fauzan@gmail.com',
                'password' => bcrypt('fauzan'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Gloria Loren Lawuredja',
                'email' => 'gloria@gmail.com',
                'password' => bcrypt('gloria'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Iqbal Abdurrahman',
                'email' => 'iqbal@gmail.com',
                'password' => bcrypt('iqbal'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Laila Al-Farah',
                'email' => 'alumni@gmail.com',
                'password' => bcrypt('laila'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Luthfi Satrio Wicaksono',
                'email' => 'lutfhi@gmail.com',
                'password' => bcrypt('luthfi'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Mochamad Daffa',
                'email' => 'daffa@gmail.com',
                'password' => bcrypt('daffa'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Muhammad Ali Nur Rohman',
                'email' => 'ali@gmail.com',
                'password' => bcrypt('ali'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Muhammad Farras Fikri W.',
                'email' => 'farras@gmail.com',
                'password' => bcrypt('farras'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Muhammad Favian Jiwani',
                'email' => 'favian@gmail.com',
                'password' => bcrypt('favian'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Muhammad Ilham Fathurrohim Alba',
                'email' => 'ilham@gmail.com',
                'password' => bcrypt('ilham'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Muhammad Jilan Satria',
                'email' => 'jilan@gmail.com',
                'password' => bcrypt('jilan'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'M.Raditya Pradana Ilhami',
                'email' => 'raditya@gmail.com',
                'password' => bcrypt('raditya'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Muhammad Nazriel Alfarizi',
                'email' => 'nazriel@gmail.com',
                'password' => bcrypt('nazriel'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Nabila Aulia Sapitri',
                'email' => 'nabila@gmail.com',
                'password' => bcrypt('nabila'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Nadhil Wirasetya Andariki',
                'email' => 'nadhil@gmail.com',
                'password' => bcrypt('nadhil'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Naufal Nur Hafizh',
                'email' => 'naufal@gmail.com',
                'password' => bcrypt('naufal'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Raaqi Athaulla',
                'email' => 'raaqi@gmail.com',
                'password' => bcrypt('raaqi'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Raditya Kanahaya',
                'email' => 'kanahaya@gmail.com',
                'password' => bcrypt('kanahaya'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Rangga Ramadhan',
                'email' => 'rangga@gmail.com',
                'password' => bcrypt('rangga'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Rhiza',
                'email' => 'rhiza@gmail.com',
                'password' => bcrypt('rhiza'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Silmi Julia Rahmi',
                'email' => 'silmi@gmail.com',
                'password' => bcrypt('silmi'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Stefhanie Valentina',
                'email' => 'stefhanie@gmail.com',
                'password' => bcrypt('stefhanie'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Tharissa Shalsabila Trihapsari',
                'email' => 'tharissa@gmail.com',
                'password' => bcrypt('tharissa'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Wisnu Adi Pradana',
                'email' => 'wisnu@gmail.com',
                'password' => bcrypt('wisnu'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
            [
                'username' => 'Yolanda Belva Daniswara',
                'email' => 'yolanda@gmail.com',
                'password' => bcrypt('yolanda'),
                'email_verified_at' => now(),
                'role' => 'Alumni',
            ],
        ];
        foreach ($users as $value) {
            User::create($value);;
        }
    }
}
