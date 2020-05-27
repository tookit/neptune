<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Category extends Model
{

    use NodeTrait,
        HasSlug;


    protected $table = 'mall_categories';



    protected $fillable = [

        'name','description'
    ];


    protected $guarded = [

    ];


    protected $casts = [

        'active'=>'boolean'
    ];

    public static  $allowedFilters = [
        'name'
    ];
    public static  $allowedSorts = [];


    public $translatable = [

        'name',
        'description'

    ];



    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->usingLanguage(app()->getLocale())
            ->saveSlugsTo('slug');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_has_categories');
    }


}
