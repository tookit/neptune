<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{



    protected $table = 'product_attribute_values';


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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(ProductAttribute::clas);
    }
}
