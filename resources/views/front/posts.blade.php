@extends('front.layouts.main')

@section('content')
    <div class="hero-section small wf-section">
        <div class="grid-wrapper hero">
            <div id="w-node-f094775e-3f7b-98e4-bd04-ceec3a8df315-07e74baa" class="page-intro">
                <div id="w-node-_826ad220-1b9a-2a2a-89b5-4e2abae6e6d0-07e74baa" class="hero-intro">
                    <div class="stacked-intro">
                        <div class="hero-intro-title">
                            <div class="subtitle-intro">
                                <div id="w-node-_826ad220-1b9a-2a2a-89b5-4e2abae6e6d2-07e74baa" class="subtitle-line left">
                                    <div class="solid-subtitle-line"></div>
                                </div>
                                <div class="subtitle light">Blog</div>
                                <div id="w-node-_826ad220-1b9a-2a2a-89b5-4e2abae6e6d6-07e74baa" class="subtitle-line">
                                    <div class="solid-subtitle-line"></div>
                                </div>
                            </div>
                            <h1 class="xxl-heading">{{ $category->name ?? 'Noticias, datos interesantes, proyectos, etc.' }}
                            </h1>
                        </div>
                    </div>
                </div>
                <a href="javascript: history.go(-1)" id="w-node-_85cdbfa1-c333-d96c-213c-dfc2eee146e8-07e74baa"
                    class="outline-button light hero-button w-inline-block">
                    <div id="w-node-_85cdbfa1-c333-d96c-213c-dfc2eee146e9-07e74baa" class="button-text">Volver</div>
                    <div id="w-node-_85cdbfa1-c333-d96c-213c-dfc2eee146eb-07e74baa" class="button-hover-outline left">
                        <div class="solid-button-outline light"></div>
                    </div>
                    <div id="w-node-_85cdbfa1-c333-d96c-213c-dfc2eee146ed-07e74baa" class="button-hover-outline right">
                        <div class="solid-button-outline right light"></div>
                    </div>
                    <div id="w-node-_85cdbfa1-c333-d96c-213c-dfc2eee146ef-07e74baa" class="button-hover-outline middle">
                        <div class="solid-button-outline middle light"></div>
                    </div>
                </a>
                <a href="#Scroll" id="w-node-_2d0d2308-9452-6551-5336-4c0b78a0eca6-07e74baa"
                    data-w-id="2d0d2308-9452-6551-5336-4c0b78a0eca6" class="half-circle-scroll-link w-inline-block">
                    <div style="height:0%" class="scroll-link-outline">
                        <div class="scroll-link-outline-fill"></div>
                    </div>
                    <div class="scroll-indicator">
                        <div style="-webkit-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                            class="indicator-fill"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="slider-background-wrapper hero-wrapper">
            <div class="slider-background">
                <div class="hero-slide-background two" style="background-image: url({{ asset('img/001.jpeg') }})">
                    <div class="overlay gradient"></div>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($next_post))
        <div class="section grey no-padding wf-section">
            <div class="grid-wrapper">
                <div id="Scroll" class="section-box w-node-_07f11b09-1b62-8e87-6fca-47a22e41fcf3-07e74baa">
                    <div class="dual-box">
                        <div id="w-node-_7e241bc8-2c73-8320-8c75-58383e8432b9-07e74baa" class="coming-soon-intro">
                            <div id="w-node-ea9dd166-4308-71f0-8886-d2ac243c9265-07e74baa" class="stacked-soon">
                                <div class="stacked-intro">
                                    <div class="stacked-heading">
                                        <div class="left-intro">
                                            <div id="w-node-_2e75c77e-38c5-a921-c576-531e3e51dd81-07e74baa"
                                                class="subtitle-line dark left">
                                                <div class="solid-subtitle-line dark"></div>
                                            </div>
                                            <div id="w-node-_2e75c77e-38c5-a921-c576-531e3e51dd83-07e74baa"
                                                class="subtitle">
                                                Siguiente el {{ $next_post->publish_date }}</div>
                                        </div>
                                        <div class="left-intro">
                                            <h1 id="w-node-_2e75c77e-38c5-a921-c576-531e3e51dd86-07e74baa">
                                                {{ $next_post->name }}</h1>
                                        </div>
                                    </div>
                                    <div class="body-display">{{ $next_post->subtitle }}</div>
                                </div>
                            </div>
                        </div>
                        <div id="w-node-_6da871d8-c2bd-b4a0-91e0-6a84ef3eaa2e-07e74baa" class="coming-soon"><img
                                src="{{ asset('img/posts/' . $next_post->main_picture) }}" loading="lazy" alt=""
                                class="image-3">
                            <div class="coming-soon-overlay">
                                <div id="js-clock"
                                    class="js-clock light hide-on-mobile w-node-_4088cbcb-a06d-c1f5-95b2-24cb4b0ae7f8-07e74baa">
                                    <div class="box">
                                        <div id="js-clock-days" class="clock-number">{{ $n_days }}</div>
                                        <div class="subtitle small light">Days</div>
                                    </div>
                                    <div class="box">
                                        <div id="js-clock-hours" class="clock-number">{{ $n_hours }}</div>
                                        <div class="subtitle small light">Hrs</div>
                                    </div>
                                    <div class="box">
                                        <div id="js-clock-minutes" class="clock-number">{{ $n_min }}</div>
                                        <div class="subtitle small light">Min</div>
                                    </div>
                                    <div class="box">
                                        <div id="js-clock-seconds" class="clock-number">{{ $n_sec }}</div>
                                        <div class="subtitle small light">Sec</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="w-node-_0647b51a-e67e-2c0a-0431-8fd23be7e481-07e74baa" class="fill"></div>
            </div>
        </div>
    @endif

    <div class="section grey wf-section">
        <div class="grid-wrapper">
            <div id="w-node-_061a3c89-a3f0-d29d-166c-b7bfcd670a54-07e74baa" class="collection-wrapper">
                <div class="dual-tab-wrapper" style="padding-bottom:20px">

                    <div class="tabs w-tabs">
                        <div class="basic-tab-menu">
                            <a href="{{ route('allPost') }}" class="tab-link one w-inline-block w-tab-link w--current">
                                <div>Ver todos</div>
                                @if (Request::is('publicaciones'))
                                    <div class="tab-indicator"></div>
                                @endif
                            </a>
                            @php
                                $categories = App\Models\Category::get();
                            @endphp
                            @foreach ($categories as $category)
                                @if ($category->posts->count() != 0)
                                    <a href="{{ route('category', $category->slug) }}"
                                        class="tab-link one w-inline-block w-tab-link w--current">
                                        <div>{{ $category->name }}</div>
                                        @if (Request::is('publicaciones/' . $category->slug))
                                            <div class="tab-indicator"></div>
                                        @endif
                                    </a>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
                <div id="w-node-_30f21a99-a395-9aa1-617b-f0476f1f7ed7-07e74baa" class="w-dyn-list">
                    <div role="list" class="templates-grid w-dyn-items">
                        @foreach ($posts as $post)
                            @include('front.layouts.utilities._post_card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
