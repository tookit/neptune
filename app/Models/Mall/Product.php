<?php

namespace App\Models\Mall;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Plank\Mediable\Mediable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Product extends Model implements  HasMedia
{

    use HasSlug,
        InteractsWithMedia,
        AuditableTrait;


    public static  $allowedFilters = ['name','categories.name'];
    public static  $allowedSorts = [];


    protected $table = 'mall_products';

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

    public function scopeInCategories($query, $ids)
    {
        if ( ! count($ids)) {
            return $query;
        }

        return $query->whereHas('categories', function ($q) use ($ids) {
            $q->whereIn('category_id', $ids);
        });
    }

}
