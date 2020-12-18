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


    <!--<meta name="csrf-token" content="SKT3fxGyigUBB0jqjggKjS9dqg3za3ysRfiThbRK">-->


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/site/formulario/formulario/select2.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">




    <style type="text/css">

        .card-register {
            max-width: 1020px !important;
        }
        input.btn.btn-primary.btn-block {
    background-color: #68a41e;
    border-radius: 5px;
}
        .btn-primary {
    color: #fff;
    background-color: #0877BE;
    border-color: #0877BE;
    height: 40px;
    border-radius: 5px;
}
        .titulos p {
  padding-bottom: 5px;

margin-bottom: 20px;

border: 1px solid #0877be;

padding-top: 5px;

margin-top: 40px;

font-weight: 600;

color: #00415f;

}
        .titulos {

    background-color: #f4f4f4;
    text-align: center;

}
        .titulos2 p {
    border-bottom: 1px solid #68a41e;
    padding-bottom: 5px;
    margin-bottom: 20px;
}
        .labels span {
    color: #68a41e;
}
        .labels  {
    color: #4e4e4e;
            padding-bottom: 5px;
}
.logoaes {
    text-align: center;
    margin: 0 auto;
    width: 100%;
    padding-bottom: 10px;
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
         .alert-info {
    color: #fff !important;
    background-color: transparent;
    border-color: transparent;
    background: -moz-linear-gradient(left, rgba(104,164,30,1) 0%, rgba(107,166,30,1) 31%, rgba(166,209,58,1) 55%, rgba(168,211,60,1) 78%, rgba(168,211,60,1) 100%);
    background: -webkit-gradient(left top, right top, color-stop(0%, rgba(104,164,30,1)), color-stop(31%, rgba(107,166,30,1)), color-stop(55%, rgba(166,209,58,1)), color-stop(78%, rgba(168,211,60,1)), color-stop(100%, rgba(168,211,60,1)));
    background: -o-linear-gradient(left, rgba(104,164,30,1) 0%, rgba(107,166,30,1) 31%, rgba(166,209,58,1) 55%, rgba(168,211,60,1) 78%, rgba(168,211,60,1) 100%);
    background: -ms-linear-gradient(left, rgba(104,164,30,1) 0%, rgba(107,166,30,1) 31%, rgba(166,209,58,1) 55%, rgba(168,211,60,1) 78%, rgba(168,211,60,1) 100%);
    background: linear-gradient(to right, rgba(104,164,30,1) 0%, rgba(107,166,30,1) 31%, rgba(166,209,58,1) 55%, rgba(168,211,60,1) 78%, rgba(168,211,60,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#68a41e', endColorstr='#a8d33c', GradientType=1 );
}
.alert-info {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    width: 95%;
    margin: 0 auto;
        margin-top: 0px;
    margin-top: 16px;
}
         .centrar {text-align: center;}

        select{

            width: 100%;
        }
.adjuntarpqrs {
    margin-top: -380px;
}
.botonespqrs {
    margin-top: 350px;
}
.card-body {
    margin-bottom: 100px !important;
}

    </style>
    <script>
        function fileValidation(){
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(.jpg|.pdf|.png|.gif|.xlsx|.docx|.pptx|.doc|.xls)$/i;
            if(!allowedExtensions.exec(filePath)){
                alert('El formato de archivo no esta permitido, se aceptan únicamente  .pdf, .docx, .xlsx, .gif, .jpg, .png, .pptx, .doc, .xls');
                fileInput.value = '';
                return false;
            }
        }
    </script>


    <script>
        function habilitar(value)
        {
            if(value=="Cliente")
            {
                // habilitamos
                document.getElementById("razonSocial2").setAttribute("style", "display:inline;");
                document.getElementById("razonSocial3").setAttribute("style", "display:inline;");
                document.getElementById("razonSocial").disabled=false;
                document.getElementById("tipoTramite").disabled=false;
                document.getElementById("causal").disabled=false;
                document.getElementById("detalleCausal").disabled=false;
                document.getElementById("codigoSic").disabled=false;

            }else{
                document.getElementById("razonSocial2").setAttribute("style", "display:none;");
                document.getElementById("razonSocial3").setAttribute("style", "display:none;");
                document.getElementById("razonSocial").disabled=true;
                document.getElementById("razonSocial").value="";
                document.getElementById("tipoTramite").disabled=true;
                document.getElementById("tipoTramite").value="";
                document.getElementById("causal").disabled=true;
                document.getElementById("causal").value="";
                document.getElementById("detalleCausal").disabled=true;
                document.getElementById("detalleCausal").value="";
                document.getElementById("codigoSic").disabled=true;
                document.getElementById("codigoSic").value="";
            }
        }

        function habilitarCausal(value)
        {
            if(value=="Facturación")
            {
                // habilitamos
                document.getElementById("nroFactura").disabled=false;

            }else{

                document.getElementById("nroFactura").disabled=true;
                document.getElementById("nroFactura").value="";
            }
            if(value=="Prestación")
            {
                // habilitamos
                document.getElementById("fechaEvento").disabled=false;

            }else{

                document.getElementById("fechaEvento").disabled=true;
                document.getElementById("fechaEvento").value="";
            }

        }


        function anombre(value)
        {
            if(value=="Si")
            {
                //
                document.getElementById("formatoRecepcion").disabled=true;
                document.getElementById("formatoRecepcion").value="Redes Sociales";
                var UnBoton = document.createTextNode ('<input type="hidden" name="formatoRecepcion" value="Redes Sociales">');

            }else{
                document.getElementById("formatoRecepcion").disabled=false;

            }


        }

        function respuesta(value)
        {
            if(value=="Dirección Física")
            {
                // habilitamos


                        $('#direccionFisica').show();
                        $('#direccionFisica').prop('required',true);
                        $('#email').prop('required',false);

                    }





            if(value=="Correo Electrónico")
            {
                // habilitamos
                $('#email').show();
                $('#email').prop('required',true);
                $('#direccionFisica').prop('required',false);

            }





        }
    </script>

    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", function() {
            Dropzone.options.dropzone =
                {
                    dictDefaultMessage: "Click o arrastre para adjuntar",
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
                                        <div class="card-header"><div class="logoaes"><img src="/public/site/portada/imagenes/logo.png" width="300" height="69" alt="Aes Colombia"/></div></div>
                                        <div class="row">
          
        </div>

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
                                                       <div class="centrar">  <p>Gracias por contactarnos.</p>
                                                        <p>La PQRS ha sido enviada. <b>Su número de registro es: {{ session('status') }}</b></p>
                                                        <p>Por favor, conserve este número para el seguimiento de su PQRS.</p>
                                                        <p>Podrá realizar el seguimiento a través del siguiente link:</p>
                                                           <a href="{{url('seguimiento')}}">Click para ver el estado de la PQRS</a></div><br/><br/>
                                                        <p><b>Importante:</b><br/>
                                                        Una vez generada la respuesta final, la PQRS será cerrada en nuestro sistema. Si presenta alguna inconformidad con la respuesta entregada, por favor ingrese una nueva PQRS relacionando el número de su anterior PQRS.</p>
                                                    </div><br />


                                                @else



                                                <form method="post" action="{{url('savepqrs')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    {{csrf_field()}}
                                                    <div class="row">
            <div class="alert alert-info">
                <p><strong>RECUERDE QUE SI NOS ESTA CONTACTANDO POR:</strong></p>
                <p>Seguridad Industrial, la línea dedicada a este tema es: <a href="https://secure.ethicspoint.com/lrn/media/es/gui/39178/index.html
">Hablando seguro.</a></p>
                <p>Ética y Cumplimiento, la línea dedicada a este tema es: <a href="https://secure.ethicspoint.com/domain/media/es/gui/36073/index.html
"> AES Helpline</a></p>
            </div>
        </div>
                                                    <div class="titulos"><p>DATOS DEL SOLICITANTE</p></div>








                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                
                                                                <div class="form-label-group">
<div class="labels">Está ingresando la PQRS a nombre propio? <span>*</span></div>
                                                                    <select id="aSuNombre" class="form-control" autofocus name="aSuNombre" required onchange="anombre(this.value);">
                                                                        <option value="">Seleccione una opción</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">

                                                                <div class="form-label-group">
<div class="labels">Formato de Recepción <span>*</span></div>
                                                                    <select id="formatoRecepcion" class="form-control" name="formatoRecepcion" autofocus required>
                                                                        <option value="">Seleccione una opción</option>
                                                                        <option>Redes Sociales</option>
                                                                        <option>Verbal</option>
                                                                        <option>Escrita</option>
                                                                        <option>Correo Electrónico</option>
                                                                        <option>Línea Telefónica</option>
                                                                        <option>Reunión</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">

                                                                <div class="form-label-group">
<div class="labels">Tipo de Solicitante <span>*</span></div>

                                                                    <select id="tipoSolicitante_id" class="form-control" name="tipoSolicitante_id" required onchange="habilitar(this.value);">
                                                                        <option value="">Seleccione una opción</option>
                                                                        <option>Accionista</option>
                                                                        <option value="Cliente">Cliente</option>
                                                                        <option>Colaborador/Pensionado</option>
                                                                        <option>Comunidad</option>
                                                                        <option>Entidad Gubernamental</option>
                                                                        <option>Medios de Comunicación</option>
                                                                        <option>Proveedor</option>
                                                                        <option>Otros</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <div class="form-group" style="display:none"; id="razonSocial2">
                                                       
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                    
<div class="labels">Razón Social <span>*</span></div>
                                                                <div class="form-label-group">
                                                                     
                                                                    <input id="razonSocial" class="form-control" placeholder="Razón Social*" autofocus name="razonSocial" type="text" disabled required>
                                                                    <label for="razonSocial">Razón Social*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">

                                                                <div class="form-label-group">
<div class="labels">Tipo de Trámite <span>*</span></div>
                                                                    <select id="tipoTramite" class="form-control" name="tipoTramite" autofocus required disabled>
                                                                        <option value="">Seleccione una opción</option>
                                                                        <option>Reclamación</option>
                                                                        <option>Queja</option>
                                                                        <option>Denuncia</option>
                                                                        <option>Recurso de Reposición</option>
                                                                        <option>Recurso de Reposición y Subsidiario de Apelación</option>
                                                                        <option>Solicitud de Información, de copias de Documentos</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">

                                                                <div class="form-label-group">
<div class="labels">Causal <span>*</span></div>

                                                                    <select id="causal" class="form-control" name="causal" required disabled onchange="habilitarCausal(this.value);">
                                                                        <option value="">Causal*</option>
                                                                        <option value="Facturación">Facturación</option>
                                                                        <option value="Instalación">Instalación</option>
                                                                        <option value="Prestación">Prestación</option>
                                                                    </select>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <a href="{{ asset('Causales_de_Reclamaciones.pdf')}}" target="_blank">Descargar Causales de Reclamaciones</a><br/>
                                                    </div>

                                                    <div class="form-group" style="display:none"; id="razonSocial3">
                                                        <div class="form-row">
                                                            <div class="col-md-3">
                                                                <div class="labels">Detalle Causal <span>*</span></div>

                                                                <div class="form-label-group">

                                                                    <input id="detalleCausal" class="form-control" placeholder="Detalle Causal*" autofocus name="detalleCausal" type="text" disabled required>
                                                                    <label for="detalleCausal">Detalle Causal*</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
<div class="labels">Código SIC o NIU</div>
                                                                <div class="form-label-group">
          

                                                                    <input id="codigoSic" class="form-control" placeholder="Código SIC o NIU" autofocus name="codigoSic" type="text" disabled>
                                                                    <label for="codigoSic">Código SIC o NIU</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
 <div class="labels">Nro. Factura</div>
                                                                <div class="form-label-group">
                                                                   
                                                                    <input id="nroFactura" class="form-control" placeholder="Nro. Factura" autofocus name="nroFactura" type="text" disabled>
                                                                    <label for="nroFactura">Nro. Factura</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
  <div class="labels">Fecha Evento</div>
                                                                <div class="form-label-group">
                                                                  
                                                                    <input id="fechaEvento" class="form-control" placeholder="Fecha Evento" autofocus name="fechaEvento" type="date" disabled>
                                                                    <label for="fechaEvento">Fecha Evento</label>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
<div class="labels">Nombre <span>*</span></div>
                                                                <div class="form-label-group">
                                                                <input id="contacto" class="form-control" placeholder="Nombre*" required="required" autofocus name="contacto" type="text">
                                                                <label for="contacto">Nombre*</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="titulos"><p>DATOS DE CONTACTO</p></div>

                                                    <div class="form-group">
                                                        <div class="form-row">

                                                            <div class="col-md-6">

                                                                <div class="form-label-group">
<div class="labels">Cómo desea recibir la respuesta? <span>*</span></div>
                                                                    <select id="medioRespuesta" class="form-control" name="medioRespuesta" required onchange="respuesta(this.value);">
                                                                        <option value="">Seleccione una opción</option>
                                                                        <option value="Correo Electrónico">Correo Electrónico</option>
                                                                        <option value="Dirección Física">Dirección Física</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
<div class="labels">Seleccione un País <span>*</span></div>
                                                                <div class="form-label-group">
                                                                    {!! Form::select('pais_id', $paises,null,['id'=>'pais', 'placeholder' => 'Seleccione un País*']) !!}
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>


                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <div class="col-md-6">
<div class="labels">Correo Electrónico</div>
                                                                <div class="form-label-group">

                                                                    <input id="email" class="form-control" placeholder="Coreo Electronico" name="email" type="email">
                                                                    <label for="email">Correo Electrónico</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">

                                             <div class="labels">Provincia/Estado/Departamento <span>*</span></div>                   <div class="form-label-group">
                                                                    {!! Form::select('provincia_id',['placeholder'=>'Provincia/Estado/Departamento*'],null,['id'=>'provincia']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="form-row">

                                                            <div class="col-md-6">
<div class="labels">Dirección Física</div>
                                                                <div class="form-label-group">
                                                                    <input id="direccionFisica" class="form-control" placeholder="Direccion Fisica" autofocus name="direccionFisica" type="text">
                                                                    <label for="direccionFisica">Dirección Física</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">

                                                                <div class="form-label-group">
                                                                    <div class="labels">Ciudad/Municipio<span>*</span></div>                   <div class="form-label-group">
                                                                        {!! Form::select('ciudad_id',['placeholder'=>'Provincia/Estado/Departamento*'],null,['id'=>'ciudad']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="form-row">

                                                            <div class="col-md-4">
<div class="labels">Código Postal - ZIP</div>
                                                                <div class="form-label-group">
                                                                    <input id="cp" class="form-control" placeholder="Codigo Postal - ZIP" autofocus name="cp" type="text">
                                                                    <label for="cp">Código Postal - ZIP</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
  <div class="labels">Teléfono Fijo</div>
                                                                <div class="form-label-group">
                                                                    <input id="telFijo1" class="form-control" placeholder="Telefono Fijo" autofocus name="telFijo1" type="text">
                                                                    <label for="telFijo1">Teléfono Fijo</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
  <div class="labels">Teléfono Celular</div>
                                                                <div class="form-label-group">
                                                                    <input id="telCelular" class="form-control" placeholder="Telefono Celular" autofocus name="telCelular" type="text">
                                                                    <label for="telCelular">Teléfono Celular</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                      <div class="form-group">
                                                            <div class="form-row">
                                                                <div class="col-md-4">
<div class="labels">Otro número de contacto</div>
                                                                    <div class="form-label-group">
                                                                        <input id="telFijo2" class="form-control" placeholder="Otro número de contacto" autofocus name="telFijo2" type="text">
                                                                        <label for="telFijo2">Otro número de contacto</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
<div class="labels">Fax</div>
                                                                    <div class="form-label-group">
                                                                        <input id="fax" class="form-control" placeholder="Fax" autofocus name="fax" type="text">
                                                                    <label for="fax">Fax</label>
                                                                    </div>
                                                                </div>
                                                           </div>
                                                       </div>

                                                    <hr>
                                                  <div class="titulos"> <p>SOLICITUD</p></div>

                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <div class="col-md-4">
<div class="labels">Tipo de Solicitud PQRS <span>*</span></div>
                                                                <div class="form-label-group">

                                                                    <select id="tipoSolicitud" class="form-control" name="tipoSolicitud" required>
                                                                        <option value="">Seleccione una opción</option>
                                                                        <option>Petición</option>
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
                                                                <label for="breveDescripcion"><div class="labels">Titulo de su PQRS <span>*</span></div></label>
                                                                <div class="form-label-group">

                                                                    <textarea class="form-control" rows="2" id="breveDescripcion" placeholder="Título de su PQRS*" name="breveDescripcion" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <label for="breveDescripcion">A continuación describa su PQRS*</label>
                                                                <p>Puede ingresar fecha, lugar, personas involucradas, etc. Proporcione todos los detalles posibles.</p>
                                                                <p>Tiene una capacidad de 3000 caracteres, si requiere más espacio adjunte el documento necesario en el campo adjuntar soporte.</p>
                                                                <div class="form-label-group">

                                                                    <textarea class="form-control" rows="6" id="descripcion" placeholder="Descripción de su PQRS" name="descripcion" maxlength="3000" required></textarea>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>






                                                        <div class="form-group botonespqrs">
                                                            <div class="form-row">
                                                                <div class="col-md-8">
                                                                    <input type="submit" class="btn btn-primary btn-block" value="Enviar PQRS">

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <a class="btn btn-primary btn-block" href="/">Cancelar</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="form-group adjuntarpqrs">
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <label for="adjuntarSoporte">Adjuntar Soporte</label>
                                                                <p>Tamaño máximo 50MB. Formatos permitidos: .pdf, .docx, .xlsx, .gif, .jpg, .png, .pptx</p>
                                                                <div class="form-label-group">

                                                                    <!--<input type="file" class="form-control-file" id="file" name="adjuntarSoporte" accept=".pdf,.docx,.xlsx,.gif,.jpg,.png,.pptx" onchange="return fileValidation()"/> -->

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="post" action="{{url('file/upload/store')}}" enctype="multipart/form-data"
                                                          class="dropzone" id="dropzone">
                                                        @csrf
                                                    </form>




                                                @endif

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>



</body></html>