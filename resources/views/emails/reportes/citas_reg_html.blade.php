@component('mail::message')

Saludos, 
Este es un reporte de los pacientes citados para hoy: {{\Carbon\Carbon::now()->subHours(5)->format('d/m/Y')}} <br>
Puede ver el reporte en PDF o acercarce a CDC y ver el reporte en línea.


<!-- @component('mail::button', ['url' => route('citas.index'), 'color' => 'success'])
Ver en CDC
@endcomponent -->

Gracias,<br>
{{ config('app.name') }}
@endcomponent