<template >
  <div class="panel-movil-contenido">
    <div class="header-movil-contenido">
      <header class="mdc-top-app-bar top-bar-movil">
        <div class="mdc-top-app-bar__row">
          <section class="seccion-inicio">
            <a
              v-if="frommovil"
              class="material-icons mdc-top-app-bar__action-item"
              aria-hidden="true"
              v-on:click="$emit('cerrarPanelDetalleMovil',true)"
              style="margin:0px;color:white;"
            >arrow_back</a>
            <span
              v-if="citasel.foto_portada==null "
              class="mdc-list-item__graphic material-icons miniatura-null"
              aria-hidden="true"
            >account_circle</span>
            <img
              v-if="citasel.foto_portada!=null"
              class="barra-avatar"
              :src="citasel.foto_portada"
              height="40"
              width="40"
            >
            <span class="mdc-top-app-bar__title" style="font-size: 1em;">
              {{
              isnuevacita?
              historianuevacita.persona.apellido_paterno + " " +
              historianuevacita.persona.apellido_materno + ", "+
              historianuevacita.persona.nombres + " "
              :
              citasel.historia.persona.apellido_paterno + " " +
              citasel.historia.persona.apellido_materno + ", "+
              citasel.historia.persona.nombres + " "}}
              <p style="margin: 0px;font-size: 0.7em;margin-top: -13px;">
                DNI: {{
                isnuevacita?
                historianuevacita.persona.dni:
                citasel.historia.persona.dni}} - Historia: {{
                isnuevacita?
                'H-'+String(historianuevacita.id).padStart(8,0) :
                'H-'+String(citasel.historia.id).padStart(8,0)
                }}
              </p>
            </span>
          </section>
          <section class="seccion-fin" role="toolbar">
            <a
              v-if="!isnuevacita"
              href="#"
              class="material-icons mdc-top-app-bar__action-item boton-opciones-detalle-cita"
              aria-label="Download"
              alt="Download"
            >more_vert</a>
            <div id="toolbar" class="toolbar mdc-menu-surface--anchor">
              <div class="mdc-menu menu-opciones-detalle-cita mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li
                    class="mdc-list-item"
                    role="menuitem"
                    v-on:click="$emit('abrirPaciente',isnuevacita?historianuevacita:citasel.historia)" 
                  >
                    <span class="mdc-list-item__text">Datos Paciente</span>
                  </li>
                  <form id="logout-form" action="#" method="POST" style="display: none;"></form>

                  <li
                    class="mdc-list-item"
                    role="menuitem"
                    v-on:click="solicitarEliminarCita"
                  >
                    <span class="mdc-list-item__text">Eliminar Cita</span>
                  </li>
                  <form id="logout-form" action="#" method="POST" style="display: none;"></form>
                </ul>
              </div>
            </div>
          </section>
        </div>
      </header>
    </div>
    <div class="panel-movil">
      <div class="panel-detalle-cita" style="position:relative;">
        <h3
          style="margin-left:25px;margin-right:25px;margin-bottom: 0px;"
        >Datos de la cita  {{isnuevacita?'nueva':'C-'+String(citasel.id).padStart(8,0)}}</h3>

        <div class="mdc-layout-grid" style="padding: 25px;position:relative;">
          <div class="mdc-layout-grid__inner">
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="mdc-select sel-medicos select-100 mdc-ripple-surface">
                <input type="hidden" name="enhanced-select">
                <i class="mdc-select__dropdown-icon"></i>
                <div class="mdc-select__selected-text">
                  {{
                  medicosel!=null && !isnuevacita?
                  medicosel.persona.apellido_paterno + " " +
                  medicosel.persona.apellido_materno + ", "+
                  medicosel.persona.nombres + " ":''
                  }}
                </div>
                <div class="mdc-select__menu mdc-menu mdc-menu-surface select-25">
                  <ul class="mdc-list">
                    <li
                      v-for="medico in medicos"
                      v-bind:key="medico.id"
                      v-bind:class="{
                        'mdc-list-item':true,
                        'mdc-list-item--selected':(isnuevacita? false: medicosel.id==medico.id),
                      }"
                      :aria-selected="(isnuevacita?false: medicosel.id==medico.id)"
                      :data-value="medico.id"
                    >
                      {{
                      medico.persona.apellido_paterno + " " +
                      medico.persona.apellido_materno + ", "+
                      medico.persona.nombres + " "
                      }}
                    </li>
                  </ul>
                </div>
                <span
                  v-bind:class="{
                        'mdc-floating-label':true,
                        'mdc-floating-label--float-above':finalizaCarga,
                      }"
                  :key="medicosel.id"
                >Médico</span>
                <div class="mdc-line-ripple"></div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="mdc-select sel-especialidad select-100 mdc-ripple-surface">
                <input type="hidden" name="enhanced-select">
                <i class="mdc-select__dropdown-icon"></i>
                <div class="mdc-select__selected-text">
                  {{
                  especialidadsel!=null && !isnuevacita?
                  especialidadsel.especialidad.nombre : ""
                  }}
                </div>
                <div class="mdc-select__menu mdc-menu mdc-menu-surface select-25">
                  <ul class="mdc-list">
                    <li
                      v-for="especialidad in especialidades"
                      v-bind:key="especialidad.id"
                      v-bind:class="{
                      'mdc-list-item':true,
                      'mdc-list-item--selected':(isnuevacita?false:especialidadsel.id==especialidad.id),
                    }"
                      :aria-selected="(isnuevacita?false:especialidadsel.id==especialidad.id)"
                      :data-value="especialidad.id"
                    >{{especialidad.especialidad.nombre}}</li>
                  </ul>
                </div>
                <span
                  v-bind:class="{
                        'mdc-floating-label':true,
                        'mdc-floating-label--float-above': especialidadsel!=null,
                      }"
                >Especialidad</span>
                <div class="mdc-line-ripple"></div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-text-field--with-leading-icon mdc-ripple-surface caja-detalle-cita"
                >
                  <i class="material-icons mdc-text-field__icon">event</i>
                  <input
                    type="date"
                    v-model="fechasel"
                    id="txt_fecha_cita"
                    class="mdc-text-field__input txt_fecha_cita"
                    v-on:input="llamarTurnos"
                  >
                  <label class="mdc-floating-label" for="txt_fecha_cita">Fecha de cita</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="mdc-select sel-horario mdc-ripple-surface select-100">
                <input type="hidden" name="enhanced-select" :value="horariosel">
                <i class="mdc-select__dropdown-icon"></i>
                <div class="mdc-select__selected-text">
                  {{
                  horariosel!=null ?
                  horariosel.desde + ' - '+horariosel.hasta:''
                  }}
                </div>
                <div class="mdc-select__menu mdc-menu mdc-menu-surface select-25">
                  <ul class="mdc-list">
                    <li
                      v-bind:class="{ 
                       'mdc-list-item': true,
                       'mdc-list-item--selected':citasel.nro_orden==horario.nro_orden && citasel.fecha_cita==horario.fecha_cita ,
                       'mdc-list-item--disabled':horario.tomado,
                      }"
                      v-for="horario in horarios"
                      v-bind:key="horario.nro_orden"
                      :aria-selected="horariosel!=null?horariosel.nro_orden==horario.nro_orden:false"
                      :data-value="horario.nro_orden"
                    >
                      {{
                      horario.desde +' - '+ horario.hasta +
                      (citasel.nro_orden==horario.nro_orden && citasel.fecha_cita==horario.fecha_cita?' (esta cita)':
                      (horario.tomado?' (tomado)':' ') )
                      }}
                    </li>
                  </ul>
                </div>
                <span
                  v-bind:class="{
                        'mdc-floating-label':true,
                        'mdc-floating-label--float-above':  horariosel!=null,
                      }"
                >Horario</span>
                <div class="mdc-line-ripple"></div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="mdc-select sel-motivo select-100 mdc-ripple-surface">
                <input type="hidden" name="enhanced-select">
                <i class="mdc-select__dropdown-icon"></i>
                <div class="mdc-select__selected-text">
                  {{
                  motivosel!=null && !isnuevacita?motivosel.nombre:''
                  }}
                </div>
                <div class="mdc-select__menu mdc-menu mdc-menu-surface select-25">
                  <ul class="mdc-list">
                    <li
                      v-for="motivo in motivos"
                      v-bind:key="motivo.id"
                      v-bind:class="{ 
                       'mdc-list-item': true,
                       'mdc-list-item--selected':(isnuevacita?false:motivosel.id==motivo.id),
                      }"
                      :aria-selected="(isnuevacita?false:motivosel.id==motivo.id)"
                      :data-value="motivo.id"
                    >{{motivo.nombre}}</li>
                  </ul>
                </div>
                <span
                  v-bind:class="{
                        'mdc-floating-label':true,
                        'mdc-floating-label--float-above': motivosel!=null,
                      }"
                >Motivo</span>
                <div class="mdc-line-ripple"></div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="mdc-select select-100 mdc-ripple-surface sel-aseguradora">
                <input type="hidden" name="enhanced-select">
                <i class="mdc-select__dropdown-icon"></i>
                <div class="mdc-select__selected-text">
                  {{
                  aseguradorasel!=null && !isnuevacita?
                  aseguradorasel.nombre:''
                  }}
                </div>
                <div class="mdc-select__menu mdc-menu mdc-menu-surface select-25">
                  <ul class="mdc-list">
                    <li
                      v-for="aseguradora in aseguradoras"
                      v-bind:key="aseguradora.id"
                      v-bind:class="{ 
                       'mdc-list-item': true,
                       'mdc-list-item--selected':isnuevacita?false:aseguradorasel.id==aseguradora.id,
                      }"
                      :data-value="aseguradora.id"
                    >{{aseguradora.nombre}}</li>
                  </ul>
                </div>
                <span
                  v-bind:class="{
                        'mdc-floating-label':true,
                        'mdc-floating-label--float-above': aseguradorasel!=null,
                      }"
                >Aseguradora</span>
                <div class="mdc-line-ripple"></div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-row text-field-row-fullwidth">
                <div class="text-field-container">
                  <div
                    class="mdc-text-field text-field mdc-text-field--fullwidth mdc-text-field--textarea"
                  >
                    <textarea
                      id="text-field-fullwidth-textarea-helper"
                      class="mdc-text-field__input"
                      v-model="notasel"
                    ></textarea>
                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch" style>
                        <label
                          class="mdc-floating-label"
                          for="text-field-fullwidth-textarea-helper"
                          style
                        >Notas adicionales</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                  <p
                    class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                    id="pw-validation-msg"
                  >Este espacio es para notas importantes</p>
                </div>
              </div>
            </div>
            <div
              v-if="!isnuevacita"
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="mdc-form-field select-100" v-on:click="setConfirmado">
                <div class="mdc-checkbox">
                  <input type="checkbox" :checked="confirmado==1" class="mdc-checkbox__native-control" id="checkbox-1">
                  <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                      <path
                        class="mdc-checkbox__checkmark-path"
                        fill="none"
                        d="M1.73,12.91 8.1,19.28 22.79,4.59"
                      ></path>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                  </div>
                </div>
                <label for="checkbox-1">Confirmado Paciente</label>
              </div>
              <div class="mdc-form-field select-100" v-on:click="setConfirmadoMedico">
                <div class="mdc-checkbox">
                  <input type="checkbox" :checked="confirmadomedico==1" class="mdc-checkbox__native-control" id="checkbox-2">
                  <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                      <path
                        class="mdc-checkbox__checkmark-path"
                        fill="none"
                        d="M1.73,12.91 8.1,19.28 22.79,4.59"
                      ></path>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                  </div>
                </div>
                <label for="checkbox-1">Confirmado Médico</label>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <h3 class="tituloUltimasCitas"></h3>              
              <ul class="mdc-list mdc-list--two-line ">
                <li 
                  class="mdc-list-item mdc-list-item__citas" 
                  tabindex="0"
                  v-for="cita in ultimasCitas"
                  :key="cita.id"                
                  >
                  <span  aria-hidden="true" class="mdc-list-item__graphic material-icons miniatura-citas">alarm</span>
                  <span class="mdc-list-item__text">
                    <span class="mdc-list-item__primary-text">{{cita.medico_especialidad.especialidad.nombre}} - Dr. {{cita.medico_especialidad.medico.persona.apellido_paterno}} {{cita.medico_especialidad.medico.persona.apellido_materno}}, {{cita.medico_especialidad.medico.persona.nombres}} </span>
                    <span class="mdc-list-item__secondary-text">{{cita.fecha_cita}} {{cita.turno.desde}} - {{cita.turno.hasta}}</span>
                  </span>
                </li>               
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
    <panel-modal v-if="modalValidar.conf" 
     :key="modalValidar.keyModal"
      v-bind:titulo="modalValidar.titulo"    
      v-bind:contenido="modalValidar.contenido" 
      v-bind:acciones="modalValidar.acciones" v-on:eliminarCita="eliminarCita"  ></panel-modal>

    <button class="mdc-fab boton-accion" v-on:click="guardarCita">
      <span class="material-icons mdc-fab__icon">save</span>
    </button>
  </div>
</template>
<script src="./PanelDetalleCita.js"></script>
<style lang="scss" src="./PanelDetalleCita.scss" scoped></style>
