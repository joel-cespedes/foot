<?php
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class correosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('\App\correo');

        $dato = 0;
        while($dato <18){

         \App\correo::insert([
            'remitente'=> $faker->name,
            'correo'=>$faker->paragraph(3),
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ]);


        $dato++;
    }


    }
}
