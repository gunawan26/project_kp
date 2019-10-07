<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer;
use App\User;
use App\Category;

class DocumentController extends Controller
{
    //

    public function get_file()
    {
        return Offer::orderBy('id', 'desc')->paginate(10);
    }


    public function get_history()
    {

        // return Offer::where('');
        return Offer::where('status_file', '1')->orderBy('id', 'desc')->paginate(10);
    }
}
