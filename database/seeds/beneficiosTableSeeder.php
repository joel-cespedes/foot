<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class beneficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('\App\beneficios');




            \App\beneficios::insert(
            [[
                'titulo'=> 'Poderoso antioxidante.',
                'nombre'=> 'Es el berry con más antioxidantes de la naturaleza.',
                'producto_id'=>1,
                 ],[
                'titulo'=> 'Purificador natural',
                'nombre'=>'El maqui es un desintoxicante que ayuda al organismo a eliminar las toxinas del cuerpo.',
                'producto_id'=>1,
                 ],[
                'titulo'=> 'Fortalece la Salud',
                'nombre'=>'Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
                'producto_id'=>1,
                 ],[
                'titulo'=> 'Fortalece la Salud.',
                'nombre'=>'Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
                'producto_id'=>1,
                 ],[
                'titulo'=> 'belleza y juventud.',
                'nombre'=>'Contiene antioxidantes y es desintoxicante. Combate el acné y la caída del pelo.',
                'producto_id'=>2,
                 ],[
                'titulo'=> 'Colesterol.',
                'nombre'=>'Regula el colesterol. Contiene vitamina B 12 y ácidos grasos esenciales.',
                'producto_id'=>2,
                 ],[
                'titulo'=> 'Potencia el sistema inmune.',
                'nombre'=>'Contiene componentes desinflamatorios y regula la flora intestinal.',
                'producto_id'=>2,
                 ],[
                'titulo'=> 'Fortalece tu salud.',
                'nombre'=>'Triptofano, aminoácido esencial que ayuda al sistema nervioso dando descanso y ayudando a reponer estados depresivos.',
                'producto_id'=>2,
                 ],[
                'titulo'=> 'Quemador de grasa',
                'nombre'=>'La Frambuesa contiene cetonas que estimulan la producción de Adiponectina en nuestro organismo.',
                'producto_id'=>3,
                ],[
                'titulo'=> 'Vitaminas',
                'nombre'=>'Contiene betacaroteno, vitaminas A, E y C esto suma efectos en los niveles de colesterol.',
                'producto_id'=>3,
                 ],[
                'titulo'=> 'Regenerador de la piel',
                'nombre'=>'Trabaja en la regeneración de las células de los tejidos. Sumada a sus propiedades antiinflamatorias.',
                'producto_id'=>5,
                 ],[
                'titulo'=> 'Fortalece la Salud',
                'nombre'=>'Potente antiinflamatorio, analgésico, antiespasmódico, antiséptico y astringente.',
                'producto_id'=>5,
                 ],[
                'titulo'=> 'Antiage',
                'nombre'=>'Combate las enfermedades asociadas al envejecimiento como el aumento del colesterol.',
                'producto_id'=>4,
                 ],[
                'titulo'=> 'Vitamina C y Antioxidantes',
                'nombre'=>'Clave para el tratamiento de infecciones, contiene vitamina A, complejo B y zinc.',
                'producto_id'=>4,
                 ],[
                'titulo'=> 'Calcio',
                'nombre'=>'Gracias a su concentración de calcio, magnesio y potasio, protege huesos, dientes y articulaciones.',
                'producto_id'=>4,
                 ]]
            );

        }



}
