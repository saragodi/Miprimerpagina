@extends('layout.master')

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="archive"></i>
            </div>
            <h4>Empresas</h4>

        </div>
    </div>
@endsection


@section('content')
    @if ($companies->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_7.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>¡No hay empresas guardadas en la base de datos!</h4>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Mensaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td> {{ $banner->email }}</td>
                                        <td>{{ $banner->phone }}</td>

                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('banners.show', $banner->id) }}"
                                                class="btn btn-link text-dark px-1 py-0" data-toggle="tooltip"
                                                data-original-title="Ver Detalle">
                                                <i class="link-icon" data-feather="eye"></i>
                                            </a>

                                            <form method="POST" action="{{ route('banners.destroy', $banner->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-link text-danger px-1 py-0"
                                                    data-toggle="tooltip" data-original-title="Eliminar Banner">
                                                    <i class="link-icon" data-feather="trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-items-center">
            <div class="col text-center">
                {{ $companies->links() }}
            </div>
        </div>
    @endif
@endsection
