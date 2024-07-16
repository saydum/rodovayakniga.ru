@extends('layouts.app.layout')

@section('title', 'Добавление человека')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-body">
            <form action="{{ route('humans.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input name="user_id" hidden="hidden" value="{{ auth()->user()->id }}">

                <div class="row">
`                    <x-input type="text" name="name" title="Имя" placeholder="Ведите имя" value="{{ old('name') }}"/>
                    <x-input type="text" name="last_name" title="Отчество" placeholder="Ведите отчество"
                             value="{{ old('last_name') }}"/>
                    <x-input type="text" name="surname" title="Фамилия" placeholder="Ведите фамилию"
                             value="{{ old('surname') }}"/>
                </div>
                <div class="row">
                    <x-input type="date" name="birth_date" title="Дата рождения" placeholder="Ведите дату рождения" />
                </div>

                <div class="row">
                    <div class="row">
                        <x-select-human
                            title="Отец"
                            inputName="father_id"
                            :value="$human->father->id ?? ''"
                            :name="$human->father->name ?? ''"
                            :lastname="$human->father->last_name ?? ''"
                            :surname="$human->father->surname ?? ''"
                            :humans="$humans"
                        />

                        <x-select-human
                            title="Мать"
                            inputName="mother_id"
                            :value="$human->mother->id ?? ''"
                            :name="$human->mother->name ?? ''"
                            :lastname="$human->mother->last_name ?? ''"
                            :surname="$human->mother->surname ?? ''"
                            :humans="$humans"
                        />

                    </div>
                </div>

                <div class="row">
                    <x-input type="file" name="image" title="Фото"/>
                </div>
                <div class="row">
                    <div class="col pb-3">
                        <label for="biography" class="form-label">Биография</label>
                        <textarea id="biography" name="biography"
                                  class="form-control pb-1">{{{ old('biography') }}}</textarea>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Добавить</button>
            </form>
        </div>
    </div>

@endsection
