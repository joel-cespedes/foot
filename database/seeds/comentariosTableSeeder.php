<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class comentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('\App\comentario');

        $dato = 0;
        while($dato <1000){

            \App\comentario::insert([
                'nombre'=> $faker->name,
                'comentario'=> $faker->paragraph(7),
                'puntuacion'=> $faker->numberBetween(1,5),

                'producto_id'=> $dato>500 ? $faker->numberBetween(1,count(\App\noticia::all())):null,
                'noticia_id'=>  $dato<500 ? $faker->numberBetween(1,count(\App\noticia::all())):null,

                'estado'=> 1,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ]);
            $dato++;
        }



    }
}
