<?php

namespace App\Mail\reportes;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\View;
use \Carbon\Carbon;
use  App\Http\Controllers\Citas;

use App\modelos\CitasModel;

class CitasRegistradasHTML extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        $citas=CitasModel::whereRaw('year(fec_citas) = year(now()) and month(fec_citas)=month(now()) and day(fec_citas)=day(now()) order by rango')->get();
        
        $data=array(
            'citas'=>$citas
        );
        $tabla = View::make('citas.reporte', $data);

        $controlCitas =  new Citas;
        $this->pdf=$controlCitas->reporte();

        $datamail=array(
            'citas'=>$citas,
            'tabla'=>$tabla,
        );
        $fechaHoy=\Carbon\Carbon::now()->subHours(5)->format('d/m/Y');
        $fechaHoyF2=\Carbon\Carbon::now()->subHours(5)->format('d_m_Y');
        return $this->from('centrodetectorcancerperu@gmail.com','Centro Detector Sistemas')        
                ->subject('Citas Registradas del día '.$fechaHoy)
                ->markdown('emails.reportes.citas_reg_html')->with($datamail)
                ->attachData($this->pdf, 'citas_'.$fechaHoyF2.'.pdf', [
                    'mime' => 'application/pdf',
                ]);
    }
}
