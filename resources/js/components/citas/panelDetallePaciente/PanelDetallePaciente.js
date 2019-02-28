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
} from '@material/list';
import {
    MDCMenu
} from "@material/menu";
import {
    MDCChipSet
} from '@material/chips';
import {
    MDCTextFieldHelperText
} from "@material/textfield/helper-text";
import {
    MDCSelect
} from "@material/select";
import {
    MDCFloatingLabel
} from '@material/floating-label';

export default {
    components: {},
    props: {
        pacientesel: {
            type: Object,
            default: () => ({}),
        },
        frommovil: {
            type: Boolean,
        },
        nuevo: {
            type: Boolean,
        }
    },
    data() {
        return {
            ubicaciones: null,
            ubicacionsel: null,
            finalizaCarga: false,
        };
    },
    mounted() {

        this.ajustarPantalla();
        this.onresizeev();
        this.iniciarComponentes();
        this.finalizaCarga = true;
    },
    updated() {

    },
    created() {
        this.iniciarVariables();
        //this.llamarUbicaciones();

    },
    methods: {
        iniciarVariables() {
            if (!this.nuevo) {
                this.ubicacionsel = this.pacientesel.ubicacion_domicilio;
            } else {
                this.ubicacionsel = null;
            }
        },
        iniciarComponentes() {

            //valores
            const selectorDNI = document.querySelector('.txt_dni');
            if (selectorDNI != null) {
                selectorDNI.value = this.pacientesel.persona_historia.dni;
            }


            const chipSetEl = document.querySelector(".mdc-chip-set-correo");
            if (chipSetEl != null) {
                var chipSet = new MDCChipSet(chipSetEl);
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
                            var chipEl = document.createElement("div");
                            chipEl.innerHTML =
                                "" +
                                '<i class="material-icons mdc-chip__icon mdc-chip__icon--leading">mail</i>' +
                                '<div class="mdc-chip__text">' +
                                inputChip.value +
                                "</div>" +
                                '<i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="0" role="button">cancel</i>' +
                                "";
                            chipEl.classList.add("mdc-chip");
                            chipSetEl.appendChild(chipEl);
                            chipSet.addChip(chipEl);
                            inputChip.value = "";
                        }
                    }
                });
            }

            const chipSetEl2 = document.querySelector(".mdc-chip-set-telf");
            if (chipSetEl2 != null) {
                var chipSet2 = new MDCChipSet(chipSetEl2);
            }

            const inputChip2 = document.querySelector(".input-chip-set-telf");
            if (inputChip2 != null) {
                inputChip2.addEventListener("keydown", function (event) {
                    if (event.key === "Enter" || event.keyCode === 13) {
                        var textoCaja = inputChip2.value.trim();
                        if (
                            textoCaja != null &&
                            textoCaja != "" &&
                            (
                            textoCaja.includes("1")||
                            textoCaja.includes("2")||
                            textoCaja.includes("3")||
                            textoCaja.includes("4")||
                            textoCaja.includes("5")||
                            textoCaja.includes("6")||
                            textoCaja.includes("7")||
                            textoCaja.includes("8")||
                            textoCaja.includes("9")||
                            textoCaja.includes("0")
                            ) &&
                            textoCaja.length >= 9
                        ) {
                            var chipEl = document.createElement("div");
                            chipEl.innerHTML =
                                "" +
                                '<i class="material-icons mdc-chip__icon mdc-chip__icon--leading">phone</i>' +
                                '<div class="mdc-chip__text">' +
                                inputChip2.value +
                                "</div>" +
                                '<i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="0" role="button">cancel</i>' +
                                "";
                            chipEl.classList.add("mdc-chip");
                            chipSetEl2.appendChild(chipEl);
                            chipSet2.addChip(chipEl);
                            inputChip2.value = "";
                        }
                    }
                });
            }


            //TopBAR
            const topAppBarElement = document.querySelector(".mdc-top-app-bar");
            if (topAppBarElement != null) {
                var topAppBar = new MDCTopAppBar(topAppBarElement);
            }

            const fabButton = document.querySelector(".mdc-fab");
            if (fabButton != null) {
                const fabRipple = new MDCRipple(fabButton);
            }

            const textfieldselector = document.querySelectorAll('.mdc-text-field');
            textfieldselector.forEach(element => {
                var cajaTexto = new MDCTextField(element);
            });


            const listselector = document.querySelectorAll('.mdc-list');
            listselector.forEach(element => {
                var floating = new MDCList(element);
            });



            var selMedicosSelector = document.querySelector(".sel-medicos");
            if (selMedicosSelector != null) {
                var selectMedicos = new MDCSelect(selMedicosSelector);
                selectMedicos.listen("MDCSelect:change", () => {
                    this.medicosel = null;
                    this.especialidades = null;
                    this.medicos.forEach(element => {
                        if (element.id == selectMedicos.value) {
                            this.medicosel = element;
                        }
                    });
                    this.especialidades = this.medicosel.medico_especialidad;

                });
            }

            var selEspecialidadesSelector = document.querySelector(".sel-especialidad");
            if (selEspecialidadesSelector != null) {
                var selEspecialidades = new MDCSelect(selEspecialidadesSelector);
                selEspecialidades.listen("MDCSelect:change", () => {
                    this.especialidadsel = null;
                    this.especialidades.forEach(element => {
                        if (element.id == selEspecialidades.value) {
                            this.especialidadsel = element;
                        }
                    });
                });
            }




            const rippleSelector = document.querySelectorAll('.mdc-ripple-surface');
            rippleSelector.forEach(element => {
                MDCRipple.attachTo(element);
            });

            const menuOpcionesDetalleCita = document.querySelector(
                ".menu-opciones-detalle-paciente"
            );
            if (menuOpcionesDetalleCita != null) {
                const menuOpcionesDetalleCitaMDC = new MDCMenu(menuOpcionesDetalleCita);
                const botonOpcionesDetalleCita = document.querySelector(
                    ".boton-opciones-detalle-paciente"
                );
                if (botonOpcionesDetalleCita != null) {
                    botonOpcionesDetalleCita.addEventListener("click", event => {
                        menuOpcionesDetalleCitaMDC.open = !menuOpcionesDetalleCitaMDC.open;
                    });
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
        llamarMedicos(cond) {
            if (cond == "") {
                cond = "_";
            }
            fetch('/medicoslist/' + cond)
                .then(rpta => rpta.json())
                .then(rpta => {
                    this.medicos = rpta;
                });

        },
        llamarTurnos() {
            this.horariosel = null;
            fetch('/medico/' + this.medicosel.id + '/turnos', {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": window.Laravel.csrf_token
                    },
                    method: 'post',
                    credentials: "same-origin",
                    body: JSON.stringify({
                        fecha: this.fechasel
                    })
                })
                .then(response => response.json())
                .then(data => {
                    this.horarios = data;
                    this.horariosel = null;
                    this.horarios.forEach(element => {
                        if (element.nro_orden == this.citasel.nro_orden) {
                            this.horariosel = element;
                        }
                    });

                });
        },
        llamarMotivos() {
            fetch('/motivoslist')
                .then(rpta => rpta.json())
                .then(rpta => {
                    this.motivos = rpta;
                    this.motivosel = null;
                    this.motivos.forEach(element => {
                        if (element.id == this.citasel.motivo.id) {
                            this.motivosel = element;
                        }
                    });
                });
        },
        llamarAseguradoras() {
            fetch('/aseguradoraslist')
                .then(rpta => rpta.json())
                .then(rpta => {
                    this.aseguradoras = rpta;
                    this.aseguradorasel = null;
                    this.aseguradoras.forEach(element => {
                        if (element.id == this.citasel.aseguradora.id) {
                            this.aseguradorasel = element;
                        }
                    });
                });
        },
        guardarCita() {
            fetch('/citas/' + this.citasel.id, {
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
                        motivo_id: this.motivosel.id,
                        nro_orden: this.horariosel.nro_orden,
                        aseguradora_id: this.aseguradorasel.id,
                        historia_id: this.citasel.historia.id,
                        medico_especialidad_id: this.especialidadsel.id,
                        nota_adicional: this.notasel,
                        fecha_cita: this.fechasel,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.guardado) {
                        this.$emit('refrescarCitas', true);
                    }

                });
        }

    }
};
