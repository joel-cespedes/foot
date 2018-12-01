<?php
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class cnoticiaNoticiaTableSeeder extends Seeder
{

    public function run()
    {

        $datos = array(
            [
                'cnoticia_id'=>20,
                'noticia_id'=>231,
            ]
           );
        \App\cnoticia_noticia::insert($datos);




    }


}
