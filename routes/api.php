<?php

use Illuminate\Http\Request;

Route::get('/turist/{id}', 'Api\TuristController@show');
Route::post('/turist/{id}', 'Api\TuristController@update');

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
