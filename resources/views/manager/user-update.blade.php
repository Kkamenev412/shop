@extends('manager.layouts.app')

@section('title-block') Пользователи @endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="cards card-custom gutter-b">
        <div class="card-body">

        <div class="bl_profile">
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Редактирование профиля</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Пользователя <cite title="Source Title"> {{$data->name}}</cite>
                </figcaption>
            </figure>

    <form action="{{route('user-update-submit', $data->id)}}" method="post" >
        @csrf

        <div class="row">

            <div class="col-3 mt-4"><label for="name">Введите имя</label></div>
            <div class="col-9 mt-4"><input type="text" value="{{$data->name}}" name="name" placeholder="Введите имя" id="name" class="form-control"></div>

            <div class="col-3 mt-4"> <label for="subject">Введите телефон</label></div>
            <div class="col-9 mt-4"> <input type="text" value="{{$data->phone}}" name="phone" placeholder="Введите телефон" id="phone" class="form-control"></div>

            <div class="col-3 mt-4">  <label for="email">Введите Email</label></div>
            <div class="col-9 mt-4">  <input type="text" name="email"value="{{$data->email}}" placeholder="Введите Email" id="email" class="form-control"></div>

            <div class="col-3 mt-4">  <label for="email">Введите город</label></div>
            <div class="col-9 mt-4">  <input type="text" name="city"value="{{$data->city}}" placeholder="Введите город" id="city" class="form-control"></div>

            <div class="col-3 mt-4">  <label for="password">Роль</label></div>
            <div class="col-9 mt-4">
                <select class="form-select " name="role" aria-label=".form-select-lg example">
                    <option value="{{$data->role}}">
                       <?php
                        if($data->role == 0):
                            echo 'Клиент';
                        endif;
                        if($data->role == 1):
                            echo 'Администратор';
                        endif;
                        if($data->role == 2):
                            echo 'Менеджер';
                        endif;
                        ?>
                    </option>
                    <option value="0" >Клиент</option>
                    <option value="1">Администратор</option>
                    <option value="2">Менеджер</option>
                </select>
                <div id="emailHelp" class="form-text">Администратор - полные права, клиент - нет прав</div>
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Обновить</button>

    </form>
        </div>
        </div>
        </div>

    <div class="cards card-custom gutter-b">
        <div class="card-body">
            <div class="bl_profile">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <p>Обновление фотографии</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Пользователя <cite title="Source Title"> {{$data->name}}</cite>
                    </figcaption>
                </figure>

                <form action="{{route('user-update-submit-img', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-3 mt-4"><label for="name">Фото профиля</label></div>
                        <div class="col-9 mt-4"><input type="file" value="{{$data->img}}" name="image" class="form-control"></div>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Обновить</button>

                </form>
            </div>
        </div>
    </div>


    <div class="cards card-custom gutter-b">
        <div class="card-body">
            <div class="bl_profile">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <p>Обновление пароля</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Пользователя <cite title="Source Title"> {{$data->name}}</cite>
                    </figcaption>
                </figure>

                <form action="{{route('user-update-submit-pass', $data->id)}}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-3 mt-4">  <label for="password">Введите пароль</label></div>
                        <div class="col-9 mt-4">
                            <input type="text" name="password" value="" placeholder="Введите пароль" id="password" class="form-control">
                            <div id="emailHelp" class="form-text">Пароль должен быть не мение 8 символов</div>
                        </div>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Обновить</button>

                </form>
            </div>
        </div>
    </div>
@endsection
