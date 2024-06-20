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
          'place_id'=> '1',
          'name'=> 'Laboratorio Moreno',
          'address'=> 'Uruguay 80',
          'city'=> 'Moreno',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.6500566,
          'longitude'=> -58.78737049999999,
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '2',
          'name'=> 'Cóndor Clift - Pizza & Pasta',
          'address'=> 'Av. del Libertador 2',
          'city'=> 'Moreno',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.6496114,
          'longitude'=> -58.7917427,
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '3',
          'name'=> 'Hotel UTHGRA de las Luces',
          'address'=> 'Adolfo Alsina 525',
          'city'=> 'CABA',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.6102136,
          'longitude'=> -58.37389959999999,
          'description'=> 'Este hotel modesto está ubicado en una casa adosada, a 3 minutos a pie de la estación de metro más cercana, a 6 minutos a pie de la Casa Rosada y a 2 km del gran teatro Colón.

          Las habitaciones sencillamente amuebladas disponen de conexión Wi-Fi gratis, TV por cable, caja fuerte y frigobar. Algunas cuentan con capacidad para 3 personas. Se ofrece servicio a la habitación.

          Se ofrece desayuno tipo bufé. Además, dispone de un bar informal, un salón y un centro de negocios.',
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '4',
          'name'=> 'Café Martínez',
          'address'=> 'Concejal Alberto Rosset 200',
          'city'=> 'Moreno',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.6456262,
          'longitude'=> -58.7930454,
          'description'=> 'Cafetería.',
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '5',
          'name'=> 'Diagnóstico Tesla Moreno',
          'address'=> 'Av. Int. Pagano 2666',
          'city'=> 'Moreno',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.6453156,
          'longitude'=> -58.78633549999999,
          'description'=> 'Centro de diagnóstico por imágenes.',
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '6',
          'name'=> 'Cyan Hotel de las Americas',
          'address'=> 'Libertad 1020',
          'city'=> 'CABA',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.59659919999999,
          'longitude'=> -58.3844594,
          'description'=> 'Situado en el corazón del barrio de Recoleta, el Cyan Hotel de las Américas de 4 estrellas ofrece amplias habitaciones con aire acondicionado a pocos metros de las populares avenidas 9 de Julio y Santa Fe. Se proporciona conexión WiFi gratuita.

          Como huésped del Cyan Hotel de las Américas, podrá caminar hasta el Obelisco, la Plaza San Martín, la Catedral Metropolitana y varios otros atractivos de Buenos Aires.

          El hotel ofrece un suntuoso desayuno bufé y otras opciones gastronómicas durante el día en el restaurante y snack bar. Además, el servicio de habitaciones está disponible las 24 horas del día.',
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '7',
          'name'=> 'Museo Nacional de Bellas Artes',
          'address'=> 'Av. del Libertador 1473',
          'city'=> 'CABA',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.5839894,
          'longitude'=> -58.3930044,
          'description'=> 'El Museo Nacional de Bellas Artes, ubicado en la Ciudad de Buenos Aires, es una de las instituciones públicas de arte más importantes de Argentina. Alberga un patrimonio sumamente diverso, que incluye más de 12 000 piezas, entre pinturas, esculturas, dibujos, grabados, textiles y objetos.',
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '8',
          'name'=> 'Unicenter',
          'address'=> 'Paraná 3745',
          'city'=> 'Martínez',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.50860350000001,
          'longitude'=> -58.5231694,
          'description'=> 'Unicenter Shopping es el centro comercial más grande de la Argentina. El shopping, que pertenece al holding chileno Cencosud, fue inaugurado el 12 de octubre de 1988, y se encuentra ubicado en la localidad de Martínez.',
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '9',
          'name'=> 'Teatro Marechal',
          'address'=> 'Eduardo Asconapé 81',
          'city'=> 'Moreno',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.651283,
          'longitude'=> -58.790889,
          'description'=> 'Teatro Marechal es un teatro municipal ubicado en la ciudad de Moreno, provincia de Buenos Aires, Argentina.',
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '10',
          'name'=> 'McDonald\'s',
          'address'=> 'Av. Bartolomé Mitre 2859',
          'city'=> 'Moreno',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.6486788,
          'longitude'=> -58.7906202,
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
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '11',
          'name'=> 'Perla Norte',
          'address'=> 'Bv. Marítimo P. P. Ramos 230',
          'city'=> 'Mar del Plata',
          'province'=> 'Buenos Aires',
          'latitude'=> -37.9839161,
          'longitude'=> -57.54423289999999,
          'description'=> 'Estacionamiento prioritario, rampa de acceso (pendiente pronunciada), circulaciones garantizadas por rampas asistidas, unidades de sombra, sanitario y vestuario accesible y 4 sillas anfibias en sector público',
          'main_img'=> 'places/11.jpg',
          'alt_main_img' => 'frente del lugar',
          'access_entrance'=> true,
          'assisted_access_entrance'=> true,
          'internal_circulation'=> true,
          'bathroom'=> true,
          'adult_changing_table'=> false,
          'parking'=> true,
          'elevator'=> false,
          'src_info_id'=> '4',
          'review_id'=> NULL,
          'category_id'=> '5',
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '12',
          'name'=> 'Alamos Del Mar Apart Hotel & Spa',
          'address'=> 'Betbeder 249 (Esq. Azopardo)',
          'city'=> 'Valeria del Mar, Pinamar',
          'province'=> 'Buenos Aires',
          'latitude'=> -37.14031818218002,
          'longitude'=> -56.87687092816567,
          'description'=> 'Situado en la localidad de Valeria del Mar (Pdo. de Pinamar), a tan solo 360 km de la Capital Federal, Alamos del Mar Apart Hotel & Spa conjuga las modernas tendencias en apart hoteles de diseño con la exquisita combinación de paisajes de caminos ondulantes, bosques y playa de fina arena. Cabe destacar que Valeria del Mar ha preservado su litoral marino con sus grandes extensiones de médanos, permitiéndole disfrutar más aún de sus playas.

          Al ingresar a nuestro apart hotel sentirá un cambio de dimensión, en sus ambientes usted disfrutará del confort, la tranquilidad y la seguridad que hacen de Alamos del Mar la diferencia a la hora de elegir un exclusivo lugar para su descanso.

          Alamos del Mar es un sitio nuevo y diferente, donde el huésped se encontrará rodeado de comodidades, en medio de un balneario excepcional, con edificaciones de estilo moderno, su centro comercial que crece día a día y junto a sus exclusivas playas, donde la serenidad es su característica distintiva.

          Los esperamos para ofrecerles servicios de excelencia en Hotelería y Gastronomía, para que sus vacaciones sean lo que usted y su familia esperan, siendo éste nuestro principal objetivo.



          Estacionamiento accesible

          Ingreso accesible o asistido (80 cm o más, rampas)

          Circuito interior accesible

          Baño adaptado en zona común

          Ascensor (80 cm o más)

          Ascensor con parada lumínica

          Botonera Braille

          Parada sonora

          Habitación accesible

          Información Accesible

          Video con subtítulos

          Alimentos sin TACC',
          'main_img'=> 'places/12.jpg',
          'alt_main_img' => 'complejo con pileta',
          'access_entrance'=> true,
          'assisted_access_entrance'=> true,
          'internal_circulation'=> true,
          'bathroom'=> true,
          'adult_changing_table'=> false,
          'parking'=> true,
          'elevator'=> true,
          'src_info_id'=> '1',
          'review_id'=> NULL,
          'category_id'=> '1',
          'uploaded_from_id'=> '3',
        ],
        [
          'place_id'=> '13',
          'name'=> 'Be Hollywood',
          'address'=> 'Humboldt 1726',
          'city'=> 'CABA',
          'province'=> 'Buenos Aires',
          'latitude'=> -34.58439584463534,
          'longitude'=> -58.4352569606773,
          'description'=> 'Be Hollywwod Hotel sorprende con su calidez y excelencia en servicio, ofreciendo a sus huéspedes desayuno y wifi gratuito,, una terraza con vista panorámica de Palermo Hollywood, barrio con un sin fin de bares y restaurantes, casas de decoración, galerías de arte y boutiques de moda.

          Posee acceso para huéspedes con movilidad reducida.',
          'main_img'=> 'places/13.jpg',
          'alt_main_img' => 'habitación con cama doble',
          'access_entrance'=> true,
          'assisted_access_entrance'=> true,
          'internal_circulation'=> true,
          'bathroom'=> true,
          'adult_changing_table'=> false,
          'parking'=> true,
          'elevator'=> true,
          'src_info_id'=> '1',
          'review_id'=> NULL,
          'category_id'=> '1',
          'uploaded_from_id'=> '3',
        ]

      ]
    );
  }
}


