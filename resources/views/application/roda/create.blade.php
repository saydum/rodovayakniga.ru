@extends('layouts.app.layout')

@section('title', 'Добавление Рода')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-body">

            <x-forms.alert.errors/>

            <form action="{{ route('roda.store') }}" method="post">
                @csrf

                <input name="user_id" hidden="hidden" value="{{ auth()->user()->id }}">

                <div class="row">
                    <x-input type="text" name="name" title="Имя" placeholder="Ведите название"
                                   value="{{ old('name') }}"/>
                </div>
                <button class="btn btn-success" type="submit">Добавить</button>
            </form>
        </div>
    </div>

@endsection
