<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detitem extends Model
{
    //

    protected $fillable = [
        'offer',
        'subcategory',
        'item',
        'duration',
        'itemprice',
        'information',
        'arr_index_detail',
        'unit',
    ];

    public function subcategory_data()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
