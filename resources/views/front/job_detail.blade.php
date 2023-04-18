@extends('front.layouts.main')

@section('content')
    <div class="page-content">
        <div class="section no-scroll">
            <div class="container is--max_width">
                <div class="hero" style="height: 60vh">
                    <div class="hero-intro">
                        <div>
                            <div class="section-heading">
                                <i class="link-icon mb-3" style="height:70px; width:70px"
                                    data-feather="{{ $job->icon }}"></i>
                                <h1>{{ $job->name }}</h1>
                            </div>
                            <div class="d-flex mb-4">
                                <p class="me-2 mb-0">{{ $job->company }}</p> <span class="pt-1">•</span>
                                <p class="ms-2 mb-0">{{ $job->location }},
                                    {{ $job->state }}
                                </p>
                            </div>

                            <div>
                                @if (!empty($job->type))
                                    <div class="d-flex mb-3">
                                        <ion-icon class="pt-1" name="briefcase-outline"></ion-icon>
                                        <p class="mb-0 ms-2">Tipo: {{ $job->type }}</p>
                                    </div>
                                @endif
                                @if (!empty($job->modality))
                                    <div class="d-flex mb-3">
                                        <ion-icon class="pt-1" name="rocket-outline"></ion-icon>
                                        <p class="mb-0 ms-2">Modalidad: {{ $job->modality }}</p>
                                    </div>
                                @endif
                                @if (!empty($job->experience))
                                    <div class="d-flex mb-3">
                                        <ion-icon class="pt-1" name="analytics-outline"></ion-icon>
                                        <p class="mb-0 ms-2">Experiencia: {{ $job->experience }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="hero-gradient_bg">
                        <div class="hero-gradient-col  is--img">
                            <div class="img-gradient"></div>
                            <div class="hero-slideshow"><img src="{{ asset('front/images/jobs-detail.jpg') }}"
                                    loading="lazy" sizes="(max-width: 991px) 100vw, 80vw" alt=""
                                    class="img-slide-hero"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row" style="line-height: 2rem">
                    {!! $job->about ?? '' !!}
                </div>

                <div class="apply-form my-5" id="form_{{ $job->id }}">
                    <div class="card card-body job-form pt-2" style="background: none; border:1px solid white">
                        <form action="{{ route('apply.to', $job->id) }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h3 style="font-weight:600;">Tus datos</h3>

                                <button class="btn p-0 text-white close-form" style="height: fit-content; width:auto;">
                                    <ion-icon style="font-size: 40px" name="close-circle-outline"></ion-icon>
                                </button>
                            </div>

                            <div class="mb-5">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A dignissimos doloribus
                                    voluptatum
                                    tenetur. Fugiat magni, distinctio quas ipsa corrupti aliquid, provident explicabo
                                    tenetur
                                    optio et voluptate id error cum quasi?</p>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nombres*</label>
                                        <input type="text" required name="names" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Apellidos*</label>
                                        <input type="text" required name="lastnames" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Teléfono*</label>
                                        <input type="number" required name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico*</label>
                                        <input type="email" required name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">C.V*<small>(Formato PDF.
                                                máx
                                                2GB)</small></label>
                                        <input type="file" name="file" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4 d-flex justify-content-end">
                                    <button class="button w-button" type="submit">Subir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
