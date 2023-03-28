@push('styles')
    <style>
        input {
            border: 1px solid #2bded3 !important;
            background: transparent !important;
            color: white !important;
        }
    </style>
@endpush

<div class="job-detail" id="detail_{{ $job->slug }}">
    <div class="overlay"></div>

    <div class="job">

        <div class="d-flex justify-content-between">
            <h2 class="mb-3">{{ $job->name }}</h2>

            <button class="btn text-white close-job">
                <ion-icon style="font-size: 30px" name="arrow-back-outline"></ion-icon>
            </button>
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


        <a href="javascript:void(0)" id="apply_{{ $job->id }}" class="button w-button">Aplicar</a>

        <hr>

        <div class="apply-form" id="form_{{ $job->id }}">
            <div class="card card-body job-form pt-2">
                <form action="{{ route('apply.to', $job->id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}  

                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h3 style="font-weight:600;">Tus datos</h3>

                        <button class="btn p-0 text-white close-form" style="height: fit-content; width:auto;">
                            <ion-icon style="font-size: 40px" name="close-circle-outline"></ion-icon>
                        </button>
                    </div>

                    <div class="mb-5">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A dignissimos doloribus voluptatum
                            tenetur. Fugiat magni, distinctio quas ipsa corrupti aliquid, provident explicabo tenetur
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
                                <label for="exampleFormControlInput1" class="form-label">C.V*<small>(Formato PDF. máx
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

        <div class="mt-4 pe-4 about-job">
            {!! $job->about ?? '' !!}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#apply_{{ $job->id }}').on('click', function() {
            $('#form_{{ $job->id }}').addClass('show');
        });

        $('#form_{{ $job->id }} .close-form').on('click', function() {
            $('#form_{{ $job->id }}').removeClass('show');
        });
    </script>
@endpush
