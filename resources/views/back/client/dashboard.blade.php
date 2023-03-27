@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/owl_carousel/assets/owl.carousel.min.css') }}">
    <style type="text/css">
        /* FILE CARD */
        .file-card {
            height: auto;
            max-height: 230px;
        }

        .file-card .card-body {
            padding-top: 5px;
            padding-bottom: 10px;
        }

        .file-icon .icon-size {
            width: 60px;
            height: 90px;
            position: relative;
            left: -5px;
        }

        /* FILE COLORS */
        .file-card .default-color .file-icon {
            color: #778beb;
        }

        .file-card .default-color .filename {
            background-color: #778beb;
            color: #fff;
        }

        /* PDF */
        .file-card .pdf-color .file-icon {
            color: #ff6b6b;
        }

        .file-card .pdf-color .filename {
            background-color: #ff6b6b;
            color: #fff;
        }

        /* IMAGE */
        .file-card .image-color .file-icon {
            color: #00d2d3;
        }

        .file-card .image-color .filename {
            background-color: #00d2d3;
            color: #fff;
        }

        /* EXCEL */
        .file-card .excel-color .file-icon {
            color: #1dd1a1;
        }

        .file-card .excel-color .filename {
            background-color: #1dd1a1;
            color: #fff;
        }

        /* WORD */
        .file-card .word-color .file-icon {
            color: #54a0ff;
        }

        .file-card .word-color .filename {
            background-color: #54a0ff;
            color: #fff;
        }

        /* ----------------- */

        .file-card .file-icon {
            font-size: 4em;
            width: 75px;
            position: relative;
            margin-right: -5px;
        }

        .file-card .file-icon .filename {
            position: absolute;
            top: 45px;
            right: 10px;
            text-transform: uppercase;
            font-size: 12px;
            padding: 0px 12px;
        }

        .file-card .card-options {
            position: absolute;
            z-index: 10;
            top: 20px;
            right: 20px;
        }

        .file-card .filename {
            font-size: .8em;
        }

        .file-card .upload-time {
            font-size: .7em;
            margin-bottom: 0px;
            margin-top: 10px;
        }

        .file-card hr {
            margin: 0px auto;
        }

        .owl-nav span {
            font-size: 40px;
            margin: 0px 5px;
        }
    </style>
@endpush

@section('info_modal_title')
    Dashboard
@endsection

@section('info_modal_body')
@endsection

@section('title')
    <div class="title-content">
        <div class="title-icon">
            <i class="link-icon" data-feather="user"></i>
        </div>
        <h4>Vista General</h4>
    </div>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Bienvenido a tu Panel {{ Auth::user()->name }}</h4>
        </div>
    </div>

    <div class="profile-page tx-13">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="profile-header">
                    <div class="cover">
                        <div class="gray-shade">
                            @if (Auth::user()->hasRole(['client_master']))
                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateHeaderModal"
                                    class="btn btn-outline-primary d-inline-flex position-absolute end-0 me-3 mt-3"><i
                                        class="btn-icon-prepend icon-sm" data-feather="edit"></i>
                                </a>
                            @endif
                        </div>
                        <figure>
                            @if ($client->header_image == null)
                                <img src="https://source.unsplash.com/1200x300/?industrial,electricity" class="img-fluid"
                                    alt="profile cover">
                            @else
                                <img src="{{ asset('img/clients/img/' . $client->header_image) }}"
                                    style="height: 450px; width: 100%;" alt="profile cover">
                            @endif
                        </figure>
                        <div class="cover-body d-flex justify-content-between align-items-center">
                            <div>
                                @if ($client->logo == null)
                                    <div
                                        class="profile-pic d-flex position-relative justify-content-center align-items-center bg-primary rounded-circle overflow-hidden mb-3">
                                        <img class="profile-pic"
                                            src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=retro&s=100' }}"
                                            alt="profile">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updatePicModal"
                                            class="position-absolute bottom-0 bg-grey text-white w-100 text-center h-20 pt-1"
                                            style="opacity: .7; border:none; z-index:5;" href="">Editar</button>
                                    </div>
                                @else
                                    <div
                                        class="profile-pic d-flex position-relative justify-content-center align-items-center bg-primary rounded-circle overflow-hidden mb-3">
                                        <img class="profile-pic" src="{{ asset('img/clients/logos/' . $client->logo) }}"
                                            alt="profile">
                                        @if (Auth::user()->hasRole(['client_master']))
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updatePicModal"
                                                class="position-absolute bottom-0 bg-grey text-white w-100 text-center h-20 pt-1"
                                                style="opacity: .7; border:none; z-index:5;" href="">Editar</button>
                                        @endif
                                    </div>
                                @endif

                                <span class="profile-name">{{ $client->social_reason }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="header-links">
                        <!--
                                            <ul class="links d-flex align-items-center mt-3 mt-md-0">
                                                <li class="header-link-item d-flex align-items-center active">
                                                    <i class="mr-1 icon-md" data-feather="columns"></i>
                                                    <a class="pt-1px d-none d-md-block" href="#">Reporte al Momento</a>
                                                </li>
                                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                                    <i class="mr-1 icon-md" data-feather="hard-drive"></i>
                                                    <a class="pt-1px d-none d-md-block" href="#">Histórico</a>
                                                </li>
                                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                                    <i class="mr-1 icon-md" data-feather="file-text"></i>
                                                    <a class="pt-1px d-none d-md-block" href="#">Facturación</a>
                                                </li>
                                            </ul>
                                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Profile Picture-->
    <div class="modal fade" id="updatePicModal" tabindex="-1" aria-labelledby="updatePicModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Actualizar imagen de perfil</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('client.logo.update', $client->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <label for="">Seleccionar foto</label>
                        <input type="file" name="profile_pic" class="form-control">
                        <small>* Formatos aceptados: .jpg, .jpeg, .png</small>
                        <small>* Máximo peso: 1MB</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Header Picture-->
    <div class="modal fade" id="updateHeaderModal" tabindex="-1" aria-labelledby="updateHeaderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Actualizar imagen de encabezado</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('client.header.update', $client->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <label for="">Seleccionar foto</label>
                        <input type="file" name="header_image" class="form-control">
                        <small>* Formatos aceptados: .jpg, .jpeg, .png</small>
                        <small>* Máximo peso: 2MB</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Password-->
    <div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="updatePasswrodModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.update.pass', $client->user_id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="text" class="form-control" name="password" id="password"
                                placeholder="Escribe la nueva contraseña" value="">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
