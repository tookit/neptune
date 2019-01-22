<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\ProductCategory;

class ProductsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed product category

        $categories = [
            'Fiber',
            'Accessories',
            'other'

        ];

        collect($categories)->map(function ($name){
            Category::updateOrCreate(['name'=>$name],[$name => $name]);
        });



        if(Config::get('app.env') !== 'production'){

        }
    }
}
