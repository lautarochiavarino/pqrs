@extends('layouts.admin')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", function() {
            Dropzone.options.dropzonefinal =
                {
                    dictDefaultMessage: "Click o arrastre para adjuntar Respuesta Final",
                    dictRemoveFile: "Quitar",
                    maxFilesize: 12,
                    parallelUploads:1,
                    addRemoveLinks: true,
                    renameFile: function (file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time + file.name;
                    },
                    acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.pdf,.xls,.docx,.xlsx,.odt,.ods",

                    timeout: 50000,

                    removedfile: function(file) {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{ url("image/delete") }}',
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    success: function (file, response) {
                        console.log(response);
                    },
                    error: function (file, response) {
                        return false;
                    }
                };
        });
    </script>

    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", function() {
            Dropzone.options.dropzonegestion =
                {
                    dictDefaultMessage: "Click o arrastre para adjuntar Soporte Gestión",
                    addRemoveLinks: true,
                    dictRemoveFile: "Quitar",
                    maxFilesize: 12,
                    parallelUploads:1,
                    renameFile: function (file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time + file.name;
                    },
                    acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.pdf,.xls,.docx,.xlsx,.odt,.ods",

                    timeout: 50000,

                    {{--removedfile: function(file) {--}}
                        {{--var name = file.upload.filename;--}}
                        {{--$.ajax({--}}
                            {{--headers: {--}}
                                {{--'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
                            {{--},--}}
                            {{--type: 'POST',--}}
                            {{--url: '{{ url("image/delete") }}',--}}
                            {{--data: {filename: name},--}}
                            {{--success: function (data){--}}
                                {{--console.log("File has been successfully removed!!");--}}
                            {{--},--}}
                            {{--error: function(e) {--}}
                                {{--console.log(e);--}}
                            {{--}});--}}
                        {{--var fileRef;--}}
                        {{--return (fileRef = file.previewElement) != null ?--}}
                            {{--fileRef.parentNode.removeChild(file.previewElement) : void 0;--}}
                    {{--},--}}


                    init: function () {
                        this.on("removedfile", function (file) {
                            $.post({
                                url: 'image/delete',
                                data: {id: file.name, _token: $('[name="_token"]').val()},
                                dataType: 'json',
                                success: function (data) {
                                    total_photos_counter--;
                                    $("#counter").text("# " + total_photos_counter);
                                }
                            });
                        });
                    },
                    success: function (file, response) {
                        console.log(response);
                    },
                    error: function (file, response) {
                        return false;
                    }
                };
        });
    </script>

    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", function() {
            Dropzone.options.dropzonepreliminar =
                {
                    dictDefaultMessage: "Click o arrastre para adjuntar Respuesta Preliminar",
                    dictRemoveFile: "Quitar",
                    addRemoveLinks: true,
                    maxFilesize: 12,
                    parallelUploads:1,
                    renameFile: function (file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time + file.name;
                    },
                    acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.pdf,.xls,.docx,.xlsx,.odt,.ods",

                    timeout: 50000,

                    removedfile: function(file) {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{ url("image/delete") }}',
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    success: function (file, response) {
                        console.log(response);
                    },
                    error: function (file, response) {
                        return false;
                    }
                };
        });
    </script>
@endsection

@section('content')
    <style type="text/css">
        .der {float: right;
        }
        .izq {float: left;}
        .nopad {padding: 0px !important;}
        .alert.col-md-6 {

            max-width: 49%;

        }
        .selectores2 .card {

            max-width: 98%;
            margin-left: 2%;

        }
        .selectores .card {

            max-width: 98%;

        }
        .alert {
   
    padding: .38rem 1.25rem !important;
   
}
        .card-body.responsable {
    padding-left: 15px;
    padding-top: 0;
    padding-bottom: 0;
    padding-right: 0;
}
        .espbot .col-md-6.izq {

    padding: 0;

}.col-md-12.espbot {

    margin-bottom: 80px;
padding: 0 !important;
}
        .labeletiqueta2 {

    padding-left: 20px !important;
    padding-top: 5px !important;
    padding-bottom: 5px !important;
    padding-right: 5px !important;

}input.labeletiqueta {

    height: 39px;

}
        .subir #dropzonepreliminar {

    padding-left: 20px !important;
    margin-right: 20px;

}/*.soportepreliminar.subir {

    margin-top: -840px;
    padding-left: 20px;

}
.soportepreliminar {

    height: 230px;

}
        .soportefinal.subir {

    margin-top: -410px;

}.form-group.top {

    margin-top: 250px;

}*/
   
