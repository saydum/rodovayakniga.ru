@extends('layouts.app.layout')

@section('title', 'edit')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-body">

            <x-forms.alert.errors/>

            <form action="{{ route($route . '.update', $model->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input name="user_id" hidden="hidden" value="{{ auth()->user()->id }}">

                @foreach($model->getAttributes() as $key => $val)
                    <div class="row">
                        <x-input
                            type="text"
                            name="{{ $key }}"
                            title="{{ $key }}"
                            placeholder="Ведите {{$key}}"
                            value="{{ $val }}"
                        />
                    </div>
                @endforeach

                <button class="btn btn-success" type="submit">Добавить</button>
            </form>
        </div>
    </div>

@endsection
