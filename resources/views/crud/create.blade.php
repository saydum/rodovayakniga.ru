@extends('layouts.app.layout')

@section('title', 'create')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-body">

            <x-forms.alert.errors/>

            <form action="{{ route($route . '.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="user_id" hidden="hidden" value="{{ auth()->user()->id }}">

                @foreach($columns as $key => $val)
                    <div class="row">
                        @if($val === 'image')
                            <x-input
                                type="file"
                                name="{{ $val }}"
                                title="{{ $val }}"
                                placeholder="Ведите {{$val}}"
                                value="{{ old($val) }}"
                            />
                        @else
                            <x-input
                                type="text"
                                name="{{ $val }}"
                                title="{{ $val }}"
                                placeholder="Ведите {{$val}}"
                                value="{{ old($val) }}"
                            />
                        @endif
                    </div>
                @endforeach

                <button class="btn btn-success" type="submit">Добавить</button>
            </form>
        </div>
    </div>

@endsection
