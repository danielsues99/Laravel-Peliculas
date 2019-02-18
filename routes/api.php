<?php
use Illuminate\Http\Request;
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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/catalog','APICatalogController@index');

Route::get('/v1/catalog/{id}','APICatalogController@show');

Route::post('v1/catalog', function () {
})->middleware('auth.basic');

Route::put('/v1/catalog/{id}', [
    'middleware' => 'auth.basic.once',
    'uses' => 'APICatalogController@show'
]);

Route::delete('/v1/catalog/{id}', function () {
})->middleware('auth.basic');

Route::put('/v1/catalog/{id}/rent',function () {
})->middleware('auth.basic');

Route::put('/v1/catalog/{id}/return', function () {
})->middleware('auth.basic');

