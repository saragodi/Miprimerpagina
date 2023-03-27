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

            @if (Auth::user()->change_password == 0)
                <h6 class="mt-4 text-primary"><strong>¡Importante!</strong> Actualiza tu contraseña a una que solo sea para
                    ti.
                </h6>
            @endif

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

        <div class="col-md-5 mb-4">
            <div class="s-d-none d-md-block">
                <h5 class="mb-5">Foto de perfil</h5>
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center justify-content-center mb-4">
                        <div>
                            <div
                                class="d-flex position-relative justify-content-center align-items-center bg-primary rounded-circle overflow-hidden edit-pic mb-3">
                                <img src="{{ asset('back/img/users/' . Auth::user()->profile_pic) }}" alt="profile">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updatePicModal"
                                    class="position-absolute bottom-0 bg-grey text-white w-100 text-center h-20 pt-1"
                                    style="opacity: .7; border:none; z-index:5;" href="">Editar</button>
                            </div>
                            <div class="d-block d-md-none text-center">
                                <h4>{{ Auth::user()->name }}</h4>
                                <p class="text-muted">{{ Auth::user()->getRoleNames() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::user()->hasRole(['supplier_master']))
                <div>
                    <h5 class="mb-5">Logo de empresa</h5>
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-center justify-content-center mb-4">

                            @if (Auth::user()->supplier->logo == null)
                                <div
                                    class="d-flex position-relative justify-content-center align-items-center bg-primary rounded-circle overflow-hidden edit-pic">
                                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=retro&s=100' }}"
                                        alt="profile">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateLogoModal"
                                        class="position-absolute bottom-0 bg-grey text-white w-100 text-center h-20 pt-1"
                                        style="opacity: .7; border:none; z-index:5;" href="">Editar</button>
                                </div>
                            @else
                                <div
                                    class="d-flex position-relative justify-content-center align-items-center bg-white rounded-circle overflow-hidden edit-pic">
                                    <img src="{{ asset('img/supplier/logos/' . Auth::user()->supplier->logo) }}"
                                        alt="profile" class="w-100 h-auto">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateLogoModal"
                                        class="position-absolute bottom-0 bg-grey text-white w-100 text-center h-20 pt-1"
                                        style="opacity: .7; border:none; z-index:5;" href="">Editar</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if (Auth::user()->hasRole(['client_master']))
                <div>
                    <h5 class="mb-5">Logo de empresa</h5>
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-center justify-content-center mb-4">

                            @if (Auth::user()->client->logo == null)
                                <div
                                    class="d-flex position-relative justify-content-center align-items-center bg-primary rounded-circle overflow-hidden edit-pic">
                                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=retro&s=100' }}"
                                        alt="profile">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateLogoModal2"
                                        class="position-absolute bottom-0 bg-grey text-white w-100 text-center h-20 pt-1"
                                        style="opacity: .7; border:none; z-index:5;" href="">Editar</button>
                                </div>
                            @else
                                <div
                                    class="d-flex position-relative justify-content-center align-items-center bg-white rounded-circle overflow-hidden edit-pic">
                                    <img src="{{ asset('img/clients/logos/' . Auth::user()->client->logo) }}"
                                        alt="profile" class="w-100 h-auto">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateLogoModal2"
                                        class="position-absolute bottom-0 bg-grey text-white w-100 text-center h-20 pt-1"
                                        style="opacity: .7; border:none; z-index:5;" href="">Editar</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
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
