<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class CitasModel extends Model
{
    protected $table = 'citas_rep';
    public $primaryKey="id_cita";
    public $timestamps = false;
}
