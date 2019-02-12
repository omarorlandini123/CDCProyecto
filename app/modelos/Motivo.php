<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    protected $table = 'motivo';
    public $primaryKey="id";
    public $timestamps = false;

    public function cita(){
        return $this->hasMany('App\modelos\Cita','motivo_id','id');
    }
    
}
