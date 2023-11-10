<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert(
          [
            [
              'review_id' => '1',
              'place_id' => '1',
              'user_id' => '2',
              'review' => 'Muy buen lugar, muy accesible',
              'pic_1' => 'reviews/486461616.jpg',
              'alt_pic_1' => 'frente del lugar con dársena de estacionamiento',
              'pic_2' => 'reviews/56465465161.jpg',
              'alt_pic_2' => 'sala de espera y rampa de acceso',
              'pic_3' => 'reviews/261256716752.jpg',
              'alt_pic_3' => 'box de atención',
              'score' => '3',
              'created_at' => now(),
              'updated_at' => now(),

            ],
            [
              'review_id' => '2',
              'place_id' => '1',
              'user_id' => '1',
              'review' => 'Antes no era accesible, pero ahora sí',
              'pic_1' => 'reviews/486461616.jpg',
              'alt_pic_1' => 'frente del lugar con dársena de estacionamiento',
              'pic_2' => 'reviews/56465465161.jpg',
              'alt_pic_2' => 'sala de espera y rampa de acceso',
              'pic_3' => NULL,
              'alt_pic_3' => NULL,
              'score' => '5',
              'created_at' => now(),
              'updated_at' => now(),

            ]
          ]
        );
        //
    }
}
