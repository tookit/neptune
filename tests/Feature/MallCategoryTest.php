<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;
use App\Models\Mall\Category;

class MallCategoryTest extends TestCase
{


    use DatabaseTransactions;

    protected $faker;


    public function testList()
    {

        $response = $this->actingAs($this->makeAdmin())->get('/api/mall/category');
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testCreate()
    {

        $item = factory(Category::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/mall/category',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdate()
    {

        $item = factory(Category::class)->create();
        $data = [
            'name' => 'test'.uniqid(),
            'description' => 'test'
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/mall/category/'.$item->id,$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDelete()
    {

        $item = factory(Category::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/mall/category/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }


}
