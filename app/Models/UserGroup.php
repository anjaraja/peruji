<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = "usergroup";
    protected $fillable = [
        'iduser',
        'idgrupakses',
        'activestatus',
        'created_by',
        'modified_by'
    ];
}
