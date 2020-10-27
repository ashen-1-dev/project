<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('main');
//})->name('main');

Route::get('/', 'ListController@allData')->name('list_data');

Route::get('/{id}', 'ListController@showOneList')->name('list_one_form');

Route::post('/submit', 'ListController@submit')->name('list_form');

Route::get('/{id}/editlist', 'ListController@listUpdate')->name('list_one_edit');

Route::post('/{id}/editlist', 'ListController@listUpdateSubmit')->name('list_one_edit_submit');
Route::get('/{id}/delete', 'ListController@listDelete')->name('list_one_delete');
