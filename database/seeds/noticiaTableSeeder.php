<?php


use Faker\Factory as Faker;
use Illuminate\Database\Seeder;



class noticiaTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create(\App\noticia::class);


        $dato = 0;
        while($dato <50){


              \App\noticia::insert([
            'm_title'=> $faker->sentence,
            'm_description'=> $faker->sentence,
            'm_key'=>$faker->word,
            'canonical'=>$faker->word,
            'nombre'=> 'Noticia Número '.($dato+1).' '.$faker->sentence,
            'descripcion'=>  $faker->paragraph(5),
            'cuerpo'=> $faker->paragraph(60).'<br>'.$faker->paragraph(60).'<br>'.$faker->paragraph(60).'<br>'.$faker->paragraph(60),
            'visitas'=> $faker->numberBetween(0,800),
            'img'=> $faker->randomElement(['1.jpg','2.jpg','3.jpg']),
            'nimg'=> 'alt de la imágen',
            'slug'=> 'noticia-numero-'.($dato+1),
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
            ]);


            $dato++;
        }


    }
}
