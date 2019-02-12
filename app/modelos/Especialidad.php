<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidad';
    public $primaryKey="id";
    public $timestamps = false;

    public function medico_especialidad(){
        return $this->hasMany('App\modelos\MedicoEspecialidad','especialidad_id','id');
    }
}
