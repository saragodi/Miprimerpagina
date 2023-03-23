<div class="section grey no-padding cut wf-section">
    <div class="grid-wrapper">
        <div id="w-node-_962ec2be-c7a4-bf74-cdde-6aef89722b25-efe74afb" class="section-box no-top-margin">
            <div class="stacked-content">
                <div class="dual-grid">
                    <div class="stacked-heading">
                        <div class="left-intro">
                            <div id="w-node-_962ec2be-c7a4-bf74-cdde-6aef89722b29-efe74afb"
                                class="subtitle-line dark left">
                                <div class="solid-subtitle-line dark"></div>
                            </div>
                            <div id="w-node-_962ec2be-c7a4-bf74-cdde-6aef89722b2b-efe74afb" class="subtitle">
                                Proyectos</div>
                        </div>
                        <div class="left-intro verticle">
                            <h1 id="w-node-_962ec2be-c7a4-bf74-cdde-6aef89722b2e-efe74afb">Últimos públicados</h1>
                        </div>
                    </div>
                    <div id="w-node-_962ec2be-c7a4-bf74-cdde-6aef89722b30-efe74afb" class="right-dual">
                        <a href="{{ route('allProjects') }}" id="w-node-_153a900d-5d27-4c6f-76d2-750f6833200d-efe74afb"
                            class="outline-button w-inline-block">
                            <div id="w-node-_153a900d-5d27-4c6f-76d2-750f6833200e-efe74afb" class="button-text">
                                Ver todos los proyectos</div>
                            <div id="w-node-_153a900d-5d27-4c6f-76d2-750f68332010-efe74afb"
                                class="button-hover-outline left">
                                <div class="solid-button-outline"></div>
                            </div>
                            <div id="w-node-_153a900d-5d27-4c6f-76d2-750f68332012-efe74afb"
                                class="button-hover-outline right">
                                <div class="solid-button-outline right"></div>
                            </div>
                            <div id="w-node-_153a900d-5d27-4c6f-76d2-750f68332014-efe74afb"
                                class="button-hover-outline middle">
                                <div class="solid-button-outline middle"></div>
                            </div>
                        </a>
                    </div>
                </div>
                @if ($projects->count() == 0)
                    <h6>no hay</h6>
                @else
                    <div class="template-slider">
                        <div data-delay="4000" data-animation="slide" class="cards-slider w-slider"
                            data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true"
                            data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                            <div class="cards-mask medium w-slider-mask">
                                @foreach ($projects as $project)
                                    @include('front.layouts.utilities._project_card')
                                @endforeach
                            </div>

                            @if ($projects->count() > 1)
                                <div class="left-arrow left w-slider-arrow-left">
                                    <div class="solid-video-button-outline dark">
                                        <div class="slider-arrow-wrapper"><img
                                                src="{{ asset('img/arrow-left-final24x242x.svg') }}" loading="lazy"
                                                alt="" class="invert-small"></div>
                                        <div class="video-button-outline small">
                                            <div id="w-node-aec76a51-a872-fb09-b07c-e61591c5c4c0-efe74afb"
                                                class="video-outline-wrapper top">
                                                <div class="video-outline small"></div>
                                            </div>
                                            <div id="w-node-aec76a51-a872-fb09-b07c-e61591c5c4c2-efe74afb"
                                                class="video-outline-wrapper bottom">
                                                <div class="video-outline bottom small"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-arrow right w-slider-arrow-right">
                                    <div class="solid-video-button-outline dark">
                                        <div class="slider-arrow-wrapper"><img
                                                src="{{ asset('img/arrow-right-final24x242x.svg') }}" loading="lazy"
                                                alt="" class="invert-small"></div>
                                        <div class="video-button-outline small">
                                            <div id="w-node-_31bdb9ca-fcde-b74c-9876-fe432149d186-efe74afb"
                                                class="video-outline-wrapper top">
                                                <div class="video-outline small"></div>
                                            </div>
                                            <div id="w-node-_31bdb9ca-fcde-b74c-9876-fe432149d188-efe74afb"
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
                @endif
            </div>
        </div>
        <div class="grey-fill top"></div>
        <div class="fill"></div>
    </div>
</div>
