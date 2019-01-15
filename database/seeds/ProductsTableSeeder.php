<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // seed admin 

        if(Config::get('app.env') !== 'production'){
            
            factory(User::class,25)->create();
        }
    }
}
