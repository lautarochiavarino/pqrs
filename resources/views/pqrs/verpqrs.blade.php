@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Detalle PQRS</li>
        </ol>

        <!-- Icon Cards-->
        <!-- Area Busqueda-->





        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Detalle</div>
            <div class="card-body">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <p>Esta ingresando la solicitud a nombre propio?: <b>{{$pqrs->aSuNombre}}</b></p>
                                <p>Tipo de Solicitud: <b>{{$pqrs->tipoSolicitud}}</b></p>
                                <p>Tipo de Solicitante: <b>{{$pqrs->tipoSolicitante_id}}</b></p>
                                <p>Formato de Recepcion: <b>{{$pqrs->formatoRecepcion}}</b></p>
                                <p>Medio de Respuesta: <b>{{$pqrs->medioRespuesta}}</b></p>
                                <p>Fecha Envío: <b>{{$pqrs->created_at}}</b></p>
                                <p>Grupo:
                                    @if ($pqrs->grupo_id == 0)

                                        <b>Ninguno</b>

                                    @else


                                        <b>{{$pqrs->grupo->nombre}}</b>
                                    @endif
                                </p>
                                <p>Nombre: <b>{{$pqrs->contacto->contacto}}</b></p>
                                <p>Ciudad: <b>{{$pqrs->contacto->ciudad}}</b></p>
                                <p>Provincia: <b>{{$pqrs->contacto->provincia->nombre}}</b></p>
                                <p>Pais: <b>{{$pqrs->contacto->pais->nombre}}</b></p>
                            </div>
                            <div class="col-md-4">


                                <p>Dirección: <b>{{$pqrs->contacto->direccionFisica}}</b></p>
                                <p>CP: <b>{{$pqrs->contacto->cp}}</b></p>
                                <p>Razon Social: <b>{{$pqrs->contacto->razonSocial}}</b></p>
                                <p>Tipo Tramite: <b>{{$pqrs->contacto->tipoTramite}}</b></p>
                                <p>Causal: <b>{{$pqrs->contacto->causal}}</b></p>
                                <p>Detalle Causal: <b>{{$pqrs->contacto->detalleCausal}}</b></p>
                                <p>Código SIC: <b>{{$pqrs->contacto->codigoSic}}</b></p>
                                <p>Nro. Factura: <b>{{$pqrs->contacto->nroFactura}}</b></p>
                                <p>Fecha Evento: <b>{{$pqrs->contacto->fechaEvento}}</b></p>

                            </div>
                            <div class="col-md-4">

                                <p>E-mail: <b>{{$pqrs->contacto->email}}</b></p>
                                <p>Tel. Fijo: <b>{{$pqrs->contacto->telFijo1}}/{{$pqrs->contacto->telFijo2}}</b></p>
                                <p>Fax: <b>{{$pqrs->contacto->telCelular}}</b></p>
                                <p>Celular: <b>{{$pqrs->contacto->fax}}</b></p>
                                <p>Proposito: <b>{{$pqrs->contacto->proposito}}</b></p>
                                <p>Datos: <b>{{$pqrs->contacto->datosAdicionales}}</b></p>

                            </div>
                        </div>
                    </div>
                    <p>Breve Descripción: <b>{{$pqrs->breveDescripcion}}</b></p>
                    <p>Descripción: <b>{{$pqrs->descripcion}}</b></p>
                    @if (($pqrs->adjuntarSoporte) === null)
                        <p>No hay archivos adjuntos</p>
                    @else
                        <a href="{{url('download', $pqrs->adjuntarSoporte)}}">Descargar archivo Adjunto</a>
                    @endif
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-4">
                            <p>Cerrado: <b>{{$pqrs->cerrado}}</b></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <h3>Historial de Respuestas</h3>
        @foreach ($respuestas as $r)
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Fecha: <b>{{$r->created_at}}</b></div>
            <div class="card-body">

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">

                            <p>Gestión: <b><pre>{{$r->nuevaGestion}}</pre></b></p>
                            <p>Tiempo de Respuesta: <b>{{$r->nuevoTiempoRespuesta}}</b></p>
                            <p>Respuesta Prelimiar: <b><pre>{{$r->respuestaPrelimiar}}</pre></b></p>
                            <p>Respuesta Final: <b><pre>{{$r->respuestaFinal}}</pre></b></p>
                            <p>Consecutivo Correspondencia: <b>{{$r->consecutivoCorrespondencia}}</b></p>
                            <p>Resolutor: <b>{{$r->user->name}}</b></p>

                        </div>


                    </div>
                </div>



            </div>

        </div>
        @endforeach


    </div>
@endsection
