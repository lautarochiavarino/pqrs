<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Detalle PQRS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">

                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="18%">
                                    Remitente:

                                </td>
                                <td align="left" width="82%" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; text-align: left;">
                                   
                                                Gestión PQRS AES COLOMBIA
                                   
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="18%">
                                    Destinatario:

                                </td>
                                <td align="left" width="82%" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; text-align: left;">
                                   
                                                {{$contacto}}
                                   
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>

                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px;" width="18%">
                                    Fecha:

                                </td>
                                <td align="left" width="82%" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; text-align: left;">
                                    
                                                {{date('Y-m-d')}}
                                    
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>

                <tr>
                    <td align="center" style="font-family: Arial, sans-serif; font-size: 16px;">PDF Detalle Seguimiento</td>
                </tr>



                <tr>
                    <td style="padding: 0px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Arial, sans-serif; font-size: 14px; padding: 30px 0px 30px 0px;" width="30%">PQRS recibida el:</td>
                                <td align="left" width="70%" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; text-align: left;">
                                    
                                            {{$created_at}}
                                           
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
                                <td align="left" width="70%" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; text-align: left;">
                                   
                                                {{$id}}
                                         
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>

                <tr>
                    <td style="padding: 30px 30px 30px 30px;">
                        Estimado(a) <b>{{$contacto}}</b><br/>

                        Su PQRS se encuentra en estado:
                       <b>{{$estado}}</b>
                        <br/>
                        Su PQRS: <b>{{$tipoSolicitud}}</b><br/>
                        Recibida el: <b>{{$created_at}}</b><br/>
                        Número de radicado: <b>{{$id}}</b><br />
                        <br/>
                        Nos permitimos informarle que hemos atendido su PQRS, a continuación usted encontrará la respuesta detallada.<br />
                        <br/>

                        <table width="542"><tr><td width="100%"> Respuesta: {{$respuestaFinal}}</td></tr></table>


                    <p>Cordialmente, Gestion PQRS </p></td>
                </tr>










                <tr>
                    <td  style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="50%">
                                    <img src="https://desa-pqrs.azurewebsites.net/public/aes.png" width="321" height="73">
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