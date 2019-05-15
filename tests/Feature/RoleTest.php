<?php

namespace Tests\Feature;

use App\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testViewRole()
    {

        $item = factory(Role::class)->create();
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/roles/'.$item->id);
        $response->assertStatus(200);


    }


    public function testListRole()
    {
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/roles');
        $response->assertStatus(200);
    }


    public function testCreateRole()
    {

        $item = factory(Role::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/roles',$data);
        $response->assertStatus(201);

    }

//    public function testUpdateUser()
//    {
//
//        $item = factory(Role::class)->create();
//        $data = [
//            'username' => 'test'.uniqid(),
//            'active'=>$item->active,
//            'email'=>$item->email,
//            'mobile'=>'19285468211'
//
//        ];
//        $response = $this->actingAs($this->makeAdmin())->put('/api/cms/users/'.$item->id,$data);
//        $response->assertStatus(200);
//
//    }
//
//    public function testDeleteUser()
//    {
//
//        $item = factory(Role::class)->create();
//        $data = [
//            'username' => 'test'.uniqid(),
//            'active'=>$item->active,
//            'email'=>$item->email,
//            'mobile'=>'19285468211'
//
//        ];
//        $response = $this->actingAs($this->makeAdmin())->delete('/api/cms/users/'.$item->id);
//        $response->assertStatus(200);
//
//    }
//
//    public function testUsernameRequiredRule()
//    {
//
//        $item = factory(Role::class)->make();
//        $data = [
//            'username' => $item->username,
//            'password'=> 'secret',
//            'password_confirmation' => 'secret',
//            'active'=>$item->active,
//            'email'=>$item->email,
//            'mobile'=>$item->mobile
//
//        ];
//
//        //username required
//        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/users',array_merge($data,['username'=>null]));
//        $response->assertStatus(422);
//        $response->assertSee('The username field is required.');
//
//    }
//
//    public function testUsernameUniqueRule()
//    {
//
//        $item = factory(Role::class)->create();
//        $data = [
//            'username' => $item->username,
//            'password'=> 'secret',
//            'password_confirmation' => 'secret',
//            'active'=>$item->active,
//            'email'=>$item->email,
//            'mobile'=>$item->mobile
//
//        ];
//
//        //username required
//        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/users',$data);
//        $response->assertStatus(422);
//        $response->assertSee('The username has already been taken.');
//
//    }



}
