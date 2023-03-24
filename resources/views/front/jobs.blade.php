@extends('front.layouts.main')

@section('content')
    @foreach ($jobs as $job)
        @include('front.layouts.partials._job_detail')
    @endforeach

    <div class="page-content">
        <div class="section no-scroll">
            <div class="container is--max_width">
                <div class="hero" style="height: 60vh">
                    <div class="hero-intro">
                        <div>
                            <div class="section-heading">
                                <h1>Conóce todas nuestra vacantes.</h1>
                            </div>
                        </div>
                    </div>
                    <div class="hero-gradient_bg">
                        <div class="hero-gradient-col  is--img">
                            <div class="img-gradient"></div>
                            <div class="hero-slideshow"><img src="{{ asset('front/images/job.jpg') }}" loading="lazy"
                                    sizes="(max-width: 991px) 100vw, 80vw" alt="" class="img-slide-hero"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container is--max_width">
                <div class="row">
                    @foreach ($jobs as $job)
                        <div class="col-md-3 mb-4">
                            @include('front.layouts.utilities._job_card')
                        </div>
                    @endforeach
                    <div class="row justify-content-center">
                        {{ $jobs->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
