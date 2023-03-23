@extends('back.layouts.main')

@section('stylesheets')
@endsection

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">lantana</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Banners</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Banners</h4>
        </div>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
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

                            <div class="form-group col-md-4">
                                <label for="link">Prioridad
                                    <span data-toggle="tooltip" data-placement="top"
                                        title="Se refiere al posicionamiento que tendrá este elemento en la página web. Prioridad 1 se muestra siempre primero y prioridad 7 siempre al último. Si existen dos elementos con prioridades iguales tomará prevalencia el elemento creado más recientemente."><i
                                            class="fas fa-info-circle"></i></span>
                                </label>
                                <select class="form-control" name="priority" required>
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="subtitle">Subtítulo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                    value="{{ old('subtitle') }}" required="" />
                            </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="text_button">Texto en el botón <span class="text-info">(Opcional)</span></label>
                                <input type="text" class="form-control" id="text_button" name="text_button"
                                    value="{{ old('text_button') }}" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="link">URL del botón <span class="text-info">(Opcional)</span></label>
                                <input type="url" class="form-control" id="link" name="link"
                                    value="{{ old('link') }}" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Preview -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Fondo</h4>
                        <hr>

                        <div id="imageType" class="row">
                            <div class="form-group col-md-12">
                                <label for="image">Imagen de banner <span class="text-danger">*</span></label>
                                <input type="file" id="image" class="form-control" name="image"
                                    onchange="loadFile(event)" required="" />

                            </div>
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
                    <a href="{{ route('banners.index') }}" class="btn btn-default btn-lg">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-lg">Guardar Nuevo Banner</button>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('scripts')
    <script>
        $('#typeBack').on('change', function(e) {
            event.preventDefault();

            var value = $('#typeBack option:selected').attr('value');

            $('#videoType').hide();
            $('#imageType').hide();

            $('#videoType .form-control').attr('required', false);
            $('#imageType .form-control').attr('required', false);

            if (value == 'Imagen') {
                $('#imageType').show();
                $('#imageType .form-control').attr('required', true);
            }

            if (value == 'Video') {
                $('#videoType').show();
                $('#videoType .video-input').attr('required', true);
            }
        });

        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = "";
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
