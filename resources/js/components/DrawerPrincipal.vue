<template>
  <div v-if="auth" class="drawer">
    <aside class="mdc-drawer mdc-drawer--modal" style="z-index: 110;">
      <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">{{usuario.persona.nombres+" "+usuario.persona.apellido_paterno}}</h3>
        <h6 class="mdc-drawer__subtitle">{{usuario.email}}</h6>
      </div>

      <div class="mdc-drawer__content">
        <nav class="mdc-list">
          <a class="mdc-list-item mdc-list-item--activated" href="/citas" aria-selected="true">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">schedule</i>
            <span class="mdc-list-item__text">Citas</span>
          </a>
          <a class="mdc-list-item" href="/historias">
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">assignment_ind</i>
            <span class="mdc-list-item__text">Historias Clínicas</span>
          </a>
          <br>
          <br>
          <hr class="mdc-list-divider">
          <a
            class="mdc-list-item mdc-list-item--activated"
            href="./logout"
            aria-selected="true"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
          >
            <i class="material-icons mdc-list-item__graphic" aria-hidden="true">exit_to_app</i>
            <span class="mdc-list-item__text">Salir</span>
          </a>
          <form id="logout-form" action="./logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" :value="csrf">
          </form>
        </nav>
      </div>
    </aside>
    <div class="mdc-drawer-scrim" style="z-index: 105;"></div>
    <div style="height: 0px;"></div>
    <div class="mdc-drawer-app-content"></div>
  </div>
</template>
<script>
import { MDCTopAppBar } from "@material/top-app-bar/index";
import { MDCDrawer } from "@material/drawer";
export default {
  data() {
    return {
      csrf: window.Laravel.csrf_token,
      auth: window.auth,
      usuario: {
        id: 0,
        name: "",
        email: "",
        email_verified_at: null,
        created_at: "",
        updated_at: "",
        persona_id: 0,
        persona: {
          id: 0,
          nombres: "",
          apellido_paterno: "",
          apellido_materno: "",
          direccion: "",
          fecha_nacimiento: "",
          sexo: 1,
          dni: "",
          pasaporte: null,
          carne_extra: null,
          ruc: null,
          ubicacion_nacimiento: 0,
          ubicacion_domicilio: 0,
          foto_portada: null
        }
      }
    };
  },
  created() {
    this.obtenerDatosUsuario();
  },
  mounted() {
    this.iniciarDrawer();
  },
  updated() {},
  activated() {},
  methods: {
    iniciarDrawer() {
      const topAppBarElement = document.querySelector(".mdc-top-app-bar");
      if (topAppBarElement != null) {
        var topAppBar = new MDCTopAppBar(topAppBarElement);
        var drawerSelector = document.querySelector(".mdc-drawer");
        if (drawerSelector != null) {
          var drawer = MDCDrawer.attachTo(drawerSelector);
        }

        //Mostrar Drawer
        topAppBar.setScrollTarget(document.getElementById("main-content"));
        topAppBar.listen("MDCTopAppBar:nav", () => {
          drawer.open = !drawer.open;
        });
      }

      //Ocultar Drawer cuando haga click en una opcion
      const listEl = document.querySelector(".mdc-drawer .mdc-list");
      const mainContentEl = document.querySelector(".main-content");
      if (listEl != null) {
        listEl.addEventListener("click", event => {
          drawer.open = false;
        });
      }

      document.body.addEventListener("MDCDrawer:closed", () => {
        //mainContentEl.querySelector('input, button').focus();
      });
    },
    obtenerDatosUsuario() {
       
      fetch("/usuario")
        .then(res => res.json())
        .then(res => {
          if(res=="no-auth"){
                    window.location.href = '/login';
                }
          this.usuario=res;
        });
    }
  }
};
</script>
<style lang="scss">

.mdc-top-app-bar {
  background-color: var(--color-primary) !important;
}
</style>
