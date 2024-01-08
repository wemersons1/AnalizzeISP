<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_statuses')->insert([
            'name' => 'Novo',
        ]);

        DB::table('users_statuses')->insert([
            'name' => 'Adimplente',
        ]);

        DB::table('users_statuses')->insert([
            'name' => 'Inadimplente',
        ]);

        DB::table('users_statuses')->insert([
            'name' => 'Desistente',
        ]);

        DB::table('users_statuses')->insert([
            'name' => 'Inativo',
        ]);
    }
}
