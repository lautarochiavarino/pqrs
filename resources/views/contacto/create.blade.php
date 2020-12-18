@extends('layouts.front')

@section('content')

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Registre su Contacto</div>
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

                    </div><br />
                @endif
                <form method="POST" action="ContactoController@store">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="tipoContacto">Tipo de Contacto</label>
                                <div class="form-label-group">

                                    <select id="tipoContacto" class="form-control" autofocus="autofocus" name="tipoContacto" required>
                                        <option value="">Seleccione una opcion</option>
                                        <option>Contratista</option>
                                        <option>Proveedor de Servicios</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="entidad" class="form-control" placeholder="Entidad" required="required" autofocus="autofocus" name="entidad">
                                    <label for="entidad">Entidad</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="contacto" class="form-control" placeholder="Contacto" required="required" autofocus="autofocus" name="contacto">
                                    <label for="contacto">Contacto</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="cargo" class="form-control" placeholder="Cargo" required="required" autofocus="autofocus" name="cargo">
                                    <label for="cargo">Cargo</label>
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
                                    <label for="ciudad">Ciudad</label>
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
                                    <input type="text" id="telFijo1" class="form-control" placeholder="Telefono Fijo 1" autofocus="autofocus" name="telFijo1">
                                    <label for="telFijo1">Telefono Fijo 1</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="telFijo2" class="form-control" placeholder="Telefono Fijo 2" autofocus="autofocus" name="telFijo2">
                                    <label for="telFijo2">Telefono Fijo 2</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="telCelular" class="form-control" placeholder="Telefono Celular" autofocus="autofocus" name="telCelular">
                                    <label for="telCelular">Telefono Celular</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="fax" class="form-control" placeholder="Fax" autofocus="autofocus" name="fax">
                                    <label for="fax">Fax</label>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="proposito">Proposito</label>
                                <div class="form-label-group">

                                    <select id="proposito" class="form-control" autofocus="autofocus" name="proposito">
                                        <option value="">Seleccione una opcion</option>
                                        <option>Proposito 1</option>
                                        <option>Proposito 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="datosAdicionales" class="form-control" placeholder="Datos Adicionales" autofocus="autofocus" name="datosAdicionales">
                                    <label for="datosAdicionales">Datos Adicionales</label>
                                </div>
                            </div>

                        </div>
                    </div>




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