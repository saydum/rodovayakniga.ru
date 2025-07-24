@extends('layouts.app.layout')

@section('title', 'show')

@section('content')
    <div class="col">
        <div class="card card-success card-outline">
            <div class="card-body box-profile">
                <x-back-button />

                <div class="row">
                    <div class="col">
                        @foreach ($model->toArray() as $key => $value)
                            @empty(!$value)
                                <div class="py-2 p-2">
                                    <b>{{ $key }}</b> - {{ $value }}
                                    <hr>
                                </div>
                            @endempty
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex mt-3">
                        <a href="{{ route("$route.edit", $model->id) }}" class="btn btn-primary m-1">
                            <b>Изменить</b>
                        </a>

                        <form method="POST" action="{{ route("$route.destroy", $model->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-1">
                                <b>Удалить</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
