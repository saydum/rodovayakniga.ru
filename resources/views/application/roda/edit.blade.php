@extends('layouts.app.layout')

@section('title', 'Редактирование Рода')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-body">

            <x-forms.alert.errors/>

            <form action="{{ route('roda.update') }}" method="post">
                @csrf
                @method('PUT')
                <input name="user_id" hidden="hidden" value="{{ auth()->user()->id }}">

                <div class="row">
                    <x-input type="text" name="name" title="Имя" placeholder="Ведите название"
                             value="{{ $rod->name }}"/>
                </div>
                <button class="btn btn-success" type="submit">Изменить</button>
            </form>
        </div>
    </div>

@endsection
