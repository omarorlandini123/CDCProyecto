<template>
  <div class="container-completo">
    <div
      class="mdc-layout-grid"
      style="height: 100%;padding-top: 56px;padding-left: 0px;padding-right: 0px;padding-bottom: 0px;"
    >
      <div class="mdc-layout-grid__inner" style="grid-gap: 0px;">
        <div class="panel-movil" style="position: relative;">
          <div v-if="paneltelefono" class="mostrar-movil">
            <!-- Panel citas para movil y desktop -->
            <div v-if="mostrarPhoneCitas" class="panel-listar-citas">
              <panel-citas
                v-on:abrirCita="abrirpaneldetallecita"
                v-on:abrirPacientes="abrirPacientes"                
                :key="keyLista"
              ></panel-citas>
            </div>
            <!-- Panel detalle citas para movil -->
            <div v-if="mostrarPhoneDetalleCita" class="panel-detalle-cita">
              <panel-detalle-cita
                v-on:refrescarCitas="refrescarCitas"
                v-on:abrirPaciente="abrirPaciente"
                v-on:cerrarPanelDetalleMovil="cerrarPanelDetalleMovil"
                v-bind:citasel="citaselect"
                v-bind:frommovil="true"
                v-bind:isnuevacita="isnuevacita"
                v-bind:historianuevacita="historianuevacita"
                :key="citaselect.id"
              ></panel-detalle-cita>
            </div>

             <!-- Panel pacientes para movil y desktop -->
            <div v-if="mostrarPhonePacientes" class="panel-pacientes">
              <panel-pacientes
                v-on:refrescarPacientes="refrescarPacientes"
                v-on:cerrarPanelPacientes="cerrarPanelPacientes"
                v-on:abrirPaciente="abrirPaciente"
                v-on:nuevaCita="nuevaCita"
                :key="keyPanelPacientes"
              ></panel-pacientes>
            </div>

            <!-- Panel detalle paciente para movil -->
            <div v-if="mostrarPhoneDetallePaciente" class="panel-detalle-paciente">
              <panel-detalle-paciente
                v-on:refrescarPacientes="refrescarPacientes"
                v-bind:nuevo="isnuevopaciente"
                v-bind:frommovil="true"
                v-bind:pacientesel="pacienteSelect"
                :key="keyDetallePacientes"
              ></panel-detalle-paciente>
            </div>

           
          </div>
        </div>
        <div class="panel-desktop" style="position: relative;">
          <div v-if="paneldesktop" class="mostrar-desktop">
            <!-- Panel mensaje para seleccionar cita -->
            <div v-if="mostrarDesktopSeleccionaCita" class="panel-selecciona-cita">
              <panel-selecciona-cita></panel-selecciona-cita>
            </div>
            <!-- Panel mensaje para seleccionar paciente -->
            <div v-if="mostrarDesktopSeleccionaPaciente" class="panel-selecciona-paciente">
              <panel-selecciona-paciente></panel-selecciona-paciente>
            </div>

            <!-- Panel desktop para detalle de citas -->
            <div v-if="mostrarDesktopDetalleCita" class="panel-detalle-cita">
              <panel-detalle-cita
                v-on:refrescarCitas="refrescarCitas"
                v-on:abrirPaciente="abrirPaciente"
                v-bind:citasel="citaselect"
                v-bind:frommovil="false"
                v-bind:isnuevacita="isnuevacita"
                v-bind:historianuevacita="historianuevacita"
                :key="citaselect.id"
              ></panel-detalle-cita>
            </div>
            
            <!-- Panel desktop para detalle de paciente -->
            <div v-if="mostrarDesktopDetallePaciente" class="panel-dellate-paciente">
              <panel-detalle-paciente
                v-on:refrescarPacientes="refrescarPacientes"
                v-bind:nuevo="isnuevopaciente"
                v-bind:frommovil="false"
                v-bind:pacientesel="pacienteSelect"
                :key="keyDetallePacientes"
              ></panel-detalle-paciente>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script src="./Citas.js"></script>
<style lang="scss" scoped src="./Citas.scss"></style> 


