<div class="footer">
    <div class="two-col-footer">
        <div class="footer-row">
            <div class="footer-logo"><img src="{{ asset('img/logo/derch-w.png') }}" loading="lazy" width="75"
                    alt="" class="logo is--footer"></div>
            <div class="footer-links">
                <a href="{{ route('index') }}" class="nav-link">Inicio</a>
                <a href="{{ route('jobs.all') }}" class="nav-link">Vacantes</a>
                <a href="{{ route('legal.text') }}" class="nav-link">Políticas de Privacidad</a>
            </div>
        </div>
        <div class="footer-row">
            <img src="{{ asset('img/marca_gto.png') }}" height="100px" width="auto" class="my-4 my-md-0"
                alt="">

            <div class="ms-0 ms-md-5 mt-4 mt-md-0">
                <div class="text-center text-md-start">
                    <h6>Teléfono:</h6>
                    <a href="" class="btn btn-link text-white">477 9801552</a>
                </div>
                <div class="text-center text-md-start">
                    <h6>Correo:</h6>
                    <a href="mailto:contacto@derch.com.mx" class="btn btn-link text-white">contacto@derch.com.mx</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-md-row flex-column justify-content-between align-items-center">
        <div class="text-block">©Copyright <span id="year"></span> Todos los derechos reservados. </div>

        <div class="d-flex align-items-center">
            <a href="https://www.facebook.com/Reclutamiento.DERCH/" class="mx-3 text-white footer-links">
                <ion-icon style="font-size: 30px" name="logo-facebook"></ion-icon>
            </a>
            <a href="https://instagram.com/derch_reclutamientoch?igshid=YmMyMTA2M2Y="
                class="mx-3 text-white footer-links">
                <ion-icon style="font-size: 30px" name="logo-instagram"></ion-icon>
            </a>
            <a href="https://www.linkedin.com/company/derch-reclutamiento-y-capital-humano/"
                class="mx-3 text-white footer-links">
                <ion-icon style="font-size: 30px" name="logo-linkedin"></ion-icon>
            </a>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
@endpush
