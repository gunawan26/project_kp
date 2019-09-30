<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Tymon\JWTAuth\Providers\Storage\Illuminate;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;
use DateTime;
use App\User;


class HeaderController extends Controller
{
    /**
     * menampilkan kop surat pada halaman pembuatan surat
     *
     * 
     */
    public function getKopSurat()
    {
        //
        $kop_surat_company = Company::first();

        return response()->json(
            $kop_surat_company,
            200
        );
    }

    /**
     * membuat kop surat
     *
     */
    // public function store(Request $request)
    // {
    //     //



    //     $company = new Company;
    //     $company->companyname = $request->companyname;
    //     $company->save();
    // }


    protected function createHeader(array $data, $filename)
    {
        return Company::create([
            'companyname' => $data['companyname'],
            'address' => $data['address'],
            'email' => $data['email'],
            'website' => $data['website'],
            'phonenumber' => $data['phonenumber'],
            'logo' => $filename

        ]);
    }
    /**
     * melakukan perubahan data kop surat jika sudah ada sebelumnya 
     * dan 

     */
    public function update_or_store(Request $request)
    {
        // dd($request);
        $validator = $this->validatedata($request);
        if ($validator->fails()) {
            return response()->json([
                'status'        => false,
                'msg'           => 'input salah',
                'access_token'  => null,
                'error'         => $validator->messages(),
            ], 400);
        }

        $file_photo_name = time() . $request->fileLogo->getClientOriginalName();
        $dir = public_path('storage/logo_perusahaan/' . $file_photo_name);

        $request->fileLogo->storeAs('public/logo_kop', $file_photo_name);

        $kop_surat_company = Company::first();
        $request->file_photo_name = $file_photo_name;

        if ($kop_surat_company == Null) {
            $this->createHeader($request->all(), $file_photo_name);
        } else {
            $kop_surat_company->update([
                'companyname' => $request['companyname'],
                'address' => $request['address'],
                'email' => $request['email'],
                'website' => $request['website'],
                'phonenumber' => $request['phonenumber'],
                'logo' => $file_photo_name
            ]);
        }


        return response()->json("sukses", 200);
    }

    /**
     * Validasi Inputan
     */

    protected function validatedata(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'companyname' => ['string', 'max:100'],
            'address' => ['string', 'max:100'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'website' => ['string', 'min:8'],
            'phonenumber' => ['string', 'max:20'],
            'fileLogo' => ['required', 'image', 'mimes:jpeg,jpg,png,bmp'],
        ]);

        return $validator;
    }
}
