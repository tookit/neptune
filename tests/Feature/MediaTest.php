<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpload()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('aa.jpg');

        $response = $this->actingAs($this->makeAdmin())->post('/api/meida',['image'=>$file]);
        dd($response->getContent());
        // Assert the file was stored...

    }
}
