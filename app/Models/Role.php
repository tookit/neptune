<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends \Spatie\Permission\Models\Role
{



    public static  $allowedFilters = [];
    public static  $allowedSorts = [];

    protected $table = 'roles';

    protected $fillable = [

        'name','guard_name','slug'
    ];

//    /**
//     * A model may have multiple menus.
//     */
//    public function menus(): MorphToMany
//    {
//        return $this->morphToMany(
//            Menu::class,
//            'model',
//            'model_has_roles',
//            'role_id',
//            'model_id'
//        );
//    }

}
