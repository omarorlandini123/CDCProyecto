<div class="panel-selecciona-paciente" style="position:relative;">

        <style>
            .background {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
            }
            .content {
                width: 50%;
                height: 50%;
                position:absolute; /*it can be fixed too*/
                left:0; right:0;
                top:0; bottom:0;
                margin:auto;
                text-align: center;
                
                /*this to solve "the content will not be cut when the window is smaller than the content": */
                max-width:100%;
                max-height:100%;
                overflow:visible;
            }
            .icono-usuario{
                font-size:20em;
                color:#888;
                margin: 0px;
            }
            .texto-usuario{
                font-size:2em;
                margin: 0px;
                padding: 0px;
            }

            @media only screen and (max-height: 550px) {
                .icono-usuario{
                    font-size:10em;
                    color:#888;
                    margin: 0px;
                }
                .texto-usuario{
                    font-size:1em;
                    margin: 0px;
                    padding: 0px;
                }
            }
        </style>
        <div class="background">
            <div class="content"> 
                    <span class=" material-icons icono-usuario" aria-hidden="true" style="">account_circle</span>
                    <p class="texto-usuario">Selecciona un paciente para poder crear una cita.</p>
            </div>
        </div>
    </div>
    