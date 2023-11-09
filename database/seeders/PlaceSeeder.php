<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
              'address'=> 'Uruguay 80',
              'city'=> 'Moreno',
              'province'=> 'Buenos Aires',
              'coordinates'=> '86X7+X3 Moreno, Provincia de Buenos Aires',
              'description'=> 'Laboratorio de análisis clínicos',
              'main_img'=> 'places/1.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Av. del Libertador 2',
              'city'=> 'Moreno',
              'province'=> 'Buenos Aires',
              'coordinates'=> '9625+58 Moreno, Provincia de Buenos Aires',
              'description'=> 'Restaurante y cafetería',
              'main_img'=> 'places/2.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Adolfo Alsina 525',
              'city'=> 'CABA',
              'province'=> 'Buenos Aires',
              'coordinates'=> '9JQG+WC Buenos Aires',
              'description'=> 'Hotel',
              'main_img'=> 'places/3.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Concejal Alberto Rosset 200',
              'city'=> 'Moreno',
              'province'=> 'Buenos Aires',
              'coordinates'=> '9634+MP Moreno, Provincia de Buenos Aires',
              'description'=> 'Cafetería',
              'main_img'=> 'places/4.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Av. Int. Pagano 2666',
              'city'=> 'Moreno',
              'province'=> 'Buenos Aires',
              'coordinates'=> '9637+VF Moreno, Provincia de Buenos Aires',
              'description'=> 'Centro de diagnóstico',
              'main_img'=> 'places/5.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Libertad 1020',
              'city'=> 'CABA',
              'province'=> 'Buenos Aires',
              'coordinates'=> 'CJ38+96 Buenos Aires',
              'description'=> 'Hotel',
              'main_img'=> 'places/6.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Av. del Libertador 1473',
              'city'=> 'CABA',
              'province'=> 'Buenos Aires',
              'coordinates'=> 'CJ84+CQ Buenos Aires',
              'description'=> 'Museo',
              'main_img'=> 'places/7.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Paraná 3745',
              'city'=> 'Martínez',
              'province'=> 'Buenos Aires',
              'coordinates'=> 'FFRG+HP Martínez, Provincia de Buenos Aires',
              'description'=> 'Shopping',
              'main_img'=> 'places/8.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Eduardo Asconapé 81',
              'city'=> 'Moreno',
              'province'=> 'Buenos Aires',
              'coordinates'=> '86X5+FJ Moreno, Provincia de Buenos Aires',
              'description'=> 'Teatro',
              'main_img'=> 'places/9.jpg',
              'alt_main_img' => 'frente del lugar',
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
              'address'=> 'Av. Bartolomé Mitre 2859',
              'city'=> 'Moreno',
              'province'=> 'Buenos Aires',
              'coordinates'=> '9625+FW Moreno, Provincia de Buenos Aires',
              'description'=> 'Restaurante de comida rápida',
              'main_img'=> 'places/10.jpg',
              'alt_main_img' => 'frente del lugar',
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


