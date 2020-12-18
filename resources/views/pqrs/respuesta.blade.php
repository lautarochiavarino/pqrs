<style type="text/css">
	.respuesta {
    width: 90%;
    padding: 1rem;
}
	.imprimir {
    margin: 0 auto;
    position: relative;
    width: 60%;
    font-family: verdana;
    line-height: 25px;
    font-size: 14px;
}
	.imprimir img {
    margin-top: 40px;
    margin-bottom: 40px;
    width: 30%;
}
	.imprimir input {
    text-align: center;
    margin: 0 auto;
    width: 100%;
    height: 30px;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 3px;
}
	@media print {
        @page  
{ 
    size: auto;   /* auto is the initial value */ 

    /* this affects the margin in the printer settings */ 
    margin: 35mm 30mm 30mm 30mm;  
} 
 .imprimir {
   
    position: relative;
    width: 100%;
    font-family: verdana;
    line-height: 18px;
    font-size: 12px;
}
		.respuesta {
    width: 95%;
    padding: 1rem;
}
		.imprimir input {
    display: none;
}
}
</style>
<div class="respuesta">
<div class="imprimir"><input type="button" value="Imprime esta página" onclick="window.print()"> <b>Remitente:</b>	Gestión PQRS  AES Colombia<br/>
<b>Destinatario:</b>	{{$respuesta->pqrs->contacto->contacto}}<br/>
<b>Asunto:</b>	Notificación PQRS -  Radicado Número {{$respuesta->pqrs_id}}<br/>
<b>Fecha:</b>	@php echo date('Y-m-d');
@endphp


<h3>Notificación  PQRS AES CHIVOR</h3>

<b>Su PQRS:</b>	{{$respuesta->pqrs->tipoSolicitud}}<br/>


<b>PQRS recibida:</b> 	{{$respuesta->pqrs->created_at}}<br/>

<b>Número de radicado:</b>	{{$respuesta->pqrs_id}}<br/><br/>


Estimado (a) {{$respuesta->pqrs->contacto->contacto}}:<br/>


    @if ($respuesta->pqrs->respuestaFinal == '')


        <p>Nos permitimos informarle que nos encontramos dando tramite a su PQRS.</p>



        <p>{{$respuesta->pqrs->respuestaPreliminar}}</p>
    @else
        <p>{{$respuesta->pqrs->respuestaFinal}}</p>
    @endif

Cordialmente,<br/>


<b>Gestión PQRS</b><br/>

<img src="{{URL::asset('aes.png')}}" width="30%">
<br/>

<p>AVISO DE CONFIDENCIALIDAD: Salvo que se indique de otra manera o que se derive de la naturaleza de este mensaje, la información contenida en este correo es confidencial y está dirigida únicamente al destinatario final designado en él, ya que puede contener información privilegiada, confidencial, amparada por el secreto profesional y/o que no deba ser revelada. Si usted ha recibido este correo por error, al no ser destinatario final ni empleado o agente responsable de entregar este correo al destinatario final, por favor comuníquelo inmediatamente vía e-mail al remitente y eliminarlo de su sistema, dado que la distribución o copia de esta comunicación está estrictamente prohibida. Gracias</p>
  
   <input type="button" value="Imprime esta página" onclick="window.print()"> 
  </div>
  
  </div>
  
