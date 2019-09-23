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

    // 'middleware' => 'auth',
    'namespace' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::post('register', 'AuthController@register');
    // Route::get('test', 'AuthController@test');
    Route::get('kop-surat', 'HeaderController@index');

    Route::post('update-insert-data', 'HeaderController@update_or_store');

    Route::post('add-new-document', 'FormController@new_document');

    Route::put('update-form-data/{id}', 'FormController@update_form_data');

    Route::get('foo', function () {
        return ("foo");
    });
});
