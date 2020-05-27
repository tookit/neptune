<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Vendor extends Model
{
    use SoftDeletes,
        HasSlug;

    protected $table = 'mall_vendors';

    protected $fillable = [

        'name','description'
    ];


    protected $guarded = [

    ];



    public $translatable = [

        'name',
        'description',

    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_has_applications');
    }
}
