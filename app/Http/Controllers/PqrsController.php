<?php

namespace App\Http\Controllers;

use App\Archivo_pqrs;
use App\Contacto;
use App\Feriado;
use App\Grupo;
use App\Mail\AsignarResponsable;
use App\Mail\RespuestaPreliminar;
use App\Pqrs;
use App\Respuesta;
use App\Respuesta_pqrs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Null_;
use Carbon\Carbon;
use App\Mail\GrupoResolutor;
use App\Mail\RespuestaFinal;


class PqrsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function resultado(Request $request)
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs = Pqrs::whereBetween('created_at', [$request['fecha_desde'], $request['fecha_hasta']])->where('grupo_id', $user->grupo_id)->get();
        } else {
            $pqrs = Pqrs::whereBetween('created_at', [$request['fecha_desde'], $request['fecha_hasta']])->get();
        }


        return view('pqrs.resultado', compact('pqrs', 'request'));
    }

    public function resultadoavanzado(Request $request)
    {

        $texto = $request['texto'];
        $pqrs = Pqrs::whereBetween('created_at', [$request['fecha_desde_a'], $request['fecha_hasta_a']])
            ->where('breveDescripcion', 'LIKE', "%$texto%")
            ->orWhere('descripcion', 'LIKE', "%$texto%")->get();


        return view('pqrs.resultadoavanzado', compact('pqrs', 'request'));
    }

    public function resultadoetiqueta(Request $request)
    {

        $etiqueta = $request['etiqueta'];
        $pqrs = Pqrs::whereBetween('created_at', [$request['fecha_desde_e'], $request['fecha_hasta_e']])
            ->where('etiqueta', 'LIKE', "%$etiqueta%")->get();


        return view('pqrs.resultadoetiqueta', compact('pqrs', 'request'));
    }

    public function nuevas()
    {

        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_new = Pqrs::where('estado', '=', 0)->where('grupo_id', $user->grupo_id)->orderby('created_at', 'DESC')->get();
        } else {
            $pqrs_new = Pqrs::where('estado', '=', 0)->orderby('created_at', 'DESC')->get();
        }


        return view('pqrs.nuevas', compact('pqrs_new'));
    }

    public function abiertas()
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_open = Pqrs::where('estado', '=', 1)->where('grupo_id', $user->grupo_id)->orderby('created_at', 'DESC')->get();
        } else {
            $pqrs_open = Pqrs::where('estado', '=', 1)->orderby('created_at', 'DESC')->get();
        }


        return view('pqrs.abiertas', compact('pqrs_open'));
    }

    public function cerradas()
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_closed = Pqrs::where('estado', '=', 2)->where('grupo_id', $user->grupo_id)->orderby('created_at', 'DESC')->get();
        } else {
            $pqrs_closed = Pqrs::where('estado', '=', 2)->orderby('created_at', 'DESC')->get();
        }


        return view('pqrs.cerradas', compact('pqrs_closed'));
    }

    public function todas()
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_todas = Pqrs::orderby('created_at', 'DESC')->where('grupo_id', $user->grupo_id)->get();
        } else {
            $pqrs_todas = Pqrs::orderby('created_at', 'DESC')->get();
        }


        return view('pqrs.todas', compact('pqrs_todas'));
    }

    public function diez()
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_diez = Pqrs::where('tiempoRespuesta', '=', '10')->where('grupo_id', $user->grupo_id)->orderby('created_at', 'DESC')->get();
        } else {
            $pqrs_diez = Pqrs::where('tiempoRespuesta', '=', '10')->orderby('created_at', 'DESC')->get();
        }


        return view('pqrs.diez', compact('pqrs_diez'));
    }

    public function treinta()
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_treinta = Pqrs::where('tiempoRespuesta', '=', '30')->where('grupo_id', $user->grupo_id)->orderby('created_at', 'DESC')->get();
        } else {
            $pqrs_treinta = Pqrs::where('tiempoRespuesta', '=', '30')->orderby('created_at', 'DESC')->get();
        }


        return view('pqrs.treinta', compact('pqrs_treinta'));
    }

    public function treintayuno()
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_treintayuno = Pqrs::where('tiempoRespuesta', '=', '+30')->where('grupo_id', $user->grupo_id)->orderby('created_at', 'DESC')->get();
        } else {
            $pqrs_treintayuno = Pqrs::where('tiempoRespuesta', '=', '+30')->orderby('created_at', 'DESC')->get();
        }


        return view('pqrs.treintayuno', compact('pqrs_treintayuno'));
    }

    public function gestionar($id)
    {


        $user = Auth::user();


        $user_id = $user->id;

        $pqrs = Pqrs::findOrFail($id);

        $respuestas = Respuesta::where('pqrs_id', '=', $id)->orderby('created_at', 'DESC')->get();

        $grupo = Grupo::where('estado', '=', 1)->get();


        $responsables = User::where('grupo_id', '=', $pqrs->grupo_id)->get();


        $respuesta = Respuesta::where('pqrs_id', '=', $id)->orderby('created_at', 'DESC')->take(1)->get();

        $archivos = Archivo_pqrs::where('pqrs_id', $id)->get();


        $vencimiento1 = $pqrs->created_at->addWeekdays($pqrs->tiempoRespuesta);

        $cant_feriados = Feriado::where("fecha",">=",$pqrs->created_at)->where("fecha","<=",$vencimiento1)->count();

        $total = $pqrs->tiempoRespuesta + $cant_feriados;

        $vencimiento = $pqrs->created_at->addWeekdays($total);


        $cant_feriados2 = Feriado::where("fecha",">=",$pqrs->created_at)->where("fecha","<=",$vencimiento)->count();

        if ($cant_feriados != $cant_feriados2) {
            $total = $pqrs->tiempoRespuesta + $cant_feriados2;
            $vencimiento = $pqrs->created_at->addWeekdays($total);
        }





        $archivosRespuestas = Respuesta_pqrs::where('pqrs_id', $id)->get();


        return view('pqrs.gestionar', compact('pqrs', 'grupo', 'user_id', 'id', 'respuestas', 'respuesta', 'user', 'responsables', 'vencimiento', 'archivos', 'archivosRespuestas'));


        /*  return view ('pqrs.gestionar',compact('pqrs','grupo', 'user_id','id','respuestas'));*/
    }


    public function cambiargrupopqrs(Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $pqrs->grupo_id = $request['grupo_id'];

        $pqrs->estado = 1;

        $usuarios= User::where('grupo_id', $request['grupo_id'])->get();


        foreach ($usuarios as $user){

            Mail::to($user['email'])->send(new GrupoResolutor($user, $pqrs));


        }

        if (Mail::failures()) {
            return redirect('/pqrs/mailfailure/');
        }

        $pqrs->save();

        return redirect('/pqrs/gestionar/' . $request['id'] . '');

    }

    public function cambiarTiempoRespuesta(Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $pqrs->tiempoRespuesta = $request['tiempoRespuesta'];


        $pqrs->save();

        $contacto = Contacto::findOrFail($pqrs->contacto_id);


        $respuesta = Respuesta::where('pqrs_id', '=', $request['id'])->orderby('created_at', 'DESC')->first();


        $archivos_respuesta= Respuesta_pqrs::where('pqrs_id', $pqrs->id)->get();
        if ($respuesta != null) {
            //enviar mails a contacto y al general  pqrs.aescolombia@aes.com
            if ($pqrs->medioRespuesta == 'Correo Electrónico') {
                Mail::to($contacto['email'])->send(new RespuestaPreliminar($respuesta, $pqrs, $contacto, $archivos_respuesta));

            }


            Mail::to('pqrs.aescolombia@aes.com')->send(new RespuestaPreliminar($respuesta, $pqrs, $contacto, $archivos_respuesta));

        }

        if (Mail::failures()) {
            return redirect('/pqrs/mailfailure/');
        }


        return redirect('/pqrs/gestionar/' . $request['id'] . '');

    }

    public function asignarresponsable(Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $pqrs->responsable_id = $request['responsable_id'];

        $pqrs->save();

        $usr = User::findOrFail($request['responsable_id']);

        Mail::to($usr['email'])->send(new AsignarResponsable($usr, $pqrs));

        if (Mail::failures()) {
            return redirect('/pqrs/mailfailure/');
        }


        return redirect('/pqrs/gestionar/' . $request['id'] . '');

    }

    public function agregaretiqueta(Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $pqrs->etiqueta = $request['etiqueta'];


        $pqrs->save();

        return redirect('/pqrs/gestionar/' . $request['id'] . '');

    }

    public function respuesta(Request $request)
    {

        $respuesta = Respuesta::findOrFail($request['id']);


        return view('pqrs.respuesta', compact('respuesta'));

    }

    public function respuestaFinal(Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);


        return view('pqrs.respuestaFinal', compact('pqrs'));

    }

    public function respuestaPreliminar(Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);


        return view('pqrs.respuestaPreliminar', compact('pqrs'));

    }

    public function verpqrs(Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $respuestas = Respuesta::where('pqrs_id', '=', $request['id'])->orderby('created_at', 'DESC')->get();


        return view('pqrs.verpqrs', compact('pqrs', 'respuestas'));

    }

    public function asignarrespuesta(Request $request)
    {
        $respuesta = new Respuesta();
        $respuesta->nuevaGestion = $request['nuevaGestion'];

        $respuesta->pqrs_id = $request['pqrs_id'];
        $respuesta->user_id = $request['user_id'];

        $respuesta->save();


        if ($request->hasfile('adjuntarSoporteGestion')) {
            foreach ($request['adjuntarSoporteGestion'] as $adjunto) {
                $file = $adjunto;


                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/respuesta/', $name);

                $input['adjuntarSoporteGestion'] = $name;


                $arch = new Respuesta_pqrs();
                $arch->pqrs_id = $request['pqrs_id'];
                $arch->nombre = $input['adjuntarSoporteGestion'];
                $arch->tipo = "Soporte Gestión";

                $arch->save();

            }

        }


        return redirect('/pqrs/gestionar/' . $request['pqrs_id'] . '');

    }


    public function cerrarpqrs(Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['pqrs_id']);


        $pqrs->respuestaPreliminar = $request['respuestaPreliminar'];

        $pqrs->respuestaFinal = $request['respuestaFinal'];

        $pqrs->consecutivoCorrespondencia = $request['consecutivoCorrespondencia'];


        if ($request['cerrar']) {
            $pqrs->estado = 2;
            $pqrs->cerrado = date('Y-m-d H:i:s');
        }
        $pqrs->save();


        if ($request->hasfile('adjuntarRespuestaPreliminar')) {
            foreach ($request['adjuntarRespuestaPreliminar'] as $adjunto) {
                $file = $adjunto;


                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/respuesta/', $name);

                $input['adjuntarRespuestaPreliminar'] = $name;


                $arch = new Respuesta_pqrs();
                $arch->pqrs_id = $request['pqrs_id'];
                $arch->nombre = $input['adjuntarRespuestaPreliminar'];
                $arch->tipo = "Respuesta Preliminar";

                $arch->save();

            }

        }

        if ($request->hasfile('adjuntarRespuestaFinal')) {
            foreach ($request['adjuntarRespuestaFinal'] as $adjunto2) {
                $file = $adjunto2;


                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/respuesta/', $name);

                $input['adjuntarRespuestaFinal'] = $name;


                $arch = new Respuesta_pqrs();
                $arch->pqrs_id = $request['pqrs_id'];
                $arch->nombre = $input['adjuntarRespuestaFinal'];
                $arch->tipo = "Respuesta Final";

                $arch->save();

            }

        }

        $archivos_respuesta= Respuesta_pqrs::where('pqrs_id', $pqrs->id)->get();

        if ($request['cerrar']) {
            $contacto = Contacto::findOrFail($pqrs->contacto_id);

            $respuesta['respuestaFinal'] = $request['respuestaFinal'];


            if ($pqrs->medioRespuesta == 'Correo Electrónico') {
                Mail::to($contacto['email'])->send(new RespuestaFinal($respuesta, $pqrs, $contacto, $archivos_respuesta));

            }


            Mail::to('pqrs.aescolombia@aes.com')->send(new RespuestaFinal($respuesta, $pqrs, $contacto, $archivos_respuesta));
        }




        return redirect('/pqrs/gestionar/' . $request['pqrs_id'] . '');
    }

    public function enviarRespuestaPreliminar($id)
    {

        $pqrs = Pqrs::findOrFail($id);



        $archivos_respuesta= Respuesta_pqrs::where('pqrs_id', $pqrs->id)->get();


        $contacto = Contacto::findOrFail($pqrs->contacto_id);


        $respuesta['respuestaPreliminar'] = $pqrs['respuestaPreliminar'];


        if ($pqrs->medioRespuesta == 'Correo Electrónico') {
            Mail::to($contacto['email'])->send(new RespuestaPreliminar($respuesta, $pqrs, $contacto, $archivos_respuesta));

        }


        Mail::to('pqrs.aescolombia@aes.com')->send(new RespuestaPreliminar($respuesta, $pqrs, $contacto, $archivos_respuesta));

        if (Mail::failures()) {
            return redirect('/pqrs/mailfailure/');
        }



        return redirect('/pqrs/gestionar/' . $id . '');
    }

    public function adjuntarRespuesta(Request $request)
    {


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('respuesta'), $imageName);


        $imageUpload = new Respuesta_pqrs();
        $imageUpload->nombre = $imageName;
        $imageUpload->tipo = "Respuesta Final";
        $imageUpload->save();


        $array = $request->session()->get('archivosRespuesta');

        $array[] = $imageUpload->id;

        $request->session()->put('archivosRespuesta', $array);

    }

    public function adjuntarRespuestaPreliminar(Request $request)
    {


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('respuesta'), $imageName);


        $imageUpload = new Respuesta_pqrs();
        $imageUpload->nombre = $imageName;

        $imageUpload->tipo = "Respuesta Preliminar";
        $imageUpload->save();


        $array = $request->session()->get('archivosRespuestaPreliminar');

        $array[] = $imageUpload->id;

        $request->session()->put('archivosRespuestaPreliminar', $array);

    }

    public function adjuntarRespuestaGestion(Request $request)
    {


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('respuesta'), $imageName);


        $imageUpload = new Respuesta_pqrs();
        $imageUpload->nombre = $imageName;

        $imageUpload->tipo = "Soporte Gestión";
        $imageUpload->save();


        $array = $request->session()->get('archivosGestion');

        $array[] = $imageUpload->id;

        $request->session()->put('archivosGestion', $array);

    }


    public function eliminarSoporte($id, $pqrs_id)
    {

        $archivo = Respuesta_pqrs::findOrFail($id);

        if (file_exists(public_path('respuesta/' . $archivo->nombre . ''))) {
            unlink(public_path('respuesta/' . $archivo->nombre . ''));
            $archivo->delete();
        } else {
            dd('El archivo no existe.');
        }


        return redirect('/pqrs/gestionar/' . $pqrs_id . '');


    }

    public function mailfailure()
    {



        return view('pqrs.mailfailure');
    }

}
