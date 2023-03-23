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
        <p></p>
        <a href="{{ route('job.detail', $job->slug) }}" class="button is--ghost left-align w-button">
            Leer <ion-icon name="arrow-forward-outline"></ion-icon>
        </a>
    </div>
</div>
