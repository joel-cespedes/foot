<?php

use Illuminate\Database\Seeder;

class seoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
            'nombre_pagina' => 'inicio',
            'm_title' => 'title inicio',
            'm_descripction' => 'descripction inicio',
            'm_key' => 'keywords inicio',
            'canonical' => 'canonical inicio',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ],[
            'nombre_pagina' => 'productos',
            'm_title' => 'title productos',
            'm_descripction' => 'descripction productos',
            'm_key' => 'keywords productos',
            'canonical' => 'canonical productos',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ] ,[
            'nombre_pagina' => 'Trucos',
            'm_title' => 'title Trucos',
            'm_descripction' => 'descripction Trucos',
            'm_key' => 'keywords Trucos',
            'canonical' => 'canonical Trucos',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ] ,[
            'nombre_pagina' => 'Contacto',
            'm_title' => 'title contacto',
            'm_descripction' => 'descripction contacto',
            'm_key' => 'keywords contacto',
            'canonical' => 'canonical contacto',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ], [
            'nombre_pagina' => 'Faqs',
            'm_title' => 'title Faqs',
            'm_descripction' => 'descripction Faqs',
            'm_key' => 'keywords Faqs',
            'canonical' => 'canonical Faqs',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ]);
        \App\seo::insert($data);
    }
}
