<div class="panel-pacientes-contenido panel-pacientes-ocultar">
    <div class="panel-pacientes " style="overflow-y: scroll;padding-left: 0px; padding-right: 0px; ">

        <ul class="mdc-list demo-list mdc-list--two-line mdc-list--avatar-list">
            @for ($i = 0; $i < 20; $i++) 
                @include('citas.paciente-item') 
            @endfor 
            <li style="height: 70px;"></li>
        </ul>

    </div>
    <button class="mdc-fab  mdc-ripple-upgraded boton-pacientes" aria-label="Agregar">
        <span class="mdc-fab__icon material-icons">add</span>
    </button>
</div>