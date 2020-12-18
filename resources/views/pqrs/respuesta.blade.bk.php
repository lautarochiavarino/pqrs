<b>Remitente:</b>	Gestión PQRS  AES CHIVOR<br/>
<b>Destinatario:</b>	{{$respuesta->pqrs->contacto->contacto}}<br/>
<b>Asunto:</b>	Notificación PQRS -  Radicado Número {{$respuesta->pqrs_id}}<br/>
<b>Fecha:</b>	@php echo date('Y-m-d');
@endphp


<h3>Notificación  PQRS AES CHIVOR</h3>

<b>Su PQRS:</b>	{{$respuesta->pqrs->tipoSolicitud}}<br/>


<b>PQRS recibida:</b> 	{{$respuesta->pqrs->created_at}}<br/>

<b>Número de radicado:</b>	{{$respuesta->pqrs_id}}<br/><br/>


Estimado (a) {{$respuesta->pqrs->contacto->contacto}}:<br/>

<p>Nos permitimos informarle que nos encontramos dando tramite a su PQRS. Debido a su complejidad
    esta gestión tardará  más de lo usual.</p>


Cordialmente,<br/>


<b>Gestión PQRS</b><br/>

<img src="{{URL::asset('logo_color.jpeg')}}" width="20%">
<br/>

<p>AVISO DE CONFIDENCIALIDAD: Salvo que se indique de otra manera o que se derive de la naturaleza de este mensaje,<br/>
    la información contenida en este correo es confidencial y está dirigida únicamente al destinatario final designado <br/>
    en él, ya que puede contener información privilegiada, confidencial, amparada por el secreto profesional y/o que no <br/>
    deba ser revelada. Si usted ha recibido este correo por error, al no ser destinatario final ni empleado o agente <br/>
    responsable de entregar este correo al destinatario final, por favor comuníquelo inmediatamente vía e-mail al remitente <br/>
    y eliminarlo de su sistema, dado que la distribución o copia de esta comunicación está estrictamente prohibida. Gracias</p>
