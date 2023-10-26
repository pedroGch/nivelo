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

          ],
          [
              'id' => '2',
              'name' => 'Recreación y Cultura',
              'icon' => NULL,

          ],
          [
              'id' => '3',
              'name' => 'Comercios',
              'icon' => NULL,

          ],
          [
              'id' => '4',
              'name' => 'Plazas y Parques',
              'icon' => NULL,

          ],
          [
              'id' => '5',
              'name' => 'Playas y Balnearios',
              'icon' => NULL,

          ],
          [
              'id' => '6',
              'name' => 'Gastronomía',
              'icon' => NULL,

          ],
          [
              'id' => '7',
              'name' => 'Oficinas del Estado',
              'icon' => NULL,

          ],
          [
              'id' => '8',
              'name' => 'Educación',
              'icon' => NULL,

          ],
          [
              'id' => '9',
              'name' => 'Deporte',
              'icon' => NULL,

          ],
          [
              'id' => '10',
              'name' => 'Salud',
              'icon' => NULL,

          ],
          [
              'id' => '11',
              'name' => 'Transporte',
              'icon' => NULL,

          ],
          [
              'id' => '12',
              'name' => 'Albergues transitorios',
              'icon' => NULL,
          ]
          ]);
    }
}
