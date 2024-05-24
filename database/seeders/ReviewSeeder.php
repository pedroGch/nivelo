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
          'status' => 'approved',
          'created_at' => '2023-07-15 14:21:00',
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
          'status' => 'pending',
          'created_at' => '2023-08-20 16:30:00',
          'updated_at' => now(),
        ],
        [
          'review_id' => '3',
          'place_id' => '2',
          'user_id' => '2',
          'review' => 'Lugar con entrada al ras del piso, tiene ascensor (aunque a veces no funciona), y el baño es accesible, pero está arriba.',
          'pic_1' => NULL,
          'alt_pic_1' => NULL,
          'pic_2' => NULL,
          'alt_pic_2' => NULL,
          'pic_3' => NULL,
          'alt_pic_3' => NULL,
          'score' => '4',
          'status' => 'approved',
          'created_at' => '2023-07-10 16:30:00',
          'updated_at' => now(),
        ],
        [
          'review_id' => '4',
          'place_id' => '3',
          'user_id' => '2',
          'review' => NULL,
          'pic_1' => NULL,
          'alt_pic_1' => NULL,
          'pic_2' => NULL,
          'alt_pic_2' => NULL,
          'pic_3' => NULL,
          'alt_pic_3' => NULL,
          'score' => '4',
          'status' => 'approved',
          'created_at' => '2023-07-10 16:30:00',
          'updated_at' => now(),
        ],
        [
          'review_id' => '5',
          'place_id' => '4',
          'user_id' => '2',
          'review' => 'Es un lugar cómodo, con baño accesible, pero no tiene estacionamiento. El baño siempre está cerrado con llave, y hay que pedirle a alguien que lo abra. Lo usan para guardar demasiadas cosas.',
          'pic_1' => NULL,
          'alt_pic_1' => NULL,
          'pic_2' => NULL,
          'alt_pic_2' => NULL,
          'pic_3' => NULL,
          'alt_pic_3' => NULL,
          'score' => '4',
          'status' => 'approved',
          'created_at' => '2023-08-15 16:30:00',
          'updated_at' => now(),
        ],
        [
          'review_id' => '6',
          'place_id' => '5',
          'user_id' => '2',
          'review' => 'Tiene estacionamiento adentro, aunque muy pocos lugares. Adentro es accesible y tienen baño adaptado muy cómodo. Hay que pedir la llave en la recepción.',
          'pic_1' => NULL,
          'alt_pic_1' => NULL,
          'pic_2' => NULL,
          'alt_pic_2' => NULL,
          'pic_3' => NULL,
          'alt_pic_3' => NULL,
          'score' => '5',
          'status' => 'approved',
          'created_at' => '2023-11-18 16:30:00',
          'updated_at' => now(),
        ],
        [
          'review_id' => '7',
          'place_id' => '6',
          'user_id' => '2',
          'review' => 'Tienen una habitación accesible, el baño posee todas las adaptaciones muy bien hechas, pude ducharme sin necesitar asistencia. Al comedor se accede por escalera, pero tienen un ascensor de servicio por el que se puede acceder, de requerirlo. Tiene estacionamiento, aunque muy angostas las cocheras.',
          'pic_1' => NULL,
          'alt_pic_1' => NULL,
          'pic_2' => NULL,
          'alt_pic_2' => NULL,
          'pic_3' => NULL,
          'alt_pic_3' => NULL,
          'score' => '4',
          'status' => 'approved',
          'created_at' => '2023-11-18 16:30:00',
          'updated_at' => now(),
        ],
        [
          'review_id' => '8',
          'place_id' => '7',
          'user_id' => '2',
          'review' => NULL,
          'pic_1' => NULL,
          'alt_pic_1' => NULL,
          'pic_2' => NULL,
          'alt_pic_2' => NULL,
          'pic_3' => NULL,
          'alt_pic_3' => NULL,
          'score' => '4',
          'status' => 'approved',
          'created_at' => '2023-10-19 16:30:00',
          'updated_at' => now(),
        ],
      ]
    );
  }
}
