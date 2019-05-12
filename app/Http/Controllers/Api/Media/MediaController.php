<?php

namespace App\Http\Controllers\Api\Media;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\MediaRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Models\Media\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $builder = QueryBuilder::for(Media::class)
                    ->allowedFilters(Media::$allowedFilters)
                    ->allowedSorts(Media::$allowedSorts);
        return UserResource::collection(

                    $builder->paginate($request->get('pageSize'),['*'],'page')

        );
    }


    /**
     * create a new user.
     *
     * @param  \App\Http\Requests\MediaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request)
    {

        return Media::create($request->validated());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new MediaResource(Media::find($id));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Media::find($id);
        $item->delete();
        return new MediaResource($item);
    }
}