.form-group.top {
  margin-top: 250px;
}
.soportefinal.subir {
  margin-top: -420px;
    padding-left: 20px;
}
#respuestaPreliminar {
  margin-bottom: 230px;
}
.soportepreliminar.subir {
  margin-top: -630px;
    padding-left: 20px;
}
        .dropzone {
       border: 1px solid #ccc !important; 
    border-radius: 5px !important; 
    margin-bottom: 15px !important; 
}
        #wrapper #content-wrapper {
      min-height: 300vh !important;
}
    </style>
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}">Volver</a>
            </li>
            <li class="breadcrumb-item active">Gestión PQRS</li>
        </ol>





        <div class="alert alert-success col-md-6 izq">
           Nro. de PQRS {{$pqrs->id}}
        </div>
        <div class="alert alert-warning col-md-6 der">
            Fecha de vencimiento {{$vencimiento}}
        </div>

        @if ($user->privilegio == 1 or $user->privilegio ==2)
            <div class="selectores col-md-6 izq nopad">
            <div class="mb-3">

              
                    <form method="post" action="{{url('cambiargrupopqrs')}}">
                        {{ csrf_field() }}

                        <div class="form-group">

                            <div class="form-row">
                                <div class="col-md-5">

                                @if ($pqrs->grupo_id == 0)
                                    <div class="alert alert-danger col-md-12 izq">
                                        La PQRS sin asignar.
                                    </div>
                                @else

                                    <div class="alert alert-success col-md-12 izq">
                                        Pertenece a {{$pqrs->grupo->nombre}}
                                    </div>
                                @endif
                                </div>





                                <div class="col-md-5">
                                    <select class="form-control" name="grupo_id" required>
                                        <option value="">Cambiar Grupo</option>
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

        <div class="selectores2 col-md-6 der nopad">

           
                <div class="card-body responsable">
                    <form method="post" action="{{url('asignarresponsable')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-5">

                                @if ($pqrs->responsable_id == NULL)

                                    <div class="alert alert-danger col-md-12 der">
                                        Si responsable asignado.
                                    </div>

                                @else
                                    <div class="alert alert-success col-md-12 der">
                                        El responsable es {{$pqrs->responsable->name}}
                                    </div>
                                @endif
                                </div>
                                <div class="col-md-5">
                                    <select class="form-control" name="responsable_id" required>
                                        <option value="">Seleccione Responsable</option>
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
                <a data-toggle="collapse" href="#collapse1">Desplegar Detalle PQRS</a>
            </div>
        <div id="collapse1" class="panel-collapse collapse">
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
                  @if ($archivos)
                        Archivos Adjuntos: <br/>
                        @foreach ($archivos as $ar)
                            @php
                                $extension=explode ("." , $ar->nombre)
                            @endphp
                            <a href="{{url('download', $ar->nombre)}}">- Descargar archivo Adjunto - {{$extension[1]}}</a><br/>
                        @endforeach

                    @endif
                </div>
            </div>
        </div>




           






    </div>
        <div class="col-md-12 espbot">
        
         <div class="col-md-6 izq">

                    <form method="post" action="{{url('agregaretiqueta')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            @if ($pqrs->etiqueta == NULL)
                            <div class="form-row">


                                <div class="col-md-6">
                                    <div class="form-label-group ">
                                        <input type="text" id="etiqueta" class="form-control labeletiqueta" placeholder="Etiqueta" name="etiqueta" value="{{$pqrs->etiqueta}}">
                                        <label class="labeletiqueta2" for="etiqueta">Clasificación Específica</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="id" value="{{$pqrs->id}}">
                                    <input type="submit" class="btn btn-primary btn-block" value="Guardar">

                                </div>
                            </div>
                                @else
                                {{$pqrs->etiqueta}}
                                @endif
                        </div>


                    </form>

            </div>

        
        
        <div class="col-md-6 der">
            <form method="post" action="{{url('pqrs/cambiarTiempoRespuesta')}}">
                {{ csrf_field() }}
                
                <div class="form-group">

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">

                            <select class="form-control" name="tiempoRespuesta">
                                <option value="{{$pqrs->tiempoRespuesta}}" selected="selected">{{$pqrs->tiempoRespuesta}}</option>
                                <option value="10">10 días</option>
                                <option value="30">30 días</option>
                                <option value="+30">mas de 30 días</option>
                            </select>
                                Ingrese un tiempo de respuesta para la PQRS
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="{{$pqrs->id}}">
                            <input type="submit" class="btn btn-primary btn-block" value="Cambiar">
                        </div>
                    </div>
                </div>






            </form>

        </div>
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

                            <th>Ver</th>

                        </tr>
                        </thead>

                        <tbody>


                            @foreach($respuestas as $p)
                                <tr>
                                <td>{{$p->created_at}}</td>
                                <td>{{$p->user->name}}</td>
                                <td>{{$p->nuevaGestion}}</td>

                                <td><a href="{{url('pqrs/respuesta', $p->id)}}" class="btn btn-primary" target="_blank">Ver</a></td>
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
                    Generar Nueva Gestión</div>
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
                        {{--<div class="form-group">--}}
                            {{--<div class="form-row">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<label for="adjuntarSoporteGestion">Adjuntar Soporte Gestion</label>--}}
                                    {{--<div class="form-label-group">--}}

                                        {{--<input type="file" class="form-control-file" id="adjuntarSoporteGestion" name="adjuntarSoporteGestion">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}



                        {{--<div class="form-group">
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
                                    <label for="adjuntarSoportePreliminar">Adjuntar Soporte Preliminar 1</label>
                                    <div class="form-label-group">

                                        <input type="file" class="form-control-file" id="adjuntarSoportePreliminar" name="adjuntarSoportePreliminar">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="respuestaFinal">Respuesta Final 1</label>
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
                        </div>--}}

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <input type="hidden" name="user_id" value="{{$user_id}}">
                                    <input type="hidden" name="pqrs_id" value="{{$id}}">
                                    @if ($pqrs->estado != 2)
                                    <input type="submit" class="btn btn-primary btn-block" name="guardar" value="Guardar Gestión">
                                    @endif
                                    {{--<input type="submit" class="btn btn-danger btn-block" name="guardarYCerrar" value="Cerrar Requerimiento">--}}


                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="adjuntarSoporteGestion">Adjuntar Soporte Gestión</label>
                                <div class="form-label-group">
                                    <form method="post" action="{{url('fileRespuestaGestion/upload/store')}}" enctype="multipart/form-data"
                                          class="dropzone" id="dropzonegestion">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            {{--<div class="form-group">--}}
                                {{--<div class="form-row">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<label for="adjuntarSoporteGestion">Adjuntar Soporte Gestion</label>--}}
                                        {{--<div class="form-label-group">--}}

                                            {{--<input type="file" class="form-control-file" id="adjuntarSoporteGestion" name="adjuntarSoporteGestion">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}


                           {{-- <div class="form-group">
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
                                        <label for="adjuntarSoportePreliminar">Adjuntar Soporte Preliminar 2</label>
                                        <div class="form-label-group">

                                            <input type="file" class="form-control-file" id="adjuntarSoportePreliminar" name="adjuntarSoportePreliminar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="respuestaFinal">Respuesta Final 2</label>
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
                            </div>--}}

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-2">
                                        <input type="hidden" name="user_id" value="{{$user_id}}">
                                        <input type="hidden" name="pqrs_id" value="{{$id}}">
                                        <input type="hidden" name="respuesta_id" value="{{$resp->id}}">
                                        @if ($pqrs->estado != 2)
                                        <input type="submit" class="btn btn-primary btn-block" name="actualizar" value="Guardar Proceso">
                                        {{--<input type="submit" class="btn btn-danger btn-block" name="actualizarYCerrar" value="Cerrar Requerimiento">--}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="adjuntarSoporteGestion">Adjuntar Soporte Gestión</label>
                                    <div class="form-label-group">
                                        <form method="post" action="{{url('fileRespuestaGestion/upload/store')}}" enctype="multipart/form-data"
                                              class="dropzone" id="dropzonegestion">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @foreach ($archivosRespuestas as $r)
                                        @php
                                            $extension=explode ("." , $r->nombre)
                                        @endphp
                                        @if ($r->tipo == "Soporte Gestión")
                                            <a href="{{url('downloadRespuesta', $r->nombre)}}" class="btn btn-warning">Descargar Soporte {{$extension[1]}}</a><br/>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            @endforeach

            @endif

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Cerrar PQRS</div>
            <div class="card-body">
                <form method="post" action="{{url('pqrs/cerrarpqrs')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}





                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="respuestaPreliminar">Respuesta Preliminar</label>
                                <div class="form-label-group">

                                    <textarea class="form-control" rows="6" id="respuestaPreliminar" placeholder="Respuesta Preliminar" name="respuestaPreliminar">{{$pqrs->respuestaPreliminar}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="float:right;">
                        @if ($pqrs->estado == 2)
                        <a href="{{url('pqrs/respuestaFinal', $pqrs->id)}}" target="_blank">Respuesta Final</a>
                        @endif
                    </div>
                    <div class="soportepreliminar">
                       <!--  <div class="form-row">
                            <div class="col-md-12">
                                <label for="adjuntarSoportePreliminar">Adjuntar Soporte Preliminar 3</label>
                                <div class="form-label-group">

                                    <input type="file" class="form-control-file" id="adjuntarSoportePreliminar" name="adjuntarSoportePreliminar">
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="respuestaFinal">Respuesta Final</label>
                                <div class="form-label-group">
                                    <textarea class="form-control" rows="6" id="respuestaFinal" placeholder="Respuesta Final" name="respuestaFinal">{{$pqrs->respuestaFinal}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="soportefinal"></div>
                    <div class="form-group top">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="consecutivoCorrespondencia" class="form-control" placeholder="Consecutivo Correspondencia" name="consecutivoCorrespondencia" value="{{$pqrs->consecutivoCorrespondencia}}">
                                    <label for="consecutivoCorrespondencia">Consecutivo Correspondencia</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<div class="form-row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<label for="adjuntarSoporteFinal">Adjuntar Soporte Final</label>--}}
                                {{--<div class="form-label-group">--}}

                                    {{--<input type="file" class="form-control-file" id="adjuntarSoporteFinal" name="adjuntarSoporteFinal">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                                <input type="hidden" name="pqrs_id" value="{{$id}}">
                                @if ($pqrs->estado != 2)
                                    <input type="submit" class="col-md-6 btn btn-danger btn-block" name="guardarsincerrar" value="Guardar PQRS">
                                <input type="submit" class="col-md-6 btn btn-primary btn-block" name="cerrar" value="Cerrar PQRS">
                                {{--<input type="submit" class="btn btn-danger btn-block" name="guardarYCerrar" value="Cerrar Requerimiento">--}}

                                @endif

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="soportefinal subir">
                <div class="form-row">
                 <div class="col-md-8">
                    <label for="adjuntarSoporteFinal">Adjuntar Soporte Final</label>
                        <div class="form-label-group">
                            <form method="post" action="{{url('fileRespuesta/upload/store')}}" enctype="multipart/form-data"
                                  class="dropzone" id="dropzonefinal">
                                @csrf
                            </form>
                            </div>
                            </div>
                    <div class="col-md-4">
                        @foreach ($archivosRespuestas as $r)
                            @php
                                $extension=explode ("." , $r->nombre)
                            @endphp
                            @if ($r->tipo == "Respuesta Final")
                                <a href="{{url('downloadRespuesta', $r->nombre)}}" class="btn btn-warning">Descargar Soporte {{$extension[1]}}</a><br/>
                            @endif
                        @endforeach
                    </div>
                </div>
                            </div>



            <div class="soportepreliminar subir">
                <div class="form-row">
                    <div class="col-md-8">
                        <label for="adjuntarSoporteFinal">Adjuntar Soporte Preliminar</label>
                        <div class="form-label-group">
                            <form method="post" action="{{url('fileRespuestaPreliminar/upload/store')}}" enctype="multipart/form-data"
                                  class="dropzone" id="dropzonepreliminar">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div  class="col-md-4">
                        @foreach ($archivosRespuestas as $r)
                            @php
                                $extension=explode ("." , $r->nombre)
                            @endphp
                            @if ($r->tipo == "Respuesta Preliminar")
                                <a href="{{url('downloadRespuesta', $r->nombre)}}" class="btn btn-warning">Descargar Soporte {{$extension[1]}}</a><br/>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>






            </div>
        <div style="float:right;">
            @if ($pqrs->estado == 2)

                <a href="{{url('pqrs/respuestaPreliminar', $pqrs->id)}}" target="_blank">Respuesta Preliminar</a>
            @endif
        </div>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable({
                /* Disable initial sort */
                "aaSorting": []
            });
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

@endsection
