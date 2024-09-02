<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('Web/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Web/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Web/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('Web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('Web/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('Web/css/citata.css') }}">
    <link rel="stylesheet" href="{{ asset('Web/css/responsive.css') }}">

    <meta name="yandex-verification" content="0d26f8813ed665ce" />

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(97883423, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/97883423" style="position:absolute; left:-9999px;" alt="" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <!--Y ID-->
    <meta name="yandex-verification" content="a5f4fa6ddc099501" />
    <!--Google ID-->
    <meta name="google-site-verification" content="aFCgdotNIc7YmsECOkI1nAZh0A_2YUJypOqFLjlG7wQ" />
</head>

<body id="body">

    <div id="preloader">
        <div class="book">
            <div class="book__page"></div>
            <div class="book__page"></div>
            <div class="book__page"></div>
        </div>
    </div>

    <div class="navbar-default navbar-fixed-top" id="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    rodovayakniga.ru
                    {{--                <img --}}
                    {{--                        class="logo-1" --}}
                    {{--                        src="{{ asset('Web/images/logo/vector/default-monochrome.svg') }}" --}}
                    {{--                        alt="LOGO" --}}
                    {{--                        height="87px" --}}
                    {{--                        width="100px" /> --}}
                    {{--                <img --}}
                    {{--                        class="logo-2" --}}
                    {{--                        src="{{ asset('Web/images/logo/vector/default-monochrome.svg') }}" --}}
                    {{--                        alt="LOGO" --}}
                    {{--                        height="87px" --}}
                    {{--                        width="100px" /> --}}
                </a>
            </div>

            <nav class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right" id="top-nav">
                    <li><a href="/">Главное</a></li>
                    <li><a href="/#about">О сервисе</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ route('home') }}">Приложение</a>
                            </li>
                        @else
                            <li>
                                <a href="#">
                                    |
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}">Вход</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    @yield('content')

    <section class="wow fadeInUp">
        <div class="map-wrapper">
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <p>&copy;
                            <a href="#">rodovayakniga.ru
                                <br />
                            </a>
                        </p>
                        {{--                        <a href="https://www.Themefisher.com">Themefisher</a>| Шаблон сайта</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Js -->
    <script src="{{ asset('Web/js/vendor/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('Web/js/vendor/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('Web/js/jquery.lwtCountdown-1.0.js') }}"></script>
    <script src="{{ asset('Web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Web/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('Web/js/jquery.form.js') }}"></script>
    <script src="{{ asset('Web/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('Web/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('Web/js/plugins.js') }}"></script>
    <script src="{{ asset('Web/js/wow.min.js') }}"></script>
    <script src="{{ asset('Web/js/main.js') }}"></script>

</body>

</html>
