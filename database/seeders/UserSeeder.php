<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
          [
            [
                'id' => '1',
                'name' => 'Pedro',
                'email' => 'pedro.gonzalez@davinci.edu.ar',
                'password'=> Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'name' => 'Rocío',
                'email' => 'rocio.scotto@davinci.edu.ar',
                'password'=> Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
          ]
        );
    }
}
