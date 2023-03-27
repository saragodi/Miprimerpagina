@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endpush

@section('title')
    <div class="title-content justify-content-between">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="zap"></i>
            </div>
            <h4>Costo TDE Energía {{ $rate->name }}</h4>
        </div>
        <a href="{{ route('datos_cfe.index') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend me-2" data-feather="arrow-left"></i>
            Volver
        </a>
    </div>
@endsection

@section('content')
    <div class="row pt-3">

        @if ($rate->cfe_data->count() == 0)
        @else
            <div class="col-md-12 mb-3">
                <div class="card card-body mb-3">
                    <h5 class="mb-4">Precio Promedio CFE <br> <span class="badge badge-success mt-1">Últimos 12 Meses
                            ({{ Carbon\Carbon::now()->format('M Y') }} /
                            {{ Carbon\Carbon::now()->subMonths(12)->format('M Y') }} )</span></h5>

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
                </div>
            </div>
        @endif

        <div class="col-md-6 mb-4">
            <div class="card card-body">
                @if ($rate->cfe_data->count() == 0)
                    <div class="text-center">
                        <img src="{{ asset('img/icons/no_data.svg') }}" class="mr-auto ml-auto mb-4" width="150px">
                        <p class="w-75 text-center ml-auto mr-auto mb-3">No se ha definido la evolución de costo tarifario
                            para esta división. Importa la información directamente desde un Excel o agrégala manualmente.
                        </p>
                        @if (Auth::user()->hasRole(['webmaster', 'admin']))
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"
                                class="btn btn-link btn-block">Comienza aquí</a>
                        @endif
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i data-feather="file-text"></i> Importar
                                        Documento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('cfe_data.import.show') }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Selecciona tu Archivo</label>
                                            <input class="form-control" type="file" name="import_file" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Procesar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-between align-items-baseline mb-5 mb-md-3">
                        <h5 class="mb-0">Tarifas CFE</h5>

                        <div class="d-flex align-items-center">
                            @if (Auth::user()->hasRole(['webmaster', 'admin']))
                                <a class="btn btn-sm btn-outline-primary mr-3" href="javascript:void(0)" data-toggle="modal"
                                    data-target="#nuevaTarifaModal"><i class="small-icon" data-feather="edit"></i> Definir
                                    Tarífa Manualmente</a>
                                <a class="btn btn-sm btn-outline-info" href="javascript:void(0)" data-toggle="modal"
                                    data-target="#importarTarifa"><i class="small-icon" data-feather="file-plus"></i>
                                    Importar
                                    Datos de Excel</a>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table table-hover" id="data_table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Base</th>
                                    <th>Intermedio</th>
                                    <th>Punta</th>
                                    <th>Capacidad</th>
                                    <th>Distribución</th>
                                    <th>Fijo</th>
                                    @if (Auth::user()->hasRole(['webmaster', 'admin']))
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cfe_datas as $data)
                                    <tr>
                                        <td class="text-muted"><i class="small-icon" data-feather="calendar"></i>
                                            {{ Carbon\Carbon::parse($data->month)->format('M Y') }}</td>
                                        <td>$ {{ number_format($data->base_price, 2) }}</td>
                                        <td>$ {{ number_format($data->intermediate_price, 2) }}</td>
                                        <td>$ {{ number_format($data->peak_price, 2) }}</td>
                                        <td>$ {{ number_format($data->capacity, 2) }}</td>
                                        <td>$ {{ number_format($data->distribution, 2) }}</td>
                                        <td>$ {{ number_format($data->fixed_price, 2) }}</td>
                                        @if (Auth::user()->hasRole(['webmaster', 'admin']))
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                        type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="small-icon" data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#editarTarifaModal_{{ $data->id }}"><i
                                                                class="small-icon" data-feather="eye"></i> Editar</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form method="POST"
                                                            action="{{ route('datos_cfe.destroy', $data->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="dropdown-item" type="submit"><i
                                                                    class="small-icon" data-feather="edit"></i>
                                                                Borrar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editarTarifaModal_{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar Tarifa</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form method="POST" action="{{ route('datos_cfe.update', $data->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <label>Fecha <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="month"
                                                                    value="{{ $data->month }}" readonly="">
                                                                <small>En en listado general solo será visible el mes y el
                                                                    año.</small>
                                                            </div>

                                                            <div class="col-md-4 form-group">
                                                                <label>Precio Base <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="base_price" required=""
                                                                        value="{{ $data->base_price }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 form-group">
                                                                <label>Precio Intermedio <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="intermediate_price" required=""
                                                                        value="{{ $data->intermediate_price }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 form-group">
                                                                <label>Precio Punta <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="peak_price" required=""
                                                                        value="{{ $data->peak_price }}">
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
                                                                    <input type="text" class="form-control"
                                                                        name="capacity" required=""
                                                                        value="{{ $data->capacity }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 form-group">
                                                                <label>Distribución <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="distribution" required=""
                                                                        value="{{ $data->distribution }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 form-group">
                                                                <label>Precio Fijo <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="fixed_price" required=""
                                                                        value="{{ $data->peak_price }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar
                                                            Datos</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-center mt-4">
                            {{ $cfe_datas->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-5 mb-md-3">
                    <h5 class="mb-0">Tarifas de Distribución</h5>

                    <div class="d-flex align-items-center">
                        @if (Auth::user()->hasRole(['webmaster', 'admin']))
                            <a class="btn btn-sm btn-outline-primary mr-3" href="javascript:void(0)" data-toggle="modal"
                                data-target="#nuevoFeeModal"><i class="small-icon me-2" data-feather="edit"></i> Nueva
                                Tarifa</a>
                        @endif
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-hover" id="fee_table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Precio</th>
                                @if (Auth::user()->hasRole(['webmaster', 'admin']))
                                    <th>Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fees as $fee)
                                <tr>
                                    <td class="text-muted"><i class="small-icon" data-feather="calendar"></i>
                                        {{ Carbon\Carbon::parse($fee->date)->format('M Y') }}</td>
                                    <td>$ {{ number_format($fee->price, 2) }}</td>
                                    @if (Auth::user()->hasRole(['webmaster', 'admin']))
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="small-icon" data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                        data-toggle="modal"
                                                        data-target="#editarFeeModal_{{ $fee->id }}"><i
                                                            class="small-icon" data-feather="edit"></i> Editar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <form method="POST"
                                                        action="{{ route('tarifas-distribucion.destroy', $fee->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="dropdown-item" type="submit"><i
                                                                class="small-icon" data-feather="trash"></i>
                                                            Borrar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="editarFeeModal_{{ $fee->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="feeEditModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="feeEditModalLabel">Editar Tarifa de
                                                        Distribución</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form method="POST"
                                                    action="{{ route('tarifas-distribucion.update', $fee->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="mb-3">Vinculado a División:
                                                                    {{ $rate->name }}</h5>
                                                                <input type="hidden" name="rate_division_id"
                                                                    value="{{ $rate->id }}">
                                                            </div>

                                                            <div class="col-md-6 form-group">
                                                                <label>Fecha <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="date"
                                                                    value="{{ $fee->date }}" required="">
                                                                <small>En en listado general solo será visible el mes y el
                                                                    año.</small>
                                                            </div>

                                                            <div class="col-md-6 form-group">
                                                                <label>Precio <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="price" value="{{ $fee->price }}"
                                                                        required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar
                                                            Datos</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="nuevaTarifaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                                    <input type="text" class="form-control" name="intermediate_price" required="">
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
                                    <input type="text" class="form-control" name="distribution" required="">
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Precio Fijo <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" name="fixed_price" required="">
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


    <!-- Modal -->
    <div class="modal fade" id="nuevoFeeModal" tabindex="-1" role="dialog" aria-labelledby="feeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feeModalLabel">Definir Nueva Tarifa de Distribución</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('tarifas-distribucion.store') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="mb-3">Vinculado a División: {{ $rate->name }}</h5>
                                <input type="hidden" name="rate_division_id" value="{{ $rate->id }}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Fecha <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date" required="">
                                <small>En en listado general solo será visible el mes y el año.</small>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Precio <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" name="price" required="">
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

    <!-- Modal Importación -->
    <div class="modal fade" id="importarTarifa" tabindex="-1" role="dialog" aria-labelledby="importarModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importarModal"><i data-feather="file-text"></i> Importar Documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('cfe_data.import.show') }}" enctype="multipart/form-data">
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

