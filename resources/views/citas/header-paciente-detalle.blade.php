<header class="mdc-top-app-bar top-bar-detalle-paciente" style="
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
       
        <span class="mdc-top-app-bar__title">
            Nuevo Paciente - Editar Paciente
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
                        <span class="mdc-list-item__text">Eliminar Paciente</span>
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