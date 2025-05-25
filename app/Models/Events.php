<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = "event";
    protected $fillable = [
        'source',
        'eventname',
        'eventdate',
        'description',
        'banner',
        'thumbnail',
        'photo',
        'agenda',
        'additionalcontent',
        'activestatus',
        'created_by',
        'modified_by',
    ];
}
