@extends('back.layouts.main')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">lantana</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Clientes</h4>
        </div>
        <div class="d-none d-flex align-items-center">
            <form role="search" action="{{ route('clients.search') }}" class="search-form mr-3">
                <input type="search" name="query" class="form-control" style="height: calc(1.5em + 0.9375rem - 2px);"
                    placeholder="Buscar por nombre o email...">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>

    <style type="text/css">
        .filter-btn {
            border: none;
            background-color: transparent;
            color: rgba(27, 46, 75, 0.7);
            font-size: 12px;
            padding: 0px 2px;
        }

        .table .table-title {
            margin-right: 6px;
        }

        .filter-btn:hover {
            color: #000;
        }

        .table-dashboard thead th,
        .table-dashboard tbody td {
            white-space: initial;
        }
    </style>
@endsection

@section('content')
    @if ($clients->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_3.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>Administra y conoce a tus clientes</h4>
            <p class="mb-4">En esta sección puedes administrar la información de tus clientes que llenarón el formulario
                de contacto en tu página.</p>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12 col-xl-12 mg-t-10">
                <div class="card mg-b-10">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-dashboard">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="d-flex align-items-center">
                                            <span class="table-title">Usuario</span>
                                            <a class="filter-btn" href="{{ route('filter.clients', ['asc', 'name']) }}">
                                                <i class="icon ion-md-arrow-up"></i></a>
                                            <a class="filter-btn" href="{{ route('filter.clients', ['desc', 'name']) }}">
                                                <i class="icon ion-md-arrow-down"></i></a>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center">
                                            <span class="table-title">Empresa</span>
                                            <a class="filter-btn" href="{{ route('filter.clients', ['asc', 'name']) }}">
                                                <i class="icon ion-md-arrow-up"></i></a>
                                            <a class="filter-btn" href="{{ route('filter.clients', ['desc', 'name']) }}">
                                                <i class="icon ion-md-arrow-down"></i></a>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center">
                                            <span class="table-title">Fecha Registro</span>
                                            <a class="filter-btn"
                                                href="{{ route('filter.clients', ['asc', 'created_at']) }}">
                                                <i class="icon ion-md-arrow-up"></i></a>
                                            <a class="filter-btn"
                                                href="{{ route('filter.clients', ['desc', 'created_at']) }}">
                                                <i class="icon ion-md-arrow-down"></i></a>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center">
                                            <span class="table-title">Email</span>
                                            <a class="filter-btn" href="{{ route('filter.clients', ['asc', 'email']) }}">
                                                <i class="icon ion-md-arrow-up"></i></a>
                                            <a class="filter-btn" href="{{ route('filter.clients', ['desc', 'email']) }}">
                                                <i class="icon ion-md-arrow-down"></i></a>
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td><a href="{{ route('clients.show', $client->id) }}">{{ $client->name }}</a>
                                        </td>
                                        <td>{{ $client->company }}</td>
                                        <td>
                                            <span class="text-muted"><i class="far fa-clock"></i>
                                                {{ Carbon\Carbon::parse($client->created_at)->format('d M Y - H:i') }}</span>
                                        </td>
                                        <td>{{ $client->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex align-items-center justify-content-center">
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
