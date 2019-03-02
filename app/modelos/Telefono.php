<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefono';
    public $primaryKey="id";
    public $timestamps = false;
}
