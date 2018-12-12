<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use DatabaseTransactions;

    protected $faker;



    public function setUp()
    {
        parent::setUp();

        $this->faker = Faker::create();
    }

    public function testUserPassLogin()
    {
        $password = 'secret';
        $credential = [
            'grant_type' => 'password',
            'scope' => '',
            'client_id' => 2,
            'client_secret' => 'OTVaq3rofuJycddMxmnD4t0WmzvPK91rt2wbaZ05',
            'username' => 'wangqiangshen@gmail.com',
            'password' => $password,
        ];
        $response = $this->post('/oauth/token',$credential);
        $response->assertStatus(200);
    }


    public function testLoginFailed()
    {

    }

}
