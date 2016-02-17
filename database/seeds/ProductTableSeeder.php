<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('products')->truncate(); //LIMPA A TABELA
        
        factory('CodeCommerce\Product', 20)->create();
    }
    
}