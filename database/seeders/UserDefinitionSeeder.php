<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDefinitionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table("user_definition")->insert(
      [
        [
          'id' => '1',
          'sticks' => false,
          'crutches' => false,
          'walker' => false,
          'difficult_walking' => false,
          'manual_wheelchair' => false,
          'electric_wheelchair' => false,
          'scooter' => false,
          'none' => true,
          'user_id' => 1,

        ],
        [
          'id' => '2',
          'sticks' => false,
          'crutches' => false,
          'walker' => true,
          'difficult_walking' => true,
          'manual_wheelchair' => true,
          'electric_wheelchair' => false,
          'scooter' => false,
          'none' => false,
          'user_id' => 2,
        ]
      ]
    );

  }
}
