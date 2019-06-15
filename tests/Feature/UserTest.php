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
        $response = $this->actingAs($this->makeAdmin())->get('/api/acl/users/'.$item->id);
        $response->assertStatus(200);


    }


    public function testListUser()
    {
        $response = $this->actingAs($this->makeAdmin())->get('/api/acl/users');

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

        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/users',$data);
        $response->assertStatus(201);

    }

    public function testUpdateUser()
    {

        $item = factory(User::class)->create();
        $data = [
            'username' => 'test'.uniqid(),
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/acl/users/'.$item->id,$data);
        $response->assertStatus(200);

    }

    public function testDeleteUser()
    {

        $item = factory(User::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/acl/users/'.$item->id);
        $response->assertStatus(200);

    }

    public function testUsernameRequiredRule()
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

        //username required
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/users',array_merge($data,['username'=>null]));
        $response->assertStatus(422);
        $response->assertSee('The username field is required.');

    }

    public function testUsernameUniqueRule()
    {

        $item = factory(User::class)->create();
        $data = [
            'username' => $item->username,
            'password'=> 'secret',
            'password_confirmation' => 'secret',
            'active'=>$item->active,
            'email'=>$item->email,
            'mobile'=>$item->mobile

        ];

        //username required
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/users',$data);
        $response->assertStatus(422);
        $response->assertSee('The username has already been taken.');

    }

    public function testEmailRequiredRule()
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

        //username required
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/users',array_merge($data,['email'=>null]));
        $response->assertStatus(422);
        $response->assertSee('The email field is required.');

    }

    public function testEmailUniqueRule()
    {

        $item = factory(User::class)->create();
        $data = [
            'username' => $item->username.uniqid(),
            'password'=> 'secret',
            'password_confirmation' => 'secret',
            'active'=>$item->active,
            'email'=>$item->email,
            'mobile'=>$item->mobile

        ];

        //username required
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/users',$data);
        $response->assertStatus(422);
        $response->assertSee('The email has already been taken.');

    }

    public function testEmailValidRule()
    {

        $item = factory(User::class)->make();
        $data = [
            'username' => $item->username.uniqid(),
            'password'=> 'secret',
            'password_confirmation' => 'secret',
            'active'=>$item->active,
            'email'=>'Invalid email',
            'mobile'=>$item->mobile

        ];

        //username required
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/users',$data);
        $response->assertStatus(422);
        $response->assertSee('The email must be a valid email address');

    }

}
