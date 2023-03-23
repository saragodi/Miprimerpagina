@extends('back.layouts.main')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">lantana</a></li>
                    <li class="breadcrumb-item" aria-current="page">Proyecto</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project->name }}</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">{{ $project->name }}</h4>
        </div>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

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
                                    value="{{ $project->name }}" required="" />
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="company">Empresa/Compañía o Cliente <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company" name="company"
                                    value="{{ $project->company }}" required>
                            </div>

                            <div class="form-group col-md-8">
                                <label for="subtitle">Tipo de proyecto (Subtítulo) <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                    value="{{ $project->subtitle }}" required="" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="subtitle">Contenido<span class="text-danger">*</span></label>
                                <textarea name="body" class="form-control" rows="5" id="project-body">{{ $project->body }}</textarea>
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
                            </div>

                            <div class="col-md-4 offset-md-4">
                                <a href="javascript:void(0)" data-target="#modalChangeImage" data-toggle="modal"
                                    class="btn btn-rounded btn-icon btn-info"><i class="fas fa-edit"
                                        aria-hidden="true"></i></a>

                                <img class="img-fluid mb-4" src="{{ asset('img/projects/' . $project->main_picture) }}"
                                    alt="Imagen principal">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Multimedia Elements -->
                <div class="card mg-t-10 mb-4">
                    <!-- Header -->
                    <div class="card-header pd-t-20 pd-b-0 bd-b-0">
                        <h5 class="mg-b-5">Archivos multimedia</h5>
                    </div>

                    <!-- Form -->
                    <div class="card-body row">

                        <div class="col-12">
                            <h5>Imagenes extras</h5>
                        </div>

                        @foreach ($project->images as $image)
                            <div class="col-md-4 rounded" style="border: 1px solid grey">
                                <div class="thumbnail-wrap">
                                    <button type="button" id="deleteImage_{{ $image->id }}"
                                        class="btn btn-rounded btn-icon btn-danger" data-toggle="tooltip"
                                        data-original-title="Borrar">
                                        <i class="fas fa-times" aria-hidden="true"></i>
                                    </button>

                                    @push('scripts')
                                        <form method="POST" id="deleteImageForm_{{ $image->id }}"
                                            action="{{ route('image.destroy', $image->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>

                                        <script type="text/javascript">
                                            $('#deleteImage_{{ $image->id }}').on('click', function() {
                                                event.preventDefault();
                                                $('#deleteImageForm_{{ $image->id }}').submit();
                                            });
                                        </script>
                                    @endpush

                                    <img class="img-fluid mb-4" src="{{ asset('img/projects/' . $image->image) }}"
                                        alt="Imagen secundaria">
                                    <a style="right: 30px;" href="javascript:void(0)"
                                        data-target="#modalEditImage_{{ $image->id }}" data-toggle="modal"
                                        class="btn btn-rounded btn-icon btn-info" data-toggle="tooltip"
                                        data-original-title="Cambiar Imagen"><i class="fas fa-edit"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            <a href="javascript:void(0)" data-target="#modalNewImage" data-toggle="modal"
                                class="image-btn"><span class="fas fa-plus"></span> Agregar más imágenes</a>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-4 mb-5">
                    <a href="{{ route('projects.index') }}" class="btn btn-default btn-lg">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-lg">Guardar Nuevo Proyecto</button>
                </div>
            </div>
        </div>
    </form>


    <div class="modal fade" id="modalNewImage" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateLabel">Nueva Imágen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="project_id" value="{{ $project->id }}">

                        <div class="form-group">
                            <label for="image">Imagen <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png">
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal"
                                aria-label="Close">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar Imagen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalChangeImage" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateLabel">Cambiar Imágen Principal del Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('main.image.update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" name="project_id" value="{{ $project->id }}">

                        <div class="form-group">
                            <label for="image">Imagen del Proyecto</label>
                            <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png">
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal"
                                aria-label="Close">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar Imagen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($project->images as $image)
        <div class="modal fade" id="modalEditImage_{{ $image->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCreateLabel">Editar prioridad y descripción</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('image.update', $image->id) }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <input type="hidden" name="id" value="{{ $image->id }}">

                            <div class="form-group">
                                <label for="image">Imagen del Proyecto</label>
                                <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png">
                            </div>

                            <div class="text-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                    aria-label="Close">Cancelar</button>
                                <button type="submit" class="btn btn-success">Guardar Imagen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
