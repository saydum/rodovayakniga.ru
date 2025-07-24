@extends('layouts.app.layout')

@section('title', 'Родовое Древо: ' . ($human->name ?? ''))

@section('content')
    <link rel="stylesheet" href="{{ asset('application/css/tree.css') }}">

    <div class="card-header text-end d-flex justify-content-end" style="margin-top: -30px;">
        <div class="row justify-content-center">

            <div class="col-sm">
                <a href="{{ route('humans.create') }}" class="btn btn-success">Добавить</a>
            </div>

            @include('application.scripts.script-copy-link')
            @include('application.others.copy-tree-link')
        </div>
    </div>

    @include('application.others.notification')

    <div class="container container-tree">
        <div class="row">
            <div class="col">

                <div class="tree">
                    <ul class="tree_ul">
                        @isset($human)
                            <li class="tree_li">
                                {{-- 1 --}}
                                <div class="tree_card">
                                    <a
                                        class="show-human-info"
                                        data-id="{{ $human->id }}"
                                        data-name="{{ $human->name }}"
                                        data-lastname="{{ $human->last_name }}"
                                        data-surname="{{ $human->surname }}"
                                        data-gender="{{ $human->gender }}"
                                        data-image="{{ asset($human->image) }}"
                                        data-mother="{{ route('humans.create', ['mother_id' => $human->id]) }}"
                                        data-father="{{ route('humans.create', ['father_id' => $human->id]) }}"
                                        data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasHumanInfo"
                                    >
                                        <img class="img-fluid" src="{{ asset($human->image) }}">
                                        <p class=""> {{ $human->name. " " .  $human->last_name . " " . $human->surname}}</p>
                                    </a>
                                </div>

                                {{-- E1--}}
                                <ul class="tree_ul">
                                    @isset($parent['father'])
                                        <li class="tree_li">
                                            <div class="tree_card">
                                                <a
                                                    data-mdb-ripple-init
                                                    data-mdb-modal-init
                                                    data-mdb-target="#show-info-modal"
                                                    class="show-human-info"
                                                    data-id="{{  $parent['father']->id }}"
                                                    data-name="{{ $parent['father']->name }}"
                                                    data-lastname="{{ $parent['father']->last_name }}"
                                                    data-surname="{{ $parent['father']->surname }}"
                                                    data-gender="{{ $parent['father']->gender }}"
                                                    data-image="{{ asset($parent['father']->image) }}"
                                                    data-mother="{{ route('humans.create', ['mother_id' =>  $parent['father']->id]) }}"
                                                    data-father="{{ route('humans.create', ['father_id' =>  $parent['father']->id]) }}"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasHumanInfo"
                                                >
                                                    <img class="img-fluid" src="{{ asset($parent['father']->image) }}">
                                                    <p>{{ $parent['father']->name . " " . $parent['father']->last_name . " " . $parent['father']->surname }}</p>
                                                </a>
                                            </div>
                                            <ul class="tree_ul">
                                                @isset($parentFather['father'])
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="{{ route('humans.show', $parentFather['father']->id) }}"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($parentFather['father']->image) }}"/>
                                                                <p>{{ $parentFather['father']->name . " " . $parentFather['father']->last_name . " " . $parentFather['father']->surname }}</p>

                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($parentFather['mother'])
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="{{ route('humans.show', $parentFather['mother']->id) }}"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($parentFather['mother']->image) }}">
                                                                <p>{{ $parentFather['mother']->name . " " . $parentFather['mother']->last_name . " " . $parentFather['mother']->surname }}</p>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                            </ul>
                                        </li>
                                    @endisset

                                    @isset($parent['mother'])
                                        <li class="tree_li">
                                            <div class="tree_card">
                                                <a
                                                    href="{{ route('humans.show', $parent['mother']->id) }}"
                                                    data-mdb-ripple-init
                                                    data-mdb-modal-init
                                                    data-mdb-target="#show-info-modal"
                                                >
                                                    <img class="img-fluid" src="{{ asset($parent['mother']->image) }}">
                                                    <p>{{ $parent['mother']->name . " " . $parent['mother']->last_name . " " . $parent['mother']->surname }}</p>
                                                </a>
                                            </div>
                                            <ul class="tree_ul">
                                                @isset($parentMother['father'])
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="{{ route('humans.show', $parentMother['father']->id) }}"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($parentMother['father']->image) }}">
                                                                <p>{{ $parentMother['father']->name . " " . $parentMother['father']->last_name . " " . $parentMother['father']->surname }}</p>

                                                            </a>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($parentMother['mother'])
                                                    <li class="tree_li">
                                                        <div class="tree_card">
                                                            <a
                                                                href="{{ route('humans.show', $parentMother['mother']->id) }}"
                                                                data-mdb-ripple-init
                                                                data-mdb-modal-init
                                                                data-mdb-target="#show-info-modal"
                                                            >
                                                                <img class="img-fluid"
                                                                     src="{{ asset($parentMother['mother']->image) }}">
                                                                <p>{{ $parentMother['mother']->name . " " . $parentMother['mother']->last_name . " " . $parentMother['mother']->surname }}</p>
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

        @include('application.rodovoe-drevo.modal')
        @include('application.scripts.modal-script')
    </div>
@endsection
