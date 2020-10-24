<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class mainController extends Controller {
    public function submit(Request $req) {
        $validation = $req->validate([
            'name'=>'required|min:5'
        ]);
        echo "Список успешно добавлен! \n";
        dd($req->input('name'));

    }

}

