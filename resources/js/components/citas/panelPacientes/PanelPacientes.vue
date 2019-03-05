<template>
  <div class="panel-movil-contenido">
    <div class="header-movil-contenido">
      <header class="mdc-top-app-bar top-bar-movil">
        <div v-show="topbarshow" class="mdc-top-app-bar__row">
          <section class="seccion-inicio">
            <a
              class="material-icons mdc-top-app-bar__action-item"
              aria-hidden="true"
              v-on:click="$emit('cerrarPanelPacientes',true)"
              style="margin:0px;color:white;"
            >arrow_back</a>
            <span class="mdc-top-app-bar__title">Pacientes</span>
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
          <input type="text" placeholder="Busca un Paciente" 
          v-on:keyup="llamarPacientes" class="text-buscador-input">
          <i
            v-on:click="cerrarBuscador"
            class="material-icons mdc-text-field__icon"
            tabindex="0"
          >close</i>
          <label class="mdc-floating-label" for="text-field-filled-leading"></label>
        </div>
      </div>
    </div>
    <div class="panel-movil">
      <ul class="mdc-list mdc-list--two-line mdc-list--avatar-list mdc-list--dense">
        <item-paciente
          v-for="paciente in pacientes"
          v-bind:key="paciente.id"
          v-bind:paciente="paciente"
          v-on:nuevaCita="$emit('nuevaCita',$event)"
          v-on:abrirPaciente="$emit('abrirPaciente',$event)"
        ></item-paciente>
       
      </ul>
      
    </div>

    <button class="mdc-fab boton-accion" v-on:click="$emit('abrirPaciente',0)">
      <span class="material-icons mdc-fab__icon">add</span>
    </button>
  </div>
</template>
<script src="./PanelPacientes.js"></script>
<style lang="scss" src="./PanelPacientes.scss" scoped></style>
