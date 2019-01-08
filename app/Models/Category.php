<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use NodeTrait;
    use HasTranslations;


    protected $table = 'categories';

    protected $fillable = [

    ];


    protected $guarded = [

    ];

    public $translatable = [

        'name',
        'description'

    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