@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endpush

@push('custom-scripts')

    @if ($rate->cfe_data->count() != 0)
        @php
            $bp = App\Models\CFEData::where('rate_division_id', $rate->id)
                ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                ->where(
                    'month',
                    '>=',
                    Carbon\Carbon::now()
                        ->subMonths(12)
                        ->format('Y-m-d'),
                )
                ->orderBy('month', 'asc')
                ->pluck('base_price');
            
            $ip = App\Models\CFEData::where('rate_division_id', $rate->id)
                ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                ->where(
                    'month',
                    '>=',
                    Carbon\Carbon::now()
                        ->subMonths(12)
                        ->format('Y-m-d'),
                )
                ->orderBy('month', 'asc')
                ->pluck('intermediate_price');
            
            $pp = App\Models\CFEData::where('rate_division_id', $rate->id)
                ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                ->where(
                    'month',
                    '>=',
                    Carbon\Carbon::now()
                        ->subMonths(12)
                        ->format('Y-m-d'),
                )
                ->orderBy('month', 'asc')
                ->pluck('peak_price');
            
            $dt = App\Models\CFEData::where('rate_division_id', $rate->id)
                ->where('month', '<=', Carbon\Carbon::now()->format('Y-m-d'))
                ->where(
                    'month',
                    '>=',
                    Carbon\Carbon::now()
                        ->subMonths(12)
                        ->format('Y-m-d'),
                )
                ->orderBy('month', 'asc')
                ->pluck('month');
            
            $base_prices = str_replace('"', '', $bp);
            $intermediate_prices = str_replace('"', '', $ip);
            $peak_prices = str_replace('"', '', $pp);
            
            $dates = str_replace('"', '', $dt);
        @endphp

        <script type="text/javascript">
            var options = {
                chart: {
                    height: 200,
                    type: "line",
                    parentHeightOffset: 0
                },
                colors: ["#6EEB83", "#F7E733", "#D90368"],
                grid: {
                    borderColor: "rgba(77, 138, 240, .1)",
                },
                series: [{
                        name: "Base",
                        data: {{ $base_prices }}
                    },
                    {
                        name: "Intermedio",
                        data: {{ $intermediate_prices }}
                    },
                    {
                        name: "Punta",
                        data: {{ $peak_prices }}
                    }
                ],
                xaxis: {
                    type: "datetime",
                    categories: {{ $dates }},
                    labels: {
                        show: true,
                        format: 'Y-m-d',
                    }
                },
                markers: {
                    size: 0
                },
                stroke: {
                    width: 3,
                    curve: "smooth",
                    lineCap: "round"
                },
                legend: {
                    show: true,
                    position: "top",
                    horizontalAlign: 'left',
                    containerMargin: {
                        top: 30
                    }
                },
                responsive: [{
                    breakpoint: 500,
                    options: {
                        legend: {
                            fontSize: "11px"
                        }
                    }
                }]
            };

            var apexLineChart = new ApexCharts(document.querySelector("#lineChart_{{ $rate->id }}"), options);
            apexLineChart.render();
        </script>
    @endif
@endpush
