<?php

namespace App\modelos;

use App\modelos\Cita;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    public $primaryKey = "id";
    public $timestamps = false;

   
    public function medico_especialidad()
    {
        return $this->belongsTo('App\modelos\MedicoEspecialidad', 'medico_especialidad_id', 'id');
    }

    public function lista_turnos()
    {
        $cantidad = $this->cantidad_pacientes;
        $desde = Carbon::parse($this->desde);//->subHours(5);
        $hasta = Carbon::parse($this->hasta);//->subHours(5);
        $diferenciaEnminutos = $hasta->diffInMinutes($desde);
        $horarios=array();
        $formatoHora="H:i";
        for ($i = 0; $i < $cantidad; $i++) {
            $horario = new Horario;
            $horario->fecha_cita=$this->dia;
            $horario->nro_orden = ($i + 1);
            $horario->desde = $desde->format($formatoHora);
            $horario->hasta = $desde->addMinutes($diferenciaEnminutos/$cantidad)->format($formatoHora);
            if ($cantidad - 1 == $i) {
                $horario->hasta = $hasta->format($formatoHora);
            }
            $citas = Cita::where('medico_especialidad_id', $this->medico_especialidad_id)
                ->where('fecha_cita', $this->dia)
                ->where('nro_orden', $horario->nro_orden)
                ->get();
            if ($citas != null && count($citas)>0) {
                $horario->tomado = true;
            } else {
                $horario->tomado = false;
            }
            $horarios[]=$horario;
        }
       
       return $horarios;
    }
}
