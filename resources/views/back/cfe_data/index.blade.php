@extends('layout.master')

@push('plugin-styles')
    <!-- Plugin css import here -->
@endpush

@section('title')
    <div class="title-content justify-content-between">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="zap"></i>
            </div>
            <h4>Datos CFE</h4>
        </div>
        @if (Auth::user()->hasRole(['webmaster', 'admin']))
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-toggle="modal" data-target="#add">
                <i class="btn-icon-prepend me-2" data-feather="plus"></i>
                Agregar División Tarifaria
            </button>
        @endif
    </div>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div
                    class="card-body d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                        <input class="form-control" id="myInput" type="text" placeholder="Buscar por nombre..."
                            onkeypress="if (event.keyCode == 13) {return false;}">
                    </div>

                    <div class="b-div m-2">
                        <a href="{{ route('cfe_data.export.all') }}"
                            class="btn btn-outline-secondary btn-icon-text mb-2 me-3 mb-md-0">
                            <i class="btn-icon-prepend me-2" data-feather="download"></i> Exportar todas las Tarifas
                        </a>
                        @if (Auth::user()->hasRole(['webmaster', 'admin']))
                            <button type="button" data-toggle="modal" data-target="#importarTarifa"
                                class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0"><i class="btn-icon-prepend me-2"
                                    data-feather="upload"></i> Importar Tarifas</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="cards">
        @foreach ($rate_divisions as $rate)
            <div class="col-md-6 mb-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">COSTO TDE ENERGÍA {{ $rate->name }}</h6>

                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('datos_cfe.show', $rate->id) }}"><i
                                            class="small-icon" data-feather="eye"></i> Ver Detalle</a>
                                    @if (Auth::user()->hasRole(['webmaster', 'admin']))
                                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                            data-target="#edit{{ $rate->id }}"><i class="small-icon"
                                                data-feather="edit"></i> Editar División Tarifaria</a>
                                        <form action="{{ route('division-tarifaria.destroy', $rate->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="dropdown-item">
                                                <i class="small-icon" data-feather="trash"></i>Eliminar Divión Tarifaria
                                            </button>
                                        </form>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                            data-target="#nuevaTarifaModal_{{ $rate->id }}"><i class="small-icon"
                                                data-feather="edit"></i> Definir Tarifa Manualmente</a>
                                        <button class="dropdown-item" type="button" data-toggle="modal"
                                            data-target="#importarTarifa"><i class="small-icon"
                                                data-feather="file-plus"></i> Importar Datos de Excel</button>
                                    @endif
                                    @if ($rate->cfe_data->count() == 0)
                                        <a class="dropdown-item disabled"><i class="small-icon" data-feather="download"></i>
                                            Exportar Datos de Excel</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('cfe_data.export', $rate->id) }}"><i
                                                class="small-icon" data-feather="download"></i> Exportar Datos de Excel</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 mt-4">
                            @if ($rate->cfe_data->count() == 0)
                                <div class="text-center">
                                    <img src="{{ asset('img/icons/no_data.svg') }}" class="mr-auto ml-auto mb-4"
                                        width="150px">
                                    <p class="w-75 text-center ml-auto mr-auto mb-3">No se ha definido la evolución de costo
                                        tarifario para esta división. Importa la información directamente desde un Excel o
                                        agrégala manualmente.</p>
                                    <button type="button" data-toggle="modal" data-target="#importarTarifa"
                                        class="btn btn-link btn-block">Comienza aquí</button>
                                </div>
                            @else
                                <p class="mb-3">Precio Promedio CFE <br> <span class="badge badge-success">Últimos 12
                                        Meses ({{ Carbon\Carbon::now()->format('M Y') }} /
                                        {{ Carbon\Carbon::now()->subMonths(12)->format('M Y') }} )</span></p>

                                @php
                                    $base_price_median = App\Models\CFEData::where('rate_division_id', $rate->id)
                                        ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                                        ->where(
                                            'month',
                                            '>=',
                                            Carbon\Carbon::now()
                                                ->subMonths(12)
                                                ->format('Y-m-d'),
                                        )
                                        ->avg('base_price');
                                    
                                    $intermediate_price_median = App\Models\CFEData::where('rate_division_id', $rate->id)
                                        ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                                        ->where(
                                            'month',
                                            '>=',
                                            Carbon\Carbon::now()
                                                ->subMonths(12)
                                                ->format('Y-m-d'),
                                        )
                                        ->avg('intermediate_price');
                                    
                                    $peak_price_median = App\Models\CFEData::where('rate_division_id', $rate->id)
                                        ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                                        ->where(
                                            'month',
                                            '>=',
                                            Carbon\Carbon::now()
                                                ->subMonths(12)
                                                ->format('Y-m-d'),
                                        )
                                        ->avg('peak_price');
                                    
                                    $capacity_median = App\Models\CFEData::where('rate_division_id', $rate->id)
                                        ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                                        ->where(
                                            'month',
                                            '>=',
                                            Carbon\Carbon::now()
                                                ->subMonths(12)
                                                ->format('Y-m-d'),
                                        )
                                        ->avg('capacity');
                                    
                                    $distribution_median = App\Models\CFEData::where('rate_division_id', $rate->id)
                                        ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                                        ->where(
                                            'month',
                                            '>=',
                                            Carbon\Carbon::now()
                                                ->subMonths(12)
                                                ->format('Y-m-d'),
                                        )
                                        ->avg('distribution');
                                    
                                    $fixed_price_median = App\Models\CFEData::where('rate_division_id', $rate->id)
                                        ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                                        ->where(
                                            'month',
                                            '>=',
                                            Carbon\Carbon::now()
                                                ->subMonths(12)
                                                ->format('Y-m-d'),
                                        )
                                        ->avg('fixed_price');
                                @endphp

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Base</th>
                                                <th>Intermedio</th>
                                                <th>Punta</th>
                                                <th>Capacidad</th>
                                                <th>Distribución</th>
                                                <th>Fijo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>$ {{ number_format($base_price_median, 2) }}</td>
                                                <td>$ {{ number_format($intermediate_price_median, 2) }}</td>
                                                <td>$ {{ number_format($peak_price_median, 2) }}</td>
                                                <td>$ {{ number_format($capacity_median, 2) }}</td>
                                                <td>$ {{ number_format($distribution_median, 2) }}</td>
                                                <td>$ {{ number_format($fixed_price_median, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div id="lineChart_{{ $rate->id }}" class="mt-4"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Importación -->
            <div class="modal fade" id="importarTarifa" tabindex="-1" role="dialog" aria-labelledby="importarModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importarModal"><i data-feather="file-text"></i> Importar
                                Documento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('cfe_data.import') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Selecciona tu Archivo</label>
                                    <input class="form-control" type="file" name="import_file" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Procesar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="nuevaTarifaModal_{{ $rate->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Definir Nueva Tarifa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form id="nuevoClienteForm" method="POST" action="{{ route('datos_cfe.store') }}">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Vinculado a División: {{ $rate->name }}</h5>
                                        <input type="hidden" name="rate_division_id" value="{{ $rate->id }}">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label>Fecha <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="month" required="">
                                        <small>En en listado general solo será visible el mes y el año.</small>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>Precio Base <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" name="base_price" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>Precio Intermedio <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" name="intermediate_price"
                                                required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>Precio Punta <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" name="peak_price" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>Capacidad <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" name="capacity" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>Distribución <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" name="distribution"
                                                required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>Precio Fijo <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" name="fixed_price"
                                                required="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Datos</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit División Modal-->
            <div class="modal fade" id="edit{{ $rate->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <!-- Title -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar División Tarifaria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Form -->
                        <div class="modal-body">
                            <form class="cmxform" method="POST"
                                action="{{ route('division-tarifaria.update', $rate->id) }}">
                                @csrf
                                @method('put')
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name">Nombre <span class="text-danger">*</span></label>
                                        <input id="name" class="form-control" name="name" type="text"
                                            required value="{{ $rate->name }}">
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Actualizar">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Add División-->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addDivision"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Title -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addDivision">Agregar División Tarifaria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <div class="modal-body">
                    <form class="cmxform" method="POST" action="{{ route('division-tarifaria.store') }}">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input id="name" class="form-control" name="name" type="text" required>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Agregar">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush
