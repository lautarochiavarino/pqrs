<!DOCTYPE html>
<html class=" background-fixed" lang="es-ES"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">

    <title>AES Colombia – Sistema PQRS</title>
    <link rel="dns-prefetch" href="http://fonts.googleapis.com/">
    <link href="https://fonts.gstatic.com/" crossorigin="" rel="preconnect">
    <link rel="stylesheet" id="" href="{{ asset('/site/portada/style.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="font-awesome-css" href="{{ asset('/site/portada/font-awesome.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-animations-css" href="{{ asset('/site/portada/animations.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="elementor-frontend-css" href="{{ asset('/site/portada/frontend.css')}}" type="text/css" media="all">
 <style type="text/css">
    .fondo {
    background-color: rgba(255,255,255,0.75);
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 55px;
    padding-bottom: 15px;
    border-radius: 15px;
}
    </style>

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
                                    <div data-id="1130a17a" class="elementor-element elementor-element-1130a17a elementor-widget elementor-widget-image" data-element_type="image.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-image">
                                                <img src="{{URL::asset('/site/portada/imagenes/aeslogo.png')}}" class="elementor-animation-bounce-in attachment-large size-large" alt="" srcset="{{URL::asset('/site/portada/imagenes/aeslogo.png')}} 321w, {{URL::asset('/site/portada/imagenes/aeslogo.png')}} 300w" sizes="100vw" width="321" height="73">											</div>
                                        </div>
                                    </div>
                                    <div data-id="2942c237" class="elementor-element elementor-element-2942c237 textos elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h1 class="elementor-heading-title elementor-size-medium">Estado de su PQRS</h1>		</div>
                                    </div>
                                    <div data-id="288ad84" class="elementor-element elementor-element-288ad84 textos elementor-widget elementor-widget-heading" data-element_type="heading.default">

                                    </div>
                                    <div data-id="005b0a3" class="elementor-element elementor-element-005b0a3 textos fondo elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <p class="elementor-heading-title elementor-size-medium">@if (!$pqrs or $pqrs=='NULL')
                                                    No existe una petición con dicho número de radicado o el código es incorrecto.

                                                @else











                                                    Estimado(a): <b>{{$pqrs->contacto->contacto}}</b><br/>
                                                    Su PQRS se encuentra en estado:
                                                    @if ($pqrs->estado === 0)
                                                        <b>Recibido</b>
                                                    @endif
                                                    @if ($pqrs->estado === 1)
                                                        <b>En Proceso</b>
                                                    @endif
                                                    @if ($pqrs->estado === 2)
                                                        <b>Cerrado</b>
                                                    @endif
                                                    <br/><br/>
                                            <p>Su PQRS: <b>{{$pqrs->tipoSolicitud}}</b></p>
                                                    <p>Recibida el: <b>{{$pqrs->created_at}}</b><p/>
                                                    <p>Número de radicado: <b>{{$pqrs->id}}</b><p/>

                                            @if ($pqrs->estado === 2)
                                                <p><b>{{$pqrs->respuestaFinal}}</b><p/>
                                                @endif


                                                    Cordialmente, Gestion PQRS
                                                <br/>

                                            @if ($pqrs->estado === 2)
                                                <p class="elementor-heading-title elementor-size-medium"><a href="{{ action('PdfController@getGenerar',['id'=>$pqrs->id]) }}">Descargar PDF</a></p>
                                            @endif

                                            @endif
                                        </div>
                                    </div>
                                    <div data-id="1d4a35ab" class="elementor-element elementor-element-1d4a35ab elementor-widget elementor-widget-divider" data-element_type="divider.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-divider">
                                                <span class="elementor-divider-separator"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-id="1b4e66fe" class="elementor-element elementor-element-1b4e66fe elementor-section-content-middle elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-row">
                        <div data-id="345c6c68" class="elementor-element elementor-element-345c6c68 elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="29b13bba" class="elementor-element elementor-element-29b13bba elementor-widget elementor-widget-google_maps" data-element_type="google_maps.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-custom-embed"><iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Ac.%20100%20%2319%2C%20Bogot%C3%A1%2C%20Colombia&amp;t=m&amp;z=18&amp;output=embed&amp;iwloc=near" aria-label="Ac. 100 #19, Bogotá, Colombia" frameborder="0"></iframe></div>		</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="2fc63ab5" class="elementor-element elementor-element-2fc63ab5 elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="4a63f27f" class="elementor-element elementor-element-4a63f27f elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h4 class="elementor-heading-title elementor-size-default">Contáctenos</h4>		</div>
                                    </div>
                                    <section data-id="7ca1b0dd" class="elementor-element elementor-element-7ca1b0dd elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div data-id="292921ea" class="elementor-element elementor-element-292921ea elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div data-id="21a6481c" class="elementor-element elementor-element-21a6481c elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-heading-title elementor-size-default">UBICACIÓN</div>		</div>
                                                            </div>
                                                            <div data-id="7b707bb8" class="elementor-element elementor-element-7b707bb8 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix"><div class="address">Calle 100 N° 19 – 54 Of 901<br>(Prime Tower)<br>Bogotá – Colombia</div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-id="33efe494" class="elementor-element elementor-element-33efe494 elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div data-id="5078837b" class="elementor-element elementor-element-5078837b elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-heading-title elementor-size-default">Email y TELÉFONO</div>		</div>
                                                            </div>
                                                            <div data-id="3147e8e9" class="elementor-element elementor-element-3147e8e9 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix"><p>PBX: (+571) 407-9555 / 594-1400 <br>E-mail: aescolombia@aes.com</p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section data-id="306c0d09" class="elementor-element elementor-element-306c0d09 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div data-id="4a0afcc" class="elementor-element elementor-element-4a0afcc elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div data-id="640895ab" class="elementor-element elementor-element-640895ab elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-heading-title elementor-size-default">HORARIO</div>		</div>
                                                            </div>
                                                            <div data-id="283ac877" class="elementor-element elementor-element-283ac877 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix"><p>LUN-VIE 08:00 – 17:00</p></div>
                                                                </div>
                                                            </div>
                                                            <div data-id="1ec8ae74" class="elementor-element elementor-element-1ec8ae74 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix"><p></p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-id="4cae297c" class="elementor-element elementor-element-4cae297c elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>



</body></html>

