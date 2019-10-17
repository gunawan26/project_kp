<?php

use Illuminate\Http\Request;
use App\Http\Controllers\api\AuthController;
// use Symfony\Component\Routing\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    // 'middleware' => ['auth:api', ['except' => 'login']],

    'namespace' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::group(['middleware' => ['jwt.verify']], function () {

        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');

        Route::post('add_user', 'AuthController@add_user');

        Route::get('data', 'DocumentController@get_file');
        Route::get('data-history', 'DocumentController@get_history');


        Route::get('users/user_role', function () {
            //
            return "mau";
        })->middleware(['roleuser']);
        /***
         * 
         * Bagian Kop surat
         */
        Route::post('update-insert-data-header', 'HeaderController@update_or_store');
        Route::get('get-data-header', 'HeaderController@getKopSurat');


        /**
         * 
         * Bagian Form surat
         */
        Route::post('add-new-document', 'FormController@new_document');
        Route::get('get-document/{id}', 'FormController@index_with_payload');
        Route::post('users/{id}', 'FormController@save_document_data');

        Route::put('update-form-data/{id}', 'FormController@update_form_data');
    });




    Route::get('foo', function () {
        return ("foo");
    });
});
