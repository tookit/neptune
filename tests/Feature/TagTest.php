<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;
use App\Models\CMS\Tag;

class TagTest extends TestCase
{


    use DatabaseTransactions;

    protected $faker;


    public function testList()
    {

        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/tag');
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testCreate()
    {

        $item = factory(Tag::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/tag',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdate()
    {

        $item = factory(Tag::class)->create();
        $data = [
            'name' => 'test'.uniqid(),
            'description' => 'test'
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/cms/tag/'.$item->id,$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDelete()
    {

        $item = factory(Tag::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/cms/tag/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }


}
