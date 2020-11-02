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

Route::get('/', 'ListController@allData')->name('list_data'); // Вывод всех списков с БД
Route::get('/{id}', 'ListController@showOneList')->name('list_one_form'); // Показать  список
Route::post('/submit', 'ListController@submit')->name('list_form'); // POST-запрос на создание нового списка
Route::post('/{id}/editlist', 'ListController@listUpdateSubmit')->name('list_one_edit_submit'); // POST-запрос на изменение имени
Route::delete('/{id}', 'ListController@listDelete')->name('list_one_delete'); // Удалить список
Route::post('/{id}/','ListController@addTodo')->name('add_todo'); // Добавить дело
Route::delete('/{id}/{todoId}','ListController@deleteTodo')->name('delete_todo'); // Удалить дело
Route::post('/{id}/{todoId}/edittodo','ListController@updateTodo')->name('edit_todo'); // Изменить дело
//Route::post('/{id}/edittodo','ListController@updateTodoSubmit')->name('edit_todo_submit');
