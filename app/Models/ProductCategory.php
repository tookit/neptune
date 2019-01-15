<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;


class ProductCategory extends Model
{

    use NodeTrait,
        HasTranslations,
        HasMediaTrait,
        SoftDeletes;


    protected $table = 'product_categories';


    protected $fillable = [

        'name','description','slug'
    ];


    protected $guarded = [

    ];


    protected $casts = [

        'name' => 'json',
        'description' => 'json',
        'is_active'=>'boolean'
    ];


    public $translatable = [

        'name',
        'description'

    ];



}
