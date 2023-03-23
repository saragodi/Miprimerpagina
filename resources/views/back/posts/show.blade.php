@extends('back.layouts.main')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">wcommerce</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Banners</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Banners</h4>
        </div>
        @if (auth()->user()->can('admin_access'))
            <div class="d-none d-md-block">
                <a href="{{ route('banners.create') }}" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">
                    <i class="fas fa-plus"></i> Crear nuevo Banner
                </a>
            </div>
        @endif
    </div>
@endsection

@section('content')
@endsection
