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
use Illuminate\Support\Facades\Storage;
use Image;

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


    protected function createHeader(array $data)
    {
        // dd($data);
        return Company::create([
            'companyname' => $data['name'],
            'address' => $data['address'],
            'email' => $data['email'],
            'website' => $data['website'],
            'phonenumber' => $data['number'],
            'logo' => $data['logo']

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
                'error'         => $validator->messages(),
            ], 400);
        }




        $imageData = $request->get('imagePayload');


        if ($imageData != null) {


            $pos  = strpos($imageData, ';');
            $type = explode('/', substr($imageData, 0, $pos))[1];

            $dir = time() . str_random(10) . "." . $type;

            $image = Image::make($imageData);

            $image->save(public_path('storage') . '/' . $dir);
            $request->logo = $dir;

            $datas_update = $request->all();
            $datas_update['logo'] = $dir;
        } else {
            $datas_update = $request->all();
        }

        // dd($datas_update);
        // $img = Image::make(Input::file('photo'));

        $kop_surat_company = Company::first();


        if ($kop_surat_company == null) {
            $this->createHeader($datas_update);
        } else {
            // $kop_surat_company->update([
            //     'companyname' => $request['name'],
            //     'address' => $request['address'],
            //     'email' => $request['email'],
            //     'website' => $request['website'],
            //     'phonenumber' => $request['number'],
            //     'logo' =>  $dir
            // ]);
            // dd($request->all());

            $kop_surat_company->update($datas_update);
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
            'imagePayload' => ['sometimes', 'image64:jpeg,jpg,png,bmp'],
        ]);

        return $validator;
    }
}
