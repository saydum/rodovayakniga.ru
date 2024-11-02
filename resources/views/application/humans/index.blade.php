@extends('layouts.app.layout')

@section('title', 'Рода')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <a href="{{ route('roda.create') }}" class="btn btn-success">Добавить</a>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roda as $rod)
                            <tr>
                                <td>{{ $rod->id }}</td>
                                <td>{{ $rod->name }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('roda.show', $rod->id) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('roda.edit', $rod->id) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
