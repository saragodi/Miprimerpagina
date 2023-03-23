@extends('front.layouts.main')

@section('content')
    <div class="hero-section small wf-section">
        <div class="grid-wrapper hero">
            <div id="w-node-_605515ae-666e-8020-a1b2-63a6f84b65d0-6ce74b0c" class="template-hero">
                <a href="javascript: history.go(-1)" id="w-node-_2ec36261-3732-88b3-fe80-d8dc3a3fcf3f-6ce74b0c"
                    class="outline-button light hero-button w-inline-block">
                    <div id="w-node-_2ec36261-3732-88b3-fe80-d8dc3a3fcf40-6ce74b0c" class="button-text">Volver</div>
                    <div id="w-node-_2ec36261-3732-88b3-fe80-d8dc3a3fcf42-6ce74b0c" class="button-hover-outline left">
                        <div class="solid-button-outline light"></div>
                    </div>
                    <div id="w-node-_2ec36261-3732-88b3-fe80-d8dc3a3fcf44-6ce74b0c" class="button-hover-outline right">
                        <div class="solid-button-outline right light"></div>
                    </div>
                    <div id="w-node-_2ec36261-3732-88b3-fe80-d8dc3a3fcf46-6ce74b0c" class="button-hover-outline middle">
                        <div class="solid-button-outline middle light"></div>
                    </div>
                </a>
                <div id="w-node-_605515ae-666e-8020-a1b2-63a6f84b65d4-6ce74b0c" class="breadcrumbs">

                </div>
                <div id="w-node-_605515ae-666e-8020-a1b2-63a6f84b65e0-6ce74b0c" class="template-intro-content">
                    <h1 class="xxl-heading">{{ $post->name }}</h1>
                    <div id="w-node-_605515ae-666e-8020-a1b2-63a6f84b65e3-6ce74b0c" class="template-stats">
                        <div class="dynamic-dual-text">
                            <div></div>
                            <div>{{ $post->subtitle }}</div>
                        </div>
                    </div>
                </div>
                <div id="w-node-_605515ae-666e-8020-a1b2-63a6f84b65e9-6ce74b0c" class="template-buttons">
                    @foreach ($post->categories as $category)
                        <a href="{{ route('category', $category->slug) }}" class="outline-button light w-inline-block">
                            <div id="w-node-dd02d341-a4c5-e950-595e-a8b820ae515e-6ce74b0c" class="button-text">
                                {{ $category->name }}
                            </div>
                            <div id="w-node-dd02d341-a4c5-e950-595e-a8b820ae5160-6ce74b0c"
                                class="button-hover-outline left">
                                <div class="solid-button-outline light"></div>
                            </div>
                            <div id="w-node-dd02d341-a4c5-e950-595e-a8b820ae5162-6ce74b0c"
                                class="button-hover-outline right">
                                <div class="solid-button-outline right light"></div>
                            </div>
                            <div id="w-node-dd02d341-a4c5-e950-595e-a8b820ae5164-6ce74b0c"
                                class="button-hover-outline middle">
                                <div class="solid-button-outline middle light"></div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="testimonial-strip-wrapper">
            <div class="hero-slide-background one"
                style="background-image: url({{ asset('img/posts/' . $post->main_picture) }})">
            </div>
        </div>
        <div class="overlay gradient dark"></div>
    </div>
    <div class="section grey no-top-padding wf-section">
        <div class="grid-wrapper">
            <div id="w-node-c1e5bf4e-c6e2-cd65-c207-a5d5a8a4422c-6ce74b0c" class="section-box">
                <div class="newsletter-bottom" style="padding-top: 5rem !important;">
                    <div class="newsletter-content-wraper">
                        <div id="one" class="newsletter-box top">
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <div id="w-node-_9edb2f06-94e1-8559-2221-0f531cbf0033-6ce74b0c" class="fill"></div>
        </div>
    </div>
    @include('front.layouts.partials._posts_section')
@endsection
