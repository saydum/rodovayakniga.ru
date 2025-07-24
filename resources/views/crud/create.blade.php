    @extends('layouts.app.layout')

    @section('title', 'create')

    @section('content')
        <div class="card card-success card-outline">
            <div class="card-body">

                <x-forms.alert.errors/>

                <form action="{{ route($route . '.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @foreach($fields as $field)
                        <div class="row">
                            <x-input
                                :type="$field['type']"
                                :name="$field['name']"
                                :title="$field['label'] ?? $field['name']"
                                :value="$field['value'] ?? old($field['name'])"
                                :options="$field['options'] ?? []"
                                :placeholder="$field['placeholder'] ?? ''"
                            />
                        </div>
                    @endforeach

                    <button class="btn btn-success" type="submit">Добавить</button>
                </form>

            </div>
        </div>

    @endsection
