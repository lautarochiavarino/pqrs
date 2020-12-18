<?php


use App\Mail\Confirmacion;
use Illuminate\Support\Facades\Mail;

Route::get('/', 'IndexController@index');

Route::get('nuevocontacto', 'IndexController@nuevocontacto');

Route::post('savecontacto', 'IndexController@savecontacto');

Route::get('nuevopqrs/{id}', 'IndexController@nuevopqrs');

Route::post('savepqrs', 'IndexController@savepqrs');

Route::get('seguimiento', 'IndexController@seguimiento');

Route::post('detallepqrs', 'IndexController@detallepqrs');


Route::get('provincias/{id}', 'IndexController@getProvincias');
Route::get('ciudades/{id}', 'IndexController@getCiudades');
Route::get('pqrs/responsables/{id}', 'PqrsController@getResponsables');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/grupo/index', 'GrupoController@index');

Route::get('/contactos/index', 'ContactoController@index');

Route::post('/cambiargrupo', 'HomeController@cambiargrupo');

Route::post('/cambiargrupopqrs', 'PqrsController@cambiargrupopqrs');

Route::post('pqrs/resultado', 'PqrsController@resultado');

Route::post('pqrs/resultadoavanzado', 'PqrsController@resultadoavanzado');

Route::post('pqrs/resultadoetiqueta', 'PqrsController@resultadoetiqueta');

Route::get('pqrs/nuevas', 'PqrsController@nuevas');

Route::get('pqrs/abiertas', 'PqrsController@abiertas');

Route::get('pqrs/cerradas', 'PqrsController@cerradas');

Route::get('pqrs/todas', 'PqrsController@todas');

Route::get('pqrs/gestionar/{id}', 'PqrsController@gestionar');

Route::post('pqrs/asignarrespuesta', 'PqrsController@asignarrespuesta');

Route::get('pqrs/respuesta/{id}', 'PqrsController@respuesta');

Route::get('pqrs/respuestaFinal/{id}', 'PqrsController@respuestaFinal');

Route::get('pqrs/respuestaPreliminar/{id}', 'PqrsController@respuestaPreliminar');

Route::get('pqrs/verpqrs/{id}', 'PqrsController@verpqrs');

Route::post('/agregaretiqueta', 'PqrsController@agregaretiqueta');

Route::post('/asignarresponsable', 'PqrsController@asignarresponsable');

Route::post('pqrs/cambiarTiempoRespuesta/', 'PqrsController@cambiarTiempoRespuesta');

Route::post('pqrs/cerrarpqrs', 'PqrsController@cerrarpqrs');

Route::get('pqrs/diez', 'PqrsController@diez');
Route::get('pqrs/treinta', 'PqrsController@treinta');
Route::get('pqrs/treintayuno', 'PqrsController@treintayuno');

Route::get('pqrs/enviarRespuestaPreliminar/{id}', 'PqrsController@enviarRespuestaPreliminar');




//administrador

Route::get('admin/gestionar/{id}', 'AdminController@gestionar');

Route::post('admin/save_profile', 'AdminController@save_profile');

Route::post('admin/save_grupo', 'AdminController@save_grupo');

Route::get('admin/ver_usuarios/', 'AdminController@ver_usuarios');

Route::get('admin/ver_grupos/', 'AdminController@ver_grupos');

Route::get('admin/nuevo_grupo/', 'AdminController@nuevo_grupo');

Route::get('admin/modificar_grupo/{id}', 'AdminController@modificar_grupo');
Route::post('admin/actualizar_grupo', 'AdminController@actualizar_grupo');

Route::get('admin/listar_usuarios_grupo/{id}', 'AdminController@listar_usuarios_grupo');

Route::get('admin/activar_grupo/{id}', 'AdminController@activar_grupo');
Route::get('admin/desactivar_grupo/{id}', 'AdminController@desactivar_grupo');

Route::get('admin/grupodesactivado/', 'AdminController@grupodesactivado');


Route::get('admin/desactivar_usuario/{id}', 'AdminController@desactivar_usuario');
Route::get('admin/activar_usuario/{id}', 'AdminController@activar_usuario');

Route::get('admin/eliminar_usuario/{id}', 'AdminController@eliminar_usuario');

Route::get('admin/reset_usuario/{id}', 'AdminController@reset_usuario');

Route::get('admin/cambiarpassword/', 'AdminController@cambiarpassword');

Route::post('admin/changepass/', 'AdminController@changepass');






Route::get('/download/{file}', 'DownloadController@download');

Route::get('/downloadRespuesta/{file}', 'DownloadController@downloadRespuesta');

Route::get('/export-pqrs', 'ExcelController@pqrs');

Route::get('/export-pqrsnuevas', 'ExcelController@pqrsnuevas');

Route::get('/export-pqrsabiertas', 'ExcelController@pqrsabiertas');

Route::get('/export-pqrscerradas', 'ExcelController@pqrscerradas');

Route::get('/export-contactos', 'ExcelController@contactos');

Route::get('/export-pqrsdiez', 'ExcelController@pqrsdiez');

Route::get('/export-pqrstreinta', 'ExcelController@pqrstreinta');

Route::get('/export-pqrstreintayuno', 'ExcelController@pqrstreintayuno');


Route::get('/enviar', function(){
    Mail::to('lautarochiavarino@gmail.com')->send(new Confirmacion());
    return 'Mensaje Enviado';



});

Route::get('mail/queue', function() {

    Mail::later(5, 'mails.queued_email', ["name"=>"Lautis"], function ($mensaje) {
        $mensaje->to('lautarochiavarino@gmail.com', 'Lautaro Chiavarino')->subject('Welcome');
    });

    return "el email fue enviado en 5 segundos.";
});

Route::get('pqrs/mailfailure/', 'PqrsController@mailfailure');



Route::get('pdf','PdfController@getIndex');
Route::get('pdf/generar','PdfController@getGenerar');


//Route::post('/archivos_pqrs', 'IndexController@archivos_pqrs');


Route::post('file/upload/store','IndexController@archivos_pqrs');

Route::post('image/delete','IndexController@fileDestroy');

Route::post('fileRespuesta/upload/store','PqrsController@adjuntarRespuesta');


Route::post('fileRespuestaPreliminar/upload/store','PqrsController@adjuntarRespuestaPreliminar');

Route::post('fileRespuestaGestion/upload/store','PqrsController@adjuntarRespuestaGestion');


Route::get('/eliminarSoporte/{id}/{pqrs_id}', 'PqrsController@eliminarSoporte');


Route::get('version_php', function()
{
    phpinfo();
});

//ABM Feriados
Route::get('admin/festivos/', 'AdminController@festivos');
Route::post('admin/save_festivo', 'AdminController@save_festivo');
Route::get('admin/eliminar_festivo/{id}', 'AdminController@eliminar_festivo');
