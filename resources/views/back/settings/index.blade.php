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

        <h4 class="mb-3 mb-md-0">Mi información</h4>
        <p class="text-muted mb-5">Actualiza la información de tu cuenta</p>

        <div class="col mb-4">
            <div class="card card-body">
                <form action="{{ route('user.update.account', Auth::user()->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <h4 class="mb-4">Información de mi cuenta</h4>
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input readonly type="email" name="email" class="form-control"
                                value="{{ Auth::user()->email }}">
                        </div>

                        <div class="accordion mb-3" id="accordionExample">
                            <div class="accordion-item">
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-group col-md-6">
                                            <label>Contraseña</label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-inline-flex">
                        <i class="icon-md me-2" data-feather="rotate-cw"></i>
                        Actualizar Cuenta</button>
                </form>
            </div>

            <div class="card card-body mt-4">
                <form action="{{ route('user.update.pass', Auth::user()->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <h4 class="mb-4">Actualizar Contaseña</h4>

                        <div class="form-group col-md-6">
                            <label>Contraseña</label>
                            <input type="text" id="password" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Confirmar Contraseña</label>
                            <input type="password" id="confirmP" name="password" class="form-control">
                        </div>
                        <small class="text-danger" style="display: none" id="alertP">Las contraseñas no
                            coinciden</small>
                    </div>
                    <button type="submit" disabled id="submitP" class="btn btn-primary d-inline-flex">
                        <i class="icon-md me-2" data-feather="key"></i>
                        Actualizar Contraseña</button>
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
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        $(document).ready(function() {



            $('#confirmP').blur(function() {

                var pass = $('#password').val();

                var confirm = $(this).val();

                if (confirm == pass) {
                    $('#submitP').removeAttr('disabled');

                    $('#alertP').hide();

                } else {
                    $('#submitP').attr('disabled');

                    $('#password').effect("shake");
                    $(this).effect("shake");

                    $('#password').val("");
                    $(this).val("");

                    $('#alertP').show();

                }

            });
        });
    </script>
@endpush
