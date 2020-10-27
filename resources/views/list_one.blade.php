@extends('layouts.app')

@section('title-block'){{$data->name}}@endsection

@section('content')


    <div class='alert alert-info'>
        <h6>{{$data->name}}</h6>
        <p><small>Дата создания: {{$data->created_at}}</small></p>
        <p><small>Дата изменения: {{$data->updated_at}}</small></p>
        <a href="{{route('list_one_edit', $data->id)}}"><button class ='btn btn-primary'>Изменить</button></a>
        <a href="{{route('list_one_delete', $data->id)}}"><button class ='btn btn-danger'>Удалить</button></a>
    </div>

@endsection
