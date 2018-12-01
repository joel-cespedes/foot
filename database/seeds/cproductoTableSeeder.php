<?php
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class cproductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('\App\cproducto');



         \App\cproducto::insert([[
            'm_title'=> 'productos',
            'm_description'=> 'des productos',
            'm_key'=>'key productos',
            'canonical'=>'',
            'nombre'=>  'Categoria de los Productos ',
            'descripcion'=>$faker->paragraph(1),
            'slug'=> 'categoria-de-los-Productos',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ],[
             'm_title'=> 'packs',
             'm_description'=> 'des packs',
             'm_key'=>'key packs',
             'canonical'=>'',
             'nombre'=>  'Categoria de los packs ',
             'descripcion'=>$faker->paragraph(1),
             'slug'=> 'categoria-de-los-packs',
             'created_at'=> new DateTime,
             'updated_at'=> new DateTime
        ]]);



    }


}
