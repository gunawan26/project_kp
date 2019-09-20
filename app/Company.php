<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'companyname',
        'address',
        'phonenumber',
        'website',
        'email',
        'logo',
    ];
}
