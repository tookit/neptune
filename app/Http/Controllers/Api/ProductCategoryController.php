<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
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
                ->allowedFilters(ProductCategory::$allowedFilters)
                ->allowedSorts(ProductCategory::$allowedSorts)
                ->paginate($request->get('pageSize'),['*'],'page')

        );
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(ProductCategoryResource $request)
    {

        return new Category(Category::create($request->all()));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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