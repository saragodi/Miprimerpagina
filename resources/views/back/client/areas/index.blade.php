@extends('layout.master')

@push('plugin-styles')
    <!-- Plugin css import here -->
@endpush

@section('title')
    <div class="title-content justify-content-between">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="hexagon"></i>
            </div>
            <h4>Áreas</h4>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach ($areas as $area)
            <div class="col-md-6">
                @include('layout.partials._areas_card')
            </div>
        @endforeach
    </div>
@endsection
