<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Mon Dec 05 2022 22:25:32 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="638e6fa2a986f4d12d6ff0f7" data-wf-site="638e6fa2a986f4769c6ff0ef">

<head>

    {!! htmlScriptTagJsApi(['lang' => 'es']) !!}
    @php
        $seo = App\Models\SEO::first();
    @endphp

    <meta charset="utf-8">
    <title>{{ $seo->page_title ?? 'Derch' }}</title>
    <meta content="Home explore" property="og:title">
    <meta content="Home explore" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="{{ $seo->page_title ?? 'Derch' }}" name="generator">
    <meta name="description" content="{{ $seo->page_description ?? 'Derch' }}">
    <meta name="theme-color" content="{{ $seo->page_theme_color_hex ?? '#ffffff' }}">
    <meta name="keywords" content="{{ $seo->page_keywords ?? '' }}">
    <link rel="canonical" href="{{ $seo->page_canonical_url ?? '' }}">

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#4ab2cf">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">



    @stack('seo')

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">

    <link href="{{ asset('front/css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/derch.css') }}" rel="stylesheet" type="text/css">

    <style>
        @media (min-width:992px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="145af38a-5e35-0aee-12e9-d758947d89bc"] {
                -webkit-transform: translate3d(null, 0em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(null, 0em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(null, 0em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(null, 0em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="145af38a-5e35-0aee-12e9-d758947d89ba"] {
                background-color: rgba(43, 222, 211, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="611c5230-4ece-ed13-39b3-9f84251dd2b1"] {
                -webkit-transform: translate3d(0, 15%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 15%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 15%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 15%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                opacity: 0;
            }
        }

        @media (max-width:991px) and (min-width:768px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="145af38a-5e35-0aee-12e9-d758947d89bc"] {
                -webkit-transform: translate3d(null, 0em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(null, 0em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(null, 0em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(null, 0em, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="145af38a-5e35-0aee-12e9-d758947d89ba"] {
                background-color: rgba(43, 222, 211, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="611c5230-4ece-ed13-39b3-9f84251dd2b1"] {
                -webkit-transform: translate3d(0, 15%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 15%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 15%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 15%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                opacity: 0;
            }
        }
    </style>

    <style>
        .owl-prev span {
            font-size: 50px;
        }

        .owl-next span {
            font-size: 50px;

        }

        .owl-nav {
            margin-top: 4rem;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["IBM Plex Sans:200,300,regular,500,600,700", "Inter:300,regular,500,600,700,800"]
            }
        });
    </script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                .className += t + "touch")
        }(window, document);
    </script>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">
    @stack('styles')
</head>

<body class="body">

    @include('front.layouts.header')


    @include('front.layouts.partials._messages')
    @include('front.layouts.partials._modal_messages')
    @yield('content')

    <a href="https://wa.me/524777955167?text=Hola!%20Necesito%20más%20información%20de%20sus%20servicios"
        class="whatsapp-btn" target="black" data-bs-toggle="tooltip" data-bs-title="Chatea con nosotros!">
        <ion-icon name="logo-whatsapp"></ion-icon>
    </a>


    @include('front.layouts.footer')

    @include('front.layouts.partials._cookies_notice')

    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=638e6fa2a986f4769c6ff0ef"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>

    <script src="{{ asset('front/js/webflow.js') }}" type="text/javascript"></script>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Icon Pack -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script>
        feather.replace()
    </script>

    <!-- Swiper JS -->
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Initialize Swiper -->
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                margin: 10,
                loop: true,
                nav: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });
        });
    </script>

    @stack('scripts')

</body>

</html>
