@extends('manager.layouts.app')

@section('title-block') Обновление пользователя @endsection

@section('content')



    <div class="cards card-custom gutter-b">
        <div class="card-body">
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
        <div class="bl_profile">
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Создание профиля</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                     <cite title="Source Title">Пользователя</cite>
                </figcaption>
            </figure>

    <form action="{{route('add-user')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-3 mt-4"><label for="name">Введите имя</label></div>
            <div class="col-9 mt-4"><input type="text" name="name" placeholder="Введите имя" id="name" class="form-control"></div>

            <div class="col-3 mt-4"> <label for="subject">Введите телефон</label></div>
            <div class="col-9 mt-4"> <input type="text" name="phone" placeholder="Введите телефон" id="phone" class="form-control"></div>

            <div class="col-3 mt-4">  <label for="email">Введите Email</label></div>
            <div class="col-9 mt-4">  <input type="text" name="email" placeholder="Введите Email" id="email" class="form-control"></div>

            <div class="col-3 mt-4">  <label for="password">Введите пароль</label></div>
            <div class="col-9 mt-4">
                <input type="text" name="password" placeholder="Введите пароль" id="password" class="form-control">
                <div id="emailHelp" class="form-text">Пароль должен быть не мение 8 символов</div>
            </div>

            <div class="col-3 mt-4">  <label for="password">Роль</label></div>
            <div class="col-9 mt-4">
                    <select class="form-select " name="role" aria-label=".form-select-lg example">
                        <option value="0" selected>Клиент</option>
                        <option value="1">Администратор</option>
                        <option value="2">Менеджер</option>
                    </select>
                <div id="emailHelp" class="form-text">Администратор - полные права, клиент - нет прав</div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>


    </form>
        </div>

@endsection
