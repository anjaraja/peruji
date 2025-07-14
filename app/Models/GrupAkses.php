<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupAkses extends Model
{
    protected $table = "grupakses";
    protected $fillable = [
        'groupname',
        'activestatus',
        'created_by',
        'modified_by'
    ];
}
