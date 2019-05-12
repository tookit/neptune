<?php

namespace App\Models;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements  HasMedia
{

    use HasMediaTrait,
        HasSlug,
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
        return $this->belongsToMany(ProductCategory::class,'product_has_categories');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function properties()
    {
        return $this->belongsToMany(ProductAttribute::class,'product_has_attributes');
    }





    /**
     * Attach the given category(ies) to the model.
     *
     * @param int|string|array|\ArrayAccess|ProductCategory $categories
     *
     * @return void
     */
    public function setCategoriesAttribute($categories): void
    {
        static::saved(function (self $model) use ($categories) {
            $model->syncCategories($categories);
        });
    }

    /**
     * Boot the categorizable trait for the model.
     *
     * @return void
     */
    public static function bootCategorizable()
    {
        static::deleted(function (self $model) {
            $model->categories()->detach();
        });
    }

    /**
     * Scope query with all the given categories.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param mixed                                 $categories
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithAllCategories(Builder $builder, $categories): Builder
    {
        $categories = $this->prepareCategoryIds($categories);

        collect($categories)->each(function ($category) use ($builder) {
            $builder->whereHas('categories', function (Builder $builder) use ($category) {
                return $builder->where('id', $category);
            });
        });

        return $builder;
    }

    /**
     * Scope query with any of the given categories.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param mixed                                 $categories
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithAnyCategories(Builder $builder, $categories): Builder
    {
        $categories = $this->prepareCategoryIds($categories);

        return $builder->whereHas('categories', function (Builder $builder) use ($categories) {
            $builder->whereIn('id', $categories);
        });
    }

    /**
     * Scope query with any of the given categories.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param mixed                                 $categories
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithCategories(Builder $builder, $categories): Builder
    {
        return static::scopeWithAnyCategories($builder, $categories);
    }

    /**
     * Scope query without any of the given categories.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param mixed                                 $categories
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithoutCategories(Builder $builder, $categories): Builder
    {
        $categories = $this->prepareCategoryIds($categories);

        return $builder->whereDoesntHave('categories', function (Builder $builder) use ($categories) {
            $builder->whereIn('id', $categories);
        });
    }

    /**
     * Scope query without any categories.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithoutAnyCategories(Builder $builder): Builder
    {
        return $builder->doesntHave('categories');
    }

    /**
     * Determine if the model has any of the given categories.
     *
     * @param mixed $categories
     *
     * @return bool
     */
    public function hasCategories($categories): bool
    {
        $categories = $this->prepareCategoryIds($categories);

        return ! $this->categories->pluck('id')->intersect($categories)->isEmpty();
    }

    /**
     * Determine if the model has any the given categories.
     *
     * @param mixed $categories
     *
     * @return bool
     */
    public function hasAnyCategories($categories): bool
    {
        return static::hasCategories($categories);
    }

    /**
     * Determine if the model has all of the given categories.
     *
     * @param mixed $categories
     *
     * @return bool
     */
    public function hasAllCategories($categories): bool
    {
        $categories = $this->prepareCategoryIds($categories);

        return collect($categories)->diff($this->categories->pluck('id'))->isEmpty();
    }

    /**
     * Sync model categories.
     *
     * @param mixed $categories
     * @param bool  $detaching
     *
     * @return $this
     */
    public function syncCategories($categories, bool $detaching = true)
    {
        // Find categories
        $categories = $this->prepareCategoryIds($categories);

        // Sync model categories
        $this->categories()->sync($categories, $detaching);

        return $this;
    }

    /**
     * Attach model categories.
     *
     * @param mixed $categories
     *
     * @return $this
     */
    public function attachCategories($categories)
    {
        return $this->syncCategories($categories, false);
    }

    /**
     * Detach model categories.
     *
     * @param mixed $categories
     *
     * @return $this
     */
    public function detachCategories($categories = null)
    {
        $categories = ! is_null($categories) ? $this->prepareCategoryIds($categories) : null;

        // Sync model categories
        $this->categories()->detach($categories);

        return $this;
    }

    /**
     * Prepare category IDs.
     *
     * @param mixed $categories
     *
     * @return array
     */
    protected function prepareCategoryIds($categories): array
    {
        // Convert collection to plain array
        if ($categories instanceof BaseCollection && is_string($categories->first())) {
            $categories = $categories->toArray();
        }

        // Find categories by slug, and get their IDs
        if (is_string($categories) || (is_array($categories) && is_string(array_first($categories)))) {
            $categories = app(ProductCategory::class)->whereIn('slug', $categories)->get()->pluck('id');
        }

        if ($categories instanceof Model) {
            return [$categories->getKey()];
        }

        if ($categories instanceof Collection) {
            return $categories->modelKeys();
        }

        if ($categories instanceof BaseCollection) {
            return $categories->toArray();
        }

        return (array) $categories;
    }


}
