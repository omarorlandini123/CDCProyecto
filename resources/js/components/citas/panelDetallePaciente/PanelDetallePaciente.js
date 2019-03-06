import {
    MDCTopAppBar
} from "@material/top-app-bar/index";
import {
    MDCTextField
} from "@material/textfield/index";
import {
    MDCRipple
} from "@material/ripple";
import {
    MDCList
} from "@material/list";
import {
    MDCMenu
} from "@material/menu";
import {
    MDCChipSet
} from "@material/chips";
import {
    MDCTextFieldHelperText
} from "@material/textfield/helper-text";
import {
    MDCSelect
} from "@material/select";
import {
    MDCFloatingLabel
} from "@material/floating-label";
import {
    userInfo
} from "os";

import PanelModal from './../../PanelModal.vue'

export default {
    components: {
        "panel-modal": PanelModal,
    },
    props: {
        pacientesel: {
            type: Object,
            default: () => ({})
        },
        frommovil: {
            type: Boolean
        },
        nuevo: {
            type: Boolean
        }
    },
    data() {
        return {
            ubicaciones: null,
            ubicacionsel: null,
            finalizaCarga: false,
            modalGuardar:null,
            modalValidar:null,
            
        };
    },
    mounted() {
        this.ajustarPantalla();
        this.onresizeev();
        this.iniciarComponentes();
        this.finalizaCarga = true;
    },
    updated() {},
    created() {
        this.iniciarVariables();
        this.llamarUbicaciones();
    },
    methods: {
        iniciarVariables() {
            if (this.nuevo) {
                this.ubicacionsel = null;
            } else {
                this.ubicacionsel = this.pacientesel.persona_historia.ubicacion_nacimiento;
            }
            this.modalGuardar={
                confGuardar:false,
                contenidoguardar:"",            
                accionesGuardar:null,
                keyModalGuardar:0,
            };
            this.modalValidar={
                conf:false,
                contenido:"",            
                acciones:null,
                keyModal:0,
            }


            this.calculateAge();
        },
        llenarCorreo() {
            var principal = this;
            const chipSetEl = document.querySelector(".mdc-chip-set-correo");
            if (chipSetEl != null) {
                var chipSet = new MDCChipSet(chipSetEl);

                chipSet.listen("MDCChip:removal", function (event) {
                    var correoAEliminar =
                        event.detail.root.children[1].textContent;
                    var contieneCorreo = false;
                    var posicion = 0;
                    var posicionEliminar = 0;
                    principal.pacientesel.persona_historia.correo.forEach(
                        element => {
                            if (
                                element.correo.trim() == correoAEliminar.trim()
                            ) {
                                contieneCorreo = true;
                                posicionEliminar = posicion;
                            }
                            posicion++;
                        }
                    );
                    if (contieneCorreo) {
                        principal.pacientesel.persona_historia.correo.splice(
                            posicionEliminar,
                            1
                        );
                    }
                });
            }
            const inputChip = document.querySelector(".input-chip-set-correo");
            if (inputChip != null) {
                inputChip.addEventListener("keydown", function (event) {
                    if (event.key === "Enter" || event.keyCode === 13) {
                        var textoCaja = inputChip.value.trim();
                        if (
                            textoCaja != null &&
                            textoCaja != "" &&
                            textoCaja.includes("@") &&
                            textoCaja.includes(".") &&
                            textoCaja.length > 6
                        ) {
                            var contieneCorreo = false;
                            principal.pacientesel.persona_historia.correo.forEach(
                                element => {
                                    if (
                                        element.correo.trim() ==
                                        textoCaja.trim()
                                    ) {
                                        contieneCorreo = true;
                                    }
                                }
                            );
                            if (!contieneCorreo) {
                                let chipEl = principal.armarChipCorreo(
                                    textoCaja.trim()
                                );
                                chipSetEl.appendChild(chipEl);
                                chipSet.addChip(chipEl);

                                principal.pacientesel.persona_historia.correo.push({
                                    id: 0,
                                    correo: textoCaja,
                                    persona_id: principal.pacientesel
                                        .persona_historia.id
                                });
                            }
                            inputChip.value = "";
                        }
                    }
                });
            }
            principal.pacientesel.persona_historia.correo.forEach(element => {
                let chipEl = principal.armarChipCorreo(element.correo.trim());
                chipSetEl.appendChild(chipEl);
                chipSet.addChip(chipEl);
            });
        },
        armarChipCorreo(correo) {
            let chipEl = document.createElement("div");
            chipEl.classList.add("mdc-chip");

            let icono = document.createElement("li");
            icono.classList.add("material-icons");
            icono.classList.add("mdc-chip__icon");
            icono.classList.add("mdc-chip__icon--leading");
            icono.textContent = "mail";

            let contenido = document.createElement("div");
            contenido.classList.add("mdc-chip__text");
            contenido.classList.add("correo_paciente");
            contenido.innerText = correo;

            let iconoCerrar = document.createElement("li");
            iconoCerrar.classList.add("material-icons");
            iconoCerrar.classList.add("mdc-chip__icon");
            iconoCerrar.classList.add("mdc-chip__icon--trailing");
            iconoCerrar.setAttribute("role", "button");
            iconoCerrar.textContent = "cancel";
            chipEl.appendChild(icono);
            chipEl.appendChild(contenido);
            chipEl.appendChild(iconoCerrar);
            return chipEl;
        },
        llenarTelefono() {
            var principal = this;
            var chipSetEl = document.querySelector(".mdc-chip-set-telf");
            if (chipSetEl != null) {
                var chipSet = new MDCChipSet(chipSetEl);

                chipSet.listen("MDCChip:removal", function (event) {
                    var telefonoAEliminar =
                        event.detail.root.children[1].textContent;
                    var contieneTelefono = false;
                    var posicion = 0;
                    var posicionEliminar = 0;
                    principal.pacientesel.persona_historia.telefono.forEach(
                        element => {
                            if (
                                element.telefono.trim() == telefonoAEliminar.trim()
                            ) {
                                contieneTelefono = true;
                                posicionEliminar = posicion;
                            }
                            posicion++;
                        }
                    );
                    if (contieneTelefono) {
                        principal.pacientesel.persona_historia.telefono.splice(
                            posicionEliminar,
                            1
                        );
                    }
                });
            }
            var inputChip = document.querySelector(".input-chip-set-telf");
            if (inputChip != null) {
                inputChip.addEventListener("keydown", function (event) {
                    if (event.key === "Enter" || event.keyCode === 13) {
                        var textoCaja = inputChip.value.trim();
                        if (
                            textoCaja != null &&
                            textoCaja != "" &&
                            (textoCaja.includes("1") ||
                                textoCaja.includes("2") ||
                                textoCaja.includes("3") ||
                                textoCaja.includes("4") ||
                                textoCaja.includes("5") ||
                                textoCaja.includes("6") ||
                                textoCaja.includes("7") ||
                                textoCaja.includes("8") ||
                                textoCaja.includes("9") ||
                                textoCaja.includes("0")) &&
                            textoCaja.length >= 9
                        ) {
                            var contieneTelefono = false;
                            principal.pacientesel.persona_historia.telefono.forEach(
                                element => {
                                    if (
                                        element.telefono.trim() ==
                                        textoCaja.trim()
                                    ) {
                                        contieneTelefono = true;
                                    }
                                }
                            );
                            if (!contieneTelefono) {
                                let chipEl = principal.armarChipTelefono(
                                    textoCaja.trim()
                                );
                                chipSetEl.appendChild(chipEl);
                                chipSet.addChip(chipEl);

                                principal.pacientesel.persona_historia.telefono.push({
                                    id: 0,
                                    telefono: textoCaja,
                                    persona_id: principal.pacientesel
                                        .persona_historia.id
                                });
                            }
                            inputChip.value = "";
                        }
                    }
                });
            }
            principal.pacientesel.persona_historia.telefono.forEach(element => {
                let chipEl = principal.armarChipTelefono(element.telefono.trim());
                chipSetEl.appendChild(chipEl);
                chipSet.addChip(chipEl);
            });
        },
        armarChipTelefono(telefono) {
            let chipEl = document.createElement("div");
            chipEl.classList.add("mdc-chip");

            let icono = document.createElement("li");
            icono.classList.add("material-icons");
            icono.classList.add("mdc-chip__icon");
            icono.classList.add("mdc-chip__icon--leading");
            icono.textContent = "phone";

            let contenido = document.createElement("div");
            contenido.classList.add("mdc-chip__text");
            contenido.classList.add("telefono_paciente");
            contenido.innerText = telefono;

            let iconoCerrar = document.createElement("li");
            iconoCerrar.classList.add("material-icons");
            iconoCerrar.classList.add("mdc-chip__icon");
            iconoCerrar.classList.add("mdc-chip__icon--trailing");
            iconoCerrar.setAttribute("role", "button");
            iconoCerrar.textContent = "cancel";
            chipEl.appendChild(icono);
            chipEl.appendChild(contenido);
            chipEl.appendChild(iconoCerrar);
            return chipEl;
        },
        iniciarComponentes() {
            this.llenarCorreo();
            this.llenarTelefono();


            //TopBAR
            const topAppBarElement = document.querySelector(".mdc-top-app-bar");
            if (topAppBarElement != null) {
                var topAppBar = new MDCTopAppBar(topAppBarElement);
            }

            const fabButton = document.querySelector(".mdc-fab");
            if (fabButton != null) {
                const fabRipple = new MDCRipple(fabButton);
            }

            const textfieldselector = document.querySelectorAll(
                ".mdc-text-field"
            );
            textfieldselector.forEach(element => {
                var cajaTexto = new MDCTextField(element);
            });

            const listselector = document.querySelectorAll(".mdc-list");
            listselector.forEach(element => {
                var floating = new MDCList(element);
                var listItemRipples = floating.listElements.map((listItemEl) => new MDCRipple(listItemEl));
            });


            var selUbicaciones = document.querySelector(".sel-ubicaciones");
            if (selUbicaciones != null) {

                var selectUbicaciones = new MDCSelect(selUbicaciones);
                selectUbicaciones.listen("MDCSelect:change", () => {
                    // this.ubicacionsel = null;
                    this.ubicaciones.forEach(element => {
                        if (element.id == selectUbicaciones.value) {
                            this.ubicacionsel = element;
                            this.pacientesel.persona_historia.ubicacion_nacimiento = element;
                        }
                    });
                });
                var selubicacion = document.querySelector(".seleccion-ubicacion");
                if (selubicacion != null && this.ubicacionsel != null) {
                    var ubicacionfloat = document.querySelector(".floating-label-ubicacion");
                    ubicacionfloat.classList.add('mdc-floating-label--float-above');
                    selubicacion.innerHTML = this.ubicacionsel.tag;
                }

            }

            const rippleSelector = document.querySelectorAll(
                ".mdc-ripple-surface"
            );
            rippleSelector.forEach(element => {
                MDCRipple.attachTo(element);
            });

            const menuOpcionesDetalleCita = document.querySelector(
                ".menu-opciones-detalle-paciente"
            );
            if (menuOpcionesDetalleCita != null) {
                const menuOpcionesDetalleCitaMDC = new MDCMenu(
                    menuOpcionesDetalleCita
                );
                const botonOpcionesDetalleCita = document.querySelector(
                    ".boton-opciones-detalle-paciente"
                );
                if (botonOpcionesDetalleCita != null) {
                    botonOpcionesDetalleCita.addEventListener(
                        "click",
                        event => {
                            menuOpcionesDetalleCitaMDC.open = !menuOpcionesDetalleCitaMDC.open;
                        }
                    );
                }
            }
           
        },
        ajustarPantalla() {
            //Contenido en toda la pantalla
            const panelCitas = document.querySelectorAll(".panel-movil");
            panelCitas.forEach(element => {
                var atrr = element.getAttribute("style");
                if (atrr == null) {
                    atrr = "";
                }
                atrr += "height:" + (window.innerHeight - 112) + "px;";
                element.setAttribute("style", atrr);
            });
        },
        abrirBuscador: function (event) {
            this.buscadorshow = true;
            this.topbarshow = false;
        },
        cerrarBuscador: function (event) {
            this.buscadorshow = false;
            this.topbarshow = true;
        },
        onresizeev() {
            var ele = this;
            window.addEventListener("resize", function () {
                ele.ajustarPantalla();
            });
        },
        llamarUbicaciones() {
            fetch("/ubicaciones/_")
                .then(rpta => rpta.json())
                .then(rpta => {
                    this.ubicaciones = rpta;
                    if (this.ubicacionsel != null) {
                        this.ubicaciones.forEach(element => {
                            if (element.id == this.ubicacionsel.id) {
                                this.ubicacionsel = element;
                            }
                        });
                    }
                });
        },
        calculateAge() {
            var birthday = this.pacientesel.persona_historia.fecha_nacimiento;
            var birthday_date = null;
            if (birthday == null) {
                birthday_date = new Date();
            } else {
                var birthday_arr = birthday.split("-");
                birthday_date = new Date(
                    birthday_arr[0],
                    birthday_arr[1] - 1,
                    birthday_arr[2]
                );
            }

            var ageDifMs = Date.now() - birthday_date.getTime();
            var ageDate = new Date(ageDifMs);
            var edad = Math.abs(ageDate.getUTCFullYear() - 1970);
            this.pacientesel.persona_historia.edad = edad;
        },
        confirmarNuevoPaciente(){
            this.modalGuardar.confGuardar=true;
            this.modalGuardar.keyModalGuardar+=1;
            if(this.nuevo){
               this.modalGuardar.contenidoguardar= "Vas a crear un nuevo paciente ¿Estás de acuerdo?";
                this.modalGuardar.accionesGuardar=[
                    {
                        id:0,
                        nombre:"guardarPaciente",
                        texto:"Crear"
                    }
                ]
            }else{
                this.modalGuardar.contenidoguardar= "Vas a sobreescribir la información del paciente ¿Estás de acuerdo?";
                this.modalGuardar.accionesGuardar=[
                    {
                        id:0,
                        nombre:"guardarPaciente",
                        texto:"Sobreesribir"
                    }
                ]
            }
        },                  
        guardarPaciente() {

            this.modalGuardar.confGuardar=false;
            this.modalGuardar.keyModalGuardar+=1

            if(
                (
                    this.pacientesel.persona_historia.dni==null ||
                    this.pacientesel.persona_historia.dni=="" 
                )&& 
                (
                    this.pacientesel.persona_historia.pasaporte==null ||
                    this.pacientesel.persona_historia.pasaporte=="" 
                )&&
                (
                    this.pacientesel.persona_historia.carne_extra==null ||
                    this.pacientesel.persona_historia.carne_extra=="" 
                )&&
                (
                    this.pacientesel.persona_historia.ruc==null ||
                    this.pacientesel.persona_historia.ruc=="" 
                )                    
            ){
                this.modalValidar.keyModal+=1;
                this.modalValidar.conf=true;                
                this.modalValidar.contenido= "El paciente debe tener al menos un documento.";
                this.modalValidar.acciones=[];
                
                
            }else if(this.pacientesel.persona_historia.telefono.length<2){
                this.modalValidar.keyModal+=1;
                this.modalValidar.conf=true;               
                this.modalValidar.contenido= "El paciente debe tener al menos dos teléfonos.";
                this.modalValidar.acciones=[];
                
            }else if(
                    this.pacientesel.persona_historia.nombres==null ||
                    this.pacientesel.persona_historia.nombres=="" ||
                    this.pacientesel.persona_historia.apellido_paterno==null ||
                    this.pacientesel.persona_historia.apellido_paterno=="" ||
                    this.pacientesel.persona_historia.apellido_materno==null ||
                    this.pacientesel.persona_historia.apellido_materno=="" 
                ){
                this.modalValidar.keyModal+=1;
                this.modalValidar.conf=true;               
                this.modalValidar.contenido= "El paciente debe tener los nombres y apellidos completos.";
                this.modalValidar.acciones=[];
                
            }
            else if(
                this.pacientesel.persona_historia.fecha_nacimiento==null ||
                this.pacientesel.persona_historia.fecha_nacimiento=="" 
            ){
            this.modalValidar.keyModal+=1;
            this.modalValidar.conf=true;               
            this.modalValidar.contenido= "El paciente debe tener una fecha de nacimiento.";
            this.modalValidar.acciones=[];
            
        }
            else{
                if (this.nuevo) {
                
                    fetch('/pacientes', {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-Token": window.Laravel.csrf_token
                            },
                            method: 'post',
                            credentials: "same-origin",
                            body: JSON.stringify({
                                historia_sel: JSON.stringify(this.pacientesel)
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data.id);
                            if (data.guardado) {
                                this.$emit('refrescarPacientes', true);
                            }
    
                        });
                    
                } else {
                   
                    fetch('/pacientes/' + this.pacientesel.id, {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-Token": window.Laravel.csrf_token
                            },
                            method: 'post',
                            credentials: "same-origin",
                            body: JSON.stringify({
                                _method: 'PUT',
                                historia_sel: JSON.stringify(this.pacientesel)
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.guardado) {
                                this.$emit('refrescarPacientes', true);
                            }
    
                        });
                    
                }
            }
           
        }
    }
};
