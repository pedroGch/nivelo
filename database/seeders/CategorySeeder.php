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
          'category_id' => '1',
          'name' => 'Alojamiento',
          'image_cat' => 'categories/cat-alojamiento.jpg',
          'alt_img_cat'=> 'una habitación de hotel',
        ],
        [
          'category_id' => '2',
          'name' => 'Recreación y cultura',
          'image_cat' => 'categories/cat-recreacion-cultura.jpg',
          'alt_img_cat'=> 'sala llena de gente mirando una obra de teatro',
        ],
        [
          'category_id' => '3',
          'name' => 'Comercios',
          'image_cat' => 'categories/cat-comercios.jpg',
          'alt_img_cat'=> 'prendas de ropa en perchas',
        ],
        [
          'category_id' => '4',
          'name' => 'Plazas y parques',
          'image_cat' => 'categories/cat-plazas-parques.jpg',
          'alt_img_cat'=> 'un parque con muchos árboles y personas caminando',
        ],
        [
          'category_id' => '5',
          'name' => 'Playas y balnearios',
          'image_cat' => 'categories/cat-playas-balnearios.jpg',
          'alt_img_cat'=> 'una persona en silla anfibia yendo al mar por una pasarela sobre la arena',
        ],
        [
          'category_id' => '6',
          'name' => 'Gastronomía',
          'image_cat' => 'categories/cat-gastronomia.jpg',
          'alt_img_cat'=> 'una mesa con platos de comida',
        ],
        [
          'category_id' => '7',
          'name' => 'Oficinas del Estado',
          'image_cat' => 'categories/cat-oficinas-estado.jpg',
          'alt_img_cat'=> 'una oficina con escritorios y computadoras',
        ],
        [
          'category_id' => '8',
          'name' => 'Educación',
          'image_cat' => 'categories/cat-educacion.jpg',
          'alt_img_cat'=> 'una mujer estudiando con su notebook',
        ],
        [
          'category_id' => '9',
          'name' => 'Deporte',
          'image_cat' => 'categories/cat-deporte.jpg',
          'alt_img_cat'=> 'una persona sin discapacidad y otra en silla de ruedas en la pista de atletismo',
        ],
        [
          'category_id' => '10',
          'name' => 'Salud',
          'image_cat' => 'categories/cat-salud.jpg',
          'alt_img_cat'=> 'una persona en un consultorio médico',
        ],
        [
          'category_id' => '11',
          'name' => 'Transporte',
          'image_cat' => 'categories/cat-transporte.jpg',
          'alt_img_cat'=> 'un subte en una estación',
        ],
        [
          'category_id' => '12',
          'name' => 'Albergues transitorios',
          'image_cat' => 'categories/cat-albergues-transitorios.jpg',
          'alt_img_cat'=> 'un baño adaptado de una habitación',
        ]
      ]
    );
  }
}
