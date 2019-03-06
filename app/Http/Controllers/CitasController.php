<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelos\CitasModel;
use App\modelos\Cita;

use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\reportes\CitasRegistradas;
use App\Mail\reportes\CitasRegistradasHTML;
use App\modelos\DestinoReportes;
use PDF;
use Auth;

class CitasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $citas=CitasModel::whereRaw('year(fec_citas) = year(now()) and month(fec_citas)=month(now()) and day(fec_citas)=day(now()) order by rango')->get();
        $data=array(
            'citas'=>$citas
        );
        return view('citas.index')->with($data);
    }

    public function reporte(){

        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        
        return $pdf->stream();
    }

    public function convert_customer_data_to_html(){
        $citas=CitasModel::whereRaw('year(fec_citas) = year(now()) and month(fec_citas)=month(now()) and day(fec_citas)=day(now()) order by rango')->get();
        $data=array(
            'citas'=>$citas
        );
        $view = View::make('citas.reporte', $data);

        $html = $view->render();
        return $html;
        
    }

    public function enviarReporte(){

        $destinos=DestinoReportes::where('reporte_id',1)->get();
        $dest = array();
        foreach ($destinos as $destino) {
            $dest[]=$destino->correo;
        }
        Mail::to($dest)->send(new CitasRegistradasHTML());

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $cita=  new Cita;        
            $cita->motivo_id=$request->input('motivo_id');
            $cita->nro_orden=$request->input('nro_orden');
            $cita->aseguradora_id=$request->input('aseguradora_id');
            $cita->historia_id=$request->input('historia_id');
            $cita->usuario_creacion=Auth::user()->id;
            $cita->fecha_creacion=Carbon::now();
            $cita->medico_especialidad_id=$request->input('medico_especialidad_id');
            $cita->nota_adicional=$request->input('nota_adicional');
            $cita->fecha_cita=$request->input('fecha_cita');
            $cita->save();
            
            $rpta= new Cita; 
            $rpta->guardado=true;
            return $rpta;
        }else{
            $rpta= new Cita;
            $rpta->guardado=false;
            return $rpta;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::check()){
            $cita=  Cita::where('id',$id)->first();        
            $cita->motivo_id=$request->input('motivo_id');
            $cita->nro_orden=$request->input('nro_orden');
            $cita->aseguradora_id=$request->input('aseguradora_id');
            $cita->historia_id=$request->input('historia_id');
            $cita->usuario_creacion=Auth::user()->id;
            $cita->fecha_creacion=Carbon::now();
            $cita->medico_especialidad_id=$request->input('medico_especialidad_id');
            $cita->nota_adicional=$request->input('nota_adicional');
            $cita->fecha_cita=$request->input('fecha_cita');
            $cita->confirmado=$request->input('confirmado')?1:0;
            $cita->confirmado_medico=$request->input('confirmado_medico')?1:0;
            $cita->save();
            
            $rpta= new Cita;
            $rpta->guardado=true;
            return $rpta;
        }else{
            $rpta= new Cita;
            $rpta->guardado=false;
            return $rpta;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $citaSel=CitasModel::where('id_cita',$id)->first();
        if($citaSel!=null){
            $citaSel->delete();
            return redirect('/citas');
        }        
        
    }
    
    public function listar(Request $request,$cond){
        if(Auth::check()){
            $citas= Cita::whereHas('historia',function($z) use($cond){
                $z->whereHas('persona_historia', function ($a) use($cond) {
                    if($cond!="_"){
                    $a->where('nombres', 'like', '%' . $cond . '%')
                        ->orWhere('apellido_paterno', 'like', '%' . $cond . '%')
                        ->orWhere('apellido_materno', 'like', '%' . $cond . '%')
                        ->orWhere('dni', 'like', '%' . $cond . '%');
                    }
                });
            })            
            ->with('historia')
            ->with('historia.persona_historia')
            ->with('historia.persona_historia.ubicacion_nacimiento')
            ->with('historia.persona_historia.ubicacion_domicilio')
            ->with('historia.persona_historia.correo')
            ->with('historia.persona_historia.telefono')
            ->with('historia.persona_historia.users')
            ->with('historia.persona_historia.users')
            ->with('motivo')
            ->with('aseguradora')
            ->with('medico_especialidad')
            ->with('medico_especialidad.medico')
            ->with('medico_especialidad.medico.persona')
            ->with('medico_especialidad.especialidad')
            ->with('medico_especialidad.medico.medico_especialidad')
            ->with('medico_especialidad.medico.medico_especialidad.especialidad') 
            ->orderBy('fecha_cita','desc')
            ->orderBy('nro_orden','desc')
            ->get();
            Cita::setTurnos($citas);
            return $citas;

        }else{
            return 'no-auth';
        }
    }

    public function ultimas(Request $request, $idHistoria){
        if(Auth::check()){
            $citas= Cita::where('historia_id',$idHistoria)
            ->with('historia')
            ->with('historia.persona_historia')
            ->with('motivo')
            ->with('aseguradora')
            ->with('medico_especialidad')
            ->with('medico_especialidad.medico')
            ->with('medico_especialidad.medico.persona')
            ->with('medico_especialidad.especialidad')
            ->with('medico_especialidad.medico.medico_especialidad')
            ->with('medico_especialidad.medico.medico_especialidad.especialidad') 
            ->orderBy('fecha_cita','desc')
            ->orderBy('nro_orden','desc')
            ->take(3)
            ->get();
            Cita::setTurnos($citas);
            return $citas;
        }else{
            return 'no-auth';
        }
    }
}
