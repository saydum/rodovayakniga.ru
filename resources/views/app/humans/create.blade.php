@extends('layouts.app.layout')

@section('title', 'Добавление человека')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('humans.store') }}" method="post">
                @csrf
                <div class="row">
                    <x-input type="text" name="name" title="Имя" placeholder="Ведите имя"/>
                    <x-input type="text" name="last_name" title="Отчество" placeholder="Ведите отчество"/>
                    <x-input type="text" name="surname" title="Фамилия" placeholder="Ведите фамилию"/>
                </div>
                <div class="row">
                    <x-input type="date" name="birth_date" title="Дата рождения" placeholder="Ведите дату рождения"/>
                </div>
                <div class="row">
                    <x-input type="file" name="image" title="Фото"/>
                </div>
                <button class="btn btn-success" type="submit">Добавить</button>
            </form>
        </div>
    </div>

@endsection
