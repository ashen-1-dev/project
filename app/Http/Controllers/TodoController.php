<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\TodoList;
use App\Models\Todo;

class TodoController extends Controller
{
    public function todoAdd($list, TodoRequest $request)
    {
        $add_new = new Todo();

        $add_new->name = $request->input('name');
        $add_new->description_short = $request->input('description_short');
        $add_new->description = $request->input('description');
        $add_new->urgent = $request->input('urgent');
        $add_new->list_id = $list;

        $add_new->save();

        return Todo::where('list_id', '=', $list)->get();
    }

    public function todoUpdate(TodoList $list, Todo $todo, Request $request )
    {

        $todo->check = $request->input('check');

        $todo->save();

        return Todo::where('list_id', '=', $list->id)->get();
    }

    public function todoDelete($list, Todo $todo)
    {
        $todo->delete();

        return Todo::where('list_id', '=', $list)->get();
    }
}
