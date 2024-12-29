<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
        <tr>
            @foreach($columns as $field => $alias)
                <th>{{ $alias }}</th>
            @endforeach
            <th class="text-end">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($model as $item)
            <tr>
                @foreach($columns as $field => $alias)
                    <td>
                        {{-- Отображаем значение поля --}}
                        @if(method_exists($item, $field))
                            {{ $item->$field() }}
                        @else
                            {{ $item->$field }}
                        @endif
                    </td>
                @endforeach
                {{-- Действия --}}
                <td class="text-end">
                    <a class="btn btn-success" href="{{ route($route . '.show', $item->id) }}">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a class="btn btn-primary" href="{{ route($route . '.edit', $item->id) }}">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route($route . '.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
