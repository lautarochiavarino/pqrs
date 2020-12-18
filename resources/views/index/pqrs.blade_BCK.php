@extends('layouts.front')

@section('content')

<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Nueva PQRS</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    <p>Gracias por contactarnos.</p>
                    <p>{{ session('status') }}</p>
                    <p>Por favor, conserve este número para el seguimiento de su PQRS.</p>
                    <p>Podrá realizar el seguimiento a travez del siguiente link:</p>
                    <a href="/seguimiento">Click para ver el estado de la PQRS</a><br/>
                    <p>Importante:</p>
                    <p>Una vez generada la respuesta final, la PQRS será cerrada en nuestro sistema. Si presenta alguna inconformidad con la respuesta entregada, por favor ingrese una nueva PQRS relacionando el número de su anterior PQRS.</p>
                </div><br />
            @endif
            <form method="POST" action="{{url('pqrs')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="aSuNombre">Esta usted ingresando la PQRS a su propio nombre?</label>
                            <div class="form-label-group">

                                <select id="aSuNombre" class="form-control" autofocus="autofocus" name="aSuNombre" required>
                                    <option value="">Seleccione una opcion</option>
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="formatoRecepcion">Formato de Recepcion</label>
                            <div class="form-label-group">

                                <select id="formatoRecepcion" class="form-control" name="formatoRecepcion" autofocus="autofocus" required>
                                    <option value="">Seleccione una opcion</option>
                                    <option>Online</option>
                                    <option>Verbal</option>
                                    <option>Escrita</option>
                                    <option>Correo Electronico</option>
                                    <option>Linea Telefonica</option>
                                    <option>Reunion</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="tipoSolicitud">Tipo de Solicitud</label>
                            <div class="form-label-group">

                                <select id="tipoSolicitud" class="form-control" name="tipoSolicitud" required>
                                    <option value="">Seleccione una opcion</option>
                                    <option>Peticion</option>
                                    <option>Queja</option>
                                    <option>Reclamo</option>
                                    <option>Sugerencia</option>
                                    <option>Vinculado a DDHH</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="tipoSolicitante_id">Tipo de Solicitante</label>
                            <div class="form-label-group">

                                <select id="tipoSolicitante_id" class="form-control" name="tipoSolicitante_id" required>
                                    <option value="">Seleccione una opcion</option>
                                    <option>Proveedor</option>
                                    <option>Colaborador/Pensionado</option>
                                    <option>Cliente</option>
                                    <option>Entidad Gubernamental</option>
                                    <option>Comunidad</option>
                                    <option>Medios de Comunicacion</option>
                                    <option>Otros</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="nombreApellido" class="form-control" placeholder="Nombre y Apellido" required="required" autofocus="autofocus" name="nombreApellido">
                                    <label for="nombreApellido">Nombre y Apellido</label>
                                </div>
                            </div>

                        </div>
                    </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="medioRespuesta">Como desea recibir la respuesta?</label>
                            <div class="form-label-group">

                                <select id="medioRespuesta" class="form-control" name="medioRespuesta" required>
                                    <option value="">Seleccione una opcion</option>
                                    <option>Correo Electronico</option>
                                    <option>Direccion Fisica</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="email" class="form-control" placeholder="Coreo Electronico" required="required" name="email">
                        <label for="email">Correo Electronico</label>
                    </div>
                </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="direccionFisica" class="form-control" placeholder="Direccion Fisica" required="required" autofocus="autofocus" name="direccionFisica">
                                    <label for="direccionFisica">Direccion Fisica</label>
                                </div>
                            </div>

                        </div>
                    </div>
                <div id="app">
                    <example>

                    </example>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input type="text" id="ciudad" class="form-control" placeholder="Ciudad/Municipio" autofocus="autofocus" name="ciudad">
                                <label for="cp">Ciudad</label>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input type="text" id="cp" class="form-control" placeholder="Codigo Postal" required="required" autofocus="autofocus" name="cp">
                                <label for="cp">Codigo Postal</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input type="text" id="telFijo" class="form-control" placeholder="Telefono Fijo" required="required" autofocus="autofocus" name="telFijo">
                                <label for="telFijo">Telefono Fijo</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input type="text" id="telCelular" class="form-control" placeholder="Telefono Celular" required="required" autofocus="autofocus" name="telCelular">
                                <label for="telCelular">Telefono Celular</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">

                                <textarea class="form-control" rows="2" id="breveDescripcion" placeholder="PQRS en Breve" name="breveDescripcion" required="required"></textarea>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-label-group">

                                <textarea class="form-control" rows="6" id="descripcion" placeholder="PQRS" name="descripcion" required="required"></textarea>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="adjuntarSoporte">Adjuntar Soporte</label>
                            <div class="form-label-group">

                                <input type="file" class="form-control-file" id="adjuntarSoporte" name="adjuntarSoporte">
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="contacto_id" value="{{$id}}">

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-4">
                            <a class="btn btn-primary btn-block" href="#">Cancelar</a>
                        </div>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary btn-block" value="Enviar PQRS">

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@stop