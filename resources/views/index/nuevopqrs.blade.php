<!DOCTYPE html>
<html class=" background-fixed" lang="es-ES"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">

    <title>AES Colombia – Sistema PQRS</title>
    <link rel="dns-prefetch" href="http://fonts.googleapis.com/">
    <link href="https://fonts.gstatic.com/" crossorigin="" rel="preconnect">
    <link rel="stylesheet" id="" href="{{ asset('/site/formulario/formulario/style.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-frontend-css" href="{{ asset('/site/formulario/formulario/frontend.css')}}" type="text/css" media="all">
    <link href="{{ asset('/site/formulario/formulario/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/site/formulario/formulario/all.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/site/formulario/formulario/sb-admin.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="SKT3fxGyigUBB0jqjggKjS9dqg3za3ysRfiThbRK">

    <link href="{{ asset('/site/formulario/formulario/select2.css')}}" rel="stylesheet">




    <style type="text/css">

        .card-register {
            max-width: 1020px !important;
        }
        select {
            height: 50px !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da !important;
        }
        .select2-container .select2-selection--single {
            height: 50px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px !important;
            width: 17px !important;
            border: 1px solid #707070!important;
        }
        select{

            width: 100%;
        }

    </style>

<script>
    $( function() {
    $("#tipoSolicitante_id").change( function() {
    if ($(this).val() === "Cliente") {
    $("#prueba").prop("enabled", true);
    } else {
    $("#prueba").prop("disabled", false);
    }
    });
    });
</script>

</head>
<body class="home page-template page-template-elementor_canvas page page-id-5  has-header-image page-two-column colors-light elementor-default elementor-template-canvas elementor-page elementor-page-5" data-elementor-device-mode="desktop">
<div class="elementor elementor-5">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
            <section data-id="f137ee0" class="elementor-element elementor-element-f137ee0 elementor-section-height-full elementor-section-boxed elementor-section-height-default elementor-section-items-middle elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-background-overlay"></div>
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="2d47a8fe" class="elementor-element elementor-element-2d47a8fe elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">



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
                                                    <a href="{{url('seguimiento')}}">Click para ver el estado de la PQRS</a><br/>
                                                    <p>Importante:</p>
                                                    <p>Una vez generada la respuesta final, la PQRS será cerrada en nuestro sistema. Si presenta alguna inconformidad con la respuesta entregada, por favor ingrese una nueva PQRS relacionando el número de su anterior PQRS.</p>
                                                </div><br />
                                            @endif

                                            <div class="alert alert-success">
                                                @if($contacto)

                                                    Nombre: {{$contacto->contacto}}<br/>
                                                    Email: {{$contacto->email}}<br/>



                                                    @php ($contacto_id=$contacto->id)


                                                @endif
                                            </div>
                                            <form method="post" action="{{url('savepqrs')}}" enctype="multipart/form-data">
                                                @csrf
                                                <br/>
                                                <hr>

                                                <br/>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <label for="aSuNombre">Esta usted ingresando la PQRS a su propio nombre?</label>
                                                            <div class="form-label-group">

                                                                <select id="aSuNombre" class="form-control" autofocus="autofocus" name="aSuNombre" required>
                                                                    <option value="">Seleccione una opcion</option>
                                                                    <option>Si</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="formatoRecepcion">Formato de Recepcion</label>
                                                            <div class="form-label-group">

                                                                <select id="formatoRecepcion" class="form-control" name="formatoRecepcion" autofocus="autofocus" required>
                                                                    <option value="">Seleccione una opcion</option>
                                                                    <option>Redes Sociales</option>
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
                                                        <div class="col-md-4">
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
                                                        <div class="col-md-4">
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


                                                        <input id="prueba" type="text" disabled>
                                                        <div class="col-md-4">
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
                                                        <div class="col-md-4">
                                                            <label for="adjuntarSoporte">Adjuntar Soporte</label>
                                                            <div class="form-label-group">

                                                                <input type="file" class="form-control-file" id="adjuntarSoporte" name="adjuntarSoporte">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="contacto_id" value="{{$contacto_id}}">

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
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
</div>


<script src="{{ asset('/site/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('/site/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/site/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<script src="{{ asset('/js/dropdown.js')}}"></script>
</body></html>


<div class="container">

</div>
