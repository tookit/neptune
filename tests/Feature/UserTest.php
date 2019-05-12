<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testView()
    {

        $item = factory(User::class)->create();
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/users/'.$item->id);
        $response->assertStatus(200);


    }


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
        $response->assertStatus(201);

    }

    public function testUpdateUser()
    {

        $item = factory(User::class)->create();
        $data = [
            'username' => 'test'.uniqid(),
            'active'=>$item->active,
            'email'=>$item->email,
            'mobile'=>'19285468211'

        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/cms/users/'.$item->id,$data);
        $response->assertStatus(200);

    }

    public function testDeleteUser()
    {

        $item = factory(User::class)->create();
        $data = [
            'username' => 'test'.uniqid(),
            'active'=>$item->active,
            'email'=>$item->email,
            'mobile'=>'19285468211'

        ];
        $response = $this->actingAs($this->makeAdmin())->delete('/api/cms/users/'.$item->id);
        $response->assertStatus(200);

    }

}
