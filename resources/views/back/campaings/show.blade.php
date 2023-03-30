@extends('layout.master')

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
    @if ($banners->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_7.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>¡No hay banners guardadas en la base de datos!</h4>
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
                                    <th>Imagen</th>
                                    <th>Información</th>
                                    <th>Prioridad</th>
                                    <th>Botón</th>
                                    <th>Link</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td style="width: 150px;">
                                            <img style="width: 100%;"
                                                src="{{ asset('img/banners/' . $banner->image_desktop) }}"
                                                alt="{{ $banner->title }}">

                                        </td>
                                        <td style="width: 250px;">
                                            <strong>{{ $banner->title }}</strong><br>
                                            <p>{{ $banner->subtitle }}</p>
                                        </td>
                                        <td> {{ $banner->priority }}</td>
                                        <td>{{ $banner->text_button }}</td>
                                        <td>{{ $banner->link }}</td>

                                        <td>
                                            @if ($banner->is_active == true)
                                                <span class="badge badge-success">Activado</span><br>
                                            @else
                                                <span class="badge badge-info">Desactivado</span><br>
                                            @endif
                                        </td>

                                        <td class="d-flex">
                                            <a href="{{ route('banners.show', $banner->id) }}"
                                                class="btn btn-link text-dark px-1 py-0" data-toggle="tooltip"
                                                data-original-title="Ver Detalle">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </a>

                                            <a href="{{ route('banners.edit', $banner->id) }}"
                                                class="btn btn-link text-dark px-1 py-0" data-toggle="tooltip"
                                                data-original-title="Editar">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>

                                            <form method="POST" action="{{ route('banners.status', $banner->id) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link text-dark px-1 py-0"
                                                    data-toggle="tooltip" data-original-title="Cambiar estado">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('banners.destroy', $banner->id) }}">
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
                {{ $banners->links() }}
            </div>
        </div>
    @endif
@endsection
