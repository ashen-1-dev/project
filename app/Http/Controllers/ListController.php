<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ListRequest;
use App\Models\todo_lists;
use App\Models\todo;

class   ListController extends Controller

{
    public function submit(ListRequest $req)
    {

        $add_new = new todo_lists();
        $add_new->name = $req->input('name');

        $add_new->save();

        return redirect()->route('list_data')->with('success', 'Список успешно добавлен!');
    }


    public function allData()
    {
        return view('lists',['data'=>todo_lists::all()]);
    }


    public function showOneList($id)
    {
        $list = new todo_lists();
        $todo = new todo();
        return view('list_one',['data'=>$list->find($id),'todo_data'=>$todo->where('list_id','=',$id)->get()]);

    }

    public function listUpdate($id)
    {
        $list = new todo_lists();
        return view('editlist',['data'=>$list->find($id)]);
    }

    public function listUpdateSubmit($id,ListRequest $req)
    {


        $add_new = todo_lists::find($id);
        $add_new->name = $req->input('name');

        $add_new->save();

        return redirect()->route('list_data',$id)->with('success', 'Название было обновлено');
    }

    public function listDelete($id)
    {
        todo_lists::find($id)->delete();
        return redirect()->route('list_data')->with('success', 'Список был удалён');
    }

    public function addTodo($id, TodoRequest $req)
    {
        $add_new = new todo();
        $add_new->name = $req->input('name');
        $add_new->description_short = $req->input('description_short');
        $add_new->description = $req->input('description');
        $add_new->urgent = $req->input('urgent');
        $add_new->list_id = $req->input('list_id');

        $add_new->save();



        return redirect()->route('list_one_form',$id)->with('success','Дело добавлено');
    }

    public function updateTodo($id, TodoRequest $req)
    {
        $add_new = todo::find($id);
        $add_new->check = $req->input('check');

        $add_new->save();

        return redirect()->route('list_one_form',$id)->with('success', 'Название было обновлено');
    }
    public function editTodoSubmit($id) {

    }
}

