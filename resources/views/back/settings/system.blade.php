@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />

  <style>
    .main-wrapper .page-wrapper .page-content{
        margin-top: 60px !important;
        margin-left: 270px;
    }

    @media (max-width: 991px){
        .main-wrapper .page-wrapper .page-content{
            margin-left: 0px 
        }
    }
</style>
@endpush

@include('back/settings/layout/sub-nav')

@section('content')
<div class="row settings-w">
  @include('back.settings.layout.setting-m')

  <h4 class="mb-3 mb-md-0">Configuración del sistema</h4>
  <p class="text-muted mb-5">..</p>

  @include('back.settings.layout.users-table')
  
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