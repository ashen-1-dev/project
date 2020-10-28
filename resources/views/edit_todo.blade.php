@extends('layouts.app')

@section('title-block')To-do list
@endsection

@section('content')

    @include('layouts.errors')

    <h1 xmlns="http://www.w3.org/1999/html">My to-do list!</h1>
    <h4>Изменить дело</h4>

    <form action="{{route('edit_todo', $data->id)}}"  method="post">
        @csrf
        <div class="form-group">

            <label><input type="checkbox" name="check" value="false"> Сделано</label>
        </div>
        <button type="submit" class="btn btn-success">Изменить</button>
    </form>


@endsection
