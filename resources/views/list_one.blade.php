@extends('layouts.app')

@section('title-block'){{$data->name}}@endsection

@section('content')
    @include('layouts.errors')
    <div class='alert alert-info'>
        <h6>{{$data->name}}</h6>
        <p><small>Дата создания: {{$data->created_at}}</small></p>
        <p><small>Дата изменения: {{$data->updated_at}}</small></p>
        <a href="{{route('list_one_edit', $data->id)}}"><button class ='btn btn-primary'>Изменить</button></a>
        <a href="{{route('list_one_delete', $data->id)}}"><button class ='btn btn-danger'>Удалить</button></a>
    </div>

    <br>


    <h5>Добавить дело</h5>

    <form action="{{route('add_todo',$data->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" placeholder="Введите название дела" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="description_short">Краткое описание</label>
            <input type="text" name="description_short" placeholder="Введите краткое описание" id="description_short" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea  name="description" placeholder="Введите описание" id="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="urgent">Срочность</label>
            <div>
                <input type="radio" id="urgent"
                       name="urgent" value="1">
                <label for="urgent">1</label>

                <input type="radio" id="urgent"
                       name="urgent" value="2">
                <label for="urgent">2</label>

                <input type="radio" id="urgent"
                       name="urgent" value="3">
                <label for="urgent">3</label>

                <input type="radio" id="urgent"
                       name="urgent" value="3">
                <label for="urgent">3</label>

                <input type="radio" id="urgent"
                       name="urgent" value="4">
                <label for="urgent">4</label>

                <input type="radio" id="urgent"
                       name="urgent" value="5">
                <label for="urgent">5</label>
            </div>

            <div class="form-group">
                <label for="list_id">id списка</label>
                <input type="text" name="list_id" value="{{$data->id}}"  id="list_id" class="form-control" >
            </div>

        </div>


        <button class ='btn btn-primary'>Добавить дело</button>
    </form>

    <br>

    <h4>Дела</h4>

    @foreach($todo_data as $el)
        <div class='alert alert-warning'>
            <center><p>{{$el->name}}</p></center>
            <p>{{$el->description_short}}</p>
            <p>Описание: {{$el->description}}</p>
            @if($el->check == true)
                <label><input type="checkbox" name="check" value="false" disabled checked> Сделано</label>
                @else
                    <label><input type="checkbox" name="check" value="false" disabled > Сделано</label>
            @endif

            <a href="{{route('edit_todo',$el->id)}}"><button class="btn btn-primary">Изменить</button></a>
            <a href="#"><button class="btn btn-danger">Удалить</button></a>
        </div>
    @endforeach




@endsection
