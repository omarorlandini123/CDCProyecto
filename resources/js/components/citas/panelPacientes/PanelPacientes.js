import {
    MDCTopAppBar
} from "@material/top-app-bar/index";
import {
    MDCTextField
} from "@material/textfield/index";
import {
    MDCRipple
} from "@material/ripple";
import ItemPaciente from "./itemPaciente/ItemPaciente.vue";
import {
    MDCList
} from '@material/list';
import {
    MDCMenu
} from '@material/menu';

export default {
    components: {
        'item-paciente': ItemPaciente
    },
    props: {

    },
    data() {
        return {
            topbarshow: true,
            buscadorshow: false,
            pacientes: [],
            pacientemenu: null,
            menuopcionespaciente:null,
        };
    },
    mounted() {
        this.iniciarComponentes();
        this.ajustarPantalla();
        this.onresizeev();
       
    },
    updated() {
        this.ajustarPantalla();
    },
    created(){
        this.llamarPacientes();
    },
    methods: {
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

            const list = new MDCList(document.querySelector('.mdc-list'));
            const listItemRipples = list.listElements.map((listItemEl) => new MDCRipple(listItemEl));

          
            

        },
        ajustarPantalla() {
            //Contenido en toda la pantalla
            const panelPacientes = document.querySelectorAll(".panel-movil");
            panelPacientes.forEach(element => {
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
        llamarPacientes(cond = "_") {
            fetch('/historias/' + cond)
                .then(rpta => rpta.json())
                .then(rpta => {
                    this.pacientes = rpta;
                });
        }

    }
};
