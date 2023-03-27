@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="user"></i>
            </div>
            <h4>Vista General</h4>
        </div>
    </div>
@endsection

@section('info_modal_title')
    Vista General
@endsection

@section('info_modal_body')
    <div class="row">
        <div class="col-md-12">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam adipisci eveniet accusantium beatae at, ut
            tempora enim modi ex eligendi quibusdam magnam excepturi atque fugit nobis! Tempore recusandae vitae velit?
        </div>
    </div>
@endsection

@section('content')
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
