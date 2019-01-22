<?php

namespace App\Models;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Tags\HasTags;

class Product extends Model
{

    use HasMediaTrait,
        HasTags,
        SoftDeletes,
        AuditableTrait;


    protected $table = 'products';

    protected $fillable = [

        'name','description','body', 'features','specs','ordering'
    ];



    protected $guarded = [

    ];


    protected $casts = [

        'name' => 'json',
        'description' => 'json',
        'body' => 'json',
        'features' => 'json',
        'specs' => 'json',
        'ordering' => 'json',
        'active'=>'boolean',
        'is_hot'=>'boolean',
    ];


    public $translatable = [

        'name',
        'description',
        'body',
        'features',
        'specs',
        'ordering'

    ];


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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function applications()
    {
        return $this->belongsToMany(ProductApplication::class,'product_has_applications');
    }


}
