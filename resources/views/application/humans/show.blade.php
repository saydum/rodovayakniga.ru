@extends('layouts.app.layout')

@section('title', 'Данные человека: '. ' ' . $human->name . ' ' . $human->last_name . ' ' . $human->surname)

@section('content')
    <div class="col">
        <div class="card card-success card-outline">
            <div class="card-body box-profile">

                <div class="row">
                    <div class="col-4">
                        <div class="text-center">
                            <img
                                class="profile-user-img img-fluid img-circle rounded-4 float-start"
                                src="{{ asset($human->image) }}"
                                alt="{{ $human->name }}"
                            >
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="profile-username text-center">
                            {{ $human->name .' '. $human->last_name .' '. $human->surname }}
                        </h3>

                        <p class="py-4">
                            {!! $human->biography !!}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex mt-3">
                        <a href="{{ route('humans.edit', $human->id) }}" class="btn btn-primary m-1">
                            <b>Изменить</b>
                        </a>

                        <form method="POST" action="{{ route("humans.destroy", $human->id) }}">
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
