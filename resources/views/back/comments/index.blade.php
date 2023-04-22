@extends('layout.master')

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="message-circle"></i>
            </div>
            <h4>Reseñas</h4>

            <button type="button" class="btn btn-outline-dark ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear
                nueva</button>
        </div>
    </div>
@endsection


@section('content')
    @if ($comments->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_7.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>¡No hay reseñas guardadas en la base de datos!</h4>
            <p class="mb-4">Empieza a cargar reseñas en tu plataforma usando el botón inferior.</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-uppercase wd-200 ml-auto mr-auto" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Crear nueva
                reseña
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
                                    <th>Nombre completo</th>
                                    <th>Reseña</th>
                                    <th>Empresa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ $comment->company }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#modalEdit{{ $comment->id }}"
                                                    class="btn btn-outline-primary btn-sm btn-icon ps-1"
                                                    data-toggle="tooltip" data-original-title="Editar">
                                                    <i data-feather="edit" class="icon-lg"></i>
                                                </a>


                                                <form method="post" action="{{ route('comments.destroy', $comment->id) }}"
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

                                    <div id="modalEdit{{ $comment->id }}" class="modal fade">
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

                                                <form method="POST" action="{{ route('comments.update', $comment->id) }}"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <div class="modal-body pd-25">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Nombre:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $comment->name }}"
                                                                        required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Compañía </label>
                                                                    <input type="text" value="{{ $comment->company }}"
                                                                        name="company" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Descripción</label>
                                                                    <textarea class="form-control" name="comment" required rows="3">{{ $comment->comment }}</textarea>
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
                {{ $comments->links() }}
            </div>
        </div>
    @endif



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Reseña</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('comments.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre completo <span style="color: red">*</span></label>
                                    <input type="text" name="name" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Empresa</label>
                                    <input type="text" name="company" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Descripción <span style="color: red">*</span></label>
                                    <textarea class="form-control" name="comment" rows="3" required></textarea>
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
