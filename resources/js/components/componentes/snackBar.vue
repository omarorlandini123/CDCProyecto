<template>
    <div class="mdc-snackbar">
        <div class="mdc-snackbar__surface">
            <div class="mdc-snackbar__label"
                role="status"
                aria-live="polite">
                    {{snack.contenido}}
            </div>
            <div class="mdc-snackbar__actions">   
                 <button
                    v-for="accion in snack.acciones"
                    :key="accion.id"
                    type="button"
                    class="mdc-button mdc-snackbar__action"
                    :data-mdc-dialog-action="snack.action"
                    v-on:click="$emit(accion.nombreAccion,accion.valorAccion)"
                >  {{accion.nombre}} </button>          
            </div>
        </div>
    </div>
</template>
<script>
import {MDCSnackbar} from '@material/snackbar';

export default {
  props: {
    snack:{
        type:Object,
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
      const snackbar = new MDCSnackbar(document.querySelector('.mdc-snackbar'));      
      snackbar.open();
    }
  }
};
</script>
<style lang="scss" scoped>
@import "~@material/snackbar/mdc-snackbar";
</style>


