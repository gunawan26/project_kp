<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Tymon\JWTAuth\Providers\Storage\Illuminate;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;

class HeaderController extends Controller
{
    /**
     * menampilkan kop surat pada halaman pembuatan surat
     *
     * 
     */
    public function index()
    {
        //
        $kop_surat_company = Company::find(1);
        return response()->json(
            $kop_surat_company,
            200
        );
    }

    /**
     * membuat kop surat
     *
     */
    public function store(Request $request)
    {
        //
        $company = new Company;
        $company->companyname = $request->companyname;
        $company->save();
    }


    /**
     * melakukan perubahan data kop surat jika sudah ada sebelumnya 
     * dan 

     */
    public function update_or_store(Request $request)
    {
        //
        // try {
        $kop_surat_company = Company::first();
        // dd($request->companyname);
        if ($kop_surat_company == Null) {
            $this->store($request);
        } else {

            $kop_surat_company->update($request->all());
        }

        return response()->json("sukses", 200);
    }

    /**
     * Validasi Inputan
     */

    protected function validatedata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'companyname' => ['string', 'max:100'],
            'address' => ['string', 'max:100'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'website' => ['string', 'min:8', 'confirmed'],
            'phonenumber' => ['string', 'max:20'],
            'logo' => ['string'],
        ]);
    }
}
