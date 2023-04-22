@extends('layout.master')

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="key"></i>
            </div>
            <h4>Campañas</h4>
            <button type="button" class="btn btn-outline-dark ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear
                nueva</button>
        </div>
    </div>
@endsection


@section('content')
    @if ($campaings->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_7.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>¡No hay campañas guardadas en la base de datos!</h4>
            <p class="mb-4">Empieza a cargar campañas en tu plataforma usando el botón inferior.</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-uppercase wd-200 ml-auto mr-auto" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Crear nueva
                campaña
            </button>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-10 card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Información</th>
                                    <th>Link</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaings as $campaing)
                                    <tr>
                                        <td style="width: 150px;">
                                            <img style="width: 100%; height:auto; border-radius:0;"
                                                src="{{ asset('img/campaings/' . $campaing->image) }}"
                                                alt="{{ $campaing->name }}">
                                        </td>
                                        <td>{{ $campaing->name }}</td>
                                        <td>{{ $campaing->description }}</td>
                                        <td>{{ $campaing->link }}</td>
                                        <td>

                                            @if ($campaing->status == true)
                                                <div class="dropdown">
                                                    <button class="btn btn-success " type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Publicado
                                                        <ion-icon class="pb-2 ms-2" name="chevron-down-outline"></ion-icon>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('campaing.status', $campaing->id) }}">Borrador</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @else
                                                <div class="dropdown">
                                                    <button class="btn btn-danger " type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Borrador
                                                        <ion-icon class="pb-2 ms-2" name="chevron-down-outline"></ion-icon>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('campaing.status', $campaing->id) }}">Publicar</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#modalEdit{{ $campaing->id }}"
                                                    class="btn btn-outline-primary btn-sm btn-icon ps-1"
                                                    data-toggle="tooltip" data-original-title="Editar">
                                                    <i data-feather="edit" class="icon-lg"></i>
                                                </a>


                                                <form method="post"
                                                    action="{{ route('campaings.destroy', $campaing->id) }}"
                                                    style="display: inline-block;">
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-sm btn-icon ps-1"
                                                        data-toggle="tooltip" data-original-title="Borrar"
                                                        style="border-top-left-radius: 0 !important; border-bottom-left-radius: 0 !important;">
                                                        <i data-feather="trash" class="icon-lg"></i>
                                                    </button>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>

                                            </div>
                                        </td>
                                    </tr>

                                    <div id="modalEdit{{ $campaing->id }}" class="modal fade">
                                        <div class="modal-dialog modal-dialog-vertical-center" role="document">
                                            <div class="modal-content bd-0 tx-14">
                                                <div class="modal-header">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Editar Campaña
                                                    </h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form method="POST"
                                                    action="{{ route('campaings.update', $campaing->id) }}"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <div class="modal-body pd-25">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Nombre:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $campaing->name }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Link </label>
                                                                    <input type="text" value="{{ $campaing->link }}"
                                                                        name="email" class="form-control" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button id="submitModal" type="submit"
                                                            class="btn btn-primary">Guardar Información</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- modal-dialog -->
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-items-center">
            <div class="col text-center">
                {{ $campaings->links() }}
            </div>
        </div>
    @endif



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Campaña</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('campaings.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre de campaña <span style="color: red">*</span></label>
                                    <input type="text" name="name" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" name="link" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Descripción</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Imagen</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
