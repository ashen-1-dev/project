@extends('layouts.app')
@section('title-block')To-do list
@endsection

@section('content')
    <h1 xmlns="http://www.w3.org/1999/html">My to-do list!</h1>


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <h4>Добавить список!</h4>
    <form action="{{route('list_form')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" placeholder="Введите название списка" id="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Добавить список!</button>
    </form>
@endsection


