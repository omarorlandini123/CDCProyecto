<div class="panel-citas-contenido">
    <div class="panel-citas " style="overflow-y: scroll;padding-left: 0px; padding-right: 0px; ">
            
        <div class="mdc-list-group" style="">
            <h3 class="mdc-list-group__subheader cita-grupo"><strong> Reserva</strong></h3>
            <ul class="mdc-list demo-list mdc-list--two-line mdc-list--avatar-list">
                @for ($i = 0; $i < 5; $i++)
                    @include('citas.cita-item')
                @endfor
                
            </ul>

            <h3 class="mdc-list-group__subheader cita-grupo"><strong> Confirmados</strong></h3>
            <ul class="mdc-list demo-list mdc-list--two-line mdc-list--avatar-list">
                @include('citas.cita-item')
                <li style="height: 70px;"></li>

            </ul>
            
        </div>
    </div>
    <button class="mdc-fab  mdc-ripple-upgraded boton-citas" aria-label="Agregar">
        <span class="mdc-fab__icon material-icons">add</span>
    </button>
</div>
