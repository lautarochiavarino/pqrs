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
<b>Destinatario:</b>	{{$pqrs->contacto->contacto}}<br/>
<b>Asunto:</b>	Notificación PQRS -  Radicado Número {{$pqrs->id}}<br/>
<b>Fecha:</b>	@php echo date('Y-m-d');
@endphp


<h3>Notificación  PQRS AES COLOMBIA</h3>

<b>Su PQRS:</b>	{{$pqrs->tipoSolicitud}}<br/>


<b>PQRS recibida:</b> 	{{$pqrs->created_at}}<br/>

<b>Número de radicado:</b>	{{$pqrs->id}}<br/>
    
@if ($pqrs->consecutivoCorrespondencia != 0)  
    
<b>Consecutivo Correspondencia: </b> {{$pqrs->consecutivoCorrespondencia}} <br/>
                            @endif
    <br/>

    <b>PQRS Cerrada:</b>	{{$pqrs->cerrado}}<br/><br/>


Estimado (a) {{$pqrs->contacto->contacto}}:<br/>


    @if ($pqrs->respuestaFinal == '')


        <p>Nos permitimos informarle que nos encontramos dando tramite a su PQRS.</p>



        <p>{{$pqrs->respuestaPreliminar}}</p>
    @else
        <p>{{$pqrs->respuestaFinal}}</p>
    @endif

Cordialmente,<br/><br/>


<b>Gestión PQRS</b><br/>

<img src="{{URL::asset('aes.png')}}" width="30%">
<br/>
  
   <input type="button" value="Imprime esta página" onclick="window.print()"> 
  </div>
  
  </div>
  
