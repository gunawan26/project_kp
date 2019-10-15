<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $fillable = [
        'subcategoryname', 'category', 'offer_id', 'arr_index_sub', 'id_category'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
