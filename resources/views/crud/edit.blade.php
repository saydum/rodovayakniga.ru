@extends('layouts.app.layout')

@section('title', 'edit')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-body">
            <x-back-button />
            <x-forms.alert.errors/>

            <form action="{{ route($route . '.update', $model->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @foreach($fields as $field)
                    <div class="row">
                        <x-input
                            :type="$field['type']"
                            :name="$field['name']"
                            :title="$field['label'] ?? $field['name']"
                            :value="old($field['name'], $model->{$field['name']} ?? ($field['value'] ?? ''))"
                            :options="$field['options'] ?? []"
                            :placeholder="$field['placeholder'] ?? ''"
                        />
                    </div>
                @endforeach

                <button class="btn btn-primary" type="submit">Сохранить</button>
            </form>

        </div>
    </div>

@endsection
