<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelos\CitasModel;

use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\reportes\CitasRegistradas;
use App\Mail\reportes\CitasRegistradasHTML;
use App\modelos\DestinoReportes;
use PDF;
class Citas extends Controller
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
        //
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
        //
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
}
