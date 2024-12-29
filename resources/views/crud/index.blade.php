@extends('layouts.app.layout')

@section('title', 'Родственник')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <a href="{{ route("$route.create") }}" class="btn btn-success">Добавить</a>
                </div>

                <x-table :datas="$datas" :columns="$columns" :route="$route"/>
            </div>
        </div>
    </div>
@endsection
