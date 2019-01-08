<?php

namespace App\Models;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use NodeTrait;
    use HasTranslations;
    use AuditableTrait;


    protected $table = 'categories';

    protected $fillable = [

    ];


    protected $guarded = [

    ];


    protected $casts = [

        'name' => 'json',
        'is_active'=>'boolean'
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