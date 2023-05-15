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
                                loading="lazy" sizes="(max-width: 991px) 100vw, 80vw" alt="" class="img-slide-hero">
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
    <div class="section" id="us">
        <div class="container is--max_width">
            <div class="img-section">
                <div class="img-gradient is--divider"></div><img src="{{ asset('img/ex.jpg') }}" loading="lazy"
                    sizes="100vw" alt="" class="img-shape">
            </div>
            <div data-w-id="1a39f188-d98c-b925-f367-7c21c6d3db2b" style="opacity:0" class="statistics-hover-tabs">
                <div class="tabs-images-slider">
                    <div class="tab-img"><img src="{{ asset('img/ex.jpg') }}" loading="lazy" sizes="100vw" alt=""
                            class="img-stat-scroll"></div>
                    <div class="tab-img"><img src="{{ asset('img/colab.jpg') }}" loading="lazy" sizes="100vw"
                            alt="" class="img-stat-scroll"></div>
                    <div class="tab-img"><img src="{{ asset('img/people.jpg') }}" loading="lazy" sizes="100vw"
                            alt="" class="img-stat-scroll"></div>
                </div>
            </div>
            <div class="statistics">
                <div data-w-id="2d08cc89-1e03-c998-08b5-559d964993e6" style="opacity:0" class="statistics-wrapper">
                    <div class="tab-img-mobile">
                        <div class="tab-img"><img src="{{ asset('img/ex.jpg') }}" loading="lazy" sizes="100vw"
                                alt="" class="img-stat-scroll"></div>
                    </div>
                    <div data-w-id="547b9507-f1f1-fb04-4b21-32d67c1fcdaa" class="stat-item">
                        <div class="stat-title">
                            <div class="stat-wrapper">
                                <div class="stat-heading">+ 18 años</div>
                                <div class="stat-heading">Experiencia</div>
                            </div>
                        </div>
                        <p class="paragraph-large">Somos una firma con PASIÓN por RRHH. Nos especializamos en Diagnóstico,
                            Estrategias y Soluciones en temas de Capital Humano. Analizamos, perseguimos y superamos
                            objetivos.</p>
                    </div>
                    <div class="tab-img-mobile">
                        <div class="tab-img"><img src="{{ asset('img/colab.jpg') }}" loading="lazy" sizes="100vw"
                                alt="" class="img-stat-scroll"></div>
                    </div>
                    <div data-w-id="df42ad93-1aad-c4d8-af92-a6255636dcf8" class="stat-item is--filp">
                        <div class="stat-title">
                            <div class="stat-wrapper">
                                <div class="stat-heading">+ 350</div>
                                <div class="stat-heading">Colaboraciones</div>
                            </div>
                        </div>
                        <p class="paragraph-large">Brindamos herramientas efectivas y de vanguardia para cimentar bases de
                            éxito en gestión Comercial y de RH.</p>
                    </div>
                    <div class="tab-img-mobile">
                        <div class="tab-img"><img src="{{ asset('img/people.jpg') }}" loading="lazy" sizes="100vw"
                                alt="" class="img-stat-scroll"></div>
                    </div>
                    <div data-w-id="bc4f1606-5e48-6a63-d2d3-ebf20b530e66" class="stat-item">
                        <div class="stat-title">
                            <div class="stat-wrapper">
                                <div class="stat-heading">+ 900</div>
                                <div class="stat-heading">Personas</div>
                            </div>
                        </div>
                        <ul style="list-style: none;">
                            <li>
                                <p class="paragraph-large">+ 400 personas capacitadas.</p>
                            </li>
                            <li>
                                <p class="paragraph-large">+ 500 personas colocadas en nuevos empleos.</p>
                            </li>
                        </ul>
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
                                <div class="small-text">Nuestro Propósito</div>
                            </div>
                            <div class="section-heading">
                                <h2>Ser una firma que consolide el éxito de las empresas a través de desarrollo del Talento
                                    de sus colaboradores, sus Competencias y sus Habilidades, creando herramientas precisas
                                    y de vanguardia para incrementar su productividad y cimentar bases de éxito en sus
                                    Operaciones, Administración, Gestión Comercial y de RRHH.</h2>
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

    <!--{{-- 
    <div class="section bg-light text-dark">
        <div class="container">
            <div class="row">
                <h3>Nuestra propuesta de valor</h3>
                <img src="{{ asset('front/images/derchm.png') }}" alt="">
            </div>
        </div>
    </div>
 --}}-->

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
                            <div class="small-text">Nuestra Visión</div>
                        </div>
                        <div class="section-heading">
                            <h2>Ser referente en México y LATAM en soluciones de Recursos Humanos y Servicios Corporativos
                                Epecializados para la empresas. Siendo identificados y por nuestro profesionalismo y
                                calidez; nuestra metodología de trabajo, actitud de servicio y sentido de urgencia.</h2>
                        </div>
                        <!--<a href="#" class="button w-button">LEARN MORE</a>-->
                    </div>
                </div>
                <div class="cta-gradient">
                    <div class="gradient-row is--max-width is--mirror"></div>
                </div>
            </div>
        </div>
    </div>

    <div data-w-id="7d3dded1-e6be-537b-4cdf-9d6ba6f9acff" class="section-sticky" id="areas">
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
                                <div class="small-text">Reclutamiento y Selección</div>
                            </div>
                            <div class="item-title">
                                <h3 class="heading">Análisis.<br>
                                    Busqueda Estratégica. <br>
                                    Herramientas. <br>
                                    Proyectos Especiales. <br>
                                </h3>
                            </div>
                            <a href="#" class="button w-button">Conoce más</a>
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
                                <div class="small-text">Consultorías, Análisis y Diagnóstico</div>
                            </div>
                            <div class="item-title">
                                <h3 class="heading">A través de este proceso ayudamos a las organizaciones a comprender su
                                    desempeño, buscar áreas problemáticas, identificar oportunidades y desarrollar un plan
                                    de acción para mejorar el desempeño y productividad.</h3>
                            </div>
                            <button type="button" class="button w-button " data-bs-toggle="modal"
                                data-bs-target="#companyModal">
                                conoce más
                            </button>
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
                                <div class="small-text">Capacitación</div>
                            </div>
                            <div class="item-title">
                                <h3>
                                    Capacitación Regulatoria <br>
                                    Capacitación Normativa <br>
                                    Capacitación Especializada <br>
                                    NOM 035 <br>
                                </h3>
                            </div>
                            <button type="button" class="button w-button " data-bs-toggle="modal"
                                data-bs-target="#companyModal">
                                conoce más
                            </button>
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
                                <div class="small-text">Administración de nómina</div>
                            </div>
                            <div class="item-title">
                                <h3 class="heading">
                                    Payroll <br>
                                    Relaciones laborales <br>
                                </h3>
                            </div>
                            <button type="button" class="button w-button " data-bs-toggle="modal"
                                data-bs-target="#companyModal">
                                conoce más
                            </button>
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
                                <div class="small-text">Externalización de Proceso de Negocios (BPO), Acompañamiento &
                                    Coaching en Gestión de RRHH</div>
                            </div>
                            <div class="item-title">
                                <h3 class="heading">Ambas soluciones son un SERVICIO ESPECIALIZADO nos transfieres las
                                    actividades y responsabilidades de Recursos Humanos para administrar y gestionar el
                                    proceso integral de RRHH y vida laboral de cada colaborador. También Preparamos y
                                    guiamos a tu equipo de RRHH para administrar, ejecutar, operar y lograr el plan de
                                    Acción de RRHH en TU EMPRESA</h3>
                            </div>
                            <button type="button" class="button w-button " data-bs-toggle="modal"
                                data-bs-target="#companyModal">
                                conoce más
                            </button>
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
                                <div class="small-text">OUTPLACEMENT</div>
                            </div>
                            <div class="item-title">
                                Brindamos calidez y calidad en este proceso en el que cuidamos la imagen y prestigio de la
                                empresa. En el proceso, enfocamos nuestra atención y filosofía de Tu empresa en la
                                importancia de separar a un colaborador cuidando cada detalle y preparándolo para su nueva
                                realidad.
                                Te acompañamos en Procesos de Eficiencia, Salida Voluntaria o Involuntaria y Separaciones de
                                personal por Pensión o Jubilación.
                            </div>
                            <a href="#" class="button w-button">conoce más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" style="overflow: hidden">
        <div class="container is--max_width">

            <div class="cta-wrapper">

                <div class="cta-message flex-column flex-md-row">
                    <div class="hero-intro_wrapper">
                        <div class="section-label_small">
                            <h2>Reseñas</h2>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="owl-carousel">
                                    @foreach ($comments as $comment)
                                        <div>
                                            <h3>{{ $comment->name }}</h3>
                                            <h5 class="my-3">
                                                "{{ $comment->comment }}"
                                            </h5>

                                            @if ($comment->company != null)
                                                <small class="text-uppercase">{{ $comment->company }}</small>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cta-gradient">
                    <div class="gradient-row is--max-width is--straight"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="section gradient-eight py-5 px-4 px-md-0">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h2>
                        Queremos hablar contigo!
                    </h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti voluptate provident, consequuntur
                        temporibus ipsam a beatae. Nam, minus recusandae! Quas, assumenda repellat necessitatibus debitis
                        temporibus minima magnam esse reiciendis distinctio.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-body text-dark p-4">
                        <small class="text-uppercase text-center text-muted">Empresas</small>

                        <h2 class="text-center fw-bold mb-3">dato</h2>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

                        <!-- Button trigger modal -->
                        <button type="button" class="button w-button text-dark mt-2" data-bs-toggle="modal"
                            data-bs-target="#companyModal">
                            Contáctanos
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="companyModal" data-bs-backdrop="static" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Contacto para empresas</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('company.contact') }}" method="POST">

                                        {{ csrf_field() }}

                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nombres*</label>
                                                        <input type="text" required name="name"
                                                            class="form-control text-dark">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Teléfono*</label>
                                                        <input type="number" required name="phone"
                                                            class="form-control text-dark">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Correo Electrónico*</label>
                                                        <input type="email" required name="email"
                                                            class="form-control text-dark">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Mensaje</label>
                                                        <textarea name="message" class="form-control text-dark" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 d-flex justify-content-end">
                                                    {!! htmlFormSnippet() !!}
                                                </div>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-body text-dark p-4">
                        <small class="text-uppercase text-center text-muted">Candidatos</small>

                        <h2 class="text-center fw-bold mb-3">dato</h2>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

                        <!-- Button trigger modal -->
                        <button type="button" class="button w-button text-dark mt-2" data-bs-toggle="modal"
                            data-bs-target="#peopleModal">
                            Contáctanos
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="peopleModal" data-bs-backdrop="static" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Contacto para candidatos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('people.contact') }}" method="POST"
                                        enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nombres*</label>
                                                        <input type="text" required name="names"
                                                            class="form-control text-dark">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Apellidos*</label>
                                                        <input type="text" required name="lastnames"
                                                            class="form-control text-dark">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Teléfono*</label>
                                                        <input type="number" required name="phone"
                                                            class="form-control text-dark">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Correo Electrónico*</label>
                                                        <input type="email" required name="email"
                                                            class="form-control text-dark">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">C.V*<small>(Formato PDF. máx
                                                                2GB)</small></label>
                                                        <input type="file" name="file" required
                                                            class="form-control text-dark">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Mensaje</label>
                                                        <textarea name="message" class="form-control text-dark" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 d-flex justify-content-end">
                                                    {!! htmlFormSnippet() !!}
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container is--max_width top-gradient">
            <div data-w-id="bc7de3ed-4cbb-8f02-07d2-77887cbca156" class="footer-nav">
                <div class="footer-nav-items">
                    <a href="#" class="f-nav-item is--empty w-inline-block"></a>
                    <a href="#" class="f-nav-item w-inline-block">
                        <div class="link-footer-text">Pasión</div>
                    </a>
                    <a id="w-node-bc7de3ed-4cbb-8f02-07d2-77887cbca15b-2d6ff0f7" href="#"
                        class="f-nav-item is--filp gradient w-inline-block">
                        <div class="link-footer-text">Integridad</div>
                    </a>
                    <a href="#" class="f-nav-item w-inline-block">
                        <div class="link-footer-text">Actitud de Servicio</div>
                    </a>
                    <a id="w-node-bc7de3ed-4cbb-8f02-07d2-77887cbca161-2d6ff0f7" href="#"
                        class="f-nav-item is--filp gradient w-inline-block">
                        <div class="link-footer-text">Resolución</div>
                    </a>
                    <a href="#" class="f-nav-item w-inline-block">
                        <div class="link-footer-text">Calidez</div>
                    </a>
                    <a href="#" class="f-nav-item is--filp gradient w-inline-block">
                        <div class="link-footer-text">Pasión</div>
                    </a>
                    <a href="#" class="f-nav-item is--empty w-inline-block"></a>
                    <a href="#" class="f-nav-item is--empty w-inline-block"></a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
