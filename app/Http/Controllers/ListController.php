<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ListRequest;
use App\Models\todo_lists;


class   ListController extends Controller

{
    public function submit(ListRequest $req)
    {

        $add_new = new todo_lists();                   // Сохраняю исходные данные в БД
        $add_new->name = $req->input('name');

        $add_new->save();

        return redirect()->route('list_data')->with('success', 'Список успешно добавлен!');
    }


    public function allData()
    {
        return view('main',['data'=>todo_lists::all()]);
    }


    public function showOneList($id)
    {
        $list = new todo_lists();
        return view('list_one',['data'=>$list->find($id)]);
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

}

