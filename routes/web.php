<?php
use App\Http\Controllers\StraniceController;

Route::get('/', "MedController@index");
Route::get('/med/filter', "MedController@filter");
Route::resource("med", "MedController");
Route::resource("vrsteMeda", "VrsteMedaController");
