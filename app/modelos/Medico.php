<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Medico extends Model
{
    protected $table = 'medico';
    public $primaryKey="id";
    public $timestamps = false;

    public function persona(){
        return $this->belongsTo('App\modelos\Persona','persona_id','id');
    }

    public function medico_especialidad(){
        return $this->hasMany('App\modelos\MedicoEspecialidad','medico_id','id');
    }

    public function turnos($fecha){
        foreach($this->medico_especialidad as $espec){
            foreach ($espec->horario as $horario) {
                $dia=Carbon::parse($horario->dia);
                $fec = Carbon::parse($fecha);
                if($dia->day==$fec->day &&
                    $dia->month==$fec->month &&
                    $dia->year==$fec->year){
                    return $horario->lista_turnos();
                }
            }
        }
        return array();
    }

    public static function listarTodos($cond){
        $medicos = Medico::whereHas('persona',function($a) use ($cond){
            if($cond!="_"){
            $a->where('nombres','like','%'.$cond.'%')
            ->orWhere('apellido_paterno','like','%'.$cond.'%')
            ->orWhere('apellido_materno','like','%'.$cond.'%');
            }
        })
        ->with('persona')
        ->with('medico_especialidad')
        ->with('medico_especialidad.horario')
        ->with('medico_especialidad.especialidad')
        ->get();  
        if(count($medicos)>0)
        Medico::quickSort($medicos,0,count($medicos)-1);

        return $medicos;
    }

    public   static function partition($arr,$leftIndex,$rightIndex)
    {
        $pivot=$arr[($leftIndex+$rightIndex)/2];
         
        while ($leftIndex <= $rightIndex) 
        {        
            while (
                strcasecmp(
                   
                    $arr[$leftIndex]->persona->nombreCompleto(),
                    $pivot->persona->nombreCompleto())<0
                )             
                    $leftIndex++;
                    while(strcasecmp(
                        $arr[$rightIndex]->persona->nombreCompleto(),
                        $pivot->persona->nombreCompleto())>0)
            
                    $rightIndex--;
            if ($leftIndex <= $rightIndex) {  
                    $tmp = $arr[$leftIndex];
                    $arr[$leftIndex] = $arr[$rightIndex];
                    $arr[$rightIndex] = $tmp;
                    $leftIndex++;
                    $rightIndex--;
            }
        }
        
        return $leftIndex;
    }
     
    public static function quickSort($arr, $leftIndex, $rightIndex)
    {
        $index = Historia::partition($arr,$leftIndex,$rightIndex);
        if ($leftIndex < $index - 1)
        Historia::quickSort($arr, $leftIndex, $index - 1);
        if ($index < $rightIndex)
        Historia::quickSort($arr, $index, $rightIndex);
    }
    
}
