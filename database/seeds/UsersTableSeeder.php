<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // seed admin 
        User::updateOrCreate(
            [
                'username' => Config::get('admin.username'),
                'password' => (Config::get('admin.password')),
                'email' => Config::get('admin.email'),
                'mobile' => Config::get('admin.mobile'),
                'active'=>1,
                'gender' => 'male'
            ]
        );        
        if(Config::get('app.env') !== 'production'){
            
            factory(User::class,25)->create();
        }
    }
}
