<template>
  <div class="panel-movil-contenido">
    <div class="header-movil-contenido">
      <header class="mdc-top-app-bar top-bar-movil">
        <div v-show="topbarshow" class="mdc-top-app-bar__row">
          <section class="seccion-inicio">
            <!-- <span              
              class="mdc-list-item__graphic material-icons"
              aria-hidden="true"
            >back_arrow</span> -->
            <span class="mdc-top-app-bar__title">Citas</span>
          </section>
          <section class="seccion-fin" role="toolbar">
            <a
              v-on:click="abrirBuscador"
              href="#"
              class="material-icons mdc-top-app-bar__action-item top-bar-movil-search"
              aria-label="Download"
              alt="Download"
            >search</a>
          </section>
        </div>
      </header>

      <div v-show="buscadorshow" class="text-field-container text-buscador-movil">
        <div class="text-buscador">
          <input type="text" placeholder="Busca una cita" class="text-buscador-input">
          <i
            v-on:click="cerrarBuscador"
            class="material-icons mdc-text-field__icon cerrar-buscar-cita"
            tabindex="0"
          >close</i>
          <label class="mdc-floating-label" for="text-field-filled-leading"></label>
        </div>
      </div>
    </div>
    <div class="panel-movil">
      <ul class="mdc-list mdc-list--two-line mdc-list--avatar-list mdc-list--dense">
          <item-cita  v-for="cit in citas" v-bind:key="cit.id" v-bind:cita="cit" v-on:abrirCita="$emit('abrirCita',$event)"></item-cita>
          <li class="mdc-list-item mdc-ripple-upgraded cita-list-item"
    tabindex="0"></li>
      </ul>
    </div>
    <button class="mdc-fab boton-accion" v-on:click="$emit('abrirPacientes',true)"> 
      <span class="material-icons mdc-fab__icon">add</span>
    </button>
  </div>
</template>
<script src="./PanelCitas.js"></script>
<style lang="scss" src="./PanelCitas.scss" scoped></style>
