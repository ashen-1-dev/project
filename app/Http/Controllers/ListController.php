<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Models\TodoList;
use App\Models\Todo;

class ListController extends Controller
{
    public function createList(ListRequest $request)
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

    public function showList($list)
    {
        return Todo::all()->where('list_id', '=', $list);
    }

    public function listUpdate(TodoList $list, ListRequest $request)
    {
        $list->name = $request->input('name');

        $list->save();

        return TodoList::all();
    }

    public function listDelete(TodoList $list)
    {
        $list->delete();

        return TodoList::all();
    }
}