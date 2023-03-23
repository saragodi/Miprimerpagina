@extends('front.layouts.main')

@push('styles')
    <style>
        .brand,
        .nav-link,
        .lottie-animation {
            color: black !important;
        }

        .nav-circle {
            color: rgba(112, 119, 136, 0.75) !important;
        }

        .video-outline.small-nav-circle-outline {
            color: rgba(112, 119, 136, 0.75) !important;
        }

        .support-body {
            grid-row-gap: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="support-hero wf-section">
        <div class="grid-wrapper">
            <div id="w-node-a70d1f0c-de67-9018-9689-ed13d0ee2c39-b0e74b11" class="dual-page-wrapper">
                <div class="support-body no-bottom">
                    <div id="w-node-afc98c5a-d189-d4ec-6ceb-fa0febf7e051-b0e74b11" class="dual-row large">
                        <a href="javascript: history.go(-1)" id="w-node-_2b38f9b5-c384-3cb0-c946-023fc143b4cd-b0e74b11"
                            class="outline-button hide-on-tablet w-inline-block">
                            <div id="w-node-_2b38f9b5-c384-3cb0-c946-023fc143b4ce-b0e74b11" class="button-text">Volver
                            </div>
                            <div id="w-node-_2b38f9b5-c384-3cb0-c946-023fc143b4d0-b0e74b11"
                                class="button-hover-outline left">
                                <div class="solid-button-outline"></div>
                            </div>
                            <div id="w-node-_2b38f9b5-c384-3cb0-c946-023fc143b4d2-b0e74b11"
                                class="button-hover-outline right">
                                <div class="solid-button-outline right"></div>
                            </div>
                            <div id="w-node-_2b38f9b5-c384-3cb0-c946-023fc143b4d4-b0e74b11"
                                class="button-hover-outline middle">
                                <div class="solid-button-outline middle"></div>
                            </div>
                        </a>
                    </div>
                    <div class="dual-tab-wrapper">
                        <div data-duration-in="300" data-duration-out="100" data-current="Tab 3" data-easing="ease"
                            class="tabs w-tabs">
                            <div id="w-node-_52563e17-eb56-816e-5176-a646e3631629-b0e74b11"
                                class="basic-tab-menu w-tab-menu">

                                @foreach ($legales as $legal)
                                    <a data-w-tab="Tab 3" href="{{ route('legal.text', $legal->slug) }}"
                                        class="tab-link one w-inline-block w-tab-link w--current">
                                        <div>{{ $legal->title }}</div>

                                        @if (Request::is('legales/' . $legal->slug))
                                            <div class="tab-indicator"></div>
                                        @endif

                                    </a>
                                @endforeach


                            </div>
                            <div class="basic-tab-content w-tab-content">
                                <div data-w-tab="Tab 3" class="basic-tab-pane w-tab-pane w--tab-active">
                                    <div class="lessan-tab-content">
                                        <div>
                                            <div class="rich-text w-richtext">
                                                {!! $text->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-w-tab="Tab 4" class="w-tab-pane">
                                    <div class="placeholder">
                                        <div class="subtitle">Placeholder</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="w-node-_8cceddb8-afa4-98ab-b851-494578963667-b0e74b11" class="quick-action-sidebar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($projects->count() != 0)
        <div class="section grey no-padding cut wf-section">
            <div class="grid-wrapper">
                <div id="w-node-bb6d15cd-e1f0-6a5b-6768-424471a55509-71a55507" class="section-box no-top-margin">
                    <div class="stacked-content">
                        <div class="dual-grid">
                            <div class="stacked-heading">
                                <div class="left-intro">
                                    <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b566-71a55507"
                                        class="subtitle-line dark left">
                                        <div class="solid-subtitle-line dark"></div>
                                    </div>
                                    <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b568-71a55507" class="subtitle">
                                        Schedule
                                    </div>
                                </div>
                                <div class="left-intro verticle">
                                    <h1 id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b56b-71a55507">Upcoming releases</h1>
                                </div>
                            </div>
                            <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b56d-71a55507" class="right-dual">
                                <div data-w-id="9a6c56ce-3841-a9fa-64e7-039c8169f601" class="tool-tip">
                                    <div class="solid-video-button-outline extra-dark">
                                        <div class="tooltip-letter">i</div>
                                        <div class="slider-arrow-wrapper"></div>
                                        <div class="video-button-outline extra-small">
                                            <div id="w-node-_9a6c56ce-3841-a9fa-64e7-039c8169f606-8169f601"
                                                class="video-outline-wrapper top">
                                                <div class="video-outline extra-small extra-dark"></div>
                                            </div>
                                            <div id="w-node-_9a6c56ce-3841-a9fa-64e7-039c8169f608-8169f601"
                                                class="video-outline-wrapper bottom">
                                                <div class="video-outline bottom extra-small extra-dark"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tool-tip-text">
                                        <div class="tooltip-info">
                                            <div class="body-display extra-small">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit.</div>
                                        </div>
                                        <div class="tooltip-corner"></div>
                                    </div>
                                </div>
                                <a href="#" id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b56f-71a55507"
                                    class="outline-button w-inline-block">
                                    <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b570-71a55507" class="button-text">
                                        View
                                        all upcoming
                                    </div>
                                    <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b572-71a55507"
                                        class="button-hover-outline left">
                                        <div class="solid-button-outline"></div>
                                    </div>
                                    <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b574-71a55507"
                                        class="button-hover-outline right">
                                        <div class="solid-button-outline right"></div>
                                    </div>
                                    <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b576-71a55507"
                                        class="button-hover-outline middle">
                                        <div class="solid-button-outline middle"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="template-slider">
                            <div data-delay="4000" data-animation="slide" class="cards-slider w-slider"
                                data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false"
                                data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
                                <div class="cards-mask medium w-slider-mask">

                                    @foreach ($projects as $project)
                                        <div class="card-slide w-slide">
                                            <div class="w-dyn-list">
                                                <div role="list" class="w-dyn-items">
                                                    <div role="listitem" class="w-dyn-item">
                                                        <div class="schedule-item">
                                                            <a href="#" class="schedule-top w-inline-block">
                                                                <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b581-71a55507"
                                                                    class="date">
                                                                    <div class="week-day"></div>
                                                                    <div class="day-number"></div>
                                                                </div>
                                                                <div class="verticle-line dark"></div>
                                                                <div class="schedule-top-content">
                                                                    <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b586-71a55507"
                                                                        class="schedule-title">
                                                                        <h3 class="card-title">{{ $project->title }}</h3>
                                                                        <div class="body-display small"></div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div data-w-id="b1c3bcc4-22fb-8d5f-3647-65232498b589"
                                                                class="schedule-bottom">
                                                                <div class="background-wrapper">
                                                                    <div class="overlay gradient"></div>
                                                                    <div class="background"></div>
                                                                </div>
                                                                <div class="template-screen-content small">
                                                                    <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b58e-71a55507"
                                                                        class="template-hover-top">
                                                                    </div>
                                                                    <a data-w-id="b1c3bcc4-22fb-8d5f-3647-65232498b591"
                                                                        href="#"
                                                                        class="template-screen-link w-inline-block">
                                                                        <div data-w-id="b1c3bcc4-22fb-8d5f-3647-65232498b592"
                                                                            class="cursur-wrapper">
                                                                            <div class="card-cursur on">
                                                                                <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b594-71a55507"
                                                                                    class="cursur-text">
                                                                                    Details</div>
                                                                                <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b596-71a55507"
                                                                                    class="cursor-top">
                                                                                    <div class="cursur-top-outline"></div>
                                                                                </div>
                                                                                <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b598-71a55507"
                                                                                    class="cursor-top bottom">
                                                                                    <div class="cursur-top-outline bottom">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-dyn-empty">
                                                    <div>No items found.</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="left-arrow left w-slider-arrow-left">
                                    <div class="solid-video-button-outline dark">
                                        <div class="slider-arrow-wrapper"><img src="images/arrow-left-final24x242x.svg"
                                                loading="lazy" alt="" class="invert-small"></div>
                                        <div class="video-button-outline small">
                                            <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b62a-71a55507"
                                                class="video-outline-wrapper top">
                                                <div class="video-outline small"></div>
                                            </div>
                                            <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b62c-71a55507"
                                                class="video-outline-wrapper bottom">
                                                <div class="video-outline bottom small"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-arrow right w-slider-arrow-right">
                                    <div class="solid-video-button-outline dark">
                                        <div class="slider-arrow-wrapper"><img src="images/arrow-right-final24x242x.svg"
                                                loading="lazy" alt="" class="invert-small"></div>
                                        <div class="video-button-outline small">
                                            <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b633-71a55507"
                                                class="video-outline-wrapper top">
                                                <div class="video-outline small"></div>
                                            </div>
                                            <div id="w-node-b1c3bcc4-22fb-8d5f-3647-65232498b635-71a55507"
                                                class="video-outline-wrapper bottom">
                                                <div class="video-outline bottom small"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <div class="flyout first">
        <div class="grid-wrapper">
            <div data-w-id="d5aebef9-85a1-c9fe-83d5-5c464f9cecd3" class="close-flyout">
                <div class="close-cursur"><img src="images/Icon_multiply.svg" loading="lazy" alt=""
                        class="close-icon"></div>
            </div>
            <div id="scrollbar" class="flyout-content w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cecd6-b0e74b11">
                <div class="youtube-wrapper">
                    <div style="padding-top:56.17021276595745%" class="w-embed-youtubevideo"><iframe
                            src="https://www.youtube.com/embed/fnNW2hr886w?rel=0&amp;controls=1&amp;autoplay=0&amp;mute=0&amp;start=0"
                            frameborder="0"
                            style="position:absolute;left:0;top:0;width:100%;height:100%;pointer-events:auto"
                            allow="autoplay; encrypted-media" allowfullscreen=""
                            title="How to build a custom portfolio - Official Webflow course trailer"></iframe></div>
                </div>
                <div id="scrollbar" class="flyout-info">
                    <div class="dual-grid">
                        <div class="stacked-heading">
                            <div class="left-intro">
                                <div id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cecdd-b0e74b11"
                                    class="subtitle-line dark left">
                                    <div class="solid-subtitle-line dark"></div>
                                </div>
                                <div id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cecdf-b0e74b11" class="subtitle">Overview
                                </div>
                            </div>
                            <div class="left-intro">
                                <h1 id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cece2-b0e74b11">How it works</h1>
                            </div>
                        </div>
                    </div>
                    <div id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cece4-b0e74b11" class="flyout-cards">
                        <div id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cece5-b0e74b11" class="step-card">
                            <div class="step-icon">
                                <div>1</div>
                            </div>
                            <div class="step-top">
                                <h3 id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cecea-b0e74b11">Step one title<br></h3>
                            </div>
                            <div class="step-description">
                                <div class="body-display small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus quis
                                    turpis et enim eleifend iaculis vitae ut nisl.<br></div>
                            </div>
                        </div>
                        <div id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cecf1-b0e74b11" class="step-card">
                            <div class="step-icon">
                                <div>2</div>
                            </div>
                            <div class="step-top">
                                <h3 id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cecf6-b0e74b11">Step two title<br></h3>
                            </div>
                            <div class="step-description">
                                <div class="body-display small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus quis
                                    turpis et enim eleifend iaculis vitae ut nisl.<br></div>
                            </div>
                        </div>
                        <div id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9cecfd-b0e74b11" class="step-card">
                            <div class="step-icon">
                                <div>3</div>
                            </div>
                            <div class="step-top">
                                <h3 id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9ced02-b0e74b11">Step three title<br></h3>
                            </div>
                            <div class="step-description">
                                <div class="body-display small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus quis
                                    turpis et enim eleifend iaculis vitae ut nisl.<br></div>
                            </div>
                        </div>
                        <div id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9ced09-b0e74b11" class="step-card">
                            <div class="step-icon">
                                <div>4</div>
                            </div>
                            <div class="step-top">
                                <h3 id="w-node-d5aebef9-85a1-c9fe-83d5-5c464f9ced0e-b0e74b11">Step four title<br></h3>
                            </div>
                            <div class="step-description">
                                <div class="body-display small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus quis
                                    turpis et enim eleifend iaculis vitae ut nisl.<br></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-w-id="d5aebef9-85a1-c9fe-83d5-5c464f9ced15" class="mobile-close-button">
                <div class="subtitle">Close</div>
            </div>
        </div>
    </div>
@endsection
