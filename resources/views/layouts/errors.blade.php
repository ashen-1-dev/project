{{-- Шаблон вывода ошибок при некорректной отправки формы.--}}


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif

{{--Шаблон сообщения об успешной отправке формы--}}

@if(session('success'))
    <div class="aler alert-success">
        {{session('success')}}
    </div>
@endif

