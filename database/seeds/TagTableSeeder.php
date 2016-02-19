<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate(); //LIMPA A TABELA
        
        factory('CodeCommerce\Tag', 30)->create();
    }
}
