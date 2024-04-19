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
        ],
        [
          'id' => 2,
          'title' => 'La crisis climática empeora: Informe de la ONU muestra que la temperatura global sigue aumentando',
          'image' => 'noticias/cambio-climatico.jpg',
          'alt' => 'tierra resquebrajada por la sequía, de fondo, edificios de una ciudad',
          'content' => 'Un nuevo informe de la ONU muestra que la temperatura global sigue aumentando a un ritmo alarmante. Según los expertos, la crisis climática ya está teniendo graves consecuencias en todo el mundo, como el aumento del nivel del mar, eventos climáticos extremos y la pérdida de especies animales y vegetales.

          El informe destaca que la principal causa del aumento de la temperatura global es la emisión de gases de efecto invernadero, principalmente dióxido de carbono, generado por actividades humanas como la quema de combustibles fósiles. Los expertos advierten que si no se toman medidas urgentes para reducir estas emisiones, los efectos del cambio climático solo empeorarán.

          El informe también destaca la necesidad de transitar hacia una economía más sostenible, con la utilización de fuentes de energía renovable y la implementación de prácticas de producción y consumo más responsables.

          En nuestra tienda online, ofrecemos una amplia variedad de productos sostenibles, como paneles solares, calefactores solares y productos para el compostaje, con el objetivo de ayudar a los clientes a reducir su huella de carbono y aportar a la lucha contra la crisis climática.',

        ],
        [
          'id' => 3,
          'title' => 'El reciclaje de plásticos se vuelve más accesible gracias a una nueva tecnología',
          'image' => 'noticias/contaminacion-mar.png',
          'alt' => 'basura en el océano',
          'content' => 'El plástico es uno de los materiales más utilizados en el mundo, pero también es uno de los más contaminantes. Afortunadamente, hay tecnologías emergentes que están haciendo que el reciclaje de plásticos sea más accesible y eficiente. Una nueva tecnología que está ganando popularidad es la pirólisis, que convierte los desechos plásticos en productos valiosos, como combustibles y productos químicos.

          La pirólisis funciona calentando los desechos plásticos en ausencia de oxígeno, lo que los convierte en gas. Este gas se puede enfriar y condensar para producir una variedad de productos útiles. Esta tecnología es muy prometedora porque puede procesar una amplia gama de plásticos, incluidos los tipos difíciles de reciclar, como el PVC.

          En nuestra tienda online, fomentamos el uso de productos reciclados y el reciclaje en general. Ofrecemos una amplia gama de productos para el reciclaje en el hogar, como contenedores de reciclaje y herramientas para el compostaje.',

        ],
        [
          'id' => 4,
          'title' => 'Cada vez más hogares apuestan por la energía solar para reducir su huella de carbono',
          'image' => 'noticias/energia-solar-1.jpg',
          'alt' => 'panel solar',
          'content' => 'El cambio hacia la energía solar está ganando impulso en todo el mundo, y cada vez más hogares están adoptando soluciones sostenibles para reducir su impacto ambiental. Según los expertos, la energía solar es una de las opciones más efectivas para reducir la huella de carbono, ya que no solo es una fuente de energía limpia, sino que también es renovable y cada vez más accesible.

          En los últimos años, el costo de la energía solar ha disminuido significativamente, lo que ha hecho que sea más asequible para los hogares y las empresas. Además, las innovaciones tecnológicas en la industria solar han mejorado la eficiencia de los paneles solares, lo que significa que los hogares pueden obtener más energía de cada panel.

          En nuestra tienda online, ofrecemos una amplia gama de productos solares, desde paneles solares hasta cargadores y lámparas solares, todos diseñados para ayudarte a reducir tu huella de carbono. Al invertir en energía solar, no solo estás haciendo tu parte para cuidar el medio ambiente, sino que también estás ahorrando dinero a largo plazo en tu factura de energía.',

        ]
      ]
    );
  }
}
