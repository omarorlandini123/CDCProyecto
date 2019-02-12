<template>
  <li
    class="mdc-list-item mdc-ripple-upgraded cita-list-item"
    tabindex="0"
    
  >
    
    <span
      v-if="paciente.persona_historia.foto_portada==null"
      v-on:click="$emit('nuevaCita',paciente)"
      class="mdc-list-item__graphic material-icons miniatura-null"
      aria-hidden="true"
    >account_circle</span>
    <img
      v-if="paciente.persona_historia.foto_portada!=null"
      v-on:click="$emit('nuevaCita',paciente)"
      class="mdc-list-item__graphic"
      :src="paciente.persona_historia.foto_portada.ruta"
      height="40"
      width="40"
    >
    <span class="mdc-list-item__text" 
    v-on:click="$emit('nuevaCita',paciente)">
      <span class="mdc-list-item__primary-text">{{
        paciente.persona_historia.apellido_paterno + " " +
        paciente.persona_historia.apellido_materno + ", "+
        paciente.persona_historia.nombres + " "}}</span>
      <span class="mdc-list-item__secondary-text">{{paciente.persona_historia.dni}}</span>
    </span>

    <span class="mdc-list-item__meta" style="display: grid;">
      
      <span class="material-icons edit-paciente" 
      v-on:click="$emit('abrirPaciente',paciente)" aria-hidden="true">edit</span>    
    </span>
     
  </li>
</template>
<script src="./ItemPaciente.js"></script>
<style lang="scss" scoped src="./ItemPaciente.scss"></style>


        