<?php

namespace Tests\Feature;

use App\Models\Mediable\Media;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class MediaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpload()
    {
        $file = UploadedFile::fake()->image('test.jpg');
        $response = $this->actingAs($this->makeAdmin())->post('/api/media/image',['image'=>$file]);
        $response->assertStatus(JsonResponse::HTTP_CREATED);
        $filePath  = 'image/test.jpg';
//        Storage::disk('public')->assertExists($filePath);
//        Storage::disk('public')->delete($filePath);
    }

    public function testView()
    {
        $item = factory(Media::class)->create();
        $url =sprintf('/api/media/image/%d',$item->id);
        $response = $this->actingAs($this->makeAdmin())->get($url);
        $response->assertStatus(JsonResponse::HTTP_OK);
    }

    public function testMimeTypeRule()
    {
        $file = UploadedFile::fake()->create('test.text',1);
        $response = $this->actingAs($this->makeAdmin())->post('/api/media/image',['image'=>$file]);
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSeeText('The image must be an image.');
    }
}
