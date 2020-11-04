<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ListRequest;
use App\Models\TodoList;
use App\Models\Todo;

class ListController extends Controller
{
    public function submit(ListRequest $request)
    {
        $add_new = new TodoList();
        $add_new->name = $request->input('name');

        $add_new->save();

        return TodoList::all();
    }

    public function allData()
    {
        return TodoList::all();
    }

    public function showOneList($listId)
    {
        return Todo::all()->where('list_id','=', $listId);
    }

    public function listUpdateSubmit(TodoList $listId, ListRequest $request)
    {
        $add_new = $listId;
        $add_new->name = $request->input('name');

        $add_new->save();

        return redirect()->route('list_data', $listId);
    }

    public function listDelete(TodoList $listId)
    {
        $listId->delete();
        return redirect()->route('list_data');
    }

    public function addTodo($listId, TodoRequest $request)
    {
        $add_new = new Todo();
        $add_new->name = $request->input('name');
        $add_new->description_short = $request->input('description_short');
        $add_new->description = $request->input('description');
        $add_new->urgent = $request->input('urgent');
        $add_new->list_id = $listId;

        $add_new->save();

        return redirect()->route('list_one_form', $listId);
    }

    public function updateTodo(TodoList $listId, Todo $todoId, Request $request ) {

        $add_new = $todoId;
        $add_new->check = $request->input('check');

        $add_new->save();

        return redirect()->route('list_one_form', $listId);
    }

    public function deleteTodo($listId, Todo $todoId)
    {
        $todoId->delete();
        return redirect()->route('list_one_form', $listId);
    }
}