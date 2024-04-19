<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
  /**
  * Run the database seeds.
  */
  public function run(): void
  {
    DB::table('blog')->insert(
      [
        [
          'id' => 1,
          'title' => 'Accesibilidad y Diseño Universal',
          'image' => 'blog/accesibilidad-01.jpg',
          'alt' => 'logo de discapacidad pintado en el piso',
          'content' => 'La accesibilidad es un conjunto de características que debe disponer un entorno urbano, edificación, producto, servicio o medio de comunicación para ser utilizado en condiciones de comodidad, seguridad, igualdad y autonomía, por todas las personas, incluso por aquellas con capacidades motrices o sensoriales diferentes.

          La accesibilidad es una necesidad para las personas con discapacidad y una ventaja para todos los ciudadanos. Existe una diferencia entre ACCESIBILIDAD Y DISEÑO UNIVERSAL:

          El diseño universal es cómo se piensa, lo que está antes del producto, mientras la accesibilidad es el producto realizado.

          Cuando se habla de accesibilidad no se relaciona a una sola cosa o producto sino a una cadena de accesibilidad, que se refiere a la capacidad de aproximarse, acceder, usar y salir de todo espacio o recinto con independencia, facilidad y sin interrupciones. Si cualquiera de las tres anteriores acciones no es posible de realizar, la cadena se corta y el espacio o situación se torna accesible.

          Importante saber que la accesibilidad es un principio de la Convención Internacional sobre los derechos de las personas con discapacidad, pues permite asegurar la igualdad de oportunidades y  el principio de la autonomía.

          “UNA BUENA ACCESIBILIDAD ES AQUELLA QUE EXISTE PERO QUE PASA DESAPERCIBIDA PARA LA MAYORÍA DE USUARIOS", ARQUITECTO ENRIQUE ROVIRA BELETA.

          Les compartimos un conversatorio realizado en el marco del “Mes de la Inclusión (septiembre 2020)”, organizado por COMUNIDIS, Consejo Municipal para la Inclusión del Municipio de Moreno.

          Como invitado, Cristian Baraldo (@cristianbaraldook), Asesor en ALPI en el Programa de Certificación de Accesibilidad, desde la mirada de la Arquitectura Accesible y El Diseño Universal, generando espacios de trabajo accesibles en grandes empresas.

          Entrevistó Rocío Scotto, del equipo de desarrollo de Nivelo y, en ese entonces, Presidente de COMUNIDIS.
          ',
          'video' => 'https://www.youtube.com/embed/EqAODF2ffvA',
          'created_at' => '2023-07-15 14:21:00',
        ],
        [
          'id' => 2,
          'title' => 'Accesibilidad y Diseño Universal2',
          'image' => 'blog/accesibilidad-01.jpg',
          'alt' => 'logo de discapacidad pintado en el piso',
          'content' => 'La accesibilidad es un conjunto de características que debe disponer un entorno urbano, edificación, producto, servicio o medio de comunicación para ser utilizado en condiciones de comodidad, seguridad, igualdad y autonomía, por todas las personas, incluso por aquellas con capacidades motrices o sensoriales diferentes.

          La accesibilidad es una necesidad para las personas con discapacidad y una ventaja para todos los ciudadanos. Existe una diferencia entre ACCESIBILIDAD Y DISEÑO UNIVERSAL:

          El diseño universal es cómo se piensa, lo que está antes del producto, mientras la accesibilidad es el producto realizado.

          Cuando se habla de accesibilidad no se relaciona a una sola cosa o producto sino a una cadena de accesibilidad, que se refiere a la capacidad de aproximarse, acceder, usar y salir de todo espacio o recinto con independencia, facilidad y sin interrupciones. Si cualquiera de las tres anteriores acciones no es posible de realizar, la cadena se corta y el espacio o situación se torna accesible.

          Importante saber que la accesibilidad es un principio de la Convención Internacional sobre los derechos de las personas con discapacidad, pues permite asegurar la igualdad de oportunidades y  el principio de la autonomía.

          “UNA BUENA ACCESIBILIDAD ES AQUELLA QUE EXISTE PERO QUE PASA DESAPERCIBIDA PARA LA MAYORÍA DE USUARIOS", ARQUITECTO ENRIQUE ROVIRA BELETA.

          Les compartimos un conversatorio realizado en el marco del “Mes de la Inclusión (septiembre 2020)”, organizado por COMUNIDIS, Consejo Municipal para la Inclusión del Municipio de Moreno.

          Como invitado, Cristian Baraldo (@cristianbaraldook), Asesor en ALPI en el Programa de Certificación de Accesibilidad, desde la mirada de la Arquitectura Accesible y El Diseño Universal, generando espacios de trabajo accesibles en grandes empresas.

          Entrevistó Rocío Scotto, del equipo de desarrollo de Nivelo y, en ese entonces, Presidente de COMUNIDIS.
          ',
          'video' => 'https://www.youtube.com/embed/EqAODF2ffvA',
          'created_at' => '2023-07-15 14:21:00',

        ],
        [
          'id' => 3,
          'title' => 'Accesibilidad y Diseño Universal3',
          'image' => 'blog/accesibilidad-01.jpg',
          'alt' => 'logo de discapacidad pintado en el piso',
          'content' => 'La accesibilidad es un conjunto de características que debe disponer un entorno urbano, edificación, producto, servicio o medio de comunicación para ser utilizado en condiciones de comodidad, seguridad, igualdad y autonomía, por todas las personas, incluso por aquellas con capacidades motrices o sensoriales diferentes.

          La accesibilidad es una necesidad para las personas con discapacidad y una ventaja para todos los ciudadanos. Existe una diferencia entre ACCESIBILIDAD Y DISEÑO UNIVERSAL:

          El diseño universal es cómo se piensa, lo que está antes del producto, mientras la accesibilidad es el producto realizado.

          Cuando se habla de accesibilidad no se relaciona a una sola cosa o producto sino a una cadena de accesibilidad, que se refiere a la capacidad de aproximarse, acceder, usar y salir de todo espacio o recinto con independencia, facilidad y sin interrupciones. Si cualquiera de las tres anteriores acciones no es posible de realizar, la cadena se corta y el espacio o situación se torna accesible.

          Importante saber que la accesibilidad es un principio de la Convención Internacional sobre los derechos de las personas con discapacidad, pues permite asegurar la igualdad de oportunidades y  el principio de la autonomía.

          “UNA BUENA ACCESIBILIDAD ES AQUELLA QUE EXISTE PERO QUE PASA DESAPERCIBIDA PARA LA MAYORÍA DE USUARIOS", ARQUITECTO ENRIQUE ROVIRA BELETA.

          Les compartimos un conversatorio realizado en el marco del “Mes de la Inclusión (septiembre 2020)”, organizado por COMUNIDIS, Consejo Municipal para la Inclusión del Municipio de Moreno.

          Como invitado, Cristian Baraldo (@cristianbaraldook), Asesor en ALPI en el Programa de Certificación de Accesibilidad, desde la mirada de la Arquitectura Accesible y El Diseño Universal, generando espacios de trabajo accesibles en grandes empresas.

          Entrevistó Rocío Scotto, del equipo de desarrollo de Nivelo y, en ese entonces, Presidente de COMUNIDIS.
          ',
          'video' => 'https://www.youtube.com/embed/EqAODF2ffvA',
          'created_at' => '2023-07-15 14:21:00',

        ]
      ]
    );
  }
}
