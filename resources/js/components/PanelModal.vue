<template>
  <div
    class="mdc-dialog"
    role="alertdialog"
    aria-modal="true"
    aria-labelledby="my-dialog-title"
    aria-describedby="my-dialog-content"
    style="z-index:300"
  >
    <div class="mdc-dialog__container">
      <div class="mdc-dialog__surface">
        <h2 class="mdc-dialog__title" id="my-dialog-title">{{titulo}}</h2>
        <div class="mdc-dialog__content" id="my-dialog-content">{{contenido}}</div>
        <footer class="mdc-dialog__actions">
          <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="close">
            <span class="mdc-button__label">Cancelar</span>
          </button>
          <button
            v-for="accion in acciones"
            :key="accion.id"
            type="button"
            class="mdc-button mdc-dialog__button"
            data-mdc-dialog-action="yes"
            v-on:click="$emit(accion.nombre,accion.valorAccion)"
          >
            <span class="mdc-button__label">{{accion.texto}}</span>
          </button>
        </footer>
      </div>
    </div>
    <div class="mdc-dialog__scrim"></div>
  </div>
</template>
<script>
import { MDCDialog } from "@material/dialog";

export default {
  props: {
    titulo: {
      type: String
    },
    contenido: {
      type: String
    },
    acciones: {
      type: Array
    }
  },
  data(){
      return {};
  },
  mounted() {
      this.iniciarComponentes();
  },
  methods: {
    iniciarComponentes() {
      const dialog = new MDCDialog(document.querySelector(".mdc-dialog"));
      dialog.open();
    }
  }
};
</script>
<style lang="scss" scoped>
@import "~@material/dialog/mdc-dialog";
</style>


