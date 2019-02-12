<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\modelos\Motivo;

class MotivoController extends Controller
{
    public function listar(Request $request){
        if(Auth::check()){
            $motivos=Motivo::all();
            return $motivos;
        }else{
            return "no-auth";
        }
    }
}
