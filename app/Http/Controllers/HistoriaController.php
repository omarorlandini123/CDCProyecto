<?php

namespace App\Http\Controllers;

use App\modelos\Historia;
use App\modelos\Persona;
use Auth;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    public function listar(Request $request, $cond)
    {
        if (Auth::check()) {
            $historias = Historia::whereHas('persona_historia', function ($a) use($cond) {
                if($cond!="_"){
                $a->where('nombres', 'like', '%' . $cond . '%')
                    ->orWhere('apellido_paterno', 'like', '%' . $cond . '%')
                    ->orWhere('apellido_materno', 'like', '%' . $cond . '%');
                }
            })
                ->with('persona_historia')
                ->with('persona_historia.ubicacion_nacimiento')
                ->with('persona_historia.ubicacion_domicilio')
                ->get();
            return $historias;
        }else{
            return "no-auth";
        }
    }

    public function update(Request $request,$idHistoria){
        if(Auth::check()){
            $rpta= new Historia; // variable solo para contestar
            $rpta->guardado=false;
            
            $historia = Historia::where('id',$idHistoria)->first();
            if($historia!=null){
                $persona = $historia->persona_historia;
                $persona->nombres=$request->input('nombre');
                $persona->apellido_paterno=$request->input('apellido_paterno');
                $persona->apellido_materno=$request->input('apellido_materno');
                $persona->direccion= $request->input('direccion');
                $persona->fecha_nacimiento=$request->input('fec_nac');
                $persona->sexo=$request->input('sexo');
                $persona->dni=$request->input('dni');
                $persona->pasaporte=$request->input('pasaporte');
                $persona->carne_extra=$request->input('carne');
                $persona->ruc=$request->input('ruc');
                $persona->ubicacion_nacimiento=$request->input('ubi_nac');
                $persona->ubicacion_domicilio=$request->input('ubi_dom');
                $persona->save();
                if($persona->id>0){                
                    if($historia->id>0){                   
                        $rpta->guardado=true;                  
                    }               
                }  
            }        
           
            return $rpta;

        }else{
            return "no-auth";
        }
    }

    public function create(Request $request){
        if(Auth::check()){
            $rpta= new Historia; // variable solo para contestar
            $rpta->guardado=false;
            
            
            $persona = new Persona;
            $persona->nombres=$request->input('nombre');
            $persona->apellido_paterno=$request->input('apellido_paterno');
            $persona->apellido_materno=$request->input('apellido_materno');
            $persona->direccion= $request->input('direccion');
            $persona->fecha_nacimiento=$request->input('fec_nac');
            $persona->sexo=$request->input('sexo');
            $persona->dni=$request->input('dni');
            $persona->pasaporte=$request->input('pasaporte');
            $persona->carne_extra=$request->input('carne');
            $persona->ruc=$request->input('ruc');
            $persona->ubicacion_nacimiento=$request->input('ubi_nac');
            $persona->ubicacion_domicilio=$request->input('ubi_dom');
            $persona->save();
            if($persona->id>0){
                $historia = new Historia;
                $historia->persona_historia=$persona->id;
                $historia->usuaro_creacion=Auth::user()->id;
                $historia->fecha_creacion=Carbon::now()->subHours(5);
                $historia->save();
                if($historia->id>0){                   
                    $rpta->guardado=true;                  
                }               
            }           
           
            return $rpta;

        }else{
            return "no-auth";
        }
    }
}
