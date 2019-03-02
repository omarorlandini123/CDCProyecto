<?php

namespace App\Http\Controllers;

use App\modelos\Correo;
use App\modelos\Historia;
use App\modelos\Persona;
use App\modelos\Telefono;
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

            if ($historiaSel['persona_historia'] != null) {
                $persona = new Persona;

                $persona->nombres = $historiaSel['persona_historia']['nombres'];
                $persona->apellido_paterno = $historiaSel['persona_historia']['apellido_paterno'];
                $persona->apellido_materno = $historiaSel['persona_historia']['apellido_materno'];
                $persona->direccion = $historiaSel['persona_historia']['direccion'];
                $persona->fecha_nacimiento = $historiaSel['persona_historia']['fecha_nacimiento'];
                $persona->sexo = $historiaSel['persona_historia']['sexo'];
                $persona->dni = $historiaSel['persona_historia']['dni'];
                $persona->pasaporte = $historiaSel['persona_historia']['pasaporte'];
                $persona->carne_extra = $historiaSel['persona_historia']['carne_extra'];
                $persona->ruc = $historiaSel['persona_historia']['ruc'];
                if ($historiaSel['persona_historia']['ubicacion_nacimiento'] != null) {
                    $persona->ubicacion_nacimiento = $historiaSel['persona_historia']['ubicacion_nacimiento']['id'];
                }

                $persona->save();
                if ($persona->id > 0) {
                    if ($historiaSel['persona_historia']['correo'] != null) {
                        Correo::where('persona_id',$persona->id)->delete();
                        foreach ($historiaSel['persona_historia']['correo'] as $correode) {
                            $correo = new Correo;
                            $correo->correo = $correode['correo'];
                            $correo->persona_id = $persona->id;
                            $correo->save();
                        }

                    }

                    if ($historiaSel['persona_historia']['telefono'] != null) {
                        Telefono::where('persona_id',$persona->id)->delete();
                        foreach ($historiaSel['persona_historia']['telefono'] as $telefonode) {
                            $telefono = new Telefono;
                            $telefono->telefono = $telefonode['telefono'];
                            $telefono->persona_id = $persona->id;
                            $telefono->save();
                        }

                    }

                    $historia = new Historia;
                    $historia->fecha_creacion = Carbon::now();
                    $historia->persona_historia = $persona->id;
                    $historia->usuario_creacion = Auth::user()->id;
                    $historia->save();

                    $rpta = new Persona;
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

            if ($historiaSel['persona_historia'] != null) {
                $persona = Persona::where('id',$historiaSel['persona_historia']['id'])->first();

                $persona->nombres = $historiaSel['persona_historia']['nombres'];
                $persona->apellido_paterno = $historiaSel['persona_historia']['apellido_paterno'];
                $persona->apellido_materno = $historiaSel['persona_historia']['apellido_materno'];
                $persona->direccion = $historiaSel['persona_historia']['direccion'];
                $persona->fecha_nacimiento = $historiaSel['persona_historia']['fecha_nacimiento'];
                $persona->sexo = $historiaSel['persona_historia']['sexo'];
                $persona->dni = $historiaSel['persona_historia']['dni'];
                $persona->pasaporte = $historiaSel['persona_historia']['pasaporte'];
                $persona->carne_extra = $historiaSel['persona_historia']['carne_extra'];
                $persona->ruc = $historiaSel['persona_historia']['ruc'];
                if ($historiaSel['persona_historia']['ubicacion_nacimiento'] != null) {
                    $persona->ubicacion_nacimiento = $historiaSel['persona_historia']['ubicacion_nacimiento']['id'];
                }

                $persona->save();
                if ($persona->id > 0) {
                    if ($historiaSel['persona_historia']['correo'] != null) {
                        Correo::where('persona_id',$persona->id)->delete();
                        foreach ($historiaSel['persona_historia']['correo'] as $correode) {
                            $correo = new Correo;
                            $correo->correo = $correode['correo'];
                            $correo->persona_id = $persona->id;
                            $correo->save();
                        }

                    }

                    if ($historiaSel['persona_historia']['telefono'] != null) {
                        Telefono::where('persona_id',$persona->id)->delete();
                        foreach ($historiaSel['persona_historia']['telefono'] as $telefonode) {
                            $telefono = new Telefono;
                            $telefono->telefono = $telefonode['telefono'];
                            $telefono->persona_id = $persona->id;
                            $telefono->save();
                        }

                    }
                  
                    $rpta = new Persona;
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
