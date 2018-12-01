<?php
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class cnoticiaTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create('\App\cnoticia');

        $dato = 0;
        while($dato <10){

        \App\cnoticia::insert([
            'm_title'=> $faker->sentence,
            'm_description'=> $faker->sentence,
            'm_key'=>$faker->word(3),
            'nombre'=> 'Categoria del truco '.($dato+1),
            'img'=> $faker->randomElement(['1.jpg','2.jpg','3.jpg']),
            'nimg'=> 'alt de la imágen',
            'visitas'=> $faker->numberBetween(0,800),
            'slug'=> 'categoria-del-truco-'.($dato+1),
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ]);


        $dato++;
    }


    }
}
