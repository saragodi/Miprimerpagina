@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />

    <style>
        .main-wrapper .page-wrapper .page-content {
            margin-top: 60px !important;
            margin-left: 270px;
        }

        @media (max-width: 991px) {
            .main-wrapper .page-wrapper .page-content {
                margin-left: 0px
            }
        }
    </style>
@endpush

@include('back/settings/layout/sub-nav')

@section('content')
    <div class="row settings-w">
        @include('back.settings.layout.setting-m')

        <h4 class="mb-3 mb-md-0">Notificaciones</h4>
        <p class="text-muted mb-5">Personaliza los correos y notificaciones del sistema</p>


        <div class="col-md-7 mb-4">
            <div>
                <h3 class="mb-3 mb-md-0">Notificaciones</h3>
            </div>
            <hr>
            <div class="card card-body mg-b-10">

                <div class="table-responsive">
                    <table class="table table-dashboard">
                        <thead>
                            <tr>
                                <th scope="col">Notificación</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alerts as $alert)
                                <tr>
                                    <th>{{ $alert->name }}</th>
                                    <th>
                                        <div class="d-flex align-items-center">
                                            @if ($alert->status == 0)
                                                <a href="{{ route('admin.notificactions.status', $alert->id) }}"
                                                    class="btn btn-danger btn-sm text-white">
                                                    <ion-icon name="ban-outline" class="mb-2 me-2"></ion-icon>
                                                    <small>Baja</small>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.notificactions.status', $alert->id) }}"
                                                    class="btn btn-success btn-sm text-white">
                                                    <ion-icon name="checkmark-outline" class="mb-2 me-2"></ion-icon>
                                                    <small>Activo</small>
                                                </a>
                                            @endif
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-5 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Correos</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Agregar correo
                </button>
            </div>
            <hr>
            @if (empty($emails))
                <div class="text-center my-5">
                    <h4 class="mb-0">¡No haz dado de alta ningún correo para recibir notificaciones!</h4>
                    <p>Puedes empezar con el botón de la parte superior.</p>
                </div>
            @else
                <div class="card card-body mg-b-10">
                    <div class="table-responsive">
                        <table class="table table-dashboard">
                            <thead>
                                <tr>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emails as $email)
                                    <tr>
                                        <td>{{ $email->email }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('client-mail.destroy', $email->id) }}"
                                                style="display: inline-block;">
                                                <button type="submit" class="btn btn-outline-danger btn-sm btn-icon ps-1"
                                                    data-toggle="tooltip" data-original-title="Borrar">
                                                    <i data-feather="trash" class="icon-lg"></i>
                                                </button>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Correo para notificaciones</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('client-mail.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Correo Electrónico</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="sumbit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('plugin-scripts')
        <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
    @endpush

    @push('custom-scripts')
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
        <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    @endpush
