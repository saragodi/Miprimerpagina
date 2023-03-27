<div class="col-md-12 setttin-h">
    <div class="row">
        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center mb-4">
            <div class="mb-4">
                <div
                    class="d-flex position-relative justify-content-center align-items-center bg-primary rounded-circle overflow-hidden edit-pic mb-3">
                    <img src="{{ asset('back/img/users/' . Auth::user()->profile_pic) }}" alt="profile">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#updatePicModal"
                        class="position-absolute bottom-0 bg-grey text-white w-100 text-center h-20 pt-1"
                        style="opacity: .7; border:none; z-index:5;" href="">Editar</button>
                </div>
                <div class="d-block d-md-none text-center">
                    <h4>{{ Auth::user()->name }}</h4>
                    <p class="text-muted">{{ Auth::user()->getRoleNames() }}</p>
                </div>
            </div>

            <div class="btn-group w-100 p-1 s-b-group" role="group">
                <a href="{{ route('admin.settings') }}"
                    class="btn {{ active_class(['panel/configuracion']) }}">Configuración</a>
                <a href="{{ route('admin.users') }}"
                    class="btn {{ active_class(['panel/configuracion/usuarios_y_permisos']) }}">Usuarios</a>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
{{-- 
<div class="modal fade" id="updateLogoModal" tabindex="-1" aria-labelledby="updatePicModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('profile.image.update', Auth::user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <label for="">Seleccionar foto</label>
                    <input type="file" name="profile_pic" class="form-control">
                    <small>* Formatos aceptados: .jpg, .jpeg, .png</small>
                    <small>* Máximo peso: 1MB</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
 --}}
