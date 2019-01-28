<?php

namespace App\Mail\reportes;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use \Carbon\Carbon;
use  App\Http\Controllers\Citas;

use App\modelos\CitasModel;
class CitasRegistradas extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
        $controlCitas =  new Citas;
        $this->pdf=$controlCitas->reporte();

        $fechaHoy=\Carbon\Carbon::now()->subHours(5)->format('d/m/Y');
        return $this->from('centrodetectorcancerperu@gmail.com')         
                ->subject('Citas Registradas del día '.$fechaHoy)
                ->view('emails.reportes.citas_registradas')->with($data)
                ->attachData($this->pdf, 'citas_'.$fechaHoy.'.pdf', [
                    'mime' => 'application/pdf',
                ]);
    }
}
