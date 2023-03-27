@extends('layout.master')

@push('plugin-styles')
    <!-- Plugin css import here -->
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

@section('content')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb ps-0">
            <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Vacantes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('jobs.create') }}">Creación de
                    vacante</a></li>
        </ol>
    </nav>
@endsection
