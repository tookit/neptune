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
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/menus/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);


    }


    public function testListMenu()
    {
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/menus');
        $response->assertStatus(JsonResponse::HTTP_OK);
    }


    public function testCreateMenu()
    {

        $item = factory(Menu::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/menus',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdateMenu()
    {

        $item = factory(Menu::class)->create();
        $data = [
            'name' => 'test'.uniqid(),
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/cms/menus/'.$item->id,$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDeleteMenu()
    {

        $item = factory(Menu::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/cms/menus/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testTitleRequiredRule()
    {

        $item = factory(Menu::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/menus',array_merge($data,['title'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The title field is required.');

    }

    public function testUriRequiredRule()
    {

        $item = factory(Menu::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/menus',array_merge($data,['uri'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The uri field is required.');

    }

}
