<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/lists', 'ListController@allData')->name('list_data'); // Вывод всех списков GET
Route::post('/lists', 'ListController@createList')->name('list_form'); //  Cоздание нового списка POST
Route::get('/lists/{list}', 'ListController@showList')->name('list_one_form'); // Показать  список GET
Route::patch('/lists/{list}/', 'ListController@listUpdate')->name('list_one_edit_submit'); // Изменить имя PATCH
Route::delete('/lists/{list}', 'ListController@listDelete')->name('list_one_delete'); // Удалить список DELETE

Route::post('/lists/{list}/todo/','TodoController@todoAdd')->name('add_todo'); // Добавить дело POST
Route::delete('/lists/{list}/todo/{todo}','TodoController@todoDelete')->name('delete_todo'); // Удалить дело DELETE
Route::patch('/lists/{list}/todo/{todo}/','TodoController@todoUpdate')->name('edit_todo'); // Изменить дело PATCH
