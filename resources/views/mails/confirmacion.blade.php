<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PQRS Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
			
                <tr>
                    <td style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="30%">
                                    Título de la PQRS:

                                </td>
                                <td align="left" width="70%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold;">
                                                {{$pqrs->breveDescripcion}}
                                            </td>


                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>


                <tr>
                    <td style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="30%">
                                    Remitente:

                                </td>
                                <td align="left" width="70%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold;">
                                                Gestión PQRS  AES Colombia
                                            </td>


                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="30%">
                                    Destinatario:

                                </td>
                                <td align="left" width="70%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold;">
                                                {{$contacto->contacto}}
                                            </td>


                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="30%">
                                    Asunto:

                                </td>
                                <td align="left" width="70%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold;">
                                                Radicado número {{$pqrs->id}}
                                            </td>


                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="30%">
                                    Fecha:

                                </td>
                                <td align="left" width="70%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold;">
                                                {{date('Y-m-d')}}
                                            </td>


                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>

                <tr>
                    <td align="center" style="font-family: Arial, sans-serif; font-size: 16px;">Notificación Automática  PQRS Recibida</td>
                </tr>

                <tr>
                    <td style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="30%">
                                    Su PQRS:

                                </td>
                                <td align="left" width="70%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold;">
                                                {{$pqrs->tipoSolicitud}}
                                            </td>


                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>

                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="30%">
                                    PQRS recibida el:

                                </td>
                                <td align="left" width="70%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold;">
                                                {{$pqrs->created_at}}
                                            </td>


                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>

                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="30%">
                                    Numero de Radicado:

                                </td>
                                <td align="left" width="70%">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold;">
                                               {{$pqrs->id}}
                                            </td>


                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>

                <tr>
                    <td style="padding: 30px 30px 30px 30px;">
                        Estimado(a) {{$contacto->contacto}}:

                        <p>Hemos recibido su PQRS y procederemos a darle tramite.</p>


                        <p>Para poder realizar un seguimiento de su tramite, debera ingresar el código y numero de radicado.</p>

                        <p>Número de radicado: {{$pqrs->id}}</p>
                        <p>Código: {{$pqrs->tipoSolicitud[0]}}{{$pqrs->id}}</p>


                        <p>Para consultar el estado de su trámite favor ingresar con su número de radicado  al siguiente:</p>
                        <a href="https://desa-pqrs.azurewebsites.net/public/seguimiento">Link Seguimiento</a>







                    </td>
                </tr>





                <tr>
                    <td style="padding: 30px 30px 30px 30px;">
                        <p>Cordialmente,</p>
                        <p>Gestión PQRS</p>




                    </td>
                </tr>




                <tr>
                    <td  style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="50%">
                                    <img src="https://desa-pqrs.azurewebsites.net/public/aes.png" width="321" height="73">
                                </td>

                            </tr>

                            <tr>
                                <td style="padding: 30px 30px 30px 30px;">
                                    Este correo se envió desde una cuenta de correo no monitoreada. Por favor, no responda este mensaje.




                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 30px 30px 30px 30px; font-size: 10px;">
                                    AVISO DE CONFIDENCIALIDAD: Salvo que se indique de otra manera o que se derive de la naturaleza de este mensaje, la información contenida en este correo es confidencial y está dirigida únicamente al destinatario final designado en él, ya que puede contener información privilegiada, confidencial, amparada por el secreto profesional y/o que no deba ser revelada. Si usted ha recibido este correo por error, al no ser destinatario final ni empleado o agente responsable de entregar este correo al destinatario final, por favor comuníquelo inmediatamente vía e-mail al remitente y eliminarlo de su sistema, dado que la distribución o copia de esta comunicación está estrictamente prohibida. Gracias.




                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>