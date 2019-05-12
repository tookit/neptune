<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Faker\Factory as Faker;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;


    /**
     * @var \Faker\Generator
     */
    protected $faker;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->faker = Faker::create();
    }

    public function makeAdmin(){


        return  User::updateOrCreate(

            ['email' => config('admin.email')],

            [
                'username' => config('admin.username'),
                'email' => config('admin.email'),
                'password' => config('admin.password'),
                'active'=>1
            ]);
    }
}
