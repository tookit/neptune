<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ProductVendor extends Model
{
    use SoftDeletes,
        HasMediaTrait;

    protected $table = 'product_applications';

    protected $fillable = [

        'name','description'
    ];


    protected $guarded = [

    ];


    protected $casts = [

        'name' => 'json',
        'description'=>'json',
        'actvie'=>'boolean'
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
