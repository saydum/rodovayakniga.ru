@extends('layouts.app.layout')

@section('title', 'Родовое Древо: ' . ($human->name ?? ''))

@section('content')
    <link rel="stylesheet" href="{{ asset('application/css/tree.css') }}">
    @include('application.rodovoe-drevo.script-copy-link')

    <div class="card-header text-end d-flex justify-content-end" style="margin-top: -30px;">
        <div class="row justify-content-center">

            <div class="col-sm">
                <a href="{{ route('humans.create') }}" class="btn btn-success">Добавить</a>
            </div>

            @auth()
                @if($human)
                    <div class="col-sm">
                        <button id="copyButton" class="btn btn-outline-success">
                            <i class="bi bi-copy"></i>
                        </button>
                        @isset($shareTreeLink->link)
                            <label for="copyText"></label>
                            <input
                                type="text"
                                hidden="hidden"
                                id="copyText" class="form-control"
                                value="{{ env('APP_URL') }}/rodovoe-drevo/{{$human->id}}/{{ $shareTreeLink->link }}"
                                readonly
                            >
                        @endisset
                    </div>

                @endif
            @endauth
        </div>
    </div>

    {{--    Notifacation --}}
    <div class="container position-absolute">
        <div class="row">
            <div class="col">
                <div class="text-start notif" id="liveAlertPlaceholder"></div>
            </div>
        </div>
    </div>


    <div class="container container-tree">
        <div class="row">
            <div class="col">

                <div class="tree">
                    @isset($human)
                        <ul class="tree_ul">
                            <li class="tree_li">
                                {{-- 1 --}}
                                <div class="tree_card">
                                    <a
                                        href="{{ route('humans.show', $human->id) }}"
                                        data-mdb-ripple-init
                                        data-mdb-modal-init
                                        data-mdb-target="#show-info-modal"
                                    >
                                        <img class="img-fluid" src="{{ asset($human->image) }}">
                                        <p class=""> {{ $human->name. " " .  $human->last_name . " " . $human->surname}}</p>
                                    </a>
                                </div>
                                {{-- E1--}}
                                <ul class="tree_ul">
                                    @isset($father)
                                        <li class="tree_li">
                                            <div class="tree_card">
                                                <a
                                                    href="{{ route('humans.show', $father->id) }}"
                                                    data-mdb-ripple-init
                                                    data-mdb-modal-init
                                                    data-mdb-target="#show-info-modal"
                                                >
                                                    <img class="img-fluid" src="{{ asset($father->image) }}">
                                                    <p>{{ $father->name . " " . $father->last_name . " " . $father->surname }}</p>
                                                </a>
                                            </div>
                                            <ul class="tree_ul">
                                                @isset($fatherGrandfather)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="{{ route('humans.show', $fatherGrandfather->id) }}"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($fatherGrandfather->image) }}"/>
                                                                <p>{{ $fatherGrandfather->name . " " . $fatherGrandfather->last_name . " " . $fatherGrandfather->surname }}</p>

                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($fatherGrandmother)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="{{ route('humans.show', $fatherGrandmother->id) }}"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($fatherGrandmother->image) }}">
                                                                <p>{{ $fatherGrandmother->name . " " . $fatherGrandmother->last_name . " " . $fatherGrandmother->surname }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </li>
                                    @endisset

                                    @isset($mother)
                                        <li class="tree_li">
                                            <div class="tree_card">
                                                <a
                                                    href="{{ route('humans.show', $mother->id) }}"
                                                    data-mdb-ripple-init
                                                    data-mdb-modal-init
                                                    data-mdb-target="#show-info-modal"
                                                >
                                                    <img class="img-fluid" src="{{ asset($mother->image) }}">
                                                    <p>{{ $mother->name . " " . $mother->last_name . " " . $mother->surname }}</p>
                                                </a>
                                            </div>
                                            <ul class="tree_ul">
                                                @isset($motherGrandfather)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="{{ route('humans.show', $motherGrandfather->id) }}"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($motherGrandfather->image) }}">
                                                                <p>{{ $motherGrandfather->name . " " . $motherGrandfather->last_name . " " . $motherGrandfather->surname }}</p>

                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($motherGrandmother)
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="{{ route('humans.show', $motherGrandmother->id) }}"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($motherGrandmother->image) }}">
                                                                <p>{{ $motherGrandmother->name . " " . $motherGrandmother->last_name . " " . $motherGrandmother->surname }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </li>
                                    @endisset
                                </ul>
                            </li>
                        </ul>
                    @endisset
                </div>
            </div>
        </div>

        @if(!$human)
            <div class="row text-center">
                <div class="col-md-6 offset-md-3 py-5">
                    <a href="{{ route('humans.create') }}" class="btn btn-success">Добавить человека</a>
                </div>
            </div>
        @endif
    </div>
@endsection
