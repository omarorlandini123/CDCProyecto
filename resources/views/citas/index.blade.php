@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Citas del día</div>

                <div class="card-body">
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
                                        <div class="col-3" >

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
    </div>
</div>
@endsection