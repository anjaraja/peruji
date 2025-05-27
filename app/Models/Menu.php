<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $fillable = [
        'menuname',
        'icon',
        'route',
        'parent',
        'child',
        'activestatus',
        'created_by',
        'modified_by'
    ];
}
