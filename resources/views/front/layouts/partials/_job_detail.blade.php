<div class="job-detail" id="detail_{{ $job->slug }}">
    <div class="overlay"></div>

    <div class="job">
        <h2 class="mb-3">{{ $job->name }}</h2>

        <div class="d-flex">
            <p class="me-2">{{ $job->company }}</p> • <p class="ms-2">{{ $job->location }}, {{ $job->state }}
                ({{ $job->experience }})</p>
        </div>
    </div>
</div>
