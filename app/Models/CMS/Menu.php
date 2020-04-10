<?php

namespace App\Models\CMS;

use App\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{

    public  static $allowedFilters = ['name'];
    public  static $allowedSorts = ['name'];

    use
        SoftDeletes,
        NodeTrait;


    protected $table = 'menus';

    protected $fillable = [

        'name', 'sort_number', 'uri', 'icon', 'is_active',
    ];


    protected $guarded = [];


    protected $casts = [

        'is_active' => 'boolean'
    ];
}
