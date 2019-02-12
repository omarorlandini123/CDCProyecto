@extends('layouts.app')

@section('content')
<div class="container-completo">
    <div class="mdc-layout-grid" style="height: 100%;padding-top: 56px;padding-left: 0px;padding-right: 0px;padding-bottom: 0px;">
        <div class="mdc-layout-grid__inner" style="grid-gap: 0px;">
            <div class="mdc-layout-grid__cell 
                    mdc-layout-grid__cell--span-3-desktop 
                    mdc-layout-grid__cell--span-4-tablet
                    mdc-layout-grid__cell--span-4-phone"style="position: relative;">
                <div style="position:relative;">
                    @include('citas.header-citas')
                </div>
                <div style="position:relative;">
                    @include('citas.header-pacientes') 
                </div>
                <div style="position:relative;">
                        @include('citas.panel-citas')
                    </div>
                    <div style="position:relative;">
                        @include('citas.panel-pacientes')
                    </div>

            </div>
            <div class="mdc-layout-grid__cell 
                    mdc-layout-grid__cell--span-9-desktop 
                    mdc-layout-grid__cell--span-4-tablet">
               
               {{-- @include('citas.panel-loading') --}}
               @include('citas.panel-detalle-cita')
               {{-- @include('citas.panel-selecciona-paciente') --}}
               {{-- @include('citas.panel-loading') --}}
               {{-- @include('citas.panel-selecciona-cita') --}}
               {{-- @include('citas.panel-paciente-detalle') --}}
            </div>
          
        </div>
    </div>
</div>



@endsection
