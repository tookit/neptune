<?php

namespace App\Models;



class Permission extends \Spatie\Permission\Models\Permission
{


    public static  $allowedFilters = [
        'name','slug','http_methods','http_paths'
    ];
    public static  $allowedSorts = [];

    protected $table = 'permissions';

    protected $fillable = [

        'name','slug','guard_name','http_methods','http_paths','is_system','parent_id','action'
    ];


    protected $casts = [

        'http_paths' => 'json',
        'http_methods' => 'json'
    ];

}
