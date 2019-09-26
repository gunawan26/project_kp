<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;

class FormController extends Controller
{

    //
    /**
     * 
     * membuka file penawaran  yang sudah ada
     * 
     * 
     */
    public function index($id)
    {
        $selected_document = Offer::find($id);

        return response()->json($selected_document, 200);
    }

    public function new_document(Request $request)
    {
        $document = new offer;
        $document->offername = $request->offername; // judul dari proposal
        // $document->date = 
        $document->save();
        return response()->json([
            "id_dokumen" => $document->id
        ], 200);
    }

    public function update_form_data(Request $request, $id)
    {
        $document = Offer::find($id);
        $document->update($request->all());

        return response()->json("sukses", 200);
    }



    public function insert_category()
    {
        $category = new category;
    }
    public function insert_form_data()
    { }
    public function insert_subcategory()
    { }
}
