@extends('app.layout')

@section('title', 'Сылки РОДового Древа')

@section('content')
    <div class="mb-4">
        Ссыдки РОДового Древа
    </div>

    <table class="table align-middle mb-0 bg-white table-hover">
        <thead class="bg-light">
        <tr>
            <th>ID</th>
            <th>Человек</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($links as $link)
            <tr class="rounded m-3">
                <td>
                    {{ $link->id }}
                </td>
                <td>
                    {{ $link->human->name }}
                </td>
                <td class="text-end">
                    {{--@TODO  Изменить ссылку при деполй--}}
                    <a class="btn btn-link" href="http://127.0.0.1:8000/rodovoe-drevo/{{$link->human->id}}/{{ $link->link }}">
                        Перейти
                    </a>

                    <a href="{{ route("links.show", $link->id) }}" type="button"
                       class="btn btn-outline-primary btn-sm btn-rounded">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
