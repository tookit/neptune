<?php

namespace App\Http\Controllers\Api\Media;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Models\Mediable\Media;
use Plank\Mediable\MediaUploaderFacade as MediaUploader;

class ImageController extends Controller
{

    protected $model ;

    public function __construct(Media $model)
    {

        $this->model = $model;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request) : AnonymousResourceCollection
    {

        $builder = QueryBuilder::for(get_class($this->model));
        return MediaResource::collection(
            $builder->paginate($request->get('pageSize'),['*'],'page')
        );
    }



    public function store(ImageRequest $request) : MediaResource
    {

        $media = MediaUploader::fromSource($request->file('image'))
//                ->toDirectory(Media::TYPE_IMAGE)
                ->toDestination('oss', 'image')
                ->upload();
        return new MediaResource($media);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : MediaResource
    {
        $item = Media::findOrFail($id);
        return new MediaResource($item);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : MediaResource
    {
        $item = Media::find($id);
        $item->delete();
        return new MediaResource($item);
    }
}
