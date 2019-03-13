import {MDCTopAppBar} from "@material/top-app-bar/index";
import {MDCTextField} from "@material/textfield/index";
import {MDCRipple} from "@material/ripple";
import ItemCita from "./itemCita/ItemCita.vue";
import {MDCList} from '@material/list';

export default {
    components: {
        'item-cita': ItemCita
    },
    props: {
    },
    data() {
        return {
            topbarshow: true,
            buscadorshow: false,
            citas:[]
        };
    },
    mounted() {
        this.iniciarComponentes();
        this.ajustarPantalla();
        this.onresizeev();
        this.llamarCitas();
    },
    updated() {
        this.ajustarPantalla();
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
            this.llamarCitas("---");
        },
        onresizeev() {
            var ele = this;
            window.addEventListener("resize", function () {
                ele.ajustarPantalla();
            });
        },
        llamarCitas(cond="_"){
            if(cond!="---"){
            var condSelect=document.querySelector('.text-buscador-input');
            if(condSelect!=null){
                cond=condSelect.value;
            }
            if(cond==""){
                cond="_";
            }
        }else{
            cond="_"; 
        }
            if( cond ==null || cond.trim()=="" ){
                cond="_";
            }
            fetch('/citaslist/'+cond)
            .then(rpta=>{               
                    return rpta.json();                                   
            })
            .then(rpta=>{                
                if(rpta.noauth){
                    window.location.href = '/login';
                }
                this.citas=rpta;
            });
        }

    }
};
