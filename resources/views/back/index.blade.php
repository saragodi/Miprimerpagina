@extends('back.layouts.main')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Lantana</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vista General</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Vista General</h4>
        </div>
    </div>
@endsection

@section('content')
    @if (empty($banners) or empty($projects) or empty($posts))
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-3">Acciones Recomendadas</h1>
            </div>

            @if (empty($banners))
                <div class="col-md-4">
                    <div class="card card-body">
                        <h3>Crea un banner</h3>
                        <p>Los banners son los primeros elementos que se verán al entrar a tu página. Estos te pueden ser de
                            gran ayuda para anunciar a tus clientes lo que haces o actualizar tu propuesta de valor.</p>
                        <a href="{{ route('banners.create') }}" class="btn btn-primary">Crear Banner</a>
                    </div>
                </div>
            @endif

            @if (empty($projects))
                <div class="col-md-4">
                    <div class="card card-body">
                        <h3>Crea un proyecto</h3>
                        <p>Estos proyectos son los que la corporación a elaborado, actualiza el portafolio de la empresa y
                            ayuda
                            a dar prueba social para tus clientes potenciales de lo que han echo como corporación.</p>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">Crear Proyecto</a>
                    </div>
                </div>
            @endif

            @if (empty($posts))
                <div class="col-md-4">
                    <div class="card card-body">
                        <h3>Crea una publicación</h3>
                        <p>Esto genera contenido para tu blog. Estar creando este contenido dinámico ayuda a que la página
                            este
                            en los puestos más altos de los buscadores.</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Crear publiación</a>
                    </div>
                </div>
            @endif

        </div>
    @endif
@endsection
