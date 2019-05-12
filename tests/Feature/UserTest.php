<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testListUser()
    {
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/users');

        $response->assertStatus(200);
    }


    public function testCreateUser()
    {

        $item = factory(User::class)->make();
        $data = [
            'username' => $item->username,
            'password'=> 'secret',
            'password_confirmation' => 'secret',
            'active'=>$item->active,
            'email'=>$item->email,
            'mobile'=>$item->mobile

        ];

        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/users',$data);
        $response->assertStatus(200);


    }
}
