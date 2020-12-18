@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Gestión PQRS</li>
        </ol>

            @if ($pqrs->grupo_id == 0)
            <div class="alert alert-danger">
                La PQRS no está asignada a ningun grupo.
            </div>
            @else

            <div class="alert alert-success">
                Esta PQRS pertenece a {{$pqrs->grupo->nombre}}
            </div>
             @endif

            @if ($pqrs->responsable_id != NULL)
                <div class="alert alert-success">
                    El responsable de la gestión es {{$pqrs->user->name}}
                </div>
            @else
            <div class="alert alert-danger">
                La PQRS no tiene responsable asignado.
            </div>
            @endif

        <div class="alert alert-success">
           Nro. de PQRS {{$pqrs->id}}
        </div>
        <div class="alert alert-warning">
            Fecha de vencimiento {{$vencimiento}}
        </div>

        @if ($user->privilegio == 1 or $user->privilegio ==2)
            <div class="card mb-3">

                <div class="card-header">
                    Cambiar Grupo
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('cambiargrupopqrs')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-4">
                                    <select class="form-control" name="grupo_id" required>
                                        <option value="">Seleccione un Grupo</option>
                                        @foreach($grupo as $g)
                                            <option value="{{$g->id}}">{{$g->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" name="id" value="{{$pqrs->id}}">
                                    <input type="submit" class="btn btn-primary btn-block" value="Cambiar">

                                </div>
                            </div>
                        </div>


                    </form>

                </div>
            </div>

        <div class="card mb-3">

            <div class="card-header">
            Asignar Responsable
            </div>
                <div class="card-body">
                    <form method="post" action="{{url('asignarresponsable')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-4">
                                    <select class="form-control" name="responsable_id" required>
                                        <option value="">Seleccione un Responsable</option>
                                        @foreach($responsables as $r)
                                            <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" name="id" value="{{$pqrs->id}}">
                                    <input type="submit" class="btn btn-primary btn-block" value="Asignar">

                                </div>
                            </div>
                        </div>


                    </form>

                </div>
            </div>


        @endif

    <div class="card mb-3">

            <div class="card-header">
                Detalle PQRS
            </div>
            <div class="card-body">
                <div class="alert alert-warning">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
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
                            </div>
                            <div class="col-md-4">

                                <p>Nombre: <b>{{$pqrs->contacto->contacto}}</b></p>
                                <p>Ciudad: <b>{{$pqrs->contacto->ciudad}}</b></p>
                                <p>Provincia: <b>{{$pqrs->contacto->provincia->nombre}}</b></p>
                                <p>Pais: <b>{{$pqrs->contacto->pais->nombre}}</b></p>
                                <p>Dirección: <b>{{$pqrs->contacto->direccionFisica}}</b></p>
                                <p>CP: <b>{{$pqrs->contacto->cp}}</b></p>

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
                </div>
            </div>




            <div class="card mb-3">

                <div class="card-header">
                    Clasificación Específica
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('agregaretiqueta')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-label-group">
                                        <input type="text" id="etiqueta" class="form-control" placeholder="Etiqueta" name="etiqueta" value="{{$pqrs->etiqueta}}">
                                        <label for="etiqueta">Clasificación Específica</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" name="id" value="{{$pqrs->id}}">
                                    <input type="submit" class="btn btn-primary btn-block" value="Guardar">

                                </div>
                            </div>
                        </div>


                    </form>

                </div>
            </div>







    </div>
        <div class="alert alert-warning">
            <form method="post" action="{{url('pqrs/cambiarTiempoRespuesta')}}">
                {{ csrf_field() }}
                Tiempo de Respuesta para esta PQRS
                <div class="form-group">

                    <div class="form-row">
                        <div class="col-md-2">
                            <div class="form-label-group">

                            <select class="form-control" name="tiempoRespuesta">
                                <option value="{{$pqrs->tiempoRespuesta}}" selected="selected">{{$pqrs->tiempoRespuesta}}</option>

                                <option value="10">10 días</option>
                                <option value="30">30 días</option>
                                <option value="+30">mas de 30 días</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" name="id" value="{{$pqrs->id}}">
                            <input type="submit" class="btn btn-primary btn-block" value="Cambiar">
                        </div>
                    </div>
                </div>






            </form>

        </div>

        @if ($respuestas->isEmpty())
            <div class="alert alert-danger">
                <p>Aun no se han generado respuestas sobre esta PQRS.</p>
            </div>
        @else




        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
               Respuestas Anteriores
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Fecha Respuesta</th>
                            <th>Resolutor</th>
                            <th>Gestión</th>
                            <th>Tiempo de Respuesta</th>
                            <th>Ver</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Fecha Respuesta</th>
                            <th>Resolutor</th>
                            <th>Gestión</th>
                            <th>Tiempo de Respuesta</th>
                            <th>Ver</th>
                        </tr>
                        </tfoot>
                        <tbody>


                            @foreach($respuestas as $p)
                                <tr>
                                <td>{{$p->created_at}}</td>
                                <td>{{$p->user->name}}</td>
                                <td>{{$p->nuevaGestion}}</td>

                                <td><a href="{{url('pqrs/respuesta', $p->id)}}" class="btn btn-primary btn-block" target="_blank">Ver</a></td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        @endif

        @if ($respuesta->isEmpty())

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Generar Nueva Respuesta</div>
                <div class="card-body">
                    <form method="post" action="{{url('pqrs/asignarrespuesta')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="nuevaGestion">Nueva Gestión</label>
                                    <div class="form-label-group">

                                        <textarea class="form-control" rows="6" id="nuevaGestion" placeholder="Nueva Gestión" name="nuevaGestion" required="required"></textarea>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="adjuntarSoporteGestion">Adjuntar Soporte Gestion</label>
                                    <div class="form-label-group">

                                        <input type="file" class="form-control-file" id="adjuntarSoporteGestion" name="adjuntarSoporteGestion">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="respuestaPreliminar">Respuesta Preliminar</label>
                                    <div class="form-label-group">

                                        <textarea class="form-control" rows="6" id="respuestaPreliminar" placeholder="Respuesta Preliminar" name="respuestaPreliminar"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="adjuntarSoportePreliminar">Adjuntar Soporte Preliminar</label>
                                    <div class="form-label-group">

                                        <input type="file" class="form-control-file" id="adjuntarSoportePreliminar" name="adjuntarSoportePreliminar">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="respuestaFinal">Respuesta Final</label>
                                    <div class="form-label-group">
                                        <textarea class="form-control" rows="6" id="respuestaFinal" placeholder="Respuesta Final" name="respuestaFinal"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-label-group">
                                        <input type="text" id="consecutivoCorrespondencia" class="form-control" placeholder="Consecutivo Correspondencia" name="consecutivoCorrespondencia">
                                        <label for="consecutivoCorrespondencia">Consecutivo Correspondencia</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="adjuntarSoporteFinal">Adjuntar Soporte Final</label>
                                    <div class="form-label-group">

                                        <input type="file" class="form-control-file" id="adjuntarSoporteFinal" name="adjuntarSoporteFinal">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <input type="hidden" name="user_id" value="{{$user_id}}">
                                    <input type="hidden" name="pqrs_id" value="{{$id}}">
                                    <input type="submit" class="btn btn-primary btn-block" name="guardar" value="Guardar Proceso">
                                    <input type="submit" class="btn btn-danger btn-block" name="guardarYCerrar" value="Cerrar Requerimiento">


                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        @else
            @foreach ($respuesta as $resp)

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Generar Nueva Respuesta</div>
                    <div class="card-body">
                        <form method="post" action="{{url('pqrs/asignarrespuesta')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="nuevaGestion">Nueva Gestión</label>
                                        <div class="form-label-group">

                                            <textarea class="form-control" rows="6" id="nuevaGestion" placeholder="Nueva Gestión" name="nuevaGestion" required="required" autofocus="autofocus">{{$resp->nuevaGestion}}</textarea>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="adjuntarSoporteGestion">Adjuntar Soporte Gestion</label>
                                        <div class="form-label-group">

                                            <input type="file" class="form-control-file" id="adjuntarSoporteGestion" name="adjuntarSoporteGestion">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="respuestaPreliminar">Respuesta Preliminar</label>
                                        <div class="form-label-group">
                                            <textarea class="form-control" rows="6" id="respuestaPreliminar" placeholder="Respuesta Preliminar" name="respuestaPreliminar">{{$resp->respuestaPreliminar}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="adjuntarSoportePreliminar">Adjuntar Soporte Preliminar</label>
                                        <div class="form-label-group">

                                            <input type="file" class="form-control-file" id="adjuntarSoportePreliminar" name="adjuntarSoportePreliminar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="respuestaFinal">Respuesta Final</label>
                                        <div class="form-label-group">
                                            <textarea class="form-control" rows="6" id="respuestaFinal" placeholder="Respuesta Final" name="respuestaFinal">{{$resp->respuestaFinal}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-label-group">
                                            <input type="text" id="consecutivoCorrespondencia" class="form-control" placeholder="Consecutivo Correspondencia" name="consecutivoCorrespondencia" value="{{$resp->consecutivoCorrespondencia}}">
                                            <label for="consecutivoCorrespondencia">Consecutivo Correspondencia</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="adjuntarSoporteFinal">Adjuntar Soporte Final</label>
                                        <div class="form-label-group">

                                            <input type="file" class="form-control-file" id="adjuntarSoporteFinal" name="adjuntarSoporteFinal">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-2">
                                        <input type="hidden" name="user_id" value="{{$user_id}}">
                                        <input type="hidden" name="pqrs_id" value="{{$id}}">
                                        <input type="hidden" name="respuesta_id" value="{{$resp->id}}">

                                        <input type="submit" class="btn btn-primary btn-block" name="actualizar" value="Guardar">
                                        <input type="submit" class="btn btn-danger btn-block" name="actualizarYCerrar" value="Cerrar">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            @endforeach

            @endif

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable({
                /* Disable initial sort */
                "aaSorting": []
            });
        })
    </script>

@endsection
