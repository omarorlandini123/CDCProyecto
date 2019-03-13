<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\modelos\Motivo;
use App\modelos\Cita;

class MotivoController extends Controller
{
    public function listar(Request $request){
        if(Auth::check()){
            $motivos=Motivo::all();
            return $motivos;
        }else{
            $rpta= new Cita;
 $rpta->noauth=true;
            return $rpta;;
        }
    }
}
