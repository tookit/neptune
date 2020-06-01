<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;
use Michaelwang\Nestedset\NodeTrait;
use Plank\Mediable\Mediable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Category extends Model implements HasMedia
{

    use NodeTrait,
        InteractsWithMedia,
        // Mediable,
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

    /**
     * Return an array of all child category ids.
     *
     * @return array
     */
    public function getChildrenIds()
    {
        return $this->scopeAllChildren(self::newQuery(), true)
            ->get(['id'])
            ->pluck('id')
            ->toArray();
    }


    public function scopeAllChildren($query, $includeSelf = false)
    {
        $query
            ->where($this->getLftName(), '>=', $this->getLft())
            ->where($this->getRgtName(), '<', $this->getRgt())
        ;

        return $includeSelf ? $query : $query->withoutSelf();
    }

    public function getAllChildrenAndSelf()
    {
        return $this->newQuery()->allChildren(true)->get();
    }

    public function getAllProducts() {
        return Product::inCategories($this->getAllChildrenAndSelf()->pluck('id')->toArray())->paginate();
    }

}
