<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => 'admin',
            'is_admin' => true
        ]);

        $s = User::create([
            'name' => 'Nurhikma',
            'username' => '60200120113',
            'password' => '60200120113',
        ]);

        $s->student()->create([
            'fullname' => 'Nurhikma',
            'nim' => '60200120113',
            'major' => 'Information Technology',
        ]);
        
        for ($i=20; $i < 40; $i++) { 

            $name = fake()->name;

            $s = User::create([
                'name' => $name,
                'username' => '602001201'.$i,
                'password' => '602001201'.$i,
            ]);
    
            $s->student()->create([
                'fullname' => $name,
                'nim' => '602001201'.$i,
                'major' => fake()->randomElement(['Teknik Informatika', 'Teknik Arsitektur', 'Teknik Perencanaan Wilayah dan Kota'])
            ]);
        }

    }
}
