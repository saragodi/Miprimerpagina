<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Mon Dec 05 2022 22:25:32 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="638e6fa2a986f4d12d6ff0f7" data-wf-site="638e6fa2a986f4769c6ff0ef">

<head>

    @php
        $seo = App\Models\SEO::first();
    @endphp

    <meta charset="utf-8">
    <title>{{ $seo->page_title ?? 'Derch' }}</title>
    <meta content="Home explore" property="og:title">
    <meta content="Home explore" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="{{ $seo->page_title ?? 'Derch' }}" name="generator">
    <meta name="description" content="{{ $seo->page_title ?? 'Derch' }}">

    <meta name="theme-color" content="{{ $seo->page_theme_color_hex ?? '#ffffff' }}">

    @stack('seo')

    <!-- CSS -->

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


    @include('front.layouts.footer')

    @include('front.layouts.partials._cookies_notice')
    @include('front.layouts.partials._modal_popup')

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Icon Pack -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    @stack('scripts')

</body>

</html>
