@extends('layouts.app.layout')

@section('title', 'РОДовое Древо' . $human->name)

@section('content')
    <link rel="stylesheet" href="{{ asset('app/css/tree.css') }}">

    @include('app.rodovoe-drevo.script-copy-link')

    <div class="container container-tree">

        <div class="row justify-content-center">
            <div class="col">
                @auth()

                    <div class="row justify-content-center pt-4">
                        <div class="position-absolute notif" id="liveAlertPlaceholder"></div>
                    </div>

                    <div class="copyLink">
                        <button id="copyButton" class="btn btn-outline-success float-end">
                            <i class="bi bi-copy"></i>
                        </button>
                        @isset($shareTreeLink->link)
                            <div class="mt-3">
                                <input type="text" hidden="hidden" id="copyText" class="form-control"
                                       value="{{ env('APP_URL') }}/rodovoe-drevo/{{$human->id}}/{{ $shareTreeLink->link }}"
                                       readonly>
                            </div>
                        @endisset
                    </div>
                @endauth
            </div>
        </div>

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
                                        <p class=""> {{ $human->name. " " .  $human->o_name . " " . $human->f_name}}</p>
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
                                                    <p>{{ $father->name . " " . $father->o_name . " " . $father->f_name }}</p>
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
                                                                <p>{{ $fatherGrandfather->name . " " . $fatherGrandfather->o_name . " " . $fatherGrandfather->f_name }}</p>

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
                                                                <p>{{ $fatherGrandmother->name . " " . $fatherGrandmother->o_name . " " . $fatherGrandmother->f_name }}</p>
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
                                                    <p>{{ $mother->name . " " . $mother->o_name . " " . $mother->f_name }}</p>
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
                                                                <p>{{ $motherGrandfather->name . " " . $motherGrandfather->o_name . " " . $motherGrandfather->f_name }}</p>

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
                                                                <p>{{ $motherGrandmother->name . " " . $motherGrandmother->o_name . " " . $motherGrandmother->f_name }}</p>
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
    </div>
@endsection
