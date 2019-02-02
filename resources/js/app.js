
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });

import { MDCTextField } from '@material/textfield/index';
import { MDCRipple } from '@material/ripple';
import { MDCTopAppBar } from '@material/top-app-bar/index';
import { MDCDrawer } from "@material/drawer";
import { MDCMenu } from '@material/menu';
import {MDCTextFieldHelperText} from '@material/textfield/helper-text';

const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
  return new MDCRipple(el);
});


const menu = new MDCMenu(document.querySelector('.mdc-menu'));
const appBarMoreItems = document.querySelector('.app-bar-more-items');
if (appBarMoreItems != null) {
    appBarMoreItems.addEventListener('click', (event) => {
        menu.open = !menu.open;
    });
}
document.addEventListener('click', (event) => {

    if (menu.open && event.srcElement == appBarMoreItems[0]) {
        menu.open = false;
    }
});



//const textField = new MDCTextField(document.querySelector('mdc-text-field'));
const textFields = document.querySelectorAll('.mdc-text-field');
textFields.forEach(element => {
    new MDCTextField(element);
});
const helperTexts = document.querySelectorAll('.mdc-text-field-helper-text');
helperTexts.forEach(element => {
    new MDCTextFieldHelperText(element);
});


// const buttonRipple = new MDCRipple(document.querySelector('.mdc-button'));
// const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action';
// const buttonsRipple = document.querySelectorAll(selector);
// buttonsRipple.forEach(element => {
//     new MDCRipple(element);
// });
const topAppBarElement = document.querySelector('.mdc-top-app-bar');
const topAppBar = new MDCTopAppBar(topAppBarElement);
const drawer = MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));

//Mostrar Drawer
topAppBar.setScrollTarget(document.getElementById('main-content'));
topAppBar.listen('MDCTopAppBar:nav', () => {
    drawer.open = !drawer.open;
});

//Ocultar Drawer cuando haga click en una opcion
const listEl = document.querySelector('.mdc-drawer .mdc-list');
const mainContentEl = document.querySelector('.main-content');
if (listEl != null) {
    listEl.addEventListener('click', (event) => {
        drawer.open = false;
    });
}


document.body.addEventListener('MDCDrawer:closed', () => {
    //mainContentEl.querySelector('input, button').focus();
});

// eventos para /home
const tarjetaCitas=document.querySelectorAll('.tarjeta-citas');
tarjetaCitas.forEach(element => {
    element.addEventListener('click',(event)=>{
        console.log("click en citas");
    });
});