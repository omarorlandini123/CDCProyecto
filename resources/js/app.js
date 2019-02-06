
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
import { MDCList } from '@material/list';
import { MDCTextFieldHelperText } from '@material/textfield/helper-text';
import { MDCSelect } from '@material/select';
import { MDCFormField } from '@material/form-field';
import { MDCRadio } from '@material/radio';
import { MDCChipSet } from '@material/chips';


const select = document.querySelectorAll('.mdc-select');
if (select != null) {
    select.forEach(element => {
        var selector = new MDCSelect(element);
        selector.listen('MDCSelect:change', () => {
            alert(`Selected option at index ${selector.selectedIndex} with value "${selector.value}"`);
        });
    });

}

const selector = '.mdc-button, .mdc-icon-button, .mdc-card__primary-action, .mdc-fab';
if (selector != null) {
    const ripples = [].map.call(document.querySelectorAll(selector), function (el) {
        return new MDCRipple(el);
    });
}


const menu = new MDCMenu(document.querySelector('.mdc-menu'));
const appBarMoreItems = document.querySelector('.app-bar-more-items');
if (appBarMoreItems != null) {
    appBarMoreItems.addEventListener('click', (event) => {
        menu.open = !menu.open;
    });
}
const menuOpcionesDetalleCita = document.querySelector('.menu-opciones-detalle-cita');
if (menuOpcionesDetalleCita != null) {
    const menuOpcionesDetalleCitaMDC = new MDCMenu(menuOpcionesDetalleCita);
    const botonOpcionesDetalleCita = document.querySelector('.boton-opciones-detalle-cita');
    if (botonOpcionesDetalleCita != null) {
        botonOpcionesDetalleCita.addEventListener('click', (event) => {
            menuOpcionesDetalleCitaMDC.open = !menuOpcionesDetalleCitaMDC.open;
        });
    }
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
const tarjetaCitas = document.querySelectorAll('.tarjeta-citas');
tarjetaCitas.forEach(element => {
    element.addEventListener('click', (event) => {
        window.open('./citas', '_top');
    });
});

const tarjetaHistorias = document.querySelectorAll('.tarjeta-historias');
tarjetaHistorias.forEach(element => {
    element.addEventListener('click', (event) => {
        console.log("click en historias");
    });
});

//eventos para /citas

const panelCitas = document.querySelectorAll('.panel-citas');
panelCitas.forEach(element => {
    var atrr = element.getAttribute('style');
    atrr += "height:" + (window.innerHeight - 112) + "px;";
    element.setAttribute('style', atrr);

});
const panelPacientes = document.querySelectorAll('.panel-pacientes');
panelPacientes.forEach(element => {
    var atrr = element.getAttribute('style');
    atrr += "height:" + (window.innerHeight - 112) + "px;";
    element.setAttribute('style', atrr);

});
const panelDetalleCita = document.querySelectorAll('.panel-detalle-cita');
panelDetalleCita.forEach(element => {
    var atrr = element.getAttribute('style');
    if (atrr == null) {
        atrr = "";
    }
    atrr += "height:" + (window.innerHeight - 112) + "px;";
    element.setAttribute('style', atrr);

});
const panelSeleccionaPaciente = document.querySelectorAll('.panel-selecciona-paciente');
panelSeleccionaPaciente.forEach(element => {
    var atrr = element.getAttribute('style');
    if (atrr == null) {
        atrr = "";
    }
    atrr += "height:" + (window.innerHeight - 56) + "px;";
    element.setAttribute('style', atrr);

});

const panelMaxHeight = document.querySelectorAll('.panel-max-height');
panelMaxHeight.forEach(element => {
    var atrr = element.getAttribute('style');
    if (atrr == null) {
        atrr = "";
    }
    atrr += "height:" + (window.innerHeight - 112) + "px;";
    element.setAttribute('style', atrr);
});

const list = new MDCList(document.querySelector('.mdc-list'));
if (list != null) {
    const listItemRipples = list.listElements.map((listItemEl) => new MDCRipple(listItemEl));
}

const itemsLista = document.querySelectorAll('.cita-list-item');
itemsLista.forEach(element => {
    element.addEventListener('mouseover', (event) => {
        var maselementos = element.querySelector('.menu-cita-list');
        maselementos.setAttribute('style', 'color:gray;cursor:pointer;');
    });
    element.addEventListener('mouseout', (event) => {
        var maselementos = element.querySelector('.menu-cita-list');
        maselementos.setAttribute('style', '');
    });

});


const botonCitas = document.querySelector('.boton-citas');
if (botonCitas != null) {
    botonCitas.addEventListener('click', (event) => {
        //Oculta Citas
        document.querySelector('.panel-citas-contenido').classList.remove('panel-citas-mostrar');
        document.querySelector('.panel-citas-contenido').classList.add('panel-citas-ocultar');
        document.querySelector('.boton-citas').classList.remove('boton-citas-mostrar');
        document.querySelector('.boton-citas').classList.add('boton-citas-ocultar');
        document.querySelector('.header-citas-contenido').classList.remove('header-citas-mostrar');
        document.querySelector('.header-citas-contenido').classList.add('header-citas-ocultar');
        //Muestra Pacientes
        document.querySelector('.panel-pacientes-contenido').classList.remove('panel-pacientes-ocultar');
        document.querySelector('.panel-pacientes-contenido').classList.add('panel-pacientes-mostrar');
        document.querySelector('.boton-pacientes').classList.remove('boton-pacientes-ocultar');
        document.querySelector('.boton-pacientes').classList.add('boton-pacientes-mostrar');
        document.querySelector('.header-pacientes-contenido').classList.remove('header-pacientes-ocultar');
        document.querySelector('.header-pacientes-contenido').classList.remove('top-bar-pacientes-ocultar');
        document.querySelector('.header-pacientes-contenido').classList.add('header-pacientes-mostrar');

    });
}

const botonBack = document.querySelector('.top-bar-pacientes-back');
if (botonBack != null) {
    botonBack.addEventListener('click', (event) => {
        //Oculta Pacientes
        document.querySelector('.panel-pacientes-contenido').classList.remove('panel-pacientes-mostrar');
        document.querySelector('.panel-pacientes-contenido').classList.add('panel-pacientes-ocultar');
        document.querySelector('.boton-pacientes').classList.remove('boton-pacientes-mostrar');
        document.querySelector('.boton-pacientes').classList.add('boton-pacientes-ocultar');
        document.querySelector('.header-pacientes-contenido').classList.remove('header-pacientes-mostrar');
        document.querySelector('.header-pacientes-contenido').classList.add('header-pacientes-ocultar');

        //Muestra Citas
        document.querySelector('.panel-citas-contenido').classList.remove('panel-citas-ocultar');
        document.querySelector('.panel-citas-contenido').classList.add('panel-citas-mostrar');

        document.querySelector('.boton-citas').classList.remove('boton-citas-ocultar');
        document.querySelector('.boton-citas').classList.add('boton-citas-mostrar');

        document.querySelector('.header-citas-contenido').classList.remove('header-citas-ocultar');
        document.querySelector('.header-citas-contenido').classList.add('header-citas-mostrar');


    });
}



const botonBuscarHeaderCitas = document.querySelector('.top-bar-citas-search');
if (botonBuscarHeaderCitas != null) {
    botonBuscarHeaderCitas.addEventListener('click', (event) => {

        var topBarCitas = document.querySelector('.top-bar-citas');

        topBarCitas.classList.remove('top-bar-citas-mostrar');
        if (!topBarCitas.classList.contains('top-bar-citas-ocultar')) {
            topBarCitas.classList.add('top-bar-citas-ocultar');
        }

        var textBuscarCitas = document.querySelector('.text-buscador-citas');
        textBuscarCitas.classList.remove('text-buscador-citas-ocultar');
        if (!textBuscarCitas.classList.contains('text-buscador-citas-mostrar')) {
            textBuscarCitas.classList.add('text-buscador-citas-mostrar');
        }


    });
}

const botonBuscarHeaderPacientes = document.querySelector('.top-bar-pacientes-search');
if (botonBuscarHeaderPacientes != null) {
    botonBuscarHeaderPacientes.addEventListener('click', (event) => {

        var topBarPacientes = document.querySelector('.top-bar-pacientes');

        topBarPacientes.classList.remove('top-bar-pacientes-mostrar');
        if (!topBarPacientes.classList.contains('top-bar-pacientes-ocultar')) {
            topBarPacientes.classList.add('top-bar-pacientes-ocultar');
        }

        var textBuscarPacientes = document.querySelector('.text-buscador-pacientes');
        textBuscarPacientes.classList.remove('text-buscador-pacientes-ocultar');
        if (!textBuscarPacientes.classList.contains('text-buscador-pacientes-mostrar')) {
            textBuscarPacientes.classList.add('text-buscador-pacientes-mostrar');
        }


    });
}

const botonCerrarBuscarCita = document.querySelector('.cerrar-buscar-cita');
if (botonCerrarBuscarCita != null) {
    botonCerrarBuscarCita.addEventListener('click', (event) => {

        var topBarCitas = document.querySelector('.top-bar-citas');

        topBarCitas.classList.remove('top-bar-citas-ocultar');
        if (!topBarCitas.classList.contains('top-bar-citas-mostrar')) {
            topBarCitas.classList.add('top-bar-citas-mostrar');
        }

        var textBuscarCitas = document.querySelector('.text-buscador-citas');
        textBuscarCitas.classList.remove('text-buscador-citas-mostrar');
        if (!textBuscarCitas.classList.contains('text-buscador-citas-ocultar')) {
            textBuscarCitas.classList.add('text-buscador-citas-ocultar');
        }


    });
}

const botonCerrarBuscarPacientes = document.querySelector('.cerrar-buscar-pacientes');
if (botonCerrarBuscarPacientes != null) {
    botonCerrarBuscarPacientes.addEventListener('click', (event) => {

        var topBarPacientes = document.querySelector('.top-bar-pacientes');

        topBarPacientes.classList.remove('top-bar-pacientes-ocultar');
        if (!topBarPacientes.classList.contains('top-bar-pacientes-mostrar')) {
            topBarPacientes.classList.add('top-bar-pacientes-mostrar');
        }

        var textBuscarPacientes = document.querySelector('.text-buscador-pacientes');
        textBuscarPacientes.classList.remove('text-buscador-pacientes-mostrar');
        if (!textBuscarPacientes.classList.contains('text-buscador-pacientes-ocultar')) {
            textBuscarPacientes.classList.add('text-buscador-pacientes-ocultar');
        }


    });
}

const citaListItem = document.querySelectorAll('.cita-list-item');

if (citaListItem != null) {
    citaListItem.forEach(element => {
        element.addEventListener('click', (event) => {
            var idCitaSelected = element.getAttribute('idcita');
            console.log("se ha seleccionado la cita " + idCitaSelected);
        });
    });

}

const botonPacientes = document.querySelector('.boton-pacientes');
if (botonPacientes != null) {
    botonPacientes.addEventListener('click', (event) => {


    });
}

const radios = document.querySelectorAll('.mdc-radio');
radios.forEach(element => {
    var radio = new MDCRadio(element);

});


const chipSetEl = document.querySelector('.mdc-chip-set');
const chipSet = new MDCChipSet(chipSetEl);
const inputChip = document.querySelector('.input-chip-set');
inputChip.addEventListener('keydown', function (event) {
    if (event.key === 'Enter' || event.keyCode === 13) {
        var textoCaja= inputChip.value.trim();
        if(textoCaja!=null && textoCaja!="" && textoCaja.includes("@") && textoCaja.includes(".") &&  textoCaja.length>6 ){
            var chipEl = document.createElement('div');
            chipEl.innerHTML = '' +
                '<i class="material-icons mdc-chip__icon mdc-chip__icon--leading">mail</i>' +
                '<div class="mdc-chip__text">'+inputChip.value+'</div>' +
                '<i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="0" role="button">cancel</i>' +
                '';
                chipEl.classList.add('mdc-chip');
            chipSetEl.appendChild(chipEl);
            chipSet.addChip(chipEl);
            inputChip.value="";
        }
        
    }
});



// const fabButton = document.querySelector('.mdc-fab');
// if (fabButton != null) {
//     const fabRipple = new MDCRipple(fabButton);
// }


