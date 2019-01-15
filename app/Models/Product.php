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

        'name','description','body','product_category_id', 'features','specs','ordering'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }




}
