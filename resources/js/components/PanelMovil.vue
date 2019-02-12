<template>
  <div
    class="mdc-layout-grid__cell 
    mdc-layout-grid__cell--span-3-desktop 
    mdc-layout-grid__cell--span-4-tablet 
    mdc-layout-grid__cell--span-4-phone"
    style="position: relative;">
    <div style="position:relative;">@include('citas.header-citas')</div>
    <div style="position:relative;">@include('citas.header-pacientes')</div>
    <div style="position:relative;">@include('citas.panel-citas')</div>
    <div style="position:relative;">@include('citas.panel-pacientes')</div>
  </div>
</template>

