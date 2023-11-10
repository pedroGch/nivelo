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
              'pic_1' => 'reviews/1/1.jpg',
              'alt_pic_1' => 'frente del lugar',
              'pic_2' => 'reviews/1/2.jpg',
              'alt_pic_2' => 'interior del lugar',
              'pic_3' => 'reviews/1/3.jpg',
              'alt_pic_3' => 'interior del lugar',
              'score' => '5',

            ]
          ]
        );
        //
    }
}
