<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    protected $table = "hakakses";
    protected $fillable = [
        'iduser',
        'idmenu',
        'action',
        'activestatus',
        'created_by',
        'modified_by'
    ];
}
