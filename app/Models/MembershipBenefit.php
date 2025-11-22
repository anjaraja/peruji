<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipBenefit extends Model
{
    protected $table = "membership_benefit";
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'modified_by'
    ];
}
