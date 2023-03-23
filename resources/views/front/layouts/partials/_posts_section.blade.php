@if ($posts->count() != 0)
    <div class="section grey no-padding cut wf-section">
        <div class="grid-wrapper">
            <div id="w-node-_66659e4f-c78a-1970-6da3-5ba133dd7558-efe74afb" class="section-box no-top-margin">
                <div class="stacked-content">
                    <div id="w-node-_12c0f9e7-7324-c69f-9722-08ece29fb28b-efe74afb" class="dual-grid">
                        <div class="stacked-heading">
                            <div class="left-intro">
                                <div id="w-node-_12c0f9e7-7324-c69f-9722-08ece29fb28e-efe74afb"
                                    class="subtitle-line dark left">
                                    <div class="solid-subtitle-line dark"></div>
                                </div>
                                <div id="w-node-_12c0f9e7-7324-c69f-9722-08ece29fb290-efe74afb" class="subtitle">Blog
                                </div>
                            </div>
                            <div class="left-intro">
                                <h1 id="w-node-_12c0f9e7-7324-c69f-9722-08ece29fb293-efe74afb">Publicaciones</h1>
                            </div>
                        </div>
                        <a href="{{ route('allPost') }}" id="w-node-bbcb602a-ad0e-9075-fa18-3e1a9078c8d5-efe74afb"
                            class="outline-button w-inline-block">
                            <div id="w-node-bbcb602a-ad0e-9075-fa18-3e1a9078c8d6-efe74afb" class="button-text">Ver
                                todos
                            </div>
                            <div id="w-node-bbcb602a-ad0e-9075-fa18-3e1a9078c8d8-efe74afb"
                                class="button-hover-outline left">
                                <div class="solid-button-outline"></div>
                            </div>
                            <div id="w-node-bbcb602a-ad0e-9075-fa18-3e1a9078c8da-efe74afb"
                                class="button-hover-outline right">
                                <div class="solid-button-outline right"></div>
                            </div>
                            <div id="w-node-bbcb602a-ad0e-9075-fa18-3e1a9078c8dc-efe74afb"
                                class="button-hover-outline middle">
                                <div class="solid-button-outline middle"></div>
                            </div>
                        </a>
                    </div>
                    <div class="template-slider">
                        <div data-delay="4000" data-animation="slide" class="cards-slider w-slider"
                            data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true"
                            data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                            <div class="cards-mask w-slider-mask">
                                @foreach ($posts as $post)
                                    @include('front.layouts.utilities._post_card')
                                @endforeach
                            </div>

                            @if ($posts->count() > 1)
                                <div class="left-arrow left w-slider-arrow-left">
                                    <div class="solid-video-button-outline extra-dark">
                                        <div class="slider-arrow-wrapper"><img
                                                src="{{ asset('img/arrow-left-final24x242x.svg') }}" loading="lazy"
                                                alt="" class="invert-small"></div>
                                        <div class="video-button-outline small">
                                            <div id="w-node-_9e188066-2c68-be1a-5a10-64030e16793a-efe74afb"
                                                class="video-outline-wrapper top">
                                                <div class="video-outline small"></div>
                                            </div>
                                            <div id="w-node-_9e188066-2c68-be1a-5a10-64030e16793c-efe74afb"
                                                class="video-outline-wrapper bottom">
                                                <div class="video-outline bottom small"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-arrow right dark w-slider-arrow-right">
                                    <div class="solid-video-button-outline extra-dark">
                                        <div class="slider-arrow-wrapper"><img
                                                src="{{ asset('img/arrow-right-final24x242x.svg') }}" loading="lazy"
                                                alt="" class="invert-small"></div>
                                        <div class="video-button-outline small">
                                            <div id="w-node-c1f49912-b18b-3d17-8076-711a436e8ce9-efe74afb"
                                                class="video-outline-wrapper top">
                                                <div class="video-outline small"></div>
                                            </div>
                                            <div id="w-node-c1f49912-b18b-3d17-8076-711a436e8ceb-efe74afb"
                                                class="video-outline-wrapper bottom">
                                                <div class="video-outline bottom small"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="hide-slide-nav w-slider-nav w-round"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grey-fill top"></div>
            <div class="fill"></div>
        </div>
    </div>
@endif
