<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ListRequest;
use App\Models\TodoList;
use App\Models\Todo;

class   ListController extends Controller
{
    public function submit(ListRequest $request)
    {
        $add_new = new TodoList();
        $add_new->name = $request->input('name');

        $add_new->save();

        return redirect()->route('list_data')->with('success', 'Список успешно добавлен!');
    }

    public function allData()
    {
        return view('lists', ['data'=>TodoList::all()]);
    }

    public function showOneList($id)
    {
        $list = new TodoList();
        $todo = new Todo();
        return view('list_one', [
            'data'=>$list->find($id),
            'todo_data'=>$todo->where('list_id', '=', $id)->get()
        ]);
    }

    public function listUpdate($id)
    {
        $list = new TodoList();
        return view('editlist', ['data'=>$list->find($id)]);
    }

    public function listUpdateSubmit($id, ListRequest $req)
    {
        $add_new = TodoList::find($id);
        $add_new->name = $req->input('name');

        $add_new->save();

        return redirect()->route('list_data', $id)->with('success', 'Название было обновлено');
    }

    public function listDelete($id)
    {
        TodoList::find($id)->delete();
        return redirect()->route('list_data')->with('success', 'Список был удалён');
    }

    public function addTodo($todoId, TodoRequest $request)
    {
        $add_new = new Todo();
        $add_new->name = $request->input('name');
        $add_new->description_short = $request->input('description_short');
        $add_new->description = $request->input('description');
        $add_new->urgent = $request->input('urgent');
        $add_new->list_id = $request->input('list_id');

        $add_new->save();

        return redirect()->route('list_one_form', $todoId)->with('success', 'Дело добавлено');
    }

    public function updateTodo($todoId, TodoRequest $request)
    {
        $add_new = Todo::find($todoId);
        $add_new->check = $request->input('check');

        $add_new->save();

        return redirect()->route('list_one_form', $todoId)->with('success', 'Название было обновлено');
    }
    public function editTodoSubmit($id) {
    //
    }

    public function deleteTodo($todoId, $id)
    {
        Todo::find($todoId)->delete();
        return redirect()->route('list_one_form',$id)->with('success', 'Список был удалён');
    }
}