<?php

namespace App\Models\Mall;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Plank\Mediable\Mediable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Product extends Model
{

    use HasSlug,
        Mediable,
        AuditableTrait;


    public static  $allowedFilters = ['name','categories.name'];
    public static  $allowedSorts = [];


    protected $table = 'products';

    static $flags = [

        'hot','promoted','archived'
    ];

    protected $fillable = [

        'name','description','body', 'applications','features','specs','ordering','reference_url','featured_img'
    ];



    protected $guarded = [

    ];


    protected $casts = [
        'active'=>'boolean',
        'is_hot'=>'boolean',
    ];


    public $translatable = [

        'name',
        'description',
        'content',
        'features',
        'specs',
        'packaging'

    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_has_categories');
    }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class);
    // }



}
