<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table = 'correo';
    public $primaryKey="id";
    public $timestamps = false;
}
