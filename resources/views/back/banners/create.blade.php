@extends('layout.master')

@section('stylesheets')
@endsection

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="archive"></i>
            </div>
            <h4>Banners</h4>
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
                            <div class="form-group col-md-6">
                                <label for="title">Título <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title') }}" required="" />
                            </div>

                            <div class="form-group col-md-6">
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
