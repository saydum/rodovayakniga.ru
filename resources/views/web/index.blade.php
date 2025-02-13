@extends('layouts.web.layout')

@section('content')
    <section id="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="block">
                        <h1 class="wow fadeInDown">Онлайн-сервис для составления Родового древа</h1>
                        <p class="wow fadeInDown" data-wow-delay="0.3s">
                            <span class="q">Народ, не знающий своего прошлого, не имеет будущего.</span>
                            <br />
                            М.В.Ломоносов
                        </p>
                        <div class="wow fadeInDown" data-wow-delay="0.3s">
                            <a class="btn btn-default btn-home" href="{{ route('roda.index') }}">
                                Начать
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow zoomIn">
                    <div class="block">
                        <div class="counter">
                            <img src="{{ asset('web/images/hero.png') }}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 wow fadeInLeft">
                    <div class="sub-heading">
                        <h3>
                            О сервисе
                        </h3>
                    </div>
                    <div class="block">
                        <p>Наверное многим было интересно прошлое своего рода, история собственной семьи. Нам
                            рассказывали истории о наших предках, мы слушали их и восхищались. Каждого из нас посещала
                            мысль о том, кем же являлись наши предки, к какому сословию они относились, может, они были
                            крестьянами, или же дворянами. Что ж, наш сайт поможет вам узнать что, то новое о вашем роде,
                            может, даже найти кого-нибудь из ваших дальних родственников. Наш сайт также поможет вам
                            составить Родовое древо.
                        </p>
                        <div class="sub-heading">
                            <h3>
                                Зачем нужно Родовое древо?
                            </h3>
                        </div>
                        <p>
                            Создание семейного дерева трудоёмкий и увлекательный процесс, который поддерживает
                            интерес людей к истории своего рода, ведь семья - основа в жизни человека. Изучая своё Родовое
                            древо человек духовно развивается, укрепляет семью, с уважением относится к своим родным и к
                            своей родословной. «Неуважение к предкам есть первый признак дикости и безнравственности»,
                            — писал Александр Сергеевич Пушкин. Изучая историю своего рода, человек ощущает себя частью
                            чего, то большого и важного.
                        </p>
                        <br />
                        <p>
                            Ваши данные не будут доступны другим пользователям. Если вы подходите под описание
                            людей, которых ищут другие пользователи, вам придет запрос об этом. Вы можете принять или
                            отклонить этот запрос. Приняв запрос, этот пользователь сможет просмотреть ваши данные.
                        </p>

                        <br>

                        <p><b>Текст написала:</b> Джамиля Владимировна Агамирзоева ©</p>


                    </div>
                </div>
                <div class="col-md-5 col-sm-12 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="sub-heading">
                        <h3>
                            С помощью нашего веб-приложения вы можете!
                        </h3>
                    </div>
                    <div class="function_info">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b>+ </b>Создать родовое древо
                            </li>
                            <li class="list-group-item">
                                <b>+ </b>Доступ по ссылке
                            </li>
                            <li class="list-group-item">
                                <b>- </b>Пригласить родственников
                            </li>
                            <li class="list-group-item">
                                <b>- </b>Резервное копирование.
                            </li>
                            <li class="list-group-item">
                                <b>- </b>Создать PDF (книги) из составленных данных
                            </li>
                            <li class="list-group-item">
                                <b>- </b>Глобальный поиск
                            </li>
                            <li class="list-group-item">
                                <b>- </b>Получить советы по составлению Родового древа
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
