@php
    
    $jobs = App\Models\Job::where('status', true)
        ->orderBy('created_at', 'asc')
        ->get()
        ->take(4);
    
@endphp

<div class="section" id="vacantes">
    <div class="container">
        <div class="sticky-wrapper">
            <div class="sticky-title">
                <div class="section-label_small">
                    <div class="small-text">Nuestras Vacantes</div>
                </div>
                <div class="sticky-heading">
                    <h3>Apoyamos a las Empresas en generar ofertas de empleo, identificar y atraer el Talento que
                        necesita para sus operaciones. Cada una de estas posiciones vacantes consideran la visión de
                        cada Empresa y por nuestra parte aportamos nuestra experiencia; una metodología precisa e
                        innovadora y valores agregados.
                        Gracias por tu confianza!! Postúlate con nosotros!</span></h2>
                        <a href="{{ route('jobs.all') }}" class="mt-2 button w-button">Ver todas las vacantes</a>
                </div>
            </div>
            <div class="sticky-items">
                <div class="w-dyn-list">
                    <div role="list" class="w-dyn-items">
                        <!--foreach-->
                        @foreach ($jobs as $job)
                            @include('front.layouts.utilities._job_card')
                        @endforeach
                        <!--foreach-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
