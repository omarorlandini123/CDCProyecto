<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\modelos\Cita;
use App\modelos\Aseguradora;

class AseguradoraController extends Controller
{
    public function listar (Request $request){
        if(Auth::check()){
            $aseguradoras = Aseguradora::all();
            return $aseguradoras;
        }else{
            $rpta= new Cita;
 $rpta->noauth=true;
            return $rpta;;
        }
    }
}
