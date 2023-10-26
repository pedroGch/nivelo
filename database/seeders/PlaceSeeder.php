<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// DB::table("categories")->insert(
//   [
//     [
//         'id' => '1',
//         'name' => 'Alojamiento',
//         'icon' => NULL,

//     ],


class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table("places")->insert(

        [
          [
              'id'=> '1',
              'name'=> 'Laboratorio Moreno',
              'coordinates'=> '86X7+X3 Moreno, Provincia de Buenos Aires',
              'description'=> 'Laboratorio de análisis clínicos',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> false,
              'elevator'=> false,
              'src_info_id'=> '2',
              'review_id'=> NULL,
              'category_id'=> '10',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '2',
              'name'=> 'Condor Clift - Pizza & Pasta',
              'coordinates'=> '9625+58 Moreno, Provincia de Buenos Aires',
              'description'=> 'Restaurante y cafetería',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> false,
              'elevator'=> true,
              'src_info_id'=> '2',
              'review_id'=> NULL,
              'category_id'=> '6',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '3',
              'name'=> 'Hotel UTHGRA de las Luces',
              'coordinates'=> '9JQG+WC Buenos Aires',
              'description'=> 'Hotel',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> false,
              'elevator'=> true,
              'src_info_id'=> '3',
              'review_id'=> NULL,
              'category_id'=> '1',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '4',
              'name'=> 'Café Martínez',
              'coordinates'=> '9634+MP Moreno, Provincia de Buenos Aires',
              'description'=> 'Cafetería',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> false,
              'elevator'=> false,
              'src_info_id'=> '2',
              'review_id'=> NULL,
              'category_id'=> '6',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '5',
              'name'=> 'Diagnóstico Tesla Moreno',
              'coordinates'=> '9637+VF Moreno, Provincia de Buenos Aires',
              'description'=> 'Centro de diagnóstico',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> true,
              'elevator'=> false,
              'src_info_id'=> '2',
              'review_id'=> NULL,
              'category_id'=> '10',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '6',
              'name'=> 'Cyan Hotel de las Americas',
              'coordinates'=> 'CJ38+96 Buenos Aires',
              'description'=> 'Hotel',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> true,
              'elevator'=> true,
              'src_info_id'=> '2',
              'review_id'=> NULL,
              'category_id'=> '1',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '7',
              'name'=> 'Museo Nacional de Bellas Artes',
              'coordinates'=> 'CJ84+CQ Buenos Aires',
              'description'=> 'Museo',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> false,
              'elevator'=> false,
              'src_info_id'=> '3',
              'review_id'=> NULL,
              'category_id'=> '2',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '8',
              'name'=> 'Unicenter',
              'coordinates'=> 'FFRG+HP Martínez, Provincia de Buenos Aires',
              'description'=> 'Shopping',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> true,
              'elevator'=> true,
              'src_info_id'=> '2',
              'review_id'=> NULL,
              'category_id'=> '3',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '9',
              'name'=> 'Teatro Marechal',
              'coordinates'=> '86X5+FJ Moreno, Provincia de Buenos Aires',
              'description'=> 'Teatro',
              'access_entrance'=> false,
              'assisted_access_entrance'=> true,
              'internal_circulation'=> true,
              'bathroom'=> false,
              'adult_changing_table'=> false,
              'parking'=> false,
              'elevator'=> false,
              'src_info_id'=> '2',
              'review_id'=> NULL,
              'category_id'=> '2',
              'uploaded_from_id'=> '2',
          ],
          [
              'id'=> '10',
              'name'=> 'McDonald\'s',
              'coordinates'=> '9625+FW Moreno, Provincia de Buenos Aires',
              'description'=> 'Restaurante de comida rápida',
              'access_entrance'=> true,
              'assisted_access_entrance'=> false,
              'internal_circulation'=> true,
              'bathroom'=> true,
              'adult_changing_table'=> false,
              'parking'=> false,
              'elevator'=> false,
              'src_info_id'=> '2',
              'review_id'=> NULL,
              'category_id'=> '6',
              'uploaded_from_id'=> '2',
          ]

        ]



      );
    }
}


