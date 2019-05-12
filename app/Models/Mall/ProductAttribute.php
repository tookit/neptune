<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{


    protected $table = 'product_attributes';


    protected $fillable = [

        'name','description'
    ];


    protected $guarded = [

    ];


    protected $casts = [

        'name' => 'json',
        'description' => 'json',
    ];


    public $translatable = [

        'name',
        'description'

    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_has_attributes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }
}
