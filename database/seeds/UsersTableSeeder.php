<?php
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {


        $faker = Faker::create(\App\User::class);

        \App\User::insert([
            'name'=> 'antoniot',
            'email'=> 'atrombert@comercialmente.cl',
            'password'=> bcrypt('antoniot'),
            'adm'=>$faker->randomElement([User::ADM_NORMAL,User::ADMIN])
        ],
            [
                'name'=> 'joel',
                'email'=> 'atrombert@comercialmente.cl',
                'password'=> bcrypt('123123'),
                'adm'=>$faker->randomElement([User::ADM_NORMAL,User::ADMIN])
            ]);



    }
}
