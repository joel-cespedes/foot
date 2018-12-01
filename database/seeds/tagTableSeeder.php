<?php

use Illuminate\Database\Seeder;

class tagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
            'nombre' => 'Arándano',
            'slug' => 'tag-1',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ],[
            'nombre' => 'Frambuesa',
            'slug' => 'tag-2',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ],[
            'nombre' => 'Rosa Mosqueta',
            'slug' => 'tag-3',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ],[
            'nombre' => 'Maqui',
            'slug' => 'tag-4',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ] ,[
            'nombre' => 'Spirulina',
            'slug' => 'tag-5',
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime
        ]  );
        \App\tag::insert($data);
    }
}
