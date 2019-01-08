<?php

namespace App\Models;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations;
    use AuditableTrait;


    protected $table = 'posts';

    protected $fillable = [

    ];


    protected $guarded = [

    ];

    public $translatable = [

        'name',
        'description'

    ];


    public function category(){

        return $this->belongsTo(Category::class);
    }

}
