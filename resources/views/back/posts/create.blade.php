@extends('back.layouts.main')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">lantana</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Publicaciones</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Publicaciones</h4>
        </div>

        <div class="d-none d-md-block">
            <a href="{{ route('posts.index') }}" class="btn btn-sm pd-x-15 btn-outline-primary btn-uppercase mg-l-5">
                <i class="fas fa-plus"></i> Volver
            </a>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body">
                    <h4>Información General</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="title">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="name"
                                value="{{ old('title') }}" required="" />
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="subtitle">Subtítulo</label>
                            <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}">
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="subtitle">Contenido<span class="text-danger">*</span></label>
                            <textarea name="body" class="form-control" rows="5" id="project-body"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body">
                    <h4>Características</h4>
                    <hr>
                    <div id="imageType" class="row">
                        <div class="form-group col-md-12">
                            <label for="image">Imagen principal <span class="text-danger">*</span></label>
                            <input type="file" id="image" class="form-control" name="image" required="" />
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Categorias <span class="text-danger">*</span></label>
                            <select class="js-example-basic-multiple" required style="width: 100%" name="categories[]"
                                multiple="multiple">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Tiempo de lectura (minutos) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="time" required="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Día de publicación <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" required="">
                        </div>

                        <div class="col-md-12 mb-5">
                            <div class="form-check">
                                <input class="form-check-input" name="is_publish" type="checkbox" value="1"
                                    id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Publicar
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary w-100" type="submit">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: 'Selecciona las categorias de esta publicación',
                theme: "classic",
            });
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#project-body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
