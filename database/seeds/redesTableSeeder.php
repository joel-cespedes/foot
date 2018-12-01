<?php

use Illuminate\Database\Seeder;

class redesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= array(
            [
                'nombre' => 'twitter',
                'url' => 'http://twitter.com',
                'clase' => 'twitter',
                'orden' => 0,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'nombre' => 'facebook',
                'url' => 'http://facebook.com',
                'clase' => 'facebook',
                'orden' => 0,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'nombre' => 'instagram',
                'url' => 'http://instagram.com',
                'clase' => 'instagram',
                'orden' => 0,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ],
            [
                'nombre' => 'Google plus',
                'url' => 'http://instagram.com',
                'clase' => 'google-plus',
                'orden' => 0,
                'created_at'=> new DateTime,
                'updated_at'=> new DateTime
            ]
        );
        \App\rede::insert($data);
    }
}
