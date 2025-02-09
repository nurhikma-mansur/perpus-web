<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
