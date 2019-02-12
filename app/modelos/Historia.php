<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $table = 'historia';
    public $primaryKey="id";
    public $timestamps = false;

    public function persona_historia(){
        return $this->belongsTo('App\modelos\Persona','persona_historia','id');
    }

    public function usuario_creacion(){
        return $this->belongsTo('App\modelos\User','usuario_creacion','id');
    }
}
