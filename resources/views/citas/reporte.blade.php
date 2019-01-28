<center>
    <h1 style="margin-bottom:0px;">Relación de Pacientes Citados</h1>
</center>
<center>
    <h3>{{\Carbon\Carbon::now()->subHours(5)->format('d/m/Y')}}</h3>
</center>
<center>
    <table width="100%" style="border-collapse: collapse;border:1px;font-family: Arial, Helvetica, sans-serif;">

        <tbody >
            <tr style="background-color:rgb(1, 86, 107);color:white;font-size: 1.2em;">
                <td style="border: 1px solid; padding:5px;"><center>Hora</center></td>
                <td style="border: 1px solid; padding:5px;"><center>Atención</center></td>
                <td style="border: 1px solid; padding:5px;"><center>CIA</center></td>
                <td style="border: 1px solid; padding:5px;"><center>H.C.</center></td>
                <td style="border: 1px solid; padding:5px;" width="30%"><center>Nombre</center></td>
                <td style="border: 1px solid; padding:5px;"><center>Sexo</center></td>
                <td style="border: 1px solid; padding:5px;"><center>Edad</center></td>
                <td style="border: 1px solid; padding:5px;"><center>Teléfono</center></td>

            </tr>
            @foreach($citas as $cita)
            <tr>
                <td style="border: 1px solid; padding:5px;">{{$cita->rango}}</td>
                <td style="border: 1px solid; padding:5px;text-align: center;">{{
                    trim($cita->motivo)=="5"?"Nuevo":
                    (trim($cita->motivo)=="3"?"Resultado":
                    (trim($cita->motivo)=="1"?"Control":
                    (trim($cita->motivo)=="6"?"Ciguría":
                    (trim($cita->motivo)=="2"?"Curación":""))))}}</td>
                <td style="border: 1px solid; padding:5px;font-size: 0.8em;">{{$cita->des_razon}}</td>
                <td style="border: 1px solid; padding:5px;">{{$cita->num_historia}}</td>
                <td style="border: 1px solid; padding:5px;font-size: 0.7em;">{{$cita->nombre_completo}}</td>
                <td style="border: 1px solid; padding:5px;"><center>{{$cita->sexo==1?"M":"F"}}</center></td>
                <td style="border: 1px solid; padding:5px;"><center>{{$cita->edad}}</center></td>
                
                <?php
                   $telfs= explode('---',$cita->telefono);
                ?>
                <td style="border: 1px solid; padding:5px;">
                    @foreach($telfs as $telf)
                    {{$telf}} <br>
                    @endforeach
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</center>
<center>
    <p style="margin-bottom:0px;">.</p>
</center>