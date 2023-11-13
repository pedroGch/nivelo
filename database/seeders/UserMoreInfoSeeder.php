<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserMoreInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('user_more_info')->insert(
        [
          [
            'id' => 1,
            'surname' => 'Gonzalez Chavez',
            'username' => 'pedroGch',
            'birth_date' => '1990-01-25',
            'profile_pic'=> 'img_1.jpg',
            'user_id' => 1,
            'rol' => 'superadmin',
          ],
          [
            'id' => 2,
            'surname' => 'Scotto',
            'username' => 'ro_scotto',
            'birth_date' => '1989-12-11',
            'profile_pic'=> 'img_2.jpg',
            'user_id' => 2,
            'rol' => 'superadmin',
          ]
        ]
      );
    }
}
