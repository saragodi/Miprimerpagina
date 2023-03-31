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
    @if ($seo == null)
        <form method="POST" action="{{ route('seo.store') }}" enctype="multipart/form-data">
        @else
            <form method="POST" action="{{ route('seo.update', $seo->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
    @endif
    {{ csrf_field() }}
    <div class="row">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-3 mb-md-0">Search Engine Optimization (SEO)</h4>
                <p class="text-muted mb-0">Esta información te permite aparecer más efectivamente en los buscadores en
                    Internet.</p>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
        <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-body">

                    <h6 class="text-uppercase mb-3">Información General</h6>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="page_title">Título general del sitio</label>
                                <input type="text" class="form-control" id="page_title" name="page_title"
                                    value="{{ $seo->page_title ?? '' }}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="page_canonical_url">URL</label>
                                <input type="text" class="form-control" id="page_canonical_url" name="page_canonical_url"
                                    value="{{ $seo->page_canonical_url ?? '' }}" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="page_description">Descripción</label>
                                <textarea class="form-control" id="page_description" name="page_description" rows="5">{{ $seo->page_description ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="page_keywords">Palabras Clave</label>
                            <input type="text" class="form-control" id="page_keywords" name="page_keywords"
                                value="{{ $seo->page_keywords ?? '' }}" />
                            <small class="form-text text-muted">Separa cada elemento con una coma o los robots de busqueda
                                no podrán identificar las palabras.</small>
                        </div>

                        <div class="col-md-12">
                            <label for="page_theme_color_hex">Color (Tema)</label>
                            <input type="color" class="form-control" id="page_theme_color_hex" name="page_theme_color_hex"
                                value="{{ $seo->page_theme_color_hex ?? '' }}" />
                            <small class="form-text text-muted">Usa un valor HEX para determinar el color de tema de tu
                                página.</small>
                        </div>
                    </div>

                    <hr>
                    <h6 class="text-uppercase mb-3">Opciones adicionales de SEO</h6>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="page_alternate_url">URL Alternativa</label>
                                <input type="text" class="form-control" id="page_alternate_url" name="page_alternate_url"
                                    value="{{ $seo->page_alternate_url ?? '' }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
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
