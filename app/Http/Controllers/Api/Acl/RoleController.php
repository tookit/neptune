<?php

namespace App\Http\Controllers\Api\Acl;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Role as Model;
use App\Http\Resources\Acl\RoleResource as Resource;
use App\Http\Requests\Acl\RoleRequest as ValidateRequest;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = QueryBuilder::for(Model::class)
            ->with(['users'])
            ->allowedFilters(Model::$allowedFilters)
            ->allowedSorts(Model::$allowedSorts);

        return Resource::collection(

            $request->get('pageSize') !== '-1'
                ?
                $builder->paginate($request->get('pageSize'),['*'],'page')
                :
                $builder->get()

        );
    }


    /**
     * create a new user.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateRequest $request)
    {

        return new Resource(Model::create($request->validated()));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new Resource(Model::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateRequest $request, $id)
    {
        $item = Model::updateOrCreate(['id'=>$id],$request->validated());
        return new Resource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Model::findOrFail($id);
        $item->delete();
        return new Resource($item);
    }
}
