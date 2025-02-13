@extends('layouts.app.layout')

@section('title', 'index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <a href="{{ route("$route.create") }}" class="btn btn-success">Добавить</a>
                </div>

                <x-table :model="$model" :columns="$columns" :route="$route" :extendActions="$extendActions"/>
            </div>
        </div>
    </div>
@endsection
