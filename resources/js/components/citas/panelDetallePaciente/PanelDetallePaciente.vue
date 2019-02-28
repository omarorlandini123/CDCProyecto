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
              v-if="pacientesel.foto_portada==null"
              class="mdc-list-item__graphic material-icons miniatura-null"
              aria-hidden="true"
            >account_circle</span>
            <img
              v-if="pacientesel.foto_portada!=null"
              class="barra-avatar"
              :src="pacientesel.foto_portada"
              height="40"
              width="40"
            >
            <span v-if="!nuevo" class="mdc-top-app-bar__title" style="font-size: 1em;">
              {{pacientesel.persona_historia!=null?pacientesel.persona_historia.nombres:''}}
              <p
                style="margin: 0px;font-size: 0.7em;margin-top: -13px;"
              >DNI: {{pacientesel.persona_historia!=null?pacientesel.persona_historia.dni:''}} - Historia: {{pacientesel.id}}</p>
            </span>
            
            <span v-if="nuevo" class="mdc-top-app-bar__title" style="font-size: 1em;">Nuevo Paciente</span>
          </section>
          <section class="seccion-fin" role="toolbar">
            <a
              href="#"
              class="material-icons mdc-top-app-bar__action-item boton-opciones-detalle-paciente"
              aria-label="Download"
              alt="Download"
            >more_vert</a>
            <div id="toolbar" class="toolbar mdc-menu-surface--anchor">
              <div class="mdc-menu menu-opciones-detalle-paciente mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li
                    class="mdc-list-item"
                    role="menuitem"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                  >
                    <span class="mdc-list-item__text">Eliminar Paciente</span>
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
        <div class="preview-paciente">
          <span class="material-icons icono-usuario" aria-hidden="true">account_circle</span>
          <span class="material-icons icono-adjuntar" aria-hidden="true">attach_file</span>
        </div>

        <div class="mdc-layout-grid" style="padding: 25px;position:relative;">
          <div class="mdc-layout-grid__inner">
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_dni"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">D.N.I.</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_pasaporte"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">Pasaporte</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_carne"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">Carné Ext.</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_ruc"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">R.U.C.</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_nombres"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">Nombres</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_apellido_paterno"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">Apellido Paterno</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_apellido_materno"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">Apellido Materno</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
              style="text-align: center;"
            >
              <div class="mdc-form-field">
                <div class="mdc-radio">
                  <input
                    class="mdc-radio__native-control rd_masculino"
                    type="radio"
                    id="radio-1"
                    value="1"
                    name="radios"
                    checked
                  >
                  <div class="mdc-radio__background">
                    <div class="mdc-radio__outer-circle"></div>
                    <div class="mdc-radio__inner-circle"></div>
                  </div>
                </div>
                <label for="radio-1">Masculino</label>
              </div>
              <div class="mdc-form-field">
                <div class="mdc-radio">
                  <input
                    class="mdc-radio__native-control rd_femenino"
                    type="radio"
                    id="radio-1"
                    name="radios"
                    value="2"
                    checked
                  >
                  <div class="mdc-radio__background">
                    <div class="mdc-radio__outer-circle"></div>
                    <div class="mdc-radio__inner-circle"></div>
                  </div>
                </div>
                <label for="radio-1">Femenino</label>
              </div>
            </div>

            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="date"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_fec_nac"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">Fecha Nacimiento</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    disabled
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input txt_edad"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">Edad</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>

            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="mdc-select select-100">
                <input type="hidden" name="enhanced-select">
                <i class="mdc-select__dropdown-icon"></i>
                <div class="mdc-select__selected-text"></div>
                <div class="mdc-select__menu mdc-menu mdc-menu-surface select-25">
                  <ul class="mdc-list">
                    <li
                      class="mdc-list-item mdc-list-item--selected"
                      data-value
                      aria-selected="true"
                    ></li>
                    <li class="mdc-list-item" data-value="grains">Bread, Cereal, Rice, and Pasta</li>
                    <li class="mdc-list-item" data-value="vegetables">Vegetables</li>
                    <li class="mdc-list-item" data-value="fruit">Fruit</li>
                  </ul>
                </div>
                <span class="mdc-floating-label">Lugar de Nacimiento</span>
                <div class="mdc-line-ripple"></div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading txt_direccion"
                    class="mdc-text-field__input"
                  >
                  <label class="mdc-floating-label" for="text-field-filled-leading">Dirección</label>
                  <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:282px;--mdc-ripple-fg-scale:1.71975;--mdc-ripple-fg-translate-start:283.516px, -119px;--mdc-ripple-fg-translate-end:94.8281px, -113px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input input-chip-set input-chip-set-correo"
                  >
                  
                  <label
                    class="mdc-floating-label mdc-floating-label--float-above"
                    for="text-field-filled-leading"
                  >e-mails</label>

                  <div
                    class="mdc-line-ripple mdc-line-ripple--active mdc-line-ripple--deactivating"
                    style="transform-origin: 424.516px center 0px;"
                  ></div>
                </div>
              </div>
              <div class="mdc-chip-set mdc-chip-set--input mdc-chip-set-correo"></div>
              <!-- <div class="mdc-chip" tabindex="0">
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--leading">mail</i>
                                <div class="mdc-chip__text">Chip content</div>
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="0" role="button">cancel</i>
              </div>-->
            </div>
            <div
              class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone"
            >
              <div class="text-field-container">
                <div
                  class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita"
                  style="--mdc-ripple-fg-size:282px;--mdc-ripple-fg-scale:1.71975;--mdc-ripple-fg-translate-start:283.516px, -119px;--mdc-ripple-fg-translate-end:94.8281px, -113px;"
                >
                  <input
                    type="text"
                    id="text-field-filled-leading"
                    class="mdc-text-field__input input-chip-set input-chip-set-telf"
                  >
                  
                  <label
                    class="mdc-floating-label mdc-floating-label--float-above"
                    for="text-field-filled-leading"
                  >Teléfonos</label>

                  <div
                    class="mdc-line-ripple mdc-line-ripple--active mdc-line-ripple--deactivating"
                    style="transform-origin: 424.516px center 0px;"
                  ></div>
                </div>
              </div>
              <div class="mdc-chip-set mdc-chip-set--input mdc-chip-set-telf"></div>
              <!-- <div class="mdc-chip" tabindex="0">
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--leading">mail</i>
                                <div class="mdc-chip__text">Chip content</div>
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="0" role="button">cancel</i>
              </div>-->
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <button class="mdc-fab boton-accion" v-on:click="guardarCita">
      <span class="material-icons mdc-fab__icon">save</span>
    </button>
  </div>
</template>
<script src="./PanelDetallePaciente.js"></script>
<style lang="scss" src="./PanelDetallePaciente.scss" scoped></style>
