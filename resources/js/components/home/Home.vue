<template>
  <div class="panel-contenido">
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell">
          <div class="mdc-card demo-card-shaped">
            <div
              class="mdc-card__primary-action mdc-ripple-upgraded cardpad tarjeta-citas"
              tabindex="0"
              style=" --mdc-ripple-fg-size:210px; --mdc-ripple-fg-scale:1.83226; --mdc-ripple-fg-translate-start:101.5px, -61.3438px; --mdc-ripple-fg-translate-end:70px, -38px;"
            >
              <div class="demo-card__primary">
                <h2 class="demo-card__title mdc-typography--headline6">Módulo de Citas</h2>
                <h3 class="demo-card__subtitle mdc-typography--subtitle2">
                  El día de hoy se han registrado 6
                  pacientes
                </h3>
              </div>
              <div class="demo-card__secondary mdc-typography--body2">
                2 pacientes nuevos, 1 paciente de
                control y 3 pacientes para cirugia
              </div>
            </div>
            <div class="mdc-card__actions" style="align-self: center;">
              <div class="mdc-card__action-buttons">
                <button
                  class="mdc-button mdc-button--raised mdc-card__action mdc-card__action--button mdc-ripple-upgraded tarjeta-citas"
                >Ingresar</button>
              </div>
            </div>
          </div>
        </div>

        <div class="mdc-layout-grid__cell">
          <div class="mdc-card  demo-card-shaped">
            <div
              class="mdc-card__primary-action mdc-ripple-upgraded cardpad tarjeta-historias"
              tabindex="0"
              style="--mdc-ripple-fg-size:210px; --mdc-ripple-fg-scale:1.83226; --mdc-ripple-fg-translate-start:101.5px, -61.3438px; --mdc-ripple-fg-translate-end:70px, -38px;"
            >
              <div class="demo-card__primary">
                <h2 class="demo-card__title mdc-typography--headline6">Módulo de Historias Clínicas</h2>
                <h3
                  class="demo-card__subtitle mdc-typography--subtitle2"
                >El día de hoy se han creado 2 historias clínicas</h3>
              </div>
              <div
                class="demo-card__secondary mdc-typography--body2"
              >5 Historias han sido modificadas el día de hoy.</div>
            </div>
            <div class="mdc-card__actions" style="align-self: center;">
              <div class="mdc-card__action-buttons">
                <button
                  class="mdc-button mdc-button--raised mdc-card__action mdc-card__action--button mdc-ripple-upgraded tarjeta-historias"
                >Ingresar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {};
  },
  mounted(){
      this.accederCitas();
      this.accederHistorias();
  },
  methods: {
    accederCitas() {
      var tarjetaCitas = document.querySelectorAll(".tarjeta-citas");
      tarjetaCitas.forEach(element => {
        element.addEventListener("click", event => {
          window.open("./citas", "_top");
        });
      });
    },
    accederHistorias() {
      const tarjetaHistorias = document.querySelectorAll(".tarjeta-historias");
      tarjetaHistorias.forEach(element => {
        element.addEventListener("click", event => {
          window.open("./historias", "_top");
        });
      });
    }
  }
};
</script>
<style lang="scss" scoped>
.panel-contenido {
  padding-top: 56px;
}

.demo-card-shaped {
  border-radius: 24px 8px;
}

.cardpad {
  padding: 25px;
}
</style>

