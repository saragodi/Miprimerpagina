@extends('layout.master')

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="key"></i>
            </div>
            <h4>Campañas</h4>
        </div>
    </div>
@endsection


@section('content')
    @if ($campaings->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_7.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>¡No hay campañas guardadas en la base de datos!</h4>
            <p class="mb-4">Empieza a cargar campañas en tu plataforma usando el botón inferior.</p>
            <a href="{{ route('banners.create') }}" class="btn btn-primary btn-uppercase wd-200 ml-auto mr-auto">Crear nueva
                campaña</a>
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-items-center">
            <div class="col text-center">
                {{ $campaings->links() }}
            </div>
        </div>
    @endif
@endsection
