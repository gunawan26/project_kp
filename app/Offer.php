<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $fillable = [
        'number',
        'date',
        'customername',
        'discussion_date',
        'discussion_loc',
        'offername', // menyimpan judul file 
        'offerprice',
        'duration',
        'attachmentname',
        'user'
    ];

    public function document()
    {
        return $this->hasManyThrough(
            'App\Category',
            'App\Subcategory',
            'App\Detitem',
            'offer_id',
            'id_category',
            'subcategory'
        );
    }
}
