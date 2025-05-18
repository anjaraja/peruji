<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = "event";
    protected $fillable = [
        'eventname',
        'eventdate',
        'description',
        'photo',
        'agenda',
        'activestatus',
        'created_by',
        'modified_by',
    ];
}
