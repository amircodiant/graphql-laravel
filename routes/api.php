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


Route::get('/test-api', function (Request $request) {
    return ["name"=>"Amir Ansari"];
})->name('amir.ansari');

Route::post('/upload-file', function (Request $request) {
    // return $request->file('file')->store('files');

    return \App\Video::upload($request);

});