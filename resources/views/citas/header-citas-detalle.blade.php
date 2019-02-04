<header class="mdc-top-app-bar top-bar-detalle" style="
position: relative;
max-height: 56px;
z-index: 10;
border-top-color: white;
border-top-style: solid;
border-top-width: 1px;
background-color: rgb(167, 165, 165)!important ;
">
<div class="mdc-top-app-bar__row" style="height: 56px !important;">
    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        <span class="mdc-list-item__graphic material-icons" aria-hidden="true">account_circle</span>
        <img class="barra-avatar" src="https://lh3.googleusercontent.com/-vw0KVKA4FHI/AAAAAAAAAAI/AAAAAAAAAAA/ACevoQMnk5JBHDZfHX3DMO0fv-mO7UFqCg/s100-c-mo/photo.jpg"
            height="40" width="40">
        <span class="mdc-top-app-bar__title" style="font-size: 1em;">
            Amanda Linares Rodriguez
            <p style="margin: 0px;font-size: 0.7em;margin-top: -13px;">
                DNI: 89674598 - Historia: 00034553</p>
        </span>
    </section>
    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
        <a href="#" class="material-icons mdc-top-app-bar__action-item boton-opciones-detalle-cita"
            aria-label="Download" alt="Download">more_vert</a>
        <div id="toolbar" class="toolbar mdc-menu-surface--anchor ">
            <div class="mdc-menu menu-opciones-detalle-cita mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                    @auth

                    <li class="mdc-list-item" role="menuitem" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <span class="mdc-list-item__text">Datos Paciente</span>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <li class="mdc-list-item" role="menuitem" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <span class="mdc-list-item__text">Eliminar Cita</span>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endauth
                </ul>
            </div>
        </div>
    </section>
</div>
</header>