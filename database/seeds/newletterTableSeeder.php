<?php

use Illuminate\Database\Seeder;

class newletterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
            'nombre' => 'Prueba 1',
            'email' => 'prueba@gmail.com',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ],[
            'nombre' => 'Prueba2',
            'email' => 'prueba2@gmail.com',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ]  );
        \App\newsletter::insert($data);
    }
}
