<?php

namespace App\Models\Mall;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{


    protected $table = 'properties';


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
        return $this->belongsToMany(Product::class,'product_has_properties');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }
}
