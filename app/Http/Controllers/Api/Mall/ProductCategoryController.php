<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use Spatie\QueryBuilder\QueryBuilder;

class ProductCategoryController extends Controller
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
        return ProductCategoryResource::collection(

            QueryBuilder::for(ProductCategory::class)
                ->withCount(['products'])
                ->allowedFilters(ProductCategory::$allowedFilters)
                ->allowedSorts(ProductCategory::$allowedSorts)
                ->paginate($request->get('pageSize'),['*'],'page')

        );
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(ProductCategoryResource $request)
    {

        return new Category(Category::create($request->all()));


    }


    public function listAll(Request $request)
    {

        return ProductCategoryResource::collection(

            ProductCategory::get()->toTree()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductCategoryResource(ProductCategory::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = ProductCategory::find($id);
        $item->update($request->validated());
        return response()->json([
            'data' => $item,
            'message'=>'成功更新产品分类'
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
        //
    }
}