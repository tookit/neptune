<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Http\JsonResponse;
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
        $response = $this->actingAs($this->makeAdmin())->get('/api/acl/roles/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);


    }


    public function testListRole()
    {
        $response = $this->actingAs($this->makeAdmin())->get('/api/acl/roles');
        $response->assertStatus(JsonResponse::HTTP_OK);
    }


    public function testCreateRole()
    {

        $item = factory(Role::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/roles',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdateRole()
    {

        $item = factory(Role::class)->create();
        $data = [
            'name' => 'test'.uniqid(),
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/acl/roles/'.$item->id,$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDeleteRole()
    {

        $item = factory(Role::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/acl/roles/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testNameRequiredRule()
    {

        $item = factory(Role::class)->make();
        $data = $item->getAttributes();

        //username required
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/roles',array_merge($data,['name'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The name field is required.');

    }

    public function testSlugRequiredRule()
    {

        $item = factory(Role::class)->make();
        $data = $item->getAttributes();

        //username required
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/roles',array_merge($data,['slug'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The slug field is required.');

    }


    public function testSlugUniqueRule()
    {

        $item = factory(Role::class)->create();
        $data = [
          'name'=>$item->name,
          'slug'=>$item->slug,
        ];

        //username required
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/roles',$data);
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The slug has already been taken.');

    }



}
