<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{



    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = QueryBuilder::for(Product::class)
            ->with(['categories'])
            ->allowedFilters(Product::$allowedFilters)
            ->allowedSorts(Product::$allowedSorts);

        return ProductResource::collection(

            $request->get('pageSize') !== '-1'
                ?
                $builder->paginate($request->get('pageSize'),['*'],'page')
                :
                $builder->get()

        );
    }


    public function listAll(Request $request)
    {

        return ProductResource::collection(


        );
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(ProductRequest $request)
    {

        return new ProductResource(Product::create($request->all()));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $item = Product::find($id);
        $item->update($request->validated());
        return new ProductResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function attachImage($id, ImageRequest $request)
    {
        $item = Product::find($id);
        $item->addMedia($request->file('image'))->toMediaCollection('images');
        return new ProductResource($item);

    }


    public function attachDocument()
    {

    }


    public function attachVideo()
    {

    }
}
