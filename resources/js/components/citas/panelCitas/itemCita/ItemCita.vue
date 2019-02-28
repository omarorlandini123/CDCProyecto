<template>
  <li
    class="mdc-list-item mdc-ripple-upgraded cita-list-item"
    tabindex="0"
    v-on:click="$emit('abrirCita',cita)"
  >
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
      <span class="mdc-list-item__primary-text">
        {{
        cita.historia.persona_historia.apellido_paterno + " " +
        cita.historia.persona_historia.apellido_materno + ", "+
        cita.historia.persona_historia.nombres + " "}}
      </span>
      <span class="mdc-list-item__secondary-text">{{cita.fecha_cita + ' - '+cita.turno.desde}}</span>
    </span>
    <span class="mdc-list-item__meta">
      <span style="display:"></span>
      <span
        v-bind:class="{
      'material-icons':true,
      'confirmado-item':cita.confirmado==1,
    }"
        aria-hidden="true"
      >check</span>
      <span
        v-bind:class="{
      'material-icons':true,
      'confirmado-medico-item':cita.confirmado_medico==1,
    }"
        style="margin-left: -18px;"
        aria-hidden="true"
      >check</span>
    </span>
  </li>
</template>
<script src="./ItemCita.js"></script>
<style lang="scss" scoped src="./ItemCita.scss"></style>


        