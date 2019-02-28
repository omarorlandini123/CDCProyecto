import PanelCitas from "./panelCitas/PanelCitas.vue";
import PanelSeleccionaCita from "./panelSeleccionaCita/PanelSeleccionaCita.vue";
import PanelDetalleCita from "./panelDetalleCita/panelDetalleCita.vue";
import PanelPacientes from "./panelPacientes/PanelPacientes.vue";
import PanelSeleccionaPaciente from "./panelSeleccionaPaciente/PanelSeleccionaPaciente.vue";
import PanelDetallePaciente from "./panelDetallePaciente/PanelDetallePaciente.vue";
export default {
    components: {
        "panel-citas": PanelCitas,
        "panel-selecciona-cita": PanelSeleccionaCita,
        "panel-detalle-cita": PanelDetalleCita,
        "panel-pacientes": PanelPacientes,
        "panel-selecciona-paciente": PanelSeleccionaPaciente,
        "panel-detalle-paciente": PanelDetallePaciente,
    },
    data() {
        return {
            paneltelefono: false,
            paneldesktop: true,
            modoMovil: false,
            modoDesktop: false,
            //para modo teléfono
            mostrarPhoneCitas: true,
            mostrarPhoneDetalleCita: false,
            mostrarPhonePacientes: false,
            mostrarPhoneDetallePaciente: false,
            //para modo desktop
            mostrarDesktopSeleccionaCita: true,
            mostrarDesktopDetalleCita: false,
            mostrarDesktopSeleccionaPaciente: false,
            mostrarDesktopDetallePaciente: false,
            //Para DetalleCita
            citaselect: null,
            isnuevacita: false,
            historianuevacita: null,
            //Para ListarCitas
            keyLista: 0,
            //Para Panel Pacientes
            keyPanelPacientes: 0,
            //Para DetallePaciente 
            pacienteSelect: null,
            isnuevopaciente: false,

        };
    },
    mounted() {
        this.determinarModo();
        this.onresizeev();
    },

    methods: {

        cerrarPaneles() {
            //para Teléfono
            this.mostrarPhoneCitas = false;
            this.mostrarPhoneDetalleCita = false;
            this.mostrarPhonePacientes = false;
            //Para Desktop
            this.mostrarDesktopSeleccionaCita = false;
            this.mostrarDesktopDetalleCita = false;
            this.mostrarDesktopSeleccionaPaciente = false;
        },
        abrirpaneldetallecita: function ($event) {
            this.determinarModo();
            this.cerrarPaneles();
            this.citaselect = $event;
            this.isnuevacita = false;
            this.historianuevacita = null;
            this.showpaneldetallecita();

        },
        nuevaCita: function (event) {
            this.determinarModo();
            this.cerrarPaneles();
            this.citaselect = {id:0};
            this.isnuevacita = true;
            this.historianuevacita = event;
            this.showpaneldetallecita();
        },
        showpaneldetallecita() {
            if (this.modoMovil) {
                this.mostrarPhoneDetalleCita = true;
            }
            if (this.modoDesktop) {
                this.mostrarPhoneCitas = true;
                this.mostrarDesktopDetalleCita = true;
            }
        },
        abrirPacientes: function ($event) {
            this.determinarModo();
            this.cerrarPaneles();
            if (this.modoMovil) {
                this.mostrarPhonePacientes = true;
            }
            if (this.modoDesktop) {
                this.mostrarPhonePacientes = true;
                this.mostrarDesktopSeleccionaPaciente = true;
            }
        },
        abrirPaciente: function ($event) {
            this.determinarModo();
            this.cerrarPaneles();
            if ($event == 0) {
                this.isnuevopaciente = true;
                this.pacienteSelect= ({id:0});
            } else {
                this.isnuevopaciente = false;
                this.pacienteSelect = $event;
            }

            if (this.modoMovil) {
                this.mostrarPhoneDetallePaciente = true;
            }
            if (this.modoDesktop) {
                this.mostrarPhonePacientes = true;
                this.mostrarDesktopDetallePaciente = true;
            }
        },
        refrescarCitas: function ($event) {
            this.keyLista += 1;
        },
        refrescarPacientes: function ($event) {
            this.keyPanelPacientes += 1;
        },
        cerrarPanelDetalleMovil: function ($event) {
            this.determinarModo();
            this.cerrarPaneles();
            if (this.modoMovil) {
                this.mostrarPhoneCitas = true;
            }
        },
        cerrarPanelPacientes: function ($event) {
            this.determinarModo();
            this.cerrarPaneles();
            if (this.modoMovil) {
                this.mostrarPhoneCitas = true;
            }

            if (this.modoDesktop) {
                this.mostrarPhoneCitas = true;
                this.mostrarDesktopSeleccionaCita = true;
            }
        },
        determinarModo: function () {
            if (window.innerWidth < 480) {
                this.paneltelefono = true;
                this.paneldesktop = false;
                this.modoMovil = true;
                this.modoDesktop = false;
            } else {
                this.paneltelefono = true;
                this.paneldesktop = true;
                this.modoDesktop = true;
                this.modoMovil = false;
            }
        },
        onresizeev() {
            var ele = this;
            window.addEventListener("resize", function () {
                ele.determinarModo();
            });
        }
    }
};
