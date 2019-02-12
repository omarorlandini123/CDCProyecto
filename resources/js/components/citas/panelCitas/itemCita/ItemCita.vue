<template>
  <li class="mdc-list-item mdc-ripple-upgraded cita-list-item" 
  tabindex="0"
  v-on:click="$emit('abrirCita',cita)">
    <span
      v-show="cita.foto_portada==null"
      class="mdc-list-item__graphic material-icons miniatura-null"
      aria-hidden="true"
    >account_circle</span>
    <img
    v-show="cita.foto_portada!=null"
      class="mdc-list-item__graphic"
      :src="cita.foto_portada"
      height="40"
      width="40"
    >
    <span class="mdc-list-item__text">
      <span class="mdc-list-item__primary-text">{{
        cita.historia.persona_historia.apellido_paterno + " " +
                  cita.historia.persona_historia.apellido_materno + ", "+
                  cita.historia.persona_historia.nombres + " "}}</span>
      <span class="mdc-list-item__secondary-text">{{cita.fecha_cita + ' - '+cita.turno.desde}}</span>
    </span>
    <span 
    v-bind:class="{
      'mdc-list-item__meta':true,
      'confirmado-item':cita.confirmado==1,
    }"
    style="display: grid;">
      <span class="material-icons" aria-hidden="true">check</span>
       <span class="" style="font-size:0.8em" aria-hidden="true"></span>
    </span>
  </li>
</template>
<script src="./ItemCita.js"></script>
<style lang="scss" scoped src="./ItemCita.scss"></style>


        