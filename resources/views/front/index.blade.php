@extends('front.layouts.main')

@section('content')
    @php
        
        $jobs = App\Models\Job::where('status', true)
            ->orderBy('created_at', 'asc')
            ->get()
            ->take(4);
        
    @endphp

    @foreach ($jobs as $job)
        @include('front.layouts.partials._job_detail')
    @endforeach

    <div class="page-content">
        <div class="section no-scroll">
            <div class="container is--max_width">
                <div class="hero">

                    @if ($banner->count() == 0)
                        <div class="hero-intro">
                            <div data-w-id="49beb054-8ac3-0a15-8c1c-26ce33c6d0ff"
                                style="-webkit-transform:translate3d(-200%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-200%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-200%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-200%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                                class="hero-intro_wrapper">
                                <div class="section-label_small">
                                    <div class="small-text">Section</div>
                                </div>
                                <div class="section-heading">
                                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
                                </div>
                                <div class="section_cta">
                                    <a href="#" class="button w-button">Nuestro trabajo</a>
                                    <a href="#" class="button is--ghost w-button">Conoce más</a>
                                </div>
                            </div>
                        </div>
                        <div class="hero-gradient_bg">
                            <div data-w-id="49beb054-8ac3-0a15-8c1c-26ce33c6d110"
                                style="-webkit-transform:translate3d(100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                                class="hero-gradient-col is--left is--img">
                                <div class="img-gradient"></div>
                                <div class="hero-slideshow"><img src="{{ asset('front/images/banner.jpg') }}" loading="lazy"
                                        sizes="(max-width: 991px) 100vw, 80vw" alt="" class="img-slide-hero"></div>
                            </div>
                            <div data-w-id="49beb054-8ac3-0a15-8c1c-26ce33c6d113"
                                style="opacity:0;-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                                class="hero-gradient-col is--two">
                                <div class="gradient-row"></div>
                                <div data-w-id="49beb054-8ac3-0a15-8c1c-26ce33c6d115" style="opacity:0"
                                    class="gradient-row is--overlap is--straight"></div>
                            </div>
                        </div>
                    @else
                        @foreach ($banner as $ban)
                            <div class="hero-intro">
                                <div data-w-id="49beb054-8ac3-0a15-8c1c-26ce33c6d0ff"
                                    style="-webkit-transform:translate3d(-200%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-200%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-200%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-200%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                                    class="hero-intro_wrapper">
                                    <div class="section-label_small">
                                        <div class="small-text">{{ $ban->title }}</div>
                                    </div>
                                    <div class="section-heading">
                                        <h1>{{ $ban->subtitle }}</h1>
                                    </div>
                                    <div class="section_cta">
                                        <a href="{{ $ban->link }}" class="button w-button">{{ $ban->text_button }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-gradient_bg">
                                <div data-w-id="49beb054-8ac3-0a15-8c1c-26ce33c6d110"
                                    style="-webkit-transform:translate3d(100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                                    class="hero-gradient-col is--left is--img">
                                    <div class="img-gradient"></div>
                                    <div class="hero-slideshow"><img src="{{ asset('img/banners/' . $ban->image_desktop) }}"
                                            loading="lazy" sizes="(max-width: 991px) 100vw, 80vw" alt=""
                                            class="img-slide-hero">
                                    </div>
                                </div>
                                <div data-w-id="49beb054-8ac3-0a15-8c1c-26ce33c6d113"
                                    style="opacity:0;-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                                    class="hero-gradient-col is--two">
                                    <div class="gradient-row"></div>
                                    <div data-w-id="49beb054-8ac3-0a15-8c1c-26ce33c6d115" style="opacity:0"
                                        class="gradient-row is--overlap is--straight"></div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
        <div class="section">
            <div class="container is--max_width">
                <div class="img-section">
                    <div class="img-gradient is--divider"></div><img src="{{ asset('img/other.jpg') }}" loading="lazy"
                        sizes="100vw" alt="" class="img-shape">
                </div>
                <div data-w-id="1a39f188-d98c-b925-f367-7c21c6d3db2b" style="opacity:0" class="statistics-hover-tabs">
                    <div class="tabs-images-slider">
                        <div class="tab-img"><img src="{{ asset('img/other.jpg') }}" loading="lazy" sizes="100vw"
                                alt="" class="img-stat-scroll"></div>
                        <div class="tab-img"><img src="{{ asset('img/other.jpg') }}" loading="lazy" sizes="100vw"
                                alt="" class="img-stat-scroll"></div>
                        <div class="tab-img"><img src="{{ asset('img/other.jpg') }}" loading="lazy" sizes="100vw"
                                alt="" class="img-stat-scroll"></div>
                    </div>
                </div>
                <div class="statistics">
                    <div data-w-id="2d08cc89-1e03-c998-08b5-559d964993e6" style="opacity:0" class="statistics-wrapper">
                        <div class="tab-img-mobile">
                            <div class="tab-img"><img src="{{ asset('img/other.jpg') }}" loading="lazy" sizes="100vw"
                                    alt="" class="img-stat-scroll"></div>
                        </div>
                        <div data-w-id="547b9507-f1f1-fb04-4b21-32d67c1fcdaa" class="stat-item">
                            <div class="stat-title">
                                <div class="stat-wrapper">
                                    <div class="stat-heading">1200+</div>
                                    <div class="stat-heading">1200+</div>
                                </div>
                            </div>
                            <p class="paragraph-large">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem
                                vero
                                aspernatur iusto tempora illo quaerat sequi dolorum! </p>
                        </div>
                        <div class="tab-img-mobile">
                            <div class="tab-img"><img src="{{ asset('img/other.jpg') }}" loading="lazy" sizes="100vw"
                                    alt="" class="img-stat-scroll"></div>
                        </div>
                        <div data-w-id="df42ad93-1aad-c4d8-af92-a6255636dcf8" class="stat-item is--filp">
                            <div class="stat-title">
                                <div class="stat-wrapper">
                                    <div class="stat-heading">220%</div>
                                    <div class="stat-heading">1200+</div>
                                </div>
                            </div>
                            <p class="paragraph-large">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam
                                blanditiis
                                distinctio maxime est error libero odit quo ut? </p>
                        </div>
                        <div class="tab-img-mobile">
                            <div class="tab-img"><img src="{{ asset('img/other.jpg') }}" loading="lazy" sizes="100vw"
                                    alt="" class="img-stat-scroll"></div>
                        </div>
                        <div data-w-id="bc4f1606-5e48-6a63-d2d3-ebf20b530e66" class="stat-item">
                            <div class="stat-title">
                                <div class="stat-wrapper">
                                    <div class="stat-heading">1500+</div>
                                    <div class="stat-heading">1200+</div>
                                </div>
                            </div>
                            <p class="paragraph-large">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nam
                                quidem
                                molestiae, provident ab modi ducimus deleniti quasi </p>
                        </div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="stats-progress">
                        <div class="tab"></div>
                    </div>
                </div>
            </div>
        </div>
        @include('front.layouts.partials._spots_section')
        <div class="section">
            <div class="container is--max_width">
                <div class="cta-wrapper">
                    <div class="cta-message">
                        <div class="hero-intro_wrapper">
                            <div class="section-heading">
                                <div class="section-label_small">
                                    <div class="small-text">Nuestra Mision</div>
                                </div>
                                <div class="section-heading">
                                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dignissimos adipisci
                                        sed dolorum
                                        vitae possimus, facere, </h2>
                                </div>
                                <!--
                                                                                                                                                                                                    <a href="#" class="button w-button">LEARN MORE</a>
                                                                                                                                                                                                    -->
                            </div>
                        </div>
                    </div>
                    <div class="cta-gradient">
                        <div class="gradient-row is--max-width"></div>
                    </div>
                </div>
            </div>
        </div>
        @if ($campaings->count() != 0)
            @include('front.layouts.partials._promo_banner')
        @else
            <div class="my-5"></div>
        @endif
        <div class="section">
            <div class="container is--max_width">
                <div class="cta-wrapper">
                    <div class="cta-message">
                        <div class="hero-intro_wrapper">
                            <div class="section-label_small">
                                <div class="small-text">Impacto</div>
                            </div>
                            <div class="section-heading">
                                <h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam adipisci hic sint cum
                                    saepe
                                    deserunt dolorum error in vero, voluptas asperiores </h2>
                            </div>
                            <!--
                                                                                                                                                                                                  <a href="#" class="button w-button">LEARN MORE</a>
                                                                                                                                                                                                  -->
                        </div>
                    </div>
                    <div class="cta-gradient">
                        <div class="gradient-row is--max-width is--mirror"></div>
                    </div>
                </div>
            </div>
        </div>
        <div data-w-id="7d3dded1-e6be-537b-4cdf-9d6ba6f9acff" class="section-sticky">
            <div class="wrapper-tech">
                <div class="container-sticky">
                    <div class="sticky-content">
                        <div class="sticky-item">
                            <div data-w-id="34aa14a3-f590-a32b-0a88-a5694346ef96" class="graphic">
                                <div class="g-row">
                                    <div class="g-shape"></div>
                                    <div class="g-shape is--filp"></div>
                                </div>
                                <div class="g-row">
                                    <div class="g-shape is--filp"></div>
                                    <div class="g-shape"></div>
                                </div>
                                <div class="g-row">
                                    <div class="g-shape"></div>
                                    <div class="g-shape is--filp"></div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="section-label_small">
                                    <div class="small-text">Area</div>
                                </div>
                                <div class="item-title">
                                    <h3 class="heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quae
                                        pariatur, quas
                                        repudiandae voluptatum facere qui ipsum a nam enim maxime voluptas </h3>
                                </div>
                                <a href="#" class="button w-button">Conoce mas</a>
                            </div>
                        </div>
                        <div class="sticky-item">
                            <div data-w-id="8972386a-1375-8b5d-a0d1-c7f74075a401" class="graphic">
                                <div class="g-row">
                                    <div class="g-shape"></div>
                                    <div class="g-shape is--filp"></div>
                                </div>
                                <div class="g-row">
                                    <div class="g-shape is--filp"></div>
                                    <div class="g-shape"></div>
                                </div>
                                <div class="g-row">
                                    <div class="g-shape"></div>
                                    <div class="g-shape is--filp"></div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="section-label_small">
                                    <div class="small-text">Area</div>
                                </div>
                                <div class="item-title">
                                    <h3 class="heading">Lorem ipsum dolor sit amet consectetur, </h3>
                                </div>
                                <a href="#" class="button w-button">conoce mas</a>
                            </div>
                        </div>
                        <div class="sticky-item is--mirror">
                            <div data-w-id="06419b1c-cb04-b3ab-9578-f2afe93532ce" class="graphic">
                                <div class="g-row">
                                    <div class="g-shape is--filp"></div>
                                    <div class="g-shape"></div>
                                </div>
                                <div class="g-row">
                                    <div class="g-shape"></div>
                                    <div class="g-shape is--filp"></div>
                                </div>
                                <div class="g-row">
                                    <div class="g-shape is--filp"></div>
                                    <div class="g-shape"></div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="section-label_small">
                                    <div class="small-text">area</div>
                                </div>
                                <div class="item-title">
                                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                                </div>
                                <a href="#" class="button w-button">conoce mas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container is--max_width">
                <div class="cta-wrapper">
                    <div class="cta-message">
                        <div class="hero-intro_wrapper">
                            <div class="section-label_small">
                                <div class="small-text">Sección</div>
                            </div>
                            <div class="section-heading">
                                <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. </h1>
                            </div>
                            <div class="section_cta">
                                <a href="#" class="button w-button">Conoce nuestro trabajo</a>
                            </div>
                        </div>
                    </div>
                    <div class="cta-gradient">
                        <div class="gradient-row is--max-width is--straight"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section gradient-eight">
            <div class="container">
                <div class="partners">
                    <div class="partner-logo"><img src="{{ asset('img/placeholder-logo-1.svg') }}" loading="lazy"
                            alt="" class="logo-partner">
                    </div>
                    <div data-w-id="e608750d-598b-667a-b04d-75bd5bd2c9b3" class="partner-logo"><img
                            src="{{ asset('img/placeholder-logo-2.svg') }}" loading="lazy" alt=""
                            class="logo-partner">
                    </div>
                    <div data-w-id="6a7ee9c6-263c-e0ee-7f76-3ad383f01cc3" class="partner-logo"><img
                            src="{{ asset('img/placeholder-logo-3.svg') }}" loading="lazy" alt=""
                            class="logo-partner">
                    </div>
                    <div data-w-id="dd06ef3f-2df6-ce86-7741-c7a06e720358" class="partner-logo"><img
                            src="{{ asset('img/placeholder-logo-4.svg') }}" loading="lazy" alt=""
                            class="logo-partner">
                    </div>
                    <div data-w-id="77c9f99b-677b-e5b3-3683-d93c75ddf986" class="partner-logo"><img
                            src="{{ asset('img/placeholder-logo-5.svg') }}" loading="lazy" alt=""
                            class="logo-partner">
                    </div>
                    <div data-w-id="b752959a-aba9-7e87-2ca4-772388efbf11" class="partner-logo"><img
                            src="{{ asset('img/placeholder-logo-1.svg') }}" loading="lazy" alt=""
                            class="logo-partner">
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container is--max_width top-gradient">
                <div class="header-section">
                    <div class="section-title">
                        <h1 class="teal">Generamos soluciones EFECTIVAS para tu Empresa</h1>
                    </div>
                </div>
                <div data-w-id="bc7de3ed-4cbb-8f02-07d2-77887cbca156" class="footer-nav">
                    <div class="footer-nav-items">
                        <a href="#" class="f-nav-item is--empty w-inline-block"></a>
                        <a href="#" class="f-nav-item w-inline-block">
                            <div class="link-footer-text">Valores</div>
                        </a>
                        <a id="w-node-bc7de3ed-4cbb-8f02-07d2-77887cbca15b-2d6ff0f7" href="#"
                            class="f-nav-item is--filp gradient w-inline-block">
                            <div class="link-footer-text">Areas </div>
                        </a>
                        <a href="#" class="f-nav-item w-inline-block">
                            <div class="link-footer-text">Valores</div>
                        </a>
                        <a id="w-node-bc7de3ed-4cbb-8f02-07d2-77887cbca161-2d6ff0f7" href="#"
                            class="f-nav-item is--filp gradient w-inline-block">
                            <div class="link-footer-text">Areas</div>
                        </a>
                        <a href="#" class="f-nav-item w-inline-block">
                            <div class="link-footer-text">Valores</div>
                        </a>
                        <a href="#" class="f-nav-item is--filp gradient w-inline-block">
                            <div class="link-footer-text">Areas</div>
                        </a>
                        <a href="#" class="f-nav-item is--empty w-inline-block"></a>
                        <a href="#" class="f-nav-item is--empty w-inline-block"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
