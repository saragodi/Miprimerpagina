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
        @if (auth()->user()->can('admin_access'))
            <div class="d-none d-md-block">
                <a href="{{ route('projects.create') }}" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">
                    <i class="fas fa-plus"></i> Crear nuevo Proyecto
                </a>
            </div>
        @endif
    </div>
@endsection

@section('content')
    @if ($projects->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_7.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>¡No hay proyectos en la base de datos!</h4>
            <p class="mb-4">Empieza a crear proyectos en tu plataforma usando el botón posterior.</p>
            <a href="{{ route('projects.create') }}"
                class="btn btn-sm btn-primary btn-uppercase wd-200 ml-auto mr-auto">Crear nuevo proyecto</a>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Compañía</th>
                                    <th>Imagen</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td style="width: 250px;">
                                            <strong>{{ $project->title }}</strong><br>
                                            <p>{{ $project->subtitle }}</p>
                                        </td>
                                        <td style="width: 100px">
                                            <p>{{ $project->company }}</p>
                                        </td>
                                        <td style="width: 150px;">
                                            <img style="width: 100%;"
                                                src="{{ asset('img/projects/' . $project->main_picture) }}"
                                                alt="{{ $project->title }}">
                                        </td>

                                        <td>
                                            @if ($project->is_active == true)
                                                <span class="badge badge-success">Activado</span><br>
                                            @else
                                                <span class="badge badge-info">Desactivado</span><br>
                                            @endif
                                        </td>

                                        <td class="d-flex">
                                            <a href="{{ route('projects.show', $project->id) }}"
                                                class="btn btn-link text-dark px-1 py-0" data-toggle="tooltip"
                                                data-original-title="Ver Detalle">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </a>

                                            <a href="{{ route('projects.edit', $project->id) }}"
                                                class="btn btn-link text-dark px-1 py-0" data-toggle="tooltip"
                                                data-original-title="Editar">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>

                                            <form method="POST" action="{{ route('projects.status', $project->id) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link text-dark px-1 py-0"
                                                    data-toggle="tooltip" data-original-title="Cambiar estado">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-link text-danger px-1 py-0"
                                                    data-toggle="tooltip" data-original-title="Eliminar Proyecto">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-items-center">
            <div class="col text-center">
                {{ $projects->links() }}
            </div>
        </div>
    @endif
@endsection
