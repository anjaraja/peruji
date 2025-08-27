<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $fillable = [
        'newsname',
        'newsdate',
        'description',
        'eng_description',
        'photo',
        'additionalcontent',
        'activestatus',
        'created_by',
        'modified_by'
    ];
}
