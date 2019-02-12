import {MDCTopAppBar} from "@material/top-app-bar/index";
import {MDCTextField} from "@material/textfield/index";
import {MDCRipple} from "@material/ripple";
import {MDCList} from '@material/list';
import {MDCMenu} from "@material/menu";
import {MDCTextFieldHelperText} from "@material/textfield/helper-text";
import {MDCSelect} from "@material/select";
import {MDCFloatingLabel} from '@material/floating-label';

export default {
    components: {},
    props: {
        citasel: {
            type: Object,
            default: () => ({}),
        },
        frommovil:{
            type:Boolean,            
        },
    },
    data() {
        return {
            medicos: null,
            medicosel: null,
            especialidades: null,
            especialidadsel: null,
            fechasel:null,
            horarios: null,
            horariosel: null,
            motivos: null,
            motivosel: null,
            aseguradoras: null,
            aseguradorasel: null,
            notasel:null,
            finalizaCarga:false,
        };
    },
    mounted() {      
       
        this.ajustarPantalla();
        this.onresizeev();
        this.iniciarComponentes();
        this.finalizaCarga=true;
    },
    updated() {
       
    },
    created() {
        this.iniciarVariables();
        this.llamarMedicos("");
        this.llamarMotivos();
        this.llamarAseguradoras();
        this.llamarTurnos();

    },
    methods: {
        iniciarVariables() {
            this.medicosel = this.citasel.medico_especialidad.medico;
            this.especialidadsel = this.citasel.medico_especialidad;
            this.especialidades= this.citasel.medico_especialidad.medico.medico_especialidad;
            this.fechasel = this.citasel.fecha_cita;
            this.notasel=this.citasel.nota_adicional;
        },
        iniciarComponentes() {
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
            var selectMedicos = new MDCSelect(selMedicosSelector);
            selectMedicos.listen("MDCSelect:change", () => {
                this.medicosel=null;
                this.especialidades=null;
                this.medicos.forEach(element => {
                    if (element.id == selectMedicos.value) {
                        this.medicosel = element;
                    }
                });
                this.especialidades = this.medicosel.medico_especialidad;

            });

            var selEspecialidadesSelector = document.querySelector(".sel-especialidad");
            var selEspecialidades = new MDCSelect(selEspecialidadesSelector);
            selEspecialidades.listen("MDCSelect:change", () => {
                this.especialidadsel=null;
                this.especialidades.forEach(element => {
                    if (element.id == selEspecialidades.value) {
                        this.especialidadsel = element;
                    }
                });
            });
            var selHorariosSelector = document.querySelector(".sel-horario");
            var selHorarios = new MDCSelect(selHorariosSelector);
            selHorarios.listen("MDCSelect:change", () => {
                this.horariosel=null;
                this.horarios.forEach(element => {
                    if (element.nro_orden == selHorarios.value) {
                        this.horariosel = element;
                    }
                });
            });

            var selMotivosSelector = document.querySelector(".sel-motivo");
            var selMotivos = new MDCSelect(selMotivosSelector);
            selMotivos.listen("MDCSelect:change", () => {
                this.motivosel=null;
                this.motivos.forEach(element => {
                    if (element.id == selMotivos.value) {
                        this.motivosel = element;
                    }
                });
            });
            var selAseguradorasSelector = document.querySelector(".sel-aseguradora");
            var selAseguradoras = new MDCSelect(selAseguradorasSelector);
            selAseguradoras.listen("MDCSelect:change", () => {
                this.aseguradorasel=null;
                this.aseguradoras.forEach(element => {
                    if (element.id == selAseguradoras.value) {
                        this.aseguradorasel = element;
                    }
                });
            });




            const rippleSelector = document.querySelectorAll('.mdc-ripple-surface');
            rippleSelector.forEach(element => {
                 MDCRipple.attachTo(element);
            });

            const menuOpcionesDetalleCita = document.querySelector(
                ".menu-opciones-detalle-cita"
            );
            if (menuOpcionesDetalleCita != null) {
                const menuOpcionesDetalleCitaMDC = new MDCMenu(menuOpcionesDetalleCita);
                const botonOpcionesDetalleCita = document.querySelector(
                    ".boton-opciones-detalle-cita"
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
                    this.motivosel=null;
                    this.motivos.forEach(element=>{
                        if(element.id==this.citasel.motivo.id){
                            this.motivosel=element;
                        }
                    });
                });
        },
        llamarAseguradoras() {
            fetch('/aseguradoraslist')
                .then(rpta => rpta.json())
                .then(rpta => {
                    this.aseguradoras = rpta;
                    this.aseguradorasel=null;
                    this.aseguradoras.forEach(element=>{
                        if(element.id==this.citasel.aseguradora.id){
                            this.aseguradorasel=element;
                        }
                    });
                });
        },
        guardarCita(){
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
                    _method:'PUT',
                    motivo_id: this.motivosel.id,
                    nro_orden: this.horariosel.nro_orden,
                    aseguradora_id:this.aseguradorasel.id,
                    historia_id:this.citasel.historia.id,
                    medico_especialidad_id:this.especialidadsel.id,
                    nota_adicional:this.notasel,
                    fecha_cita:this.fechasel,
                })
            })
            .then(response => response.json())
            .then(data => {  
                if(data.guardado){
                    this.$emit('refrescarCitas',true);
                }             
               
            });
        }

    }
};