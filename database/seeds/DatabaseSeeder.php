<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $this->call(cproductoTableSeeder::class);
        $this->call(cnoticiaTableSeeder::class);
        $this->call(datosTableSeeder::class);
        $this->call(productoTableSeeder::class);
        $this->call(faqTableSeeder::class);
        $this->call(noticiaTableSeeder::class);
        $this->call(politicaPrivacidadTableSeeder::class);
        $this->call(politicaCookiesTableSeeder::class);
        $this->call(redesTableSeeder::class);
        $this->call(seoTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(tagTableSeeder::class);
        $this->call(correosTableSeeder::class);
        $this->call(comentariosTableSeeder::class);
        $this->call(cnoticiaNoticiaTableSeeder::class);
        $this->call(nosotrosTableSeeder::class);
        $this->call(newletterTableSeeder::class);
        $this->call(entregaFacukTableSeeder::class);
        $this->call(beneficiosTableSeeder::class);




        DB::table('cnoticia_noticia')->truncate();
        DB::table('producto_tag')->truncate();







    }
}
