@extends('layout.master')

@push('plugin-styles')
    <!-- Plugin css import here -->
@endpush

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="archive"></i>
            </div>
            <h4>Vacantes</h4>
        </div>
    </div>
@endsection

@section('content')


    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb ps-0">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('jobs.index') }}">Vacantes</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        @if (Request::is('admin/jobs'))
            <h3 class="mb-0">Listado de Vacantes</h3>
        @else
            <h3 class="mb-0">Listado de Vacantes en Borrador</h3>
        @endif

        <div class="d-flex">

            <div class="dropdown me-2">
                <button class="btn btn-outline-dark " type="button" data-bs-toggle="dropdown" aria-expanded="false">

                    @if (Request::is('admin/jobs'))
                        Activos
                    @else
                        Borrador
                    @endif
                    <ion-icon class="pb-2 ms-2" name="chevron-down-outline"></ion-icon>
                </button>
                <ul class="dropdown-menu">
                    @if (Request::is('admin/jobs'))
                        <li><a class="dropdown-item" href="{{ route('jobs.archive') }}">Borrador</a>
                        </li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('jobs.index') }}">Activos</a>
                        </li>
                    @endif
                </ul>
            </div>

            <a href="{{ route('jobs.create') }}" class="btn btn-primary">
                <ion-icon class="pb-2 me-2" name="add-circle-outline"></ion-icon>
                Crear vacante
            </a>
        </div>
    </div>


    @if ($jobs->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_7.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>¡No hay vacantas guardadas en la base de datos!</h4>
            <p class="mb-4">Empieza a cargar banners en tu plataforma usando el botón superior.</p>
            <a href="{{ route('banners.create') }}"
                class="btn btn-sm btn-primary btn-uppercase wd-200 ml-auto mr-auto">Crear nuevo banner</a>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>No. de Postulados</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $job->name }}</td>

                                        <td>{{ $job->applicants->count() }}</td>

                                        <td>

                                            @if ($job->status == true)
                                                <div class="dropdown">
                                                    <button class="btn btn-success " type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Publicado
                                                        <ion-icon class="pb-2 ms-2" name="chevron-down-outline"></ion-icon>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('jobs.status', $job->id) }}">Borrador</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @else
                                                <div class="dropdown">
                                                    <button class="btn btn-danger " type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Borrador
                                                        <ion-icon class="pb-2 ms-2" name="chevron-down-outline"></ion-icon>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('jobs.status', $job->id) }}">Publicar</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        </td>

                                        <td class="d-flex">

                                            <a href="{{ route('jobs.show', $job->id) }}"
                                                class="btn btn-link text-dark px-1 py-0" data-toggle="tooltip"
                                                data-original-title="Ver Detalle">
                                                <i class="link-icon" data-feather="eye"></i>
                                            </a>

                                            <a href="{{ route('jobs.edit', $job->id) }}"
                                                class="btn btn-link text-dark px-1 py-0" data-toggle="tooltip"
                                                data-original-title="Editar">

                                                <i class="link-icon" data-feather="edit"></i>
                                            </a>

                                            <button href="#" id="button_{{ $job->id }}"
                                                class="btn btn-link text-dark px-1 py-0 clip" data-toggle="tooltip"
                                                data-url="{{ route('job.detail', $job->slug) }}"
                                                data-original-title="Copiar Link">

                                                <i class="link-icon" data-feather="clipboard"></i>
                                            </button>

                                            <p id="copiao"></p>

                                            @push('custom-scripts')
                                                <script>
                                                    var $temp = $("<input>");
                                                    var $url = $('#button_{{ $job->id }}').attr('data-url');

                                                    $('#button_{{ $job->id }}').on('click', function() {
                                                        $("body").append($temp);
                                                        $temp.val($url).select();
                                                        document.execCommand("copy");
                                                        $temp.remove();

                                                        $("#copiao").text("URL copied!");
                                                    })
                                                </script>
                                            @endpush


                                            {{-- 
                                            <form method="POST" action="{{ route('jobs.status', $job->id) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link text-dark px-1 py-0"
                                                    data-toggle="tooltip" data-original-title="Cambiar estado">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </form>
                                             --}}

                                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-link text-danger px-1 py-0"
                                                    data-toggle="tooltip" data-original-title="Eliminar Banner">
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
                {{ $jobs->links() }}
            </div>
        </div>
    @endif
@endsection

@push('custom-scripts')
@endpush
