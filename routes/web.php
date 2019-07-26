<?php

Route::get('/', 'TuristController@index');

Route::get('/api', 'Api\TuristController@index');

Route::get('/turists', 'TuristController@index');
Route::get('/turist/edit/{user}', 'TuristController@edit');
Route::post('/turist/edit/{user}', 'TuristController@edit');
Route::delete('/turist/delete/{user}', 'TuristController@destroy');

Route::get('/turist/request/{user}', 'RequestController@index');
Route::post('turist/request/add/{user}', 'RequestController@edit');
Route::get('/turist/request/edit/{request}', 'RequestController@edit');
Route::post('/turist/request/edit/{request}', 'RequestController@edit');
Route::delete('/turist/request/delete/{request}', 'RequestController@destroy');

Auth::routes();
