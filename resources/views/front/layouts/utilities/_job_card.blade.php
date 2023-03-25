<div role="listitem" class="w-dyn-item">
    <div data-w-id="e1e471e2-a01c-0ac3-4fd6-e4bb59c33948" style="opacity:0" class="item-wrapper">
        <div class="small-text is--gray">{{ $job->created_at }}</div>
        <div class="icon-articles">
            <div class="g-shape"></div>
            <div class="g-shape is--filp"></div>
        </div>
        <h3>{{ $job->name }}</h3>
        <div class="w-dyn-list">
            <div role="list" class="w-dyn-items">
                <div role="listitem" class="collection-item w-dyn-item">
                    <div class="small-text is--gray is--list">Empresa:</div>
                    <div class="small-text">{{ $job->company }}</div>
                </div>
            </div>
        </div>
        <p>{{ $job->preview }}</p>
        <a href="javascript:void(0)" id="job_{{ $job->slug }}"
            class="button card-detail-b is--ghost left-align w-button">
            Leer <ion-icon name="arrow-forward-outline"></ion-icon>
        </a>
    </div>
</div>


@push('scripts')
    <script>
        $('#job_{{ $job->slug }}').on('click', function() {
            $('#detail_{{ $job->slug }}').addClass('active');
        });

        $('#detail_{{ $job->slug }} .overlay').on('click', function() {
            $('#detail_{{ $job->slug }}').removeClass('active');
        });

        $('#detail_{{ $job->slug }} .close-job').on('click', function() {
            $('#detail_{{ $job->slug }}').removeClass('active');
        });
    </script>
@endpush
