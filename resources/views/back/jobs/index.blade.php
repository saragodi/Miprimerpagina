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
                                                <span class="badge badge-success">Activado</span><br>
                                            @else
                                                <span class="badge badge-info">Desactivado</span><br>
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
