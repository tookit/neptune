<?php

namespace App\Models;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait,
        AuditableTrait;


    protected $table = 'categories';

    protected $fillable = [

        'name','slug'
    ];


    protected $guarded = [

    ];


    protected $casts = [

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

    public function ancestorsAndSelf() {
        return $this->newScopedQuery()
            ->where($this->getLftName(), '<=', $this->getLft())
            ->where($this->getRgtName(), '>=', $this->getRgt());
    }
}
