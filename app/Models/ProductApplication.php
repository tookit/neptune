<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductApplication extends Model
{


    protected $table = 'product_application';

    protected $fillable = [

        'name','description'
    ];


    protected $guarded = [

    ];


    protected $casts = [

        'name' => 'json',
        'description',
        'is_active'=>'boolean'
    ];


    public $translatable = [

        'name',
        'description',

    ];


}
