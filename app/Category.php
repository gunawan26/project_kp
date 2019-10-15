<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'categoryname', 'offer_id', 'arr_index'
    ];
}
