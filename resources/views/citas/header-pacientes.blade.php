<div class="header-pacientes-contenido header-pacientes-ocultar">
    <header class="mdc-top-app-bar top-bar-pacientes"   >
        <div class="mdc-top-app-bar__row">
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                {{-- <span class="mdc-list-item__graphic material-icons" aria-hidden="true">account_circle</span> --}}
                <a href="#" class="material-icons mdc-top-app-bar__action-item top-bar-pacientes-back" aria-label="Back"
                alt="Back">arrow_back</a>
                <span class="mdc-top-app-bar__title">Pacientes</span>
            </section>
            <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
                <a href="#" class="material-icons mdc-top-app-bar__action-item top-bar-pacientes-search" aria-label="Buscar"
                    alt="Buscar">search</a>

            </section>
        </div>
    </header>

    <div class="text-field-container text-buscador-pacientes">
        <div class="mdc-text-field text-field mdc-text-field--with-trailing-icon mdc-ripple-upgraded" style="
                --mdc-ripple-fg-size:152px; 
                --mdc-ripple-fg-scale:1.77858; 
                --mdc-ripple-fg-translate-start:74.6667px, -29.3333px; 
                --mdc-ripple-fg-translate-end:51.125px, -48px; width: 100%; min-width: 0px;">

            <input type="text" id="text-field-filled-leading" placeholder="Busca una paciente" class="mdc-text-field__input"
                style="padding-top: 6px;margin-right: 48px;padding-right: 0px;border-bottom-style: none;caret-color: rgba(0, 0, 0, 0.6);">
            <i class="material-icons mdc-text-field__icon cerrar-buscar-pacientes" tabindex="0">close</i>
            <label class="mdc-floating-label" for="text-field-filled-leading"></label>

        </div>
        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
            id="pw-validation-msg"></p>
    </div>
</div>