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
            <h4>Vacante: {{ $job->name }}</h4>
        </div>
    </div>
@endsection

@section('content')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb ps-0">
            <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Vacantes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vacante: {{ $job->name }}</li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-md-8">
            <div class="card card-body">
                <div class="card-title">
                    Aplicantes
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>CV</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($job->applicants as $applicant)
                                <tr>
                                    <td>{{ $applicant->names }} {{ $applicant->lastnames }}</td>
                                    <td>
                                        <a href="">
                                            {{ $applicant->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            {{ $applicant->phone }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="item">
                                            <div class="card file-card">


                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="pdf-color">
                                                            <div class="file-icon">
                                                                <i class="link-icon" data-feather="file-text"></i>
                                                                <span class="filename">{{ $applicant->file }}
                                                                </span>

                                                            </div>
                                                        </div>
                                                        <div class="card-options dropdown">
                                                            <a href="{{ asset('docs/applicants/' . $applicant->file) }}"
                                                                target="_blank" class="icon" aria-expanded="false"><i
                                                                    class="link-icon" data-feather="download"></i></a>
                                                        </div>
                                                    </div>


                                                    <p><a target="_blank"
                                                            href="{{ asset('img/clients/files/' . $applicant->file) }}">{{ $applicant->name }}</a>
                                                    </p>
                                                    <hr>
                                                    <small class="upload-time">Subido: {{ $applicant->updated_at }}</small>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-3">{{ $job->name }}</h2>

                    <a class="btn btn-link" href="{{ route('jobs.index') }}">Regresar </a>
                </div>

                <div class="d-flex mb-4">
                    <p class="me-2 mb-0">{{ $job->company }}</p> <span class="pt-1">•</span>
                    <p class="ms-2 mb-0">{{ $job->location }},
                        {{ $job->state }}
                    </p>
                </div>

                <div>
                    @if (!empty($job->type))
                        <div class="d-flex mb-3">
                            <ion-icon class="pt-1" name="briefcase-outline"></ion-icon>
                            <p class="mb-0 ms-2">Tipo: {{ $job->type }}</p>
                        </div>
                    @endif
                    @if (!empty($job->modality))
                        <div class="d-flex mb-3">
                            <ion-icon class="pt-1" name="rocket-outline"></ion-icon>
                            <p class="mb-0 ms-2">Modalidad: {{ $job->modality }}</p>
                        </div>
                    @endif
                    @if (!empty($job->experience))
                        <div class="d-flex mb-3">
                            <ion-icon class="pt-1" name="analytics-outline"></ion-icon>
                            <p class="mb-0 ms-2">Experiencia: {{ $job->experience }}</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
