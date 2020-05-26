<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;
use App\Models\CMS\Post;

class PostTest extends TestCase
{


    use DatabaseTransactions;

    protected $faker;


    public function testList()
    {

        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/post');
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testCreate()
    {

        $item = factory(Post::class)->make();
        $data = $item->toArray();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/post',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdate()
    {

        $data = factory(Post::class)->create()->toArray();
        $data['title'] = 'test'.uniqid();
        $response = $this->actingAs($this->makeAdmin())->put('/api/cms/post/'.$data['id'],$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDelete()
    {

        $item = factory(Post::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/cms/post/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }


}
