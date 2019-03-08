<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'cita';
    public $primaryKey="id";
    public $timestamps = false;

    public function historia(){
        return $this->belongsTo('App\modelos\Historia','historia_id','id');
    }

    public function motivo(){
        return $this->belongsTo('App\modelos\Motivo','motivo_id','id');
    }
    public function aseguradora(){
        return $this->belongsTo('App\modelos\Aseguradora','aseguradora_id');
    }

    public function medico_especialidad(){
        return $this->belongsTo('App\modelos\MedicoEspecialidad','medico_especialidad_id','id');
    }

    public function setTurno(){        
        if($this->medico_especialidad->medico!=null){
            $turnos= $this->medico_especialidad->medico->turnos($this->fecha_cita);
            foreach ($turnos as $turno) {
                if($this->nro_orden==$turno->nro_orden){
                    $this->turno=$turno;
                }
            }
        }
    }

    public static function setTurnos($citas){
        foreach ($citas as $cita) {
            $cita->setTurno();
        }
    }
}
