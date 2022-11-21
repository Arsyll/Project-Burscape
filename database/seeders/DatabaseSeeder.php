<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            JurusanTableSeeder::class,
            UserTableSeeder::class,
            AdminTableSeeder::class,
            PerusahaanTableSeeder::class,
            AlumniTableSeeder::class,
            RoleTableSeeder::class,
            KategoriPekerjaanSeeder::class,
        ]);
        
        /*\App\Models\User::factory(40)->create()->each(function($user) {
            $user->assignRole('user');
        });
        \App\Models\UserProfile::factory(43)->create(); */
    }
}
