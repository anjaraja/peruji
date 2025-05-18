<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $table = "EventRegistration";
    protected $fillable = [
        'eventregistrationname',
        'fullname',
        'email',
        'phone',
        'ofcphone',
        'company',
        'address',
        'emailstatus'
    ];
}
