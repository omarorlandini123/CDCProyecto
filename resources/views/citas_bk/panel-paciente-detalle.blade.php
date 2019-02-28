@include('citas.header-paciente-detalle')
<div class="panel-pacientes-detalle-contenido panel-pacientes-detalle-ocultar">
    <div class="panel-pacientes-detalle panel-max-height" style="overflow-y: scroll;padding-left: 0px; padding-right: 0px; ">
        <style>
            .preview-paciente{
            align-self: center;
            width: 100%;
            text-align: center;
        }
        .icono-usuario{
            font-size: 200px;
        }
        .icono-adjuntar{
            cursor: pointer;
        }
        </style>
        <div class="preview-paciente">
            <span class=" material-icons icono-usuario" aria-hidden="true">account_circle</span>
            <span class=" material-icons icono-adjuntar" aria-hidden="true">attach_file</span>
        </div>
        <div class="mdc-layout-grid" style="padding: 25px;position:relative;">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-3-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">D.N.I.</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-3-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">Pasaporte</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-3-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">Carné Ext.</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-3-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">R.U.C.</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-6-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">Nombres</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-6-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">Apellido Paterno</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-6-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">Apellido Materno</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-6-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone"
                    style="text-align: center;">
                    <div class="mdc-form-field ">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" checked>
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label for="radio-1">Masculino</label>
                    </div>
                    <div class="mdc-form-field ">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" checked>
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label for="radio-1">Femenino</label>
                    </div>
                </div>

                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-3-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input type="date" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">Fecha Nacimiento</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-3-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input disabled type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">Edad</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>

                <div class="mdc-layout-grid__cell 
             mdc-layout-grid__cell--span-6-desktop
             mdc-layout-grid__cell--span-8-tablet
             mdc-layout-grid__cell--span-4-phone">
                    <div class="mdc-select select-100">
                        <input type="hidden" name="enhanced-select">
                        <i class="mdc-select__dropdown-icon"></i>
                        <div class="mdc-select__selected-text"></div>
                        <div class="mdc-select__menu mdc-menu mdc-menu-surface select-25">
                            <ul class="mdc-list">
                                <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true"></li>
                                <li class="mdc-list-item" data-value="grains">
                                    Bread, Cereal, Rice, and Pasta
                                </li>
                                <li class="mdc-list-item" data-value="vegetables">
                                    Vegetables
                                </li>
                                <li class="mdc-list-item" data-value="fruit">
                                    Fruit
                                </li>
                            </ul>
                        </div>
                        <span class="mdc-floating-label">Lugar de Nacimiento</span>
                        <div class="mdc-line-ripple"></div>
                    </div>

                </div>
                <div class="mdc-layout-grid__cell 
                mdc-layout-grid__cell--span-12-desktop
                mdc-layout-grid__cell--span-8-tablet
                mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        <div class="mdc-text-field text-field  mdc-ripple-upgraded caja-detalle-cita" style="--mdc-ripple-fg-size:147px; --mdc-ripple-fg-scale:1.78431; --mdc-ripple-fg-translate-start:26px, -50.6875px; --mdc-ripple-fg-translate-end:49.5px, -45.5px;">

                            <input  type="text" id="text-field-filled-leading" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="text-field-filled-leading">Dirección</label>
                            <div class="mdc-line-ripple" style="transform-origin: 99.5px center 0px;"></div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell 
             mdc-layout-grid__cell--span-6-desktop
             mdc-layout-grid__cell--span-8-tablet
             mdc-layout-grid__cell--span-4-phone">
                <div class="text-field-container">
                        
                                <div class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita " style="--mdc-ripple-fg-size:282px;--mdc-ripple-fg-scale:1.71975;--mdc-ripple-fg-translate-start:283.516px, -119px;--mdc-ripple-fg-translate-end:94.8281px, -113px;">
                                        
                                        <input type="text" id="text-field-filled-leading" class="mdc-text-field__input input-chip-set">
                                        
                                        <label class="mdc-floating-label mdc-floating-label--float-above" for="text-field-filled-leading">e-mails</label>
                                        <div class="mdc-line-ripple mdc-line-ripple--active mdc-line-ripple--deactivating" style="transform-origin: 424.516px center 0px;"></div>
                                        
                                </div>
                                <div class="mdc-chip-set" ></div>
                        
                        
                        
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                    
                            <!-- <div class="mdc-chip" tabindex="0">
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--leading">mail</i>
                                <div class="mdc-chip__text">Chip content</div>
                                <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="0" role="button">cancel</i>
                            </div> -->
                            
                </div>
                <div class="mdc-layout-grid__cell 
             mdc-layout-grid__cell--span-6-desktop
             mdc-layout-grid__cell--span-8-tablet
             mdc-layout-grid__cell--span-4-phone">
                    <div class="text-field-container">
                        
                                <div class="mdc-text-field text-field mdc-ripple-upgraded caja-detalle-cita " style="--mdc-ripple-fg-size:282px;--mdc-ripple-fg-scale:1.71975;--mdc-ripple-fg-translate-start:283.516px, -119px;--mdc-ripple-fg-translate-end:94.8281px, -113px;">
                                        
                                        <input type="text" id="text-field-filled-leading" class="mdc-text-field__input input-chip-set">
                                        
                                        <label class="mdc-floating-label mdc-floating-label--float-above" for="text-field-filled-leading">Teléfono</label>
                                        <div class="mdc-line-ripple mdc-line-ripple--active mdc-line-ripple--deactivating" style="transform-origin: 424.516px center 0px;"></div>
                                        
                                </div>
                                <div class="mdc-chip-set" ></div>
                        
                        
                        
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg"></p>
                    </div>
                    
                            
                            
                </div>
                
                
                
                

            </div>

        </div>
    </div>

    <button class="mdc-fab  mdc-ripple-upgraded boton-detalle-cita" aria-label="Guardar">
        <span class="mdc-fab__icon material-icons">save</span>
    </button>

</div>