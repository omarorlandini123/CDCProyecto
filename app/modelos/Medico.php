<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Medico extends Model
{
    protected $table = 'medico';
    public $primaryKey="id";
    public $timestamps = false;

    public function persona(){
        return $this->belongsTo('App\modelos\Persona','persona_id','id');
    }

    public function medico_especialidad(){
        return $this->hasMany('App\modelos\MedicoEspecialidad','medico_id','id');
    }

    public function turnos($fecha){
        foreach($this->medico_especialidad as $espec){
            foreach ($espec->horario as $horario) {
                $dia=Carbon::parse($horario->dia);
                $fec = Carbon::parse($fecha);
                if($dia->day==$fec->day &&
                    $dia->month==$fec->month &&
                    $dia->year==$fec->year){
                    return $horario->lista_turnos();
                }
            }
        }
        return array();
    }
}
