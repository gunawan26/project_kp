<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'categoryname', 'offer_id', 'arr_index'
    ];
    protected $touches = ['offer'];

    public function detail()
    {
        return $this->hasManyThrough(
            'App\Detitem',
            'App\Subcategory',
            'id_category',
            'subcategory',
            'id',
            'id'
        );
    }


    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
