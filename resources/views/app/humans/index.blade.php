@extends('layouts.app.layout')

@section('title', 'Родственник')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-success card-outline">
                <div class="card-header">

                    <a href="{{ route('humans.create') }}" class="btn btn-success">Добавить</a>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" name="table_search" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Отчество</th>
                            <th>Фамилия</th>
                            <th>Дата рождения</th>
                            <th>...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($humans as $human)
                            <tr>
                                <td>{{ $human->id }}</td>
                                <td>{{ $human->name }}</td>
                                <td>{{ $human->last_name }}</td>
                                <td>{{ $human->surname }}</td>
                                <td>{{ date('d.m.Y', strtotime($human->birth_date))}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('humans.show', $human->id) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('humans.edit', $human->id) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn btn-outline-success" href="{{ route('humans.show', $human->id) }}">
                                        <i class="bi bi-arrows-fullscreen"></i>
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
