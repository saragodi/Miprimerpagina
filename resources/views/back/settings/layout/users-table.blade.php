<div class="col-lg-12 col-xl-12 mg-t-10 d-block d-md-none">
    <div class="card mg-b-10">

        <div class="table-responsive">
            <table class="table table-dashboard">
                <thead>
                    <tr>
                        <th scope="col">(#) Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Actualizado</th>
                        @if($users->count() > 1)
                            <th scope="col">Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">#{{ $user->id }}</th>
                        <td>
                            @if( $user->image == NULL)
                            <img class="thumb-md rounded-circle mr-2" width="40px" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '?d=retro&s=200' }}" alt="{{ $user->name }}">
                            @else
                            <img  class="thumb-md rounded-circle mr-2" width="40px" src="{{ asset('img/users/' . $user->image ) }}" alt="{{ $user->name }}">
                            @endif
                            {{ $user->name }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->getRoleNames() }}
                        </td>
                        <td><span class="text-muted"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($user->created_at)->translatedFormat('d M Y - h:ia') }}</span></td>
                        <td><span class="text-muted"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($user->updated_at)->translatedFormat('d M Y - h:ia') }}</span></td>

                        @if($users->count() > 1)
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modalEdit{{ $user->id }}" class="btn btn-outline-primary btn-sm btn-icon" data-toggle="tooltip" data-original-title="Editar">
                                        <i data-feather="edit" class="icon-lg"></i>
                                    </a>

                                    <form method="POST" action="" style="display: inline-block;">
                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-icon" data-toggle="tooltip" data-original-title="Borrar">
                                            <i data-feather="trash" class="icon-lg"></i>
                                        </button>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>

                    <div id="modalEdit{{ $user->id }}" class="modal fade">
                        <div class="modal-dialog modal-dialog-vertical-center" role="document">
                            <div class="modal-content bd-0 tx-14">
                                <div class="modal-header">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Editar Usuario</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="PATCH" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                    <div class="modal-body pd-25">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Nombre:</label>
                                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Correo <span class="tx-danger">*</span></label>
                                                    <input type="text" value="{{$user->email}}" name="email" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Contraseña <span class="tx-danger">*</span></label>
                                                    <input type="password" id="txtNewPassword" name="password" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pwd">Confirmar Contraseña:</label>
                                                    <input type="password" id="txtConfirmPassword" class="form-control">
                                                </div>
                                            </div>
                                            <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch"></div>
                                            @push('scripts')
                                            <script>
                                                function checkPasswordMatch() {
                                                    var password = $("#txtNewPassword").val();
                                                    var confirmPassword = $("#txtConfirmPassword").val();

                                                    if (password != confirmPassword){
                                                        $("#submitModal").text("No coiciden las contraseñas");
                                                        $("#submitModal").attr("disabled", true);
                                                    }else{
                                                        $("#submitModal").text("Guardar Información");
                                                        $("#submitModal").attr("disabled", false);
                                                    }
                                                }
                                                $(document).ready(function () {
                                                $("#txtConfirmPassword").keyup(checkPasswordMatch);
                                                });
                                            </script>
                                            @endpush

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Agregar Rol</label>
                                                    <select class="form-control" name="rol" required>
                                                        <option disabled>Selecciona un Rol de Usuario</option>
                                                        @foreach($roles as $rol)
                                                            <option value="{{ $rol->name }}">
                                                                {{ $rol->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                        <button id="submitModal" type="submit" class="btn btn-primary">Guardar Información</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- modal-dialog -->
                    </div><!-- modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>