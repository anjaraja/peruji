<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailAdmin extends Model
{
    protected $table = "emailadmin";
    protected $fillable = [
        'rawemail',
        'activestatus',
        'created_by',
        'modified_by',
    ];
}
