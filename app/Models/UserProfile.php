<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = "userprofile";
    protected $fillable = [
        'userid',
        'prefix',
        'fullname',
        'suffix',
        'dob',
        'phone',
        'email',
        'photo',
        'organization',
        'ofcaddress',
        'ofcphone',
        'ofcemail',
        'website',
        'joindate',
        'number',
        'expiredate',
        'status',
        'additionaldocument',
        'created_by',
        'modified_by'
    ];
}
