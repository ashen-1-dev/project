<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\TodoList;
use App\Models\Todo;
use App\Http\Requests\CheckRequest;

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

        return 'New task №' . $add_new->id . ' has been created';
    }

    public function todoUpdate(TodoList $list, Todo $todo, CheckRequest $request )
    {

        $todo->check = $request->input('check');

        $todo->save();

        return 'Task №' . $list->id . ' has been updated';
    }

    public function todoDelete(Todo $todo)
    {
        $todo->delete();

        return 'Task №' . $todo->id . ' has been deleted';
    }
}