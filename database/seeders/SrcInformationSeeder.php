<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SrcInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('src_information')->insert(
        [
          [
            'src_info_id' => '1',
            'name' => 'Información proporcionada por el prestador. Sujeta a verificación.',
            'logo' => NULL,
            'website' => NULL,

          ],
          [
            'src_info_id' => '2',
            'name' => 'Información proporcionada por un usuario. Sujeta a verificación.',
            'logo' => NULL,
            'website' => NULL,

          ],
          [
            'src_info_id' => '3',
            'name' => 'Distinguido por el Programa de Directrices de Accesibilidad de la Secretaría de Turismo de la Nación.',
            'logo' => NULL,
            'website' => NULL,
          ],
          [
            'src_info_id' => '4',
            'name' => 'Documento "Servicios Accesibles Mar del Plata" del Ministerio de Producción, Ciencia e Innovación Tecnológica de la Provincia de Buenos Aires.',
            'logo' => NULL,
            'website' => NULL,
          ],
        ]);
        //
    }
}
