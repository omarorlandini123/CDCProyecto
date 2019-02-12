<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';
    public $primaryKey="id";
    public $timestamps = false;
}
