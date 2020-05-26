<?php

namespace App\Models\CMS;


use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tag extends Model
{

    use HasSlug;

    protected $table = 'tags';




    protected $fillable = [

        'name','description'
    ];


    protected $guarded = [

    ];


    protected $casts = [


    ];

    public static  $allowedFilters = [];
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

}
