<div class="card-slide w-slide">
    <div class="w-dyn-list">
        <div role="list" class="w-dyn-items">
            <div role="listitem" class="w-dyn-item">
                <div class="schedule-item">
                    <a href="#" class="schedule-top w-inline-block">
                        <div class="schedule-top-content">
                            <div id="w-node-ac13c773-c417-7102-9010-d65f09de88aa-efe74afb" class="schedule-title">
                                <h3 class="card-title">{{ $project->name }}</h3>
                                <div class="body-display small">{{ $project->subtitle }}</div>
                            </div>
                        </div>
                    </a>
                    <div data-w-id="ac13c773-c417-7102-9010-d65f09de88ad" class="schedule-bottom">
                        <div class="background-wrapper">
                            <div class="overlay gradient"></div>
                            <div class="background"
                                style="background-image: url({{ asset('img/projects/' . $project->main_picture) }})">
                            </div>
                        </div>
                        <div class="template-screen-content small">
                            <div id="w-node-ac13c773-c417-7102-9010-d65f09de88b2-efe74afb"
                                style="-webkit-transform:translate3d(0, -72px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, -72px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, -72px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, -72px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                                class="template-hover-top"></div>
                            <a data-w-id="ac13c773-c417-7102-9010-d65f09de88b5"
                                href="{{ route('detail', $project->slug) }}"
                                class="template-screen-link w-inline-block">
                                <div data-w-id="ac13c773-c417-7102-9010-d65f09de88b6" class="cursur-wrapper">
                                    <div class="card-cursur on">
                                        <div id="w-node-ac13c773-c417-7102-9010-d65f09de88b8-efe74afb"
                                            class="cursur-text">Ver</div>
                                        <div id="w-node-ac13c773-c417-7102-9010-d65f09de88ba-efe74afb"
                                            class="cursor-top">
                                            <div class="cursur-top-outline"></div>
                                        </div>
                                        <div id="w-node-ac13c773-c417-7102-9010-d65f09de88bc-efe74afb"
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
    </div>
</div>
