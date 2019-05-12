<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class AuthTest extends TestCase
{


    use DatabaseTransactions;

    protected $faker;



    public function testLogin()
    {

        $user = factory(\App\Models\User::class)->create(['password'=>'secret']);
        $response  = $this->post('/api/auth/login',[
            'email'=>$user->email,
            'password'=>'secret',
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'access_token',
            'expires_in'
        ]);
    }


    public function testLoginFailed()
    {
        $user = factory(\App\Models\User::class)->make();
        $response  = $this->post('/api/auth/login',[
            'email'=>$user->email,
            'password'=>'wrong password'
        ]);
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

}
