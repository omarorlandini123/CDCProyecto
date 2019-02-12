<li class="mdc-list-item mdc-ripple-upgraded cita-list-item" tabindex="0" idcita="34">
    {{-- <span class="mdc-list-item__graphic material-icons" aria-hidden="true">account_circle</span> --}}
    <img class="mdc-list-item__graphic" src="https://lh3.googleusercontent.com/-vw0KVKA4FHI/AAAAAAAAAAI/AAAAAAAAAAA/ACevoQMnk5JBHDZfHX3DMO0fv-mO7UFqCg/s100-c-mo/photo.jpg"
        height="40" width="40">
    <span class="mdc-list-item__text">
        <span class="mdc-list-item__primary-text">Amanda Linares Rodriguez</span>
        <span class="mdc-list-item__secondary-text">Hoy 4:00pm</span></span>
    <span class="mdc-list-item__meta " style="display: grid;">
        <span class=" material-icons" aria-hidden="true">info</span>
        <span class="material-icons menu-cita-list" aria-hidden="true">keyboard_arrow_down</span>

    </span>
    <div id="toolbar" class="toolbar mdc-menu-surface--anchor">
        <div class="mdc-menu mdc-menu-surface " tabindex="-1">
            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                @auth

                <li class="mdc-list-item" role="menuitem" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <span class="mdc-list-item__text">Salir</span>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endauth
            </ul>
        </div>
    </div>
</li>