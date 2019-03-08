/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

import {MDCTextField} from "@material/textfield/index";
// import {MDCRipple} from "@material/ripple";

// import {MDCMenu} from "@material/menu"; 
// import {MDCList} from "@material/list";
// import {MDCTextFieldHelperText} from "@material/textfield/helper-text";
// import {MDCSelect} from "@material/select";
// import {MDCFormField} from "@material/form-field";
// import {MDCRadio} from "@material/radio";
// import {MDCChipSet} from "@material/chips";

window.Vue = require("vue");
  
//Componentes Generales 
Vue.component("navbar", require("./components/Navbar.vue").default);
Vue.component("drawer-principal",require("./components/DrawerPrincipal.vue").default);

//Componentes para Home
Vue.component("home",require("./components/home/Home.vue").default);

//Componentes para Citas
Vue.component("citas",require("./components/citas/Citas.vue").default);

//Componentes personales
Vue.component("snackBar",require("./components/componentes/snackBar.vue").default);


const app = new Vue({
    el: "#app"

});

const textfieldselector = document.querySelectorAll('.mdc-text-field');
textfieldselector.forEach(element => {
    var cajaTexto = new MDCTextField(element);
});
