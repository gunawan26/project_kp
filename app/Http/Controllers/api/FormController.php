<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
use App\Detitem;
use App\Subcategory;
use PhpParser\Node\Stmt\TryCatch;

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
        // dd($selected_document);
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

        $document->save();
        try {
            //code...
            $payload_data = json_decode($request['data']['dataPayload']);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $this->save_categories($payload_data, $document);

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
        // dd($offer->id);
        foreach ($dataPayload as $key => $value) {

            $cat = Category::updateOrCreate(['arr_index' => $key, 'offer_id' => $offer->id], ['categoryname' => $value->title, 'offer_id' => $offer->id, 'arr_index' => $key]);

            $this->save_subcategories($value->list_subs, $cat, $offer);

            // $category->arr_index = $key;
            // $category->categoryname = $value->title;
            // $category->offer_id = $offer->id;
            // $category->save();
        }
    }

    public function save_subcategories($dataSub, Category $category, Offer $offer)
    {


        foreach ($dataSub as $key => $value) {
            $cat = Subcategory::updateOrCreate(
                [
                    'arr_index_sub' => $key,
                    'id_category' => $category->id
                ],
                ['subcategoryname' => $value->name]
            );

            $this->save_detitems($value->list_row, $cat, $offer);
        }
    }

    public function save_detitems($dataDetail, Subcategory $sub, Offer $offer)
    {
        foreach ($dataDetail as $key => $value) {

            $det_item = Detitem::updateOrCreate(
                [
                    'subcategory' => $sub->id,
                    'arr_index_detail' => $key,
                    'offer' => $offer->id
                ],
                [
                    'item' => $value->modul,
                    'duration' => $value->durasi,
                    'unit' => $value->satuan,
                    'itemprice' => $value->biaya,
                    'information' => $value->ket
                ]
            );
        }
    }

    public function save_document_data(Request $request)
    {
        dd($request);
    }
}
