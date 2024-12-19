@extends('layouts.app.layout')

@section('title', 'Род: '. ' ' . $rod->name)

@section('content')
    <div class="col">
        <div class="card card-outline">
            <div class="card-body box-profile">

                <div class="row">
                    <div class="col">
                        <h4 class="profile-username text-st">
                            Родственники
                        </h4>

                        <x-table-humans :humans="$humans" />
                    </div>
                </div>

{{--                <div class="row">--}}
{{--                    <div class="col d-flex mt-3">--}}
{{--                        <a href="{{ route('roda.edit', $rod->id) }}" class="btn btn-primary m-1">--}}
{{--                            <b>Изменить</b>--}}
{{--                        </a>--}}

{{--                        <form method="POST" action="{{ route("roda.destroy", $rod->id) }}">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger m-1">--}}
{{--                                <b>Удалить</b>--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

        </div>
    </div>
@endsection
