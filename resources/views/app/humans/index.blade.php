@extends('layouts.app.layout')

@section('title', 'Родственник')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <a href="#" class="btn btn-success">Добавить</a>

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
                                <td>{{ $humans->name }}</td>
                                <td>{{ $human->las_name }}</td>
                                <td>{{ $human->surname }}</td>
                                <td>{{ $human->birth_date }}</td>
                                <td>
                                    <button>r</button>
                                    <button>u</button>
                                    <button>tree</button>
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
