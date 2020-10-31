{{--Главная страница. Здесь отображаются все существующие списки дел--}}


@extends('layouts.app')

@section('title-block')To-do list
@endsection

@section('content')

{{--    @include('layouts.errors')--}}

    <h1 xmlns="http://www.w3.org/1999/html">My to-do list!</h1>
    <h4>Добавить список!</h4>

    <form action="{{route('list_form')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" placeholder="Введите название списка" id="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Добавить список!</button>
    </form>

    <br>

    <h4>Ваши списки</h4>
    @foreach($data as $el)
    <div class='alert alert-info'>
        <h6>{{$el->name}}</h6>
        <p><small>Дата создания: {{$el->created_at}}</small></p>
        <p><small>Дата изменения: {{$el->updated_at}}</small></p>
        <a href="{{route('list_one_form',$el->id)}}"><button class ='btn btn-info'>Посмотреть</button></a>
    </div>
    @endforeach

@endsection


