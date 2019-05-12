<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ImageRequest;
use App\Http\Resources\MediaResource;
use App\Models\Filters\ProductCategoriesFilter;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;

class ProductController extends Controller
{

    const IMAGE_COLLECTION = 'images';


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
            ->allowedFilters(array_merge(Product::$allowedFilters,[
                Filter::custom('category_id', ProductCategoriesFilter::class)
            ]))
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
        $item = Product::create($request->all());
        return response()->json([
            'data' => $item,
            'message'=>'成功添加产品'
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource(Product::with(['categories'])->find($id));
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
        return response()->json([
            'data' => $item,
            'message'=>'成功更新产品'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return new ProductResource(Product::destroy($id));
    }


    public function attachImage($id, ImageRequest $request)
    {
        $item = Product::find($id);
        $item->addMedia($request->file('image'))->toMediaCollection('images');
        return response()->json([
            'data' => $item->getMedia('images'),
            'message'=>'产品图片上传成功'
        ]);
        return new ProductResource($item);

    }


    public function listImage($id)
    {
        $item = Product::find($id);
        return MediaResource::collection($item->getMedia('images'));

    }

    public function listCategories($id)
    {
        $item = Product::find($id);
        return ProductResource::collection($item->categories);

    }


    public function attachCategories($id, Request $request)
    {
        $item = Product::find($id);
        $item->attachCategories($request->get('categories'));
        return ProductResource::collection($item->categories);

    }


    public function attachDocument()
    {

    }


    public function attachVideo()
    {

    }
}
