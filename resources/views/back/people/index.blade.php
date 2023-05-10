@extends('layout.master')

@section('title')
    <div class="title-content justify-content-between px-0" style="border-top: none">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="archive"></i>
            </div>
            <h4>Aplicantes</h4>

        </div>
    </div>
@endsection


@section('content')
    @if ($people->count() == 0)
        <div class="card card-body text-center" style="padding:80px 0px 100px 0px;">
            <img src="{{ asset('assets/img/group_7.svg') }}" class="wd-20p ml-auto mr-auto mb-5">
            <h4>¡No hay aplicantes guardados en la base de datos!</h4>
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
                                    <th>CV</th>
                                    <th>Mensaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($people as $person)
                                    <tr>
                                        <td>{{ $person->name }} {{ $person->lastnames }}</td>
                                        <td> {{ $person->email }}</td>
                                        <td>{{ $person->phone }}</td>
                                        <td>
                                            <div class="item">
                                                <div class="card file-card">


                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="pdf-color">
                                                                <div class="file-icon">
                                                                    <i class="link-icon" data-feather="file-text"></i>
                                                                    <span class="filename">{{ $person->file }}
                                                                    </span>

                                                                </div>
                                                            </div>
                                                            <div class="card-options dropdown">
                                                                <a href="{{ asset('docs/applicants/' . $person->file) }}"
                                                                    target="_blank" class="icon" aria-expanded="false"><i
                                                                        class="link-icon" data-feather="download"></i></a>
                                                            </div>
                                                        </div>


                                                        <p><a target="_blank"
                                                                href="{{ asset('docs/applicants/' . $person->file) }}">{{ $person->name }}</a>
                                                        </p>
                                                        <hr>
                                                        <small class="upload-time">Subido:
                                                            {{ $person->updated_at }}</small>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>{{ $person->message }}</td>
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
                {{ $people->links() }}
            </div>
        </div>
    @endif
@endsection
