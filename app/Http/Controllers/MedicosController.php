<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelos\Medico;
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
            return "no-auth";
        }
    }

    public function listar(Request $request,$cond){
        if(Auth::check()){
            $medicos = Medico::whereHas('persona',function($a) use ($cond){
                if($cond!="_"){
                $a->where('nombres','like','%'.$cond.'%')
                ->orWhere('apellido_paterno','like','%'.$cond.'%')
                ->orWhere('apellido_materno','like','%'.$cond.'%');
                }
            })
            ->with('persona')
            ->with('medico_especialidad')
            ->with('medico_especialidad.horario')
            ->with('medico_especialidad.especialidad')
            ->get();  
            

            return $medicos;
        }else{
            return "no-auth";
        }
    }
}
