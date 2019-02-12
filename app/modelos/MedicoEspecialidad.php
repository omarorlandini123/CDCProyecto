<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class MedicoEspecialidad extends Model
{
    protected $table = 'medico_especialidad';
    public $primaryKey="id";
    public $timestamps = false;

    public function medico(){
        return $this->belongsTo('App\modelos\Medico','medico_id','id');

    }

    public function especialidad(){
        return $this->belongsTo('App\modelos\Especialidad','especialidad_id','id');
    }

    public function horario(){
        return $this->hasMany('App\modelos\Horario','medico_especialidad_id','id');
    }

}
