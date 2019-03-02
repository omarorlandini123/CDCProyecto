<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    public $primaryKey="id";
    public $timestamps = false;

    public function users(){
        return $this->hasmany('App\User','persona_id','id');
    }

    public function medico(){
        return $this->hasOne('App\modelos\Medico','persona_id','id');
    }

    public function historia(){
        return $this->hasOne('App\modelos\Historia','persona_historia','id');
    }

    public function ubicacion_nacimiento(){
        return $this->belongsTo('App\modelos\Ubicacion','ubicacion_nacimiento','id');
    }

    public function ubicacion_domicilio(){
        return $this->belongsTo('App\modelos\Ubicacion','ubicacion_domicilio','id');
    }

    public function telefono(){
        return $this->hasMany('App\modelos\Telefono','persona_id','id');
    }

    public function correo(){
        return $this->hasMany('App\modelos\Correo','persona_id','id');
    }

    
}
