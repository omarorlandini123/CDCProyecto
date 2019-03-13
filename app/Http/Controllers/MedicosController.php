<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelos\Medico;
use App\modelos\Cita;
use Auth;
class MedicosController extends Controller
{
    public function turnos(Request $request, $idmedico){
        if(Auth::check()){
            $turnos=array();
            $fecha = $request->input('fecha');
            $medico=Medico::where('id',$idmedico)->first();
            if($medico!=null){
                $turnos= $medico->turnos($fecha);
            }
            return $turnos;
        }else{
            $rpta= new Cita;
 $rpta->noauth=true;
            return $rpta;;
        }
    }

    public function listar(Request $request,$cond){
        if(Auth::check()){
            $medicos = Medico::listarTodos($cond);
            
 
            return $medicos;
        }else{
            $rpta= new Cita;
 $rpta->noauth=true;
            return $rpta;;
        }
    }
}
