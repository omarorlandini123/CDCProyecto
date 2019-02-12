
export default {
    components: {
        
    },
    props: {

    },
    data() {
        return {
           
        };
    },
    mounted() {
        this.ajustarPantalla();
        this.onresizeev();
    },
    updated() {
        this.ajustarPantalla();
    },
    methods: {
        iniciarComponentes() {
            //TopBAR
            
        },
        ajustarPantalla() {
            //Contenido en toda la pantalla
            const panelCitas = document.querySelectorAll(".panel-selecciona-citas");
            panelCitas.forEach(element => {
                var atrr = element.getAttribute("style");
                if (atrr == null) {
                    atrr = "";
                }
                atrr += "height:" + (window.innerHeight - 56) + "px;";
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
        }
    }
};
