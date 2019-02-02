@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">

                <div class="card-body">

                    <div class="text-field-container">
                        <div class="mdc-text-field text-field mdc-text-field--outlined mdc-text-field--dense">
                            <input type="text" id="text-field-outlined" class="mdc-text-field__input">
                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch" style="">
                                    <label class="mdc-floating-label" for="text-field-outlined" style="">Standard</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        <p class="mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg"
                            id="pw-validation-msg">Helper Text</p>
                    </div>

                    <button class="mdc-button mdc-button--raised">
                        <i class="material-icons mdc-button__icon" aria-hidden="true">favorite</i>
                        <span class="mdc-button__label">Button</span>
                    </button>

                    <button class="mdc-button">
                        <span class="mdc-button__label">Button</span>
                        <i class="material-icons mdc-button__icon" aria-hidden="true">favorite</i>
                    </button>


                    <h3 style="color:rgb(33, 60, 150);">Pacientes para hoy:
                        {{\Carbon\Carbon::now()->subHours(5)->format('d/m/Y')}}</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="javascript:enviarReporte()" class="btn btn-success float-right">Enviar</a>
                            <a href="/citas/reporte" class="btn btn-danger float-right" style=" margin-right:10px;">Descargar</a>

                        </div>

                    </div>
                    <br>
                    <div class="row">

                        @foreach($citas as $cita)
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h5 class="card-title">{{$cita->nombre_completo}}</h5>
                                        </div>
                                        <div class="col-3">

                                            <form method="POST" action="/citas/{{$cita->id_cita}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <div class="form-group" style="float: right;">
                                                    <input type="submit" class="btn btn-danger" value="X">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="
                                            font-size: 0.8em;
                                            padding-bottom: 0px;
                                            margin-bottom: 0px;"><strong>Historia:</strong>
                                                {{$cita->num_historia}}</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 0.8em;
                                            padding-bottom: 0px;
                                            margin-bottom: 0px;"><strong>Fecha
                                                    Nac.:</strong>
                                                {{\Carbon\Carbon::parse($cita->fecha_nac)->format('d/m/Y')}}</p>
                                        </div>
                                        <div class="col-sm-5">
                                            <p style="
                                                font-size: 0.8em;
                                                padding-bottom: 0px;
                                                margin-bottom: 0px;">
                                                <strong>Sexo:</strong>
                                                {{$cita->sexo==1?"Hombre":"Mujer"}}</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="
                                                    font-size: 0.8em;
                                                    padding-bottom: 0px;
                                                    margin-bottom: 0px;"><strong>Edad:</strong>
                                                {{$cita->edad}} años</p>
                                        </div>
                                        <div class="col-sm-5">
                                            <p style="
                                                font-size: 0.8em;
                                                padding-bottom: 0px;
                                                margin-bottom: 0px;"><strong>Motivo:</strong>
                                                {{
                                                trim($cita->motivo)=="5"?"Nuevo":
                                                (trim($cita->motivo)=="3"?"Resultado":
                                                (trim($cita->motivo)=="1"?"Control":
                                                (trim($cita->motivo)=="6"?"Ciguría":
                                                (trim($cita->motivo)=="2"?"Curación":""))))}}</p>
                                        </div>
                                        <div class="col-sm-12">
                                            <p style="font-size: 0.8em;
                                                    padding-bottom: 0px;
                                                    margin-bottom: 0px;"><strong>CIA:</strong>
                                                {{$cita->des_razon}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p style="color:red;float:right;font-size: 1em;
                                                        padding-bottom: 0px;
                                                        margin-bottom: 0px;"><strong>Hora:</strong>
                                                {{$cita->rango}}</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-secondary " style="background-color: rgb(140, 148, 148)">

                            <!-- Navbar brand -->
                            <a style="color:white;" class="navbar-brand" href="#">Citas</a>

                            <!-- Collapse button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Collapsible content -->
                            <div class="collapse navbar-collapse" id="basicExampleNav">

                                <!-- Links -->
                                <ul class="navbar-nav ">


                                </ul>
                                <!-- Links -->

                                {{-- <form class="form-inline">
                                    <div class="md-form my-0">
                                        <input class="form-control mr-sm-2" type="text" placeholder="Citas" aria-label="Citas">
                                    </div>
                                </form> --}}
                            </div>
                            <!-- Collapsible content -->

                        </nav>
                        <!--/.Navbar-->
                    </div>
                </div>


                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection