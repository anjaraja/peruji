<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = "membership";
    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'phone',
        'dob',
        'org',
        'address',
        'website',
        'funct',
        'department',
        'ofcemail',
    ];
}
