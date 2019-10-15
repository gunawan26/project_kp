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
        // dd($request['data']['number']);
        $document->number = $request['data']['number'];
        $document->customername = $request['data']['customername'];
        $document->discussion_date = $request['data']['discussion_date'];
        $document->discussion_loc = $request['data']['discussion_loc'];
        $document->offername = $request['data']['offername'];
        $document->offerprice = $request['data']['offerprice'];
        $document->duration = $request['data']['duration'];
        $document->attachmentname = $request['data']['attachmentname'];

        $payload_data = json_decode($request['data']['dataPayload']);
        $this->save_categories($payload_data, $document);
        $document->save();

        return response()->json("sukses cuy", 200);
    }



    public function insert_category()
    {
        $category = new category;
    }

    public function save_offer()
    { }

    public function save_categories($dataPayload, Offer $offer)
    {
        foreach ($dataPayload as $value) {
            dd($value);
        }
    }

    public function save_subcategories()
    { }

    public function save_detitems()
    { }

    public function save_document_data(Request $request)
    {
        dd($request);
    }
}
