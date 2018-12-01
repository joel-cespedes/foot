<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\producto;
class productoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create(\App\producto::class);



       $datos= array( [
                  'm_title'=> 'Maqui',
                  'm_description'=> 'Reconvierte radicales libres en células sanas, rejuveneciéndolas y previniendo enfermedades.   ',
                  'm_key'=>'Maqui',
                  'canonical'=>'',
                  'nombre'=>'Maqui',
                  'slogan'=>  'Reconvierte radicales libres en células sanas, rejuveneciéndolas y previniendo enfermedades.   ',
                  'descripcion'=>  'El Maqui ayuda a desintoxicar tu cuerpo evitando la alcalinidad que es una de las causantes de muchas enfermedades en el cuerpo, incluso el cancer.
En pocas semanas será evidente en tu cuerpo los cambios internos',
                  'beneficios'=>  'Poderoso antioxidante                  Es el berry con más antioxidantes de la naturaleza.       Purificador natural El maqui es un desintoxicante que ayuda al organismo a eliminar las toxinas del cuerpo Fortalece la Salud              Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
                  'promo'=> '30% de descuento por el mes de Marzo',
                  'palabras'=> 'ANTIOXIDANTE | PURIFICADOR | FORTALEZA',
                  'visitas'=> $faker->numberBetween(0,800),
                  'img'=> 'maqui-producto.png',
                  'nimg'=> 'alt de la imágen' ,
                  'cproducto_id'=> 1,
                  'precio'=> 200,
                  'url'=> 'alimentos-maqui',
                  'oferta'=> $faker->numberBetween(0,1),
                  'created_at'=> new DateTime,
                  'updated_at'=> new DateTime
              ],
           [
              'm_title'=> 'Spirulina',
              'm_description'=> '21 de los 23 aminoácidos escenciales para sentirte más fuerte y joven.',
              'm_key'=>'Spirulina',
              'canonical'=>'',
              'nombre'=>'Spirulina',
              'slogan'=>  '21 de los 23 aminoácidos escenciales para sentirte más fuerte y joven.',
              'descripcion'=>  'Microalga complementará tu dieta y te ayudará a retrasar el envejecimiento de tu piel y pelo.
Recomendada por la ONU para combatir las anemias de tipo crónico o por temas económico sociales. Elegida por la NASA como suplemento ideal para sus astronautas.',              'beneficios'=>  'belleza y juventud.
Contiene antioxidantes y es desintoxicante. Combate el acné y la caída del pelo.

Colesterol
egula el colesterol. Contiene vitamina B 12 y ácidos grasos esenciales.

Potencia el sistema inmune.
Contiene componentes desinflamatorios y regula la flora intestinal.

Fortalece tu salud.
Triptofano, aminoácido esencial que ayuda al sistema nervioso dando descanso y ayudando a reponer estados depresivos.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'BELLEZA  | POTENCIA | FORTALEZA',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'spirulina-producto-2.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 1,
               'precio'=> 200,
               'url'=> 'alimentos-spirulina',
               'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ],

[
              'm_title'=> 'Frambuesa',
              'm_description'=> 'Enciende tu metabolismo, ponlo a quemar grasas.',
              'm_key'=>'Frambuesa',
              'canonical'=>'',
              'nombre'=>'Frambuesa',
              'slogan'=>  'Enciende tu metabolismo, ponlo a quemar grasas.',
              'descripcion'=>
              'Con sus propiedades “termogénicas” convierten a este delicado fruto en un poderoso quemador de grasas. Las cetonas de la frambuesa son el botón de encendido que acelera el metabolismo.

Este fruto patagónico es el gran aliado de nuestras dietas y ejercicios para bajar de peso.',



    'beneficios'=>  'Quemador de grasa
La Frambuesa contiene cetonas que estimulan la producción de Adiponectina en nuestro organismo.

Vitaminas
Contiene betacaroteno, vitaminas A, E y C esto suma efectos en los niveles de colesterol.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'QUEMADOR | VITAMINAS',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'frambuesa-producto.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 1,
                'precio'=> 200,
              'url'=> 'alimentos-frambuesa',
              'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ],
[
              'm_title'=> 'Arándano',
              'm_description'=> 'Reprograma tu organismo combate infecciones.',
              'm_key'=>'Arandano',
              'canonical'=>'',
              'nombre'=>'Arándano',
              'slogan'=>  'Reprograma tu organismo combate infecciones.',
              'descripcion'=> 'Con propiedades anticépticas que combaten la proliferación de bacterias y reducen las inflamaciones. Baja calorías, contiene menos azúcar que la mayoría de las frutas y gran contenido en fibras. Especialmente recomendada para quienes sufren reiteradas infecciones urinarias o adultos mayores.',              'beneficios'=>  'Antiage
Combate las enfermedades asociadas al envejecimiento como el aumento del colesterol.

Vitamina C y Antioxidantes
Clave para el tratamiento de infecciones, contiene vitamina A, complejo B y zinc.

Calcio
Gracias a su concentración de calcio, magnesio y potasio, protege huesos, dientes y articulaciones.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'ANTIAGE | VITAMINAS | CALCIO',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'arandano-producto.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 1,
            'precio'=> 200,
               'url'=> 'alimentos-arandano',
              'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ],
           [
              'm_title'=> 'Rosa Mosqueta',
              'm_description'=> 'Potencia la salud y belleza de la piel de tu cuerpo.',
              'm_key'=>'Rosa Mosqueta',
              'canonical'=>'',
              'nombre'=>'Rosa Mosqueta',
              'slogan'=>  'Potencia la salud y belleza de la piel de tu cuerpo.',
              'descripcion'=>       'Famoso por su uso en cosmética y alimentación. Son reconocidas sus propiedades regeneradoras de la piel y emolientes por su contenido de aceites esenciales. Contiene una enorme cantidad de vitamina C de excelente calidad, menos sensible a su destrucción por efecto de la luz.',
               'beneficios'=>  'Regenerador de la piel
Trabaja en la regeneración de las células de los tejidos. Sumada a sus propiedades antiinflamatorias.

Fortalece la Salud
Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'REGENERADOR | FORTALEZA',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'rosa-mosqueta-producto.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 1,
               'precio'=> 200,
               'url'=> 'alimentos-rosa-mosqueta',
              'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ],[
              'm_title'=> 'Pack Rosa Mosqueta y Arándano',
              'm_description'=> 'Potencia la salud y belleza de la piel de tu cuerpo.',
              'm_key'=>'Rosa Mosqueta, Arándano',
              'canonical'=>'',
              'nombre'=>'Pack Rosa Mosqueta y Arándano',
              'slogan'=>  'Potencia la salud y belleza de la piel de tu cuerpo.',
              'descripcion'=>  'Con nutrientes que aportan propiedades antibacteriales y antiinflamatorias sumadas a su alto contenido antioxidante y vitamina C que refuerzan el sistema inmune.',
              'beneficios'=>  'Regenerador de la piel
Trabaja en la regeneración de las células de los tejidos. Sumada a sus propiedades antiinflamatorias.

Fortalece la Salud
Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'REGENERADOR | FORTALEZA',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'pack-rosa-arandano.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 2,
               'precio'=> 200,
               'url'=> 'alimentos-rosa-mosqueta-arandano',
              'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ],[
              'm_title'=> 'Pack Frambuesa y Spirulina',
              'm_description'=> 'Potencia la salud y belleza de la piel de tu cuerpo.',
              'm_key'=>'Pack Frambuesa y Spirulina',
              'canonical'=>'',
              'nombre'=>'Pack Frambuesa y Spirulina',
              'slogan'=>  'Potencia la salud y belleza de la piel de tu cuerpo.',
              'descripcion'=>  'Súper fruta que contiene gran cantidad de nutrientes que aportan propiedades antibacteriales y antiinflamatorias sumadas a su alto contenido antioxidante y vitamina C que refuerzan el sistema inmune.',
              'beneficios'=>  'Regenerador de la piel
Trabaja en la regeneración de las células de los tejidos. Sumada a sus propiedades antiinflamatorias.

Fortalece la Salud
Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'REGENERADOR | FORTALEZA',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'pack-frambuesa-spirulina.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 2,
               'precio'=> 200,
              'url'=> 'alimentos-Frambuesa-spirulina',
              'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ],[
              'm_title'=> 'Pack Maqui y Frambuesa',
              'm_description'=> 'Potencia la salud y belleza de la piel de tu cuerpo.',
              'm_key'=>'Pack Maqui y Frambuesa',
              'canonical'=>'',
              'nombre'=>'Pack Maqui y Frambuesa',
              'slogan'=>  'Potencia la salud y belleza de la piel de tu cuerpo.',
              'descripcion'=>  'Súper fruta que contiene gran cantidad de nutrientes que aportan propiedades antibacteriales y antiinflamatorias sumadas a su alto contenido antioxidante y vitamina C que refuerzan el sistema inmune.',
              'beneficios'=>  'Regenerador de la piel
Trabaja en la regeneración de las células de los tejidos. Sumada a sus propiedades antiinflamatorias.

Fortalece la Salud
Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'REGENERADOR | FORTALEZA',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'pack-maqui-frambuesa.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 2,
               'precio'=> 200,
               'url'=> 'alimentos-maqui-frambuesa',
              'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ],[
              'm_title'=> 'Pack Maqui, Frambuesa y Spirulina',
              'm_description'=> 'Potencia la salud y belleza de la piel de tu cuerpo.',
              'm_key'=>'Pack Maqui, Frambuesa y Spirulina',
              'canonical'=>'',
              'nombre'=>'Pack Maqui, Frambuesa y Spirulina',
              'slogan'=>  'Potencia la salud y belleza de la piel de tu cuerpo.',
              'descripcion'=>  'Súper fruta que contiene gran cantidad de nutrientes que aportan propiedades antibacteriales y antiinflamatorias sumadas a su alto contenido antioxidante y vitamina C que refuerzan el sistema inmune.',
              'beneficios'=>  'Regenerador de la piel
Trabaja en la regeneración de las células de los tejidos. Sumada a sus propiedades antiinflamatorias.

Fortalece la Salud
Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'REGENERADOR | FORTALEZA',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'pack-maqui-frambuesa-spirulina.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 2,
               'precio'=> 200,
               'url'=> 'alimentos-maqui-frambuesa-spirulina',
              'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ],[
              'm_title'=> 'Pack Arandano, Rosa Mosqueta y Spirulina',
              'm_description'=> 'Potencia la salud y belleza de la piel de tu cuerpo.',
              'm_key'=>'pack Arandano, Rosa Mosqueta y Spirulina',
              'canonical'=>'',
              'nombre'=>'Pack Arandano, Rosa Mosqueta y Spirulina',
              'slogan'=>  'Potencia la salud y belleza de la piel de tu cuerpo.',
              'descripcion'=>  'Súper fruta que contiene gran cantidad de nutrientes que aportan propiedades antibacteriales y antiinflamatorias sumadas a su alto contenido antioxidante y vitamina C que refuerzan el sistema inmune.',
              'beneficios'=>  'Regenerador de la piel
Trabaja en la regeneración de las células de los tejidos. Sumada a sus propiedades antiinflamatorias.

Fortalece la Salud
Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
              'promo'=> '30% de descuento por el mes de Marzo',
              'palabras'=> 'REGENERADOR | FORTALEZA',
              'visitas'=> $faker->numberBetween(0,800),
              'img'=> 'pack-arandano-rosa-mosqueta-spirulina.png',
              'nimg'=> 'alt de la imágen' ,
              'cproducto_id'=> 2,
               'precio'=> 200,
               'url'=> 'alimentos-arandano-rosa-mosqueta-y-spirulina',
              'oferta'=> $faker->numberBetween(0,1),
              'created_at'=> new DateTime,
              'updated_at'=> new DateTime
              ]
    );


\App\producto::insert($datos);



    }
}
