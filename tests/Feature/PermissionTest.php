<?php

namespace Tests\Feature;

use App\Models\Permission;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testViewPermission()
    {

        $item = factory(Permission::class)->create();
        $response = $this->actingAs($this->makeAdmin())->get('/api/acl/permissions/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);


    }


    public function testListPermission()
    {
        $response = $this->actingAs($this->makeAdmin())->get('/api/acl/permissions');
        $response->assertStatus(JsonResponse::HTTP_OK);
    }


    public function testCreatePermission()
    {

        $item = factory(Permission::class)->make();
        $data = $item->toArray();
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/permissions',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdatePermission()
    {

        $item = factory(Permission::class)->create();
        $data = [
            'name' => 'test'.uniqid(),
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/acl/permissions/'.$item->id,$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDeletePermission()
    {

        $item = factory(Permission::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/acl/permissions/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testNameRequiredRule()
    {

        $item = factory(Permission::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/permissions',array_merge($data,['name'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The name field is required.');

    }

    public function testSlugRequiredRule()
    {

        $item = factory(Permission::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/permissions',array_merge($data,['slug'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The slug field is required.');

    }


    public function testSlugUniqueRule()
    {

        $item = factory(Permission::class)->create();
        $data = [
          'name'=>$item->name,
          'slug'=>$item->slug,
        ];
        $response = $this->actingAs($this->makeAdmin())->post('/api/acl/permissions',$data);
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The slug has already been taken.');

    }



}
