@extends('layouts.app')

@section('title-block')To-do list
@endsection

@section('content')

{{--    @include('layouts.errors')--}}

    <h1 xmlns="http://www.w3.org/1999/html">My to-do list!</h1>
    <h4>Изменить имя списка</h4>

<form action="{{route('list_one_edit_submit', $data->id)}}"  method="post">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" value="{{$data->name}}" placeholder="Введите название списка" id="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Изменить</button>
    </form>


@endsection


