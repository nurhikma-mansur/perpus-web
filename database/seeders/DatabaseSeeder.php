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
            'name' => 'Rahmat Riyadi',
            'username' => '60200120116',
            'password' => '60200120116',
        ]);

        $s->student()->create([
            'fullname' => 'Rahmat Riyadi',
            'nim' => '60200120116',
            'major' => 'Information Technology',
        ]);

    }
}
