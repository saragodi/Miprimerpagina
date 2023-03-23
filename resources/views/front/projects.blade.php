@extends('front.layouts.main')

@section('content')
    <div data-w-id="33c4ee39-7efb-4880-5e98-60bdc5de59a2" class="hero-section small wf-section">
        <div class="grid-wrapper hero">
            <div id="w-node-_33c4ee39-7efb-4880-5e98-60bdc5de59ae-a7e74b52" class="page-intro">
                <a href="javascript: history.go(-1)" id="w-node-bcfb3021-ddeb-ada9-4922-2f601faa02ab-a7e74b52"
                    class="outline-button light hero-button w-inline-block">
                    <div id="w-node-bcfb3021-ddeb-ada9-4922-2f601faa02ac-a7e74b52" class="button-text">Volver</div>
                    <div id="w-node-bcfb3021-ddeb-ada9-4922-2f601faa02ae-a7e74b52" class="button-hover-outline left">
                        <div class="solid-button-outline light"></div>
                    </div>
                    <div id="w-node-bcfb3021-ddeb-ada9-4922-2f601faa02b0-a7e74b52" class="button-hover-outline right">
                        <div class="solid-button-outline right light"></div>
                    </div>
                    <div id="w-node-bcfb3021-ddeb-ada9-4922-2f601faa02b2-a7e74b52" class="button-hover-outline middle">
                        <div class="solid-button-outline middle light"></div>
                    </div>
                </a>
                <div id="w-node-_33c4ee39-7efb-4880-5e98-60bdc5de59af-a7e74b52" class="hero-intro small">
                    <div class="hero-intro-title">
                        <div class="subtitle-intro">
                            <div id="w-node-_33c4ee39-7efb-4880-5e98-60bdc5de59b1-a7e74b52" class="subtitle-line left">
                                <div class="solid-subtitle-line"></div>
                            </div>
                            <div class="subtitle light">Proyectos</div>
                            <div id="w-node-_33c4ee39-7efb-4880-5e98-60bdc5de59b5-a7e74b52" class="subtitle-line right">
                                <div class="solid-subtitle-line"></div>
                            </div>
                        </div>
                        <h1 class="xxl-heading">Conocé todos nuestros trabajos</h1>
                    </div>
                </div>
                <div id="w-node-_33c4ee39-7efb-4880-5e98-60bdc5de59bc-a7e74b52" class="breadcrumbs">
                </div>
                <a href="#scroll" id="w-node-_23a9a23e-4749-8be7-d650-ab617bef0337-a7e74b52"
                    data-w-id="23a9a23e-4749-8be7-d650-ab617bef0337" class="half-circle-scroll-link w-inline-block">
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
    <div class="section grey no-top-padding wf-section">
        <div class="grid-wrapper">
            <div id="scroll" class="section-box w-node-_3a3ab581-0b6a-f83b-6a25-99d55df60ded-a7e74b52">
                <div class="w-dyn-list">
                    <div role="list" class="schedule-grid w-dyn-items">
                        @foreach ($projects as $project)
                            @include('front.layouts.utilities._project_card')
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="w-node-_3a3ab581-0b6a-f83b-6a25-99d55df60e22-a7e74b52" class="fill"></div>
        </div>
    </div>
@endsection
