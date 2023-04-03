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
                    <div class="small-text">Nuevas Vacantes</div>
                </div>
                <div class="sticky-heading">
                    <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur exercitationem aliquam
                        obcaecati
                        eligendi, similique qui reprehenderit illo, </span></h2>
                    <a href="{{ route('jobs.all') }}" class="mt-2 button w-button">Ver todas</a>
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
