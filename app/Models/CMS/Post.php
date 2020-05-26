<?php

namespace App\Models\CMS;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Post extends Model
{
    use HasTranslations,
        SoftDeletes,
        // HasMediaTrait,
        AuditableTrait;


    protected $table = 'posts';

    protected $fillable = [

        'title','description',
    ];


    protected $guarded = [

    ];

    public $translatable = [

        'title',
        'description',

    ];

    static $allowedFilters = [];

    static $allowedSorts = [];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }



}
