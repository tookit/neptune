<?php

namespace App\Models;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations,
        SoftDeletes,
        HasMediaTrait,
        AuditableTrait;


    protected $table = 'posts';

    protected $fillable = [

        'name','description',
    ];


    protected $guarded = [

    ];

    public $translatable = [

        'name',
        'description',

    ];


    public function category(){

        return $this->belongsTo(Category::class);
    }



}
