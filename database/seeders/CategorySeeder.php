<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table("categories")->insert(
        [
          [
              'id' => '1',
              'name' => 'Alojamiento',
              'icon' => NULL,
              'image_cat' => 'categories/cat-alojamiento.jpg',
              'alt_img_cat'=> 'una habitación de hotel',

          ],
          [
              'id' => '2',
              'name' => 'Recreación y Cultura',
              'icon' => NULL,
              'image_cat' => 'categories/cat-recreacion-cultura.jpg',
              'alt_img_cat'=> 'sala llena de gente mirando una obra de teatro',

          ],
          [
              'id' => '3',
              'name' => 'Comercios',
              'icon' => NULL,
              'image_cat' => 'categories/cat-comercios.jpg',
              'alt_img_cat'=> 'prendas de ropa en perchas',

          ],
          [
              'id' => '4',
              'name' => 'Plazas y Parques',
              'icon' => NULL,
              'image_cat' => 'categories/cat-plazas-parques.jpg',
              'alt_img_cat'=> 'un parque con muchos árboles y personas caminando',

          ],
          [
              'id' => '5',
              'name' => 'Playas y Balnearios',
              'icon' => NULL,
              'image_cat' => 'categories/cat-playas-balnearios.jpg',
              'alt_img_cat'=> 'una persona en silla anfibia yendo al mar por una pasarela sobre la arena',

          ],
          [
              'id' => '6',
              'name' => 'Gastronomía',
              'icon' => NULL,
              'image_cat' => 'categories/cat-gastronomia.jpg',
              'alt_img_cat'=> 'una mesa con platos de comida',

          ],
          [
              'id' => '7',
              'name' => 'Oficinas del Estado',
              'icon' => NULL,
              'image_cat' => 'categories/cat-oficinas-estado.jpg',
              'alt_img_cat'=> 'una oficina con escritorios y computadoras',

          ],
          [
              'id' => '8',
              'name' => 'Educación',
              'icon' => NULL,
              'image_cat' => 'categories/cat-educacion.jpg',
              'alt_img_cat'=> 'una mujer estudiando con su notebook',

          ],
          [
              'id' => '9',
              'name' => 'Deporte',
              'icon' => NULL,
              'image_cat' => 'categories/cat-deporte.jpg',
              'alt_img_cat'=> 'una persona sin discapacidad y otra en silla de ruedas en la pista de atletismo',

          ],
          [
              'id' => '10',
              'name' => 'Salud',
              'icon' => NULL,
              'image_cat' => 'categories/cat-salud.jpg',
              'alt_img_cat'=> 'una persona en un consultorio médico',

          ],
          [
              'id' => '11',
              'name' => 'Transporte',
              'icon' => NULL,
              'image_cat' => 'categories/cat-transporte.jpg',
              'alt_img_cat'=> 'un subte en una estación',

          ],
          [
              'id' => '12',
              'name' => 'Albergues transitorios',
              'icon' => NULL,
              'image_cat' => 'categories/cat-albergues-transitorios.jpg',
              'alt_img_cat'=> 'un baño adaptado de una habitación',
          ]
          ]);
    }
}
