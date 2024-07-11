@extends('layouts.app.layout')

@section('title', 'Добавление человека')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-body">
            <form action="{{ route('humans.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <x-input type="text" name="name" title="Имя" placeholder="Ведите имя" value="{{ old('name') }}" />
                    <x-input type="text" name="last_name" title="Отчество" placeholder="Ведите отчество" value="{{ old('last_name') }}" />
                    <x-input type="text" name="surname" title="Фамилия" placeholder="Ведите фамилию" value="{{ old('surname') }}" />
                </div>
                <div class="row">
                    <x-input type="date" name="birth_date" title="Дата рождения" placeholder="Ведите дату рождения"  value="{{ old('birth_date') }}"  />
                </div>
                <div class="row">
                    <x-input type="file" name="image" title="Фото" />
                </div>
                <div class="row">
                    <div class="col pb-3">
                        <label for="biography" class="form-label">Биография</label>
                        <textarea id="biography" name="biography" class="form-control pb-1">{{{ old('biography') }}}</textarea>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Добавить</button>
            </form>
        </div>
    </div>

@endsection
