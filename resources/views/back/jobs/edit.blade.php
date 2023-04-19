@extends('layout.master')

@push('plugin-styles')
    <!-- Plugin css import here -->
@endpush

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="user"></i>
            </div>
            <h4>Vista General</h4>
        </div>
    </div>
@endsection

@section('content')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb ps-0">
            <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Vacantes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a>Editar vacante</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="overflow: hidden">
                <div class="d-flex justify-content-between align-items-center py-3 px-4 bg-white"
                    style="border-bottom: 1px solid black">
                    <h3 class="mb-0 card-title">Editar vacante</h3>
                    <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">
                        <ion-icon class="pb-2 me-2" name="arrow-undo-outline"></ion-icon>
                        Volver
                    </a>
                </div>
                <div class="card-body">

                    <form action="{{ route('jobs.update', $job->id) }}" method="POST">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nombre de la vacante <span style="color: red"><span
                                                style="color: red">*</span></span></label>
                                    <input type="text" required name="name" value="{{ $job->name }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Municipio <span style="color: red">*</span></label>
                                    <input type="text" name="location" value="{{ $job->location }}" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Estado <span style="color: red">*</span></label>
                                    <input type="text" name="state" value="{{ $job->state }}" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Compañía</label>
                                    <input type="text" name="company" value="{{ $job->company }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tipo de trabajo</label>
                                    <select class="form-select" name="type" aria-label="Default select example">

                                        @if ($job->type == 0)
                                            <option selected>Seleccionar uno</option>
                                        @else
                                            <option value="{{ $job->type }}">{{ $job->type }}</option>
                                        @endif

                                        <option value="Tiempo completo">Tiempo completo</option>
                                        <option value="Medio tiempo">Medio tiempo</option>
                                        <option value="Contrato">Contrato</option>
                                        <option value="Temporal">Temporal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Modalidad</label>
                                    <select class="form-select" name="modality" aria-label="Default select example">
                                        @if ($job->modality == 0)
                                            <option selected>Seleccionar uno</option>
                                        @else
                                            <option value="{{ $job->modality }}">{{ $job->modality }}</option>
                                        @endif
                                        <option value="Presencial">Presencial</option>
                                        <option value="Remota">Remota</option>
                                        <option value="Híbrida">Híbrida</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Experiencia</label>
                                    <select class="form-select" name="experience" aria-label="Default select example">
                                        @if ($job->experience == 0)
                                            <option selected>Seleccionar uno</option>
                                        @else
                                            <option value="{{ $job->experience }}">{{ $job->experience }}</option>
                                        @endif


                                        <option value="Pasantía">Pasantía</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Mid-Senior">Mid-Senior</option>
                                        <option value="Director">Director</option>
                                        <option value="Ejecutivo">Ejecutivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Icono <small class="ms-2"><a
                                                href="https://feathericons.com/" target=”_blank”>Ver
                                                Iconos</a></small></label>
                                    <input type="text" name="icon" value="{{ $job->icon }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <h3>Descripción <span style="color: red">*</span></h3>
                                <div class="my-3">
                                    <textarea name="about" class="form-control" id="project-body"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#project-body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
