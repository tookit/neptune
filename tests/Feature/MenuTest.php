<?php

namespace Tests\Feature;

use App\Models\CMS\Menu;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class MenuTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testViewMenu()
    {

        $item = factory(Menu::class)->create();
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/menu/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);


    }


    public function testListMenu()
    {
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/menu');
        $response->assertStatus(JsonResponse::HTTP_OK);
    }


    public function testCreateMenu()
    {

        $item = factory(Menu::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/menu',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdateMenu()
    {

        $item = factory(Menu::class)->create();
        $data = [
            'name' => 'test'.uniqid(),
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/cms/menu/'.$item->id,$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDeleteMenu()
    {

        $item = factory(Menu::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/cms/menu/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testNanmeRequiredRule()
    {

        $item = factory(Menu::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/menu',array_merge($data,['name'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The name field is required.');

    }

    public function testUriRequiredRule()
    {

        $item = factory(Menu::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/menu',array_merge($data,['uri'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The uri field is required.');

    }

}
