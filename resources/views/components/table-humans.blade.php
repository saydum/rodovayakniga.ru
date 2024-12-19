<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Фамилия</th>
            <th>Дата рождения</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($humans as $human)
            <tr>
                <td>{{ $human->id }}</td>
                <td>{{ $human->name }}</td>
                <td>{{ $human->last_name }}</td>
                <td>{{ $human->surname }}</td>
                <td>
                    @isset($human->birth_date)
                        {{ date('d.m.Y', strtotime($human->birth_date))}}
                    @endisset
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('humans.show', $human->id) }}">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a class="btn btn-primary" href="{{ route('humans.edit', $human->id) }}">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a class="btn btn-outline-success"
                       href="{{ route('rodovoe-drevo.index', $human->id) }}">
                        <i class="bi bi-arrows-fullscreen"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
