@extends('back.layouts.main')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">lantana</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Proyectos</h4>
        </div>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>Información General</h4>
                        <hr>
                        <input type="hidden" name="is_promotional" value="0">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="title">Título <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title') }}" required="" />
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="company">Empresa/Compañía o Cliente <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company" name="company" required>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="subtitle">Tipo de proyecto (Subtítulo) <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                    value="{{ old('subtitle') }}" required="" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="subtitle">Contenido<span class="text-danger">*</span></label>
                                <textarea name="body" class="form-control" rows="5" id="project-body"></textarea>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Preview -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Archivos multimedia</h4>
                        <hr>

                        <div id="imageType" class="row">
                            <div class="form-group col-md-12">
                                <label for="image">Imagen de principal <span class="text-danger">*</span></label>
                                <input type="file" id="image" class="form-control" name="image" required="" />
                            </div>

                            <button type="submit" class="btn btn-link"><span class="fas fa-plus"></span> Agregar
                                más imágenes</button>
                            <small class="text-danger">*Agregar primero los datos obligatorios</small>
                        </div>


                        {{-- 
                    <h4>Vista Previa</h4>
                    <hr>
                    <div class="d-flex">
                        <div class="card-banner d-flex justify-content-center align-items-center" id="hex_">
                            <div class="card-banner-content">
                                <h5 id="title_">Título</h5>
                                <p id="subtitle_">Subtítulo</p>
                                <a href="#" class="btn btn-light rounded" id="text_button_">Texto del botón</a>
                            </div>
                            <img class="card-banner-image" id="output"/>
                        </div>
                    </div>
                    --}}
                    </div>
                </div>

                <div class="text-right mt-4 mb-5">
                    <a href="{{ route('projects.index') }}" class="btn btn-default btn-lg">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-lg">Guardar Nuevo Proyecto</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#project-body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
