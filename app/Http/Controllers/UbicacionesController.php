<?php

namespace App\Http\Controllers;

use App\modelos\Ubicacion;
use App\modelos\Cita;
use Auth;
use Illuminate\Http\Request;
class UbicacionesController extends Controller
{
    public function listar(Request $request, $cond){
        if(Auth::check()){
            $ubicaciones = Ubicacion::where('ubicacion','like','%PERÚ%')
            ->orderBy('tag')->get();
            return $ubicaciones;
        }else{
            $rpta= new Cita;
 $rpta->noauth=true;
            return $rpta;;
        }
    }
}
