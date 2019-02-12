<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
    protected $table = 'aseguradora';
    public $primaryKey="id";
    public $timestamps = false;

    public function cita(){
        return $this->hasMany('App\modelos\Cita','aseguradora_id','id');
    }
}
