<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_genders')->insert([
            'name' => 'Masculino',
        ]);

        DB::table('users_genders')->insert([
            'name' => 'Feminino',
        ]);

        DB::table('users_genders')->insert([
            'name' => 'Outro',
        ]);
    }
}
