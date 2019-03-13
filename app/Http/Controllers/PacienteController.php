<?php

namespace App\Http\Controllers;

use App\modelos\Correo;
use App\modelos\Historia;
use App\modelos\Persona;
use App\modelos\Telefono;
use App\modelos\Cita;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {

            //dd(json_decode($request->getContent(), true));

            $historiaSel = json_decode($request->input('historia_sel'), true);
            $rpta = new Persona;
            $rpta->guardado = false;

            if ($historiaSel['persona'] != null) {
                $persona = new Persona;

                $persona->nombres = $historiaSel['persona']['nombres'];
                $persona->apellido_paterno = $historiaSel['persona']['apellido_paterno'];
                $persona->apellido_materno = $historiaSel['persona']['apellido_materno'];
                $persona->direccion = $historiaSel['persona']['direccion'];
                $persona->fecha_nacimiento = $historiaSel['persona']['fecha_nacimiento'];
                $persona->sexo = $historiaSel['persona']['sexo'];
                $persona->dni = $historiaSel['persona']['dni'];
                $persona->pasaporte = $historiaSel['persona']['pasaporte'];
                $persona->carne_extra = $historiaSel['persona']['carne_extra'];
                $persona->ruc = $historiaSel['persona']['ruc'];

                $personaVal = Persona::where('dni',trim($persona->dni))
                ->orWhere('pasaporte',trim($persona->pasaporte))
                ->orWhere('carne_extra', trim($persona->carne_extra))
                ->orWhere('ruc',trim($persona->ruc))->first();
                if($personaVal!=null){
                    $rpta->mensaje="El dni, pasaporte, carne o ruc ya están registrados el sistema como: ".$personaVal->nombreCompleto();
                    return $rpta;
                }


                if ($historiaSel['persona']['ubicacion_nacimiento'] != null) {
                    $persona->ubicacion_nacimiento = $historiaSel['persona']['ubicacion_nacimiento']['id'];
                }

                $persona->save();
                if ($persona->id > 0) {
                    if ($historiaSel['persona']['correo'] != null) {
                        Correo::where('persona_id',$persona->id)->delete();
                        foreach ($historiaSel['persona']['correo'] as $correode) {
                            $correo = new Correo;
                            $correo->correo = $correode['correo'];
                            $correo->persona_id = $persona->id;
                            $correo->save();
                        }

                    }

                    if ($historiaSel['persona']['telefono'] != null) {
                        Telefono::where('persona_id',$persona->id)->delete();
                        foreach ($historiaSel['persona']['telefono'] as $telefonode) {
                            $telefono = new Telefono;
                            $telefono->telefono = $telefonode['telefono'];
                            $telefono->persona_id = $persona->id;
                            $telefono->save();
                        }

                    }

                    $historia = new Historia;
                    $historia->fecha_creacion = Carbon::now()->subHours(5);
                    $historia->persona_historia = $persona->id;
                    $historia->usuario_creacion = Auth::user()->id;
                    $historia->eliminado = 0;

                    $historia->save();

                    
                    $rpta->guardado = true;
                    return $rpta;
                }

            }

        } else {
            $rpta = new Cita;
            $rpta->guardado = false;
            return $rpta;
        }
    }
    public function eliminar(Request $request, $idPaciente){
        if(Auth::check()){
            $rpta= new Historia;
            $historias= Historia::where('id',$idPaciente)->first();
            if($historias!=null){
                $historias->eliminado=1;
                $historias->save();
                $rpta->eliminado=true;
                return $rpta;
            }
            $rpta->eliminado=false;
            return $rpta;

        }else{
            $rpta= new Cita;
 $rpta->noauth=true;
            return $rpta;;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {

            //dd(json_decode($request->getContent(), true));

            $historiaSel = json_decode($request->input('historia_sel'), true);
            $rpta = new Persona;
            $rpta->guardado = false;
            if ($historiaSel['persona'] != null) {
                $persona = Persona::where('id',$historiaSel['persona']['id'])->first();

                $persona->nombres = $historiaSel['persona']['nombres'];
                $persona->apellido_paterno = $historiaSel['persona']['apellido_paterno'];
                $persona->apellido_materno = $historiaSel['persona']['apellido_materno'];
                $persona->direccion = $historiaSel['persona']['direccion'];
                $persona->fecha_nacimiento = $historiaSel['persona']['fecha_nacimiento'];
                $persona->sexo = $historiaSel['persona']['sexo'];
                $persona->dni = $historiaSel['persona']['dni'];
                $persona->pasaporte = $historiaSel['persona']['pasaporte'];
                $persona->carne_extra = $historiaSel['persona']['carne_extra'];
                $persona->ruc = $historiaSel['persona']['ruc'];

                $personaVal = Persona::where('dni',trim($persona->dni))
                ->orWhere('pasaporte',trim($persona->pasaporte))
                ->orWhere('carne_extra', trim($persona->carne_extra))
                ->orWhere('ruc',trim($persona->ruc))
                ->first();
                if($personaVal!=null && $personaVal->id!=$persona->id){
                    $rpta->mensaje="El dni, Persona encontrada:".$personaVal->id."pasaporte, tu id:".$persona->id." carne o ruc ya están registrados en el sistema como: ".$personaVal->nombreCompleto();
                    return $rpta;
                }

                if ($historiaSel['persona']['ubicacion_nacimiento'] != null) {
                    $persona->ubicacion_nacimiento = $historiaSel['persona']['ubicacion_nacimiento']['id'];
                }

                $persona->save();
                if ($persona->id > 0) {
                    if ($historiaSel['persona']['correo'] != null) {
                        Correo::where('persona_id',$persona->id)->delete();
                        foreach ($historiaSel['persona']['correo'] as $correode) {
                            $correo = new Correo;
                            $correo->correo = $correode['correo'];
                            $correo->persona_id = $persona->id;
                            $correo->save();
                        }

                    }

                    if ($historiaSel['persona']['telefono'] != null) {
                        Telefono::where('persona_id',$persona->id)->delete();
                        foreach ($historiaSel['persona']['telefono'] as $telefonode) {
                            $telefono = new Telefono;
                            $telefono->telefono = $telefonode['telefono'];
                            $telefono->persona_id = $persona->id;
                            $telefono->save();
                        }

                    }
                  
                    
                    $rpta->guardado = true;
                    return $rpta;
                }

            }

        } else {
            $rpta = new Cita;
            $rpta->guardado = false;
            return $rpta;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
