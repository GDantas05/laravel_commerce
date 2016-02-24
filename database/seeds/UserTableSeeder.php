<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('users')->truncate(); //LIMPA A TABELA
        
        $faker = Faker::create();
        
        User::create([
            'name'     => 'Gabriel',
            'email'    => 'contatogdantas@gamil.com',
            'password' => Hash::make('123456')
        ]);
        
        foreach(range(1, 10) as $i) {
           User::create([
                'name'     => $faker->name(),
                'email'    => $faker->email(),
                'password' => Hash::make($faker->word())
           ]); 
        }
        
        //factory('CodeCommerce\User', 10)->create();
    }
    
}