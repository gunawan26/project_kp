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
        return Offer::paginate(10);
    }
}
