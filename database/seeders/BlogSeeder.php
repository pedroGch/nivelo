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
          'source' => NULL,
          'created_at' => '2023-07-15 14:21:00',
        ],
        [
          'id' => 2,
          'title' => 'Autonomía no es arreglárselas solo',
          'image' => 'blog/accesibilidad-02.jpg',
          'alt' => 'foto de una silla de ruedas que no puede subir un escalón del cordón',
          'content' => ' Las personas que nos acompañan en el día a día, las condiciones de accesibilidad de los espacios que habitamos y los elementos de ayuda, son pilares fundamentales para quienes tenemos problemas de movilidad. Cada cual, en su medida, crean un entramado que posibilita el desarrollo de nuestra autonomía. Tres testimonios de vida lo reflejan.

          La realidad nos confronta con circunstancias a las que tenemos que encontrarle la vuelta. En ellas es donde se manifiesta la diversidad en todas sus formas: de vínculos, de lógicas de uso del espacio, de necesidades, de situaciones vitales, de problemáticas… Resulta indispensable salir de la zona de confort, de lo conocido y aceptado como normalidad, y comprender que hacemos lo que podemos y de la mejor manera que nos sale. La autonomía no se construye aisladamente, contamos tanto con recursos físicos como las adecuaciones de accesibilidad y las ayudas para la movilidad y vida diaria; como con el entorno humano que nos apoya en nuestras elecciones y nos acompaña en todas aquellas cuestiones que nos es imposible realizar.

          Y sí… autonomía no es arreglárselas solo, sino contar con las condiciones para llevar adelante aquello que deseamos y tener una actitud proactiva respecto de cómo desarrollar una vida plena.

          En esta oportunidad, Jorge, Bety y Marcelo brindan testimonio de ello.

          _____________________________________
          "Superar las dificultades se vuelve una prioridad porque mientras más dependientes nos hacemos, más años y menos energías tienen nuestros padres."
          Jorge, 32 años.

          Cuando la discapacidad se instala en una familia supone toda una serie de cambios a corto, mediano y largo plazo. Más aún si es una cuestión que se agrava con los años y es altamente limitante en sus estadios avanzados. En el caso de mi familia esto se ve amplificado, ya que de los seis hermanos que somos, tres tenemos serias limitaciones físicas asociadas a la Distrofia Muscular Duchenne. Cada etapa presenta diferentes desafíos tanto para nosotros como para el resto del grupo familiar, no es lo mismo necesitar ayuda para subir una escalera que llegar a depender en casi todo de otros: vestirse, levantarse de la cama, bañarse, alimentarse, etc. Y quienes cargan con las responsabilidades de que podamos realizar nuestras actividades diarias, muchas veces, terminan desbordados por la situación y nosotros sintiendo una gran culpabilidad por la imposibilidad de hacer algo al respecto.

          Mis hermanos no afectados fueron durante mucho tiempo el sostén para la dinámica intrafamiliar, nos llevaban a estudiar, eran compañeros de salidas y daban apoyo para nuestra movilización cotidiana. Sin embargo, este esquema tuvo una duración acotada, porque ellos tienen una vida independiente de la nuestra y está bien que así sea.

          La habitación que comparto con mis hermanos se parece cada vez más a la de una clínica, tenemos una grúa para movilizarnos de nuestras sillas de ruedas motorizadas a nuestras camas ortopédicas, insumos médicos, respiradores para cada uno, una silla higiénica y demás artefactos que requerimos a diario. También contamos con la colaboración de una asistente domiciliaria a cargo de mi obra social que les aliviana enormemente las tareas a mis padres. Hay una asistente en la semana y otra los fines de semana, el trato es de confianza, comparten la mesa y son un miembro más de nuestro hogar durante las horas de trabajo.

          Sin olvidar una figura importantísima, mi kinesiólogo, que me visita dos veces por semana. Con él no solo ejercitamos mis músculos en pos de retrasar el avance de la enfermedad, sino que además prevenimos complicaciones respiratorias. Aprendo la mecánica de los movimientos y el sentido de cada ejercicio en particular, realiza ajustes posturales en mi silla de ruedas y contribuye para mejorar mi desenvolvimiento en acciones de la vida diaria.

          Afortunadamente a pesar de tener una restricción severa en la movilidad, lo compenso con tecnología, actitud positiva y la predisposición para solicitar ayuda a personas de mi entorno o transeúntes desconocidos que practican la solidaridad conmigo. La silla motorizada me abrió las puertas a una mayor autonomía, a tener una vida social activa, también ayudar en los mandados del hogar y hacerme cargo de decisiones que antes quedaban en manos de mis acompañantes. La suma de dichos factores redundó en una mayor autoestima y en el logro de metas personales invaluables.

          A mis treinta y dos años considero a la independencia como un valor que puede ponerse en vigencia en cada pequeña acción individual sin la necesidad de abandonar la comodidad del hogar paterno. Soy independiente en el momento que elijo hacer lo que me gusta. Mi familia no me sobreprotege, y de hecho no interfieren en mi vida privada. De esta forma me siento pleno y disfruto cada segundo, a sabiendas de que aquellas oportunidades que no aproveche hoy no van a estar esperándome mañana.

          _____________________________________
          "Sabía que podía contar con mi familia, cuando necesitaba de su compañía estaban pero sino me dejaban ser lo más libre posible."
          Bety, 33 años.

          Hace 4 años vivo sola, el último año en pareja. Tengo una gata.

          Desde los 10 años tengo distrofia muscular, es genética y la heredé de mi papá, quien falleció hace 18 años. Cuando me detectaron la enfermedad la atención se trasladó hacia mí. Vivíamos en un departamento en primer piso por escalera y, desde que nací, él no caminaba. Jamás lo vi salir a la calle, nunca fuimos a la plaza ni estuvo en los actos del colegio o cuando terminé la primaria.

          Con el paso del tiempo me encontré con mis propias dificultades. Mi mamá nos había enseñado a movernos solas cerca de casa.  Desde muy chica viajaba en colectivo y me gustaba ir los sábados al shopping.  Sin embargo, a los 14 ya me resultaba difícil subir los escalones del colectivo por lo que empecé a manejarme en taxi. Así fue que comencé a tener mayores problemas para moverme en la calle. Si bien cada vez hay más rampas, sobre todo en Capital, las veredas no siempre están en buenas condiciones. Y es frecuente, encontrar autos tapando las rampas, cuestión que aumenta las limitaciones.

          Mi sueño siempre fue vivir sola.  Sin embargo, rondaba en mi cabeza el miedo de todo lo que no podría hacer; me preguntaba cómo lograrlo si dependo de que me compren las cosas en el supermercado, si no puedo sacar la basura, si no puedo limpiar ni cocinarme… Desde los 18 años vivía sola con mis hermanas (más chicas que yo) y todo lo que hubiera que hacer fuera de la casa se encargaban ellas. Entonces, si quería alcanzar mi objetivo tenía que hallar la forma de arreglármelas sola.

          Lo primero que hice fue buscar un departamento accesible: PH en planta baja. A la hora de mudarme había que adaptar mi casa, con ayuda de mi familia modificamos pisos, tiramos abajo paredes, cambiamos las llaves de luz para poder prenderlas desde la puerta y apagarlas desde la cama.

          Y así fueron los primeros inicios en mi elección de independencia. Siempre acompañada. Le siguió la parte más difícil, la adaptación y la organización para que me ayuden sin depender. Yo trabajaba afuera, así que a la tarde mi mamá me traía lo que necesitaba y mis hermanas venían algunas noches para no tener que cocinar y acompañarme.

          Pero al poco tiempo me encontré con nuevos problemas. Me quedé sin trabajo y estuve en un período de transición en el que necesité ayuda económica de mi familia hasta que desarrollé negocio propio en cuál trabajo desde mi casa usando internet y es de lo que vivo hoy en día. Además, las complicaciones físicas eran evidentes, ya no podía salir libremente en taxi, tenía grandes impedimentos para caminar y era muy riesgoso, tuve caídas complicadas, golpes fuertes... Entre mis amigos y hermanas me regalaron un scooter ¡Y ahí no me paró nadie! Conseguí que colocaran la rampa en la entrada del edificio, costó, pero se logró. Volví a hacer mis compras, a cocinarme libremente, a hacer los pagos de impuestos, a viajar en colectivo, a salir cuando quiero de mi casa, a ir a las plazas, y a tener una gata porque había que comprarle la comida y darle de comer. De nuevo pude caminar por las calles de mi barrio, donde nací y viví hasta hace cuatro años y donde, también, muchas veces me caí.

          El scooter eléctrico es el comodín para tener un poco más de tranquilidad porque me caigo menos. Cada caída era traumática, solía estar sola y tenía que rebuscármelas para llegar hasta un teléfono y pedir ayuda para que alguien venga a levantar.

          Nada es fácil, ni cuándo tenés una discapacidad ni cuándo tenés todo resuelto. Un poco es la voluntad, la propia iniciativa y mucho es el entorno. La familia, los amigos y la pareja son quienes nos acompañan en el hacer la vida más simple. También, la gente en la calle es solidaria, cuando me ven se quedan cerquita esperando ayudar. Siempre hay personas dispuestas para acompañarnos como nosotros acompañamos, muchas veces, desde un lado no físico.

          _____________________________________

          "Esa necesidad".
          Marcelo, 51 años.

          Podría contar muchas cosas acerca de las ayudas y asistencias que demandan una discapacidad. Sin embargo, voy a puntualizar en dónde ponemos el ingenio, o al menos desde mi perspectiva, para que sutilmente el otro acceda a nuestro auxilio.

          Es una cuestión personal, marcamos nuestra personalidad desde muy chicos, por lo que al adquirir una discapacidad (como fue en mi caso y contra mi total voluntad) cada cual lo afronta con las herramientas que dispone. En esos tiempos transitaba mis 23 años y me enfrenté a una reprogramación de mi universo cotidiano. Dentro de las circunstancias, las adaptaciones en mí fueron por etapas.  El avance progresivo, pero lento, de mi enfermedad me fue permitiendo afianzarme y adecuarme a las situaciones a resolver conforme iban apareciendo. A lo largo del tiempo, también, fui aprendiendo a conquistar al otro.  Debe ser de esta manera porque el plus de ayuda que nosotros precisamos siempre es más y no tiene hora ni momento. Por eso aprendí que es mejor demandar con ingenio, simpatía y estrategia. No pedir todo de una sola vez sino más bien fraccionar las necesidades, deseos y urgencias de ansiedad que se nos presentan… Y crear una situación, cuando esto suceda, para que el otro se sume con gusto, incluso hasta llegando a aportar más de lo que nuestro pedido de ayuda requería.

          Autor: Cecilia V. García Rizzo. Licenciada en Psicología y Periodista, Coordianadora General del Área de Accesibilidad de Fundación Rumbos (www.rumbos.org.ar).
          Revista Frontera N° 14. Secciones Arquitectura para la Inclusión y Relaciones Afectivas, Febrero 2016.
          ',
          'video' => NULL,
          'source' => 'https://7d0edb39-2fa0-411c-b41d-d4ce1ae339fe.usrfiles.com/ugd/7d0edb_dbb0d652e7344585b158a7cfb31c9034.pdf',
          'created_at' => '2024-04-19 23:38:00',


        ],
        [
          'id' => 3,
          'title' => '15 de marzo - Día de la Accesibilidad',
          'image' => 'blog/accesibilidad-03.jpg',
          'alt' => 'foto de cristian con su silla de ruedas cruzando la calle',
          'content' => 'Video que realizó Cristian Baraldo, asesor de Arquitectura Accesible de la Asociación Civil ALPI (https://alpi.org.ar/), en el marco del Día de la Accesibilidad, que se celebra el 15 de marzo.
          ',
          'video' => 'https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fwatch%2F%3Fv%3D280520893607850&width=1200&show_text=false&appId=6354999337924606&height=720',
          'source' => 'https://www.facebook.com/watch/?v=280520893607850',
          'created_at' => '2024-04-14 14:21:00',

        ]
      ]
    );
  }
}
