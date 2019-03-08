<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $table = 'historia';
    public $primaryKey="id";
    public $timestamps = false;

    public function persona(){
        return $this->belongsTo('App\modelos\Persona','persona_historia','id');
    }
 

    public function usuario_creacion(){
        return $this->belongsTo('App\modelos\User','usuario_creacion','id');
    }

    public static function listaGeneral($cond){
        $historias = Historia::whereHas('persona', function ($a) use($cond) {
            if($cond!="_"){
                $a->whereRaw("concat(upper(apellido_paterno),' ',upper(apellido_materno),', ',upper(nombres)) like '%".strtoupper($cond)."%'");
            $a->where('nombres', 'like', '%' . $cond . '%')
                ->orWhere('apellido_paterno', 'like', '%' . $cond . '%')
                ->orWhere('apellido_materno', 'like', '%' . $cond . '%')
                ->orWhere('dni', 'like', '%' . $cond . '%')
                ->orWhere('nro_historia',   $cond );
            }
        })
            ->where('eliminado',0)
            ->with('persona')
            ->with('persona.ubicacion_nacimiento')
            ->with('persona.ubicacion_domicilio')
            ->with('persona.correo')
            ->with('persona.telefono')
            ->with('persona.users')         
            ->take(100)
            ->get();
            if(count($historias)>0)
            Historia::quickSort($historias,0,count($historias)-1);
        return $historias;
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
